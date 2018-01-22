<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function execute()
    {
        $services = Service::all()->toArray();

        $data = [
            'title' => 'Сервисы',
            'data'  => $services
        ];

     return view('admin.services', $data);
    }
}
