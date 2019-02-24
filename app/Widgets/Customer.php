<?php

namespace App\Widgets;

use Illuminate\Support\Str;
// use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;

class Customer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $count = 2;
        $count = \App\Customer::count();
        $string = trans_choice(__("Cliente|Clientes"), $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'text'   => __('Tiene :count :string en su base de datos. Haga clic en el botón de abajo para ver todos los clientes. ', ['count' => $count, 'string' => Str::lower($string)]),
            'icon'   => 'voyager-people',
            'title'  => "{$count} {$string}",
            'text'   => __('Tiene :count :string en su base de datos. Haga clic en el botón de abajo para ver todos los clientes. ', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('Ver todos los clientes'),
                'link' => route('voyager.customers.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', new \App\Customer);
    }
}
