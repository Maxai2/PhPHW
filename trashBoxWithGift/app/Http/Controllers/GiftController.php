<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gift;
use App\Http\Requests\CreateGiftRequest;

class GiftController extends Controller
{
    public function get() {
        $gifts = Gift::all();
        return view('gifts')->with('gifts', $gifts);
    }

    public function insert(GiftRequest $request) {
        $validated = $request->validated();

        Gift::create($validated);
        return redirect('gifts');
    }

    public function update($giftId, GiftRequest $gift) {
        $validated = $gift->validated();

        Gift::find($giftId)->update($validated);
        return redirect('gifts');
    }

    public function remove($giftId) {
        Gift::destroy($giftId);
        return redirect('gifts');
    }
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
