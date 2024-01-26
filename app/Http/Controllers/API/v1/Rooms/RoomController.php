<?php

namespace App\Http\Controllers\API\v1\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Rooms\RoomRequest;
use App\Http\Resources\API\v1\Rooms\RoomResource;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::paginate(10);
        if(empty($rooms)){
            return response()->empty();
        }
        return new RoomResource($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomRequest $request)
    {
        $room = Rooms::create($request->validated());
        if(!$room){
            return response()->failed('Data Failed to Insert');
        }
        return response()->success($room, 'Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $roomId = Rooms::find($id);
        if(empty($roomId)){
            return response()->empty();
        }
        return response()->getData($roomId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomRequest $request, string $id)
    {
        $roomId= Rooms::find($id);
        $update = $roomId->update($request->validated());

        if(!$update){
            return response()->failed('Updating Data Failed');
        }

        return response()->success($roomId, 'Data Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roomId = Rooms::find($id);
        $delete = $roomId->delete();
        if(!$delete){
            return response()->failed('Failed to Delete Data');
        }
        return response()->success($roomId, 'Data has been Deleted');
    }
}
