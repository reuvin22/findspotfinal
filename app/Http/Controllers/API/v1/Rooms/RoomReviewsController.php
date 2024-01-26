<?php

namespace App\Http\Controllers\API\v1\Rooms;

use App\Models\RoomReviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\v1\Rooms\RoomReviewRequest;

class RoomReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = RoomReviews::paginate(10);
        if(empty($reviews)){
            return response()->empty();
        }
        return $reviews;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomReviewRequest $request)
    {
        $reviews = RoomReviews::create($request->validated());
        if(!$reviews){
            return response()->failed('Data Insert Failed');
        }
        return response()->success($reviews, 'Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reviewId = RoomReviews::find($id);
        if(empty($reviewId)){
            return response()->empty();
        }
        return response()->getData($reviewId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomReviewRequest $request, string $id)
    {
        $review = RoomReviews::find($id);
        $update = $review->update($request->validated());
        if(empty($review)){
            return response()->empty();
        }
        return response()->success($review, 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = RoomReviews::find($id);
        $delete = $review->delete();
        if(empty($review)){
            return response()->empty();
        }
        return response()->success($review, 'Data Deleted Successfully');
    }
}
