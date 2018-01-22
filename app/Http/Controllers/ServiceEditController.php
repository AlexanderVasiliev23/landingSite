<?php

namespace App\Http\Controllers;

use Validator;
use App\Service;
use Illuminate\Http\Request;

class ServiceEditController extends Controller
{
    public function execute(Service $service, Request $request)
    {
        if($request->isMethod('POST')) {
            $input = $request->except('_token');

            $validator = Validator::make($input, [
                'name'  => 'required|max:100|unique:services,name,' . $input['id'],
                'text'  => 'required',
            ]);

            if($validator->fails()) {
                return redirect()
                    ->route('serviceEdit')
                    ->withErrors($validator)
                    ->withInput();
            }

            if($request->hasFile('icon')) {
                $file = $request->file('icon');
                $input['icon'] = $file->getClientOriginalName();

                $file->move(public_path() . '/assets/img', $input['icon']);
            }
            else {
                $input['icon'] = $input['old_icon'];
            }

            unset($input['old_icon']);

            $input['text'] = strip_tags($input['text']);

            $service->fill($input);

            if($service->update()) {
                return redirect('admin')->with('status', 'Сервис обновлен');
            }
        }

        $old = $service->toArray();

        $data = [
            'title' => 'Редактирование сервиса',
            'data'  => $old
        ];

        return view('admin.services_edit', $data);
    }
}
