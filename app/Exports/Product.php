<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class Product implements FromView
{

    public function view(): View
    {
        return view('exports.products', ['products' => \App\Product::all()]);
    }
}
