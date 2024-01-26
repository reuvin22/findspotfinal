<?php

namespace App\Models;

use App\Models\RoomImages;
use App\Models\RoomDetails;
use App\Models\RoomReviews;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'descriptions'
    ];

    /**
     * Get the user that owns the Rooms
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomDetails()
    {
        return $this->hasMany(RoomDetails::class, 'roomId');
    }
    /**
     * Get all of the comments for the Rooms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomImages()
    {
        return $this->hasMany(RoomImages::class, 'roomId');
    }

    /**
     * Get all of the comments for the Rooms
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomReviews()
    {
        return $this->hasMany(RoomReviews::class, 'roomId');
    }
}
