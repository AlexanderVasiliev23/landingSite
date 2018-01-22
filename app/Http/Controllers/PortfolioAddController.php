<?php

namespace App\Http\Controllers;

use Validator;
use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioAddController extends Controller
{
    public function execute(Request $request)
    {
        if($request->isMethod('POST')) {
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name'  => 'required|max:255|unique:portfolios',
                'filter' => 'required|max:255'
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('portfolioAdd')
                    ->withErrors($validator)
                    ->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['images']);
            }

            $input['text'] = strip_tags($input['text']);

            $portfolio = new Portfolio();

            $portfolio->fill($input);

            if($portfolio->save()) {
                return redirect('admin')->with('status', 'Портфолио добавлено');
            }

        }


        if(view()->exists('admin.portfolios_add')) {
            $data = [
                'title' => 'Добавление портфолио'
            ];

            return view('admin.portfolios_add', $data);
        }
        else {
            abort(404);
        }
    }
}
