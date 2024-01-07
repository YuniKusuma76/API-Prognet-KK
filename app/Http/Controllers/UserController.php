<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __invoke()
    {
        return [
            'user' => auth()->user()
        ];
    }
}
