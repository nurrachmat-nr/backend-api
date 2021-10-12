<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function resetPasword(Request $request){
        $user = $request->user();
        if(!$user->tokenCan("reset-password")){        
            return response()->json(['message' => "Anda tidak diizinkan mengganti password"], 502);
        }

        //.. reset password
    }

    public function me(Request $request){
        $u = $request->user();
        $user = User::with(['hasDivision'])->find($u->id)->first();
        //$q = "SELECT users.`id`, users.`username`, users.`division_id`, users.`role`, users.`created_at`, users.`updated_at`, divisions.name as 'division_name' FROM `users` join divisions on users.division_id = divisions.id WHERE users.`id` = ?";
        //$user = DB::select($q, [$user->id]);
        //return $user[0];
        return new UserResource($user);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
