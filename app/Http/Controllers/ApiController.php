<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function allUsers(Request $request)
    {
        $query = User::query();
        if($request->has('event_id')){
            $query->where('event_id', intval($request->get('event_id')));
        }
        return $query->get();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'event_id' => 'required|exists:events,id',
        ]);
        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()->all()], 422);
        }

        $user = User::create($request->all());
        $details = ['email' => $user->email];
        SendEmail::dispatch($details);
        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|nullable|required|string|max:255',
            'surname' => 'sometimes|nullable|required|string|max:255',
            'email' => 'sometimes|nullable|required|email|unique:users,email,'.$request->id,
            'event_id' => 'sometimes|nullable|required|exists:events,id',
        ]);
        if ($validator->fails())
        {
            return response(['error'=>$validator->errors()->all()], 422);
        }

        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
