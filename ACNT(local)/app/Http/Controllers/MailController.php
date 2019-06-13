<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function store(){
       $mensaje = request()->validate([
            'name' =>'required',
            'email' =>'required',
            'subject' =>'required',
            'content' =>'required|min:3',
        ],[
            'name.required' => __('Necesito tu nombre')
        ]);
        Mail::to('acntaguilas@gmail.com')->send(new Email);
    }

}
