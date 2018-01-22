<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Page;
use App\People;
use App\Service;
use App\Portfolio;
use App\Mail\TestMail;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function execute(Request $request)
    {
        if($request->isMethod('post')) {

            $messages = [
                'required'  => 'Поле :attribute обязательно к заполнению',
                'email'     => 'Поле :attribute должно соответстововать email адресу'
            ];

            $this->validate($request, [
                'name'  => 'required|max:255',
                'email' => 'required|email',
                'text'  => 'required'
            ], $messages);

            $data = $request->all();

//            $result = Mail::send('site.email', ['data' => $data], function ($message) use ($data) {
//                $mail_admin = env('MAIL_ADMIN');
//                $message->from($data['email'], $data['name']);
//                $message->to($mail_admin)->subject('Question');
//            });

            $mail_admin = env('MAIL_ADMIN');
            Mail::to($mail_admin)
                ->send(new TestMail($data));

//            dd(Mail::failures());

            if(!Mail::failures()) {
                return redirect()->route('home')->with(['status' => 'Email was send']);
            }



        }

        $pages = Page::all();
        $portfolios = Portfolio::get(['name', 'filter', 'images']);
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();

        $tags = DB::table('portfolios')->distinct()->pluck('filter');

        $menu = [];

        foreach ($pages as $page) {
            $item = [
                'title' => $page->name,
                'alias' => $page->alias
            ];

            array_push($menu, $item);
        }

        $item = [
            'title' => 'Services',
            'alias' => 'service'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Portfolio',
            'alias' => 'Portfolio'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Team',
            'alias' => 'team'
        ];
        array_push($menu, $item);

        $item = [
            'title' => 'Contact',
            'alias' => 'contact'
        ];
        array_push($menu, $item);

        $data = [
            'menu'          => $menu,
            'pages'         => $pages,
            'services'      => $services,
            'portfolios'    => $portfolios,
            'tags'          => $tags,
            'peoples'       => $peoples
        ];

        return view('site.index', $data);
    }
}
