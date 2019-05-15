<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        return view('layouts.admin');
    }

    public function users() {
        $users = User::all();
        $admin = Auth::user();
        return view('adminpanel.crudforusers')->with('users', $users);
    }

    /*
        // public function all()
        // {
        //     return News::all();
        // }
        // public function create($data)
        // {
        //     return News::create($data);
        // }
        // public function find($id)
        // {
        //     return News::find($id);
        // }
        // public function delete($id)
        // {
        //     return News::destroy($id);
        // }
        // public function update($id, array $data)
        // {
        //     return News::find($id)->update($data);
        // }
    */
}
