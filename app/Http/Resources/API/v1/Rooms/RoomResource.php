<?php

namespace App\Http\Resources\API\v1\Rooms;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\v1\Rooms\RoomImagesResource;
use App\Http\Resources\API\v1\Rooms\RoomDetailsResource;
use App\Http\Resources\API\v1\Rooms\RoomReviewsResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'descriptions' => $this->descriptions,
            'roomDetails' => new RoomDetailsResource($this->rooomDetails),
            'roomImages' => RoomImagesResource::collection($this->roomImages),
            'roomReviews' => new RoomReviewsResource($this->roomReviews)
        ];
    }
}
