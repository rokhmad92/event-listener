<?php

namespace App\Http\Controllers;

use App\Events\eventNotif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class indexController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $validateData = Validator::make($request->input(), [
            'email' => 'unique:users,email|email|required',
            'password' => 'min:8|max:20|required'
        ], [
            'email.unique' => 'Email sudah dipakai'
        ]);

        if($validateData->fails()){
            return back()->withErrors($validateData);
        }

        User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        event(New eventNotif($request->input('email')));

        return back()->with('success', 'register berhasil!');
    }
}
