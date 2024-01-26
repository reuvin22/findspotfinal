<?php

namespace App\Http\Controllers\API\v1\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\API\v1\User\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $id = $user['id'];
        $name = $user['name'];
        Mail::to($user['email'])->send(new EmailVerification($id, $name));
        if(!$user){
            return response()->failed('Failed to Insert Data');
        }

        return response()->success($user, 'Data Inserted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(empty($user)){
            return response()->empty();
        }
        return response()->getData($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterRequest $request, string $id)
    {
        $userId = User::find($id);
        $userId->update($request->validated());
        if(empty($userId))
        {
            return response()->empty();
        }

        if(!$userId){
            return response()->failed('Failed to Update Data');
        }else {
            return response()->success($userId, 'Data Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userId = User::find($id);
        $userId->delete();
        if(empty($userId)){
            return response()->empty();
        }else {
            return response()->success($userId, 'Data Deleted Successfully');
        }
    }
}
