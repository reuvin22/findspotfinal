<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    public function verify(string $id)
    {
        $id = User::find($id);
        $id->email_verified_at = now();
        $id->update();
        return response()->json([
            'message' => 'Your email is now verified'
        ], 200);
    }
}
