<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{

    public function CheckAuth()
    {
        if (Session::has('id')) {
            return redirect('/dashboard');
        } else {
            return redirect('/flogin');
        }
    }

    public function dashboard()
    {
        $this->CheckAuth();
        $info_user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.dashboard',compact('info_user'));
    }

   

    public function fnumber()
    {
        $this->CheckAuth();
        $info_user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.number',compact('info_user'));
    }

    public function fnew_number()
    {
        $this->CheckAuth();
        $info_user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.add_new_number',compact('info_user'));
    }


    public function user()
    {
        $this->CheckAuth();
        $info_user = DB::table('users')->where('id', Session::get('id'))->get();
        return view('pages.user',compact('info_user'));
    }

    public function update_user(Request $request, $id)
    {
        $user = User::find($id);
        $user->fullname = $request->input('fullname');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role');
        $user->save();
        
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        session()->forget('id');
        return view('pages.flogin');
    }


}
