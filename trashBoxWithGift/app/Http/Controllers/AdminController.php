<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Gift;
use App\Http\Requests\GiftRequest;
use App\Http\Resources\GiftResource;
use App\Models\TrashHistory;
use App\Models\GiftOrder;

class AdminController extends Controller
{
    public function index() {
        return view('layouts.admin');
    }

    public function users() {
        $users = User::all();
        return view('adminpanel.crudforusers')->with('users', $users);
    }

    public function blockUser(Request $req) {
        $val = $req->validate([
            'id' => 'required',
            'state' => 'required'
        ]);

        User::findOrFail($val['id'])->update(['block' => $val['state'] == 'true' ? 1 : 0]);

        return response()->json(null, 200);
    }

    public function deleteUser(Request $req) {
        $val = $req->validate([
            'id' => 'required'
        ]);

        // $user = User::findOrFail($val['id']);

        // $user->delete();

        User::destroy($val['id']);

        return response()->json(null, 200);
    }

    public function gifts() {
        $gifts = GiftResource::collection(Gift::all());
        return view('adminpanel.crudforgifts')->with('gifts', $gifts->toArray(null));
    }

    public function updateAddGift(GiftRequest $giftReq) {
        $tempValue = $giftReq->validated();

        $newImg = $_FILES["imagePath"];

        if ($newImg["tmp_name"] != "") {
            $destPath = 'storage/'.$newImg["name"];

            copy($newImg["tmp_name"], $destPath);
            $value["imagePath"] = $destPath;
        }

        $value["name"] = $tempValue["name"];
        $value["price"] = $tempValue["price"];
        $value["description"] = $tempValue["description"];
        $value["count"] = $tempValue["count"];

        if ($tempValue["submitButton"] == "Update") {
            Gift::find($tempValue["id"])->update($value);
        } else if ($tempValue["submitButton"] == "Add") {
            Gift::create($value);
        }

        return redirect('admin/gifts');
    }

    public function deleteGift(Request $req) {
        $val = $req->validate([
            'id' => 'required'
        ]);

        Gift::destroy($val['id']);

        return response()->json(null, 200);
    }

    public function changePic() {
        $image = $_FILES["imagePath"];

        @mkdir('storage/temp');

        $newPath = 'storage\\temp\\'.$image["name"];
        copy($image["tmp_name"], $newPath);

        return response()->json(asset($newPath), 200);
    }

    public function statistics() {
        $totTrashCount = TrashHistory::count();
        $giftOrderArray = GiftOrder::all();
        $totNumGift = 0;

        foreach ($giftOrderArray as $go) {
            $totNumGift += $go->quantity;
        }

        return view('adminpanel.statistics')->with('totTrashCount', $totTrashCount)->with('totNumGift', $totNumGift);
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
