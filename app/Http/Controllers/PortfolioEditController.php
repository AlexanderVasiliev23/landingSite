<?php

namespace App\Http\Controllers;

use Validator;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioEditController extends Controller
{
    public function execute(Portfolio $portfolio, Request $request)
    {
        if($request->isMethod('DELETE')) {
            $portfolio->delete();
            return redirect('admin')->with('status', 'Портфолио удалено');
        }

        if($request->isMethod('POST')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name'      => 'required|max:255|unique:portfolios,name,' . $input['id'],
                'filter'    => 'required|max:255'
            ]);


            if($validator->fails()) {
                return redirect()
                    ->route('portfolioEdit', ['portfolio', $input['id']])
                    ->withErrors($validator)
                    ->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['images']);
            }
            else {
                $input['images'] = $input['old_images'];
            }

            unset($input['old_images']);

            $portfolio->fill($input);

            if($portfolio->update()) {
                return redirect('admin')->with('status', 'Портфолио обновлено');
            }

        }

        $old = $portfolio->toArray();

        if(view()->exists('admin.portfolios_edit')) {
            $data = [
                'title' => 'Редактирование портфолио: ' . $old['name'],
                'data'  => $old
            ];

//            dd($data);

            return view('admin.portfolios_edit', $data);
        }
    }
}
