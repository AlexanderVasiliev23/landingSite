<?php

namespace App\Http\Controllers;

use Validator;
use App\Service;
use Illuminate\Http\Request;

class ServiceAddController extends Controller
{
    public function execute(Request $request)
    {
        if($request->isMethod('POST')) {

            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name'  => 'required|max:100|unique:services',
                'text'  => 'required',
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('serviceAdd')
                    ->withErrors($validator)
                    ->withInput();
            }

            if($request->hasFile('icon')) {
                $file = $request->file('icon');
                $input['icon'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['icon']);
            }

            $service = new Service();

            $service->fill($input);

            if($service->save()) {
                return redirect('admin')->with('status', 'Сервис добавлен');
            }

        }

        $data = [
            'title' => 'Добавить сервис'
        ];

        return view('admin.services_add', $data);
    }
}
