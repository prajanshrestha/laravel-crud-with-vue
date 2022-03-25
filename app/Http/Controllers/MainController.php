<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class MainController extends Controller
{
    public function storeItem(Request $req) {
        $data = new Data();
        $data->name = $req->name;
        $data->age = $req->age;
        $data->profession = $req->profession;

        $data->save();
        return $data;
    }
    public function getItems(Request $req){
        $data = Data::all();
        return $data;
    }
    public function deleteItem(Request $req) {
        $data = Data::find($req->id)->delete();
        return $data;
    }
    public function editItem(Request $req, $id) {
        $data = Data::where("id", $id)->first();

        $data->name = $req->get("val1");
        $data->age = $req->get("val2");
        $data->profession = $req->get("val3");
        $data->save();
        return $data;
    }
}