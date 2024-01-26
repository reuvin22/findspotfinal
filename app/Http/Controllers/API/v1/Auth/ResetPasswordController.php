<?php

namespace App\Http\Controllers\API\v1\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Requests\API\v1\Auth\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function resetPassword(ResetPasswordRequest $request, string $id)
    {
        $hashedId = Hash::check($id);
        $user = User::find($hashedId);
        $user->update($request->validated());
        return response()->success($user, 'Data Updated Successfully');
    }

    public function resetPasswordEmail(ResetPasswordRequest $request)
    {

    }

    public function reset(ResetPasswordRequest $request)
    {
        $data = $request->validated();
        $find = User::where('email', $data['email'])->first();
        $name = $find->name;
        $id = Hash::make($find->id);
        $email = $find->email;
        if(empty($find)){
            return response()->empty();
        }
        Mail::to($find)->send(new ResetPasswordEmail($name, $id, $email));

        return response()->success($find, 'Reset Password Email has been sent');
    }
}
