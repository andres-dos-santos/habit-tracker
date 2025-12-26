<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index() {
        $name = 'Andres';
        $habits = ['Ler', 'Estudar', 'Beber Água'];

        return view('home', [
            'name' => $name,
            'habits' => $habits
        ]);
    }
}
