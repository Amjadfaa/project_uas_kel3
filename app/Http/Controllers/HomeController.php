<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Method untuk halaman Home
    public function index() {
        return view('layouts.home');
    }

    // Method untuk halaman Belajar
    public function consule() {
        return view('layouts.consule');
    }
}
