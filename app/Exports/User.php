<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;


class User implements FromView
{

    public function view(): View
    {
        return view('exports.users', ['users' => \App\User::all()]);
    }
}
