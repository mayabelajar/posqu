<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function diskon() {
        return view('modal.diskon');
    }
    public function nota() {
        return view('modal.nota');
    }
}
