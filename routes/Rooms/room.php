<?php

use App\Http\Controllers\API\v1\Rooms\RoomController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/rooms', RoomController::class);
