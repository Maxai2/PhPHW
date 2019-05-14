<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('adminpanel.main');
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
