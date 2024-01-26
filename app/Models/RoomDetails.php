<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomId',
        'roomDetails'
    ];

    /**
     * Get the user that owns the RoomDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rooms()
    {
        return $this->belongsTo(Rooms::class, 'id');
    }
}
