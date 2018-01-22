<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function execute()
    {
        $portfolios = Portfolio::all()->toArray();

        $data = [
            'title'     => 'Список портфолио',
            'portfolios' => $portfolios
        ];

        return view('admin.portfolios', $data);
    }
}
