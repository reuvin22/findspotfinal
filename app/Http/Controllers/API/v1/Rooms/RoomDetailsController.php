<?php

namespace App\Http\Controllers\API\v1\Rooms;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Rooms\RoomDetailsRequest;
use App\Models\RoomDetails;
use Illuminate\Http\Request;

class RoomDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = RoomDetails::paginate(10);
        if(empty($details)){
            return response()->empty();
        }
        return $details;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomDetailsRequest $request)
    {
        $details = RoomDetails::create($request->validated());
        if(!$details){
            return response()->failed('Data Insert Failed');
        }
        return response()->success($details, 'Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detailsId = RoomDetails::find($id);
        if(empty($detailsId)){
            return response()->empty();
        }
        return response()->getData($detailsId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomDetailsRequest $request, string $id)
    {
        $detailsId = RoomDetails::find($id);
        $update = $detailsId->update($request->validated());
        if(!$update){
            return response()->failed('Failed to Update Data');
        }
        return response()->success($detailsId, 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailsId = RoomDetails::find($id);
        $delete = $detailsId->delete();
        if(!$delete){
            return response()->failed('Data Delete Failed');
        }
        return response()->success($detailsId, 'Data Deleted Successfully');
    }
}
