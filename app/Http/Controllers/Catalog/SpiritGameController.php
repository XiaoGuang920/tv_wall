<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SpiritGameController extends Controller
{
    public function index() {
        $header = app('App\Http\Controllers\Catalog\HeaderController')->index();
        $footer = app('App\Http\Controllers\Catalog\FooterController')->index();;

        return view('Catalog.spirit_game.index', [
            'header' => $header,
            'footer' => $footer
        ]);
    }
}
