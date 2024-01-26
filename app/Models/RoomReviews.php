<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomReviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomId',
        'roomComments',
        'roomReviews'
    ];

    /**
     * Get the user that owns the roomReviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'id');
    }
}
