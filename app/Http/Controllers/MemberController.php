<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Rahma',
            'Nasmit',
            'Palen',
            'Caca',
            'Citi'
        ];

        return view('members.index', compact('members'));
    }
}
