<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use Illuminate\Http\Request;

class ItemTypeController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request){
        $item_type = new ItemType();

        $item_type->item_type = $request->item_type;
        $item_type->volume_id = $request->volume_id;

        $item_type->save();

        return redirect()->route('projects.volumes.show', $request->volume_id);
    }

    public function show(ItemType $itemType){

    }

    public function edit(ItemType $itemType){

    }

    public function update(Request $request, ItemType $itemType){

    }

    public function destroy(ItemType $itemType){

    }
}
