<?php

namespace App\Http\Controllers\API\v1\Rooms;

use App\Models\RoomImages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Rooms\RoomImagesRequest;

class RoomImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $img = RoomImages::paginate(10);
        if(empty($img)){
            return response()->empty();
        }
        return $img;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomImagesRequest $request)
    {
        $data = $request->validated();

        $images = [];
        foreach($data['roomImages'] as $datas){
            $roomImages = RoomImages::create($datas);
            $images[] = $roomImages;
        }
        if(!$images){
            return response()->failed('Failed to Insert Data');
        }
        return response()->success($images, 'Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $imageId = RoomImages::find($id);
        if(empty($imageId)){
            return response()->empty();
        }
        return response()->getData($imageId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomImagesRequest $request, string $id)
    {
        $imageId = RoomImages::find($id);
        $imageUpdate = $imageId->update($request->validate());
        if(!$imageUpdate){
            return response()->failed('Failed to Update Images');
        }
        return response()->success($imageId, 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imageId = RoomImages::find($id);
        $imageId->delete();
        if(empty($imageId)){
            return response()->empty();
        }
        return response()->success($imageId, 'Data Deleted Successfully');
    }
}
