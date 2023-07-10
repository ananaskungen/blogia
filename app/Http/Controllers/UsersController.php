<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();

        return view('users', ['users' => $users]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
   
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
       
        ]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users')->with('success', 'Working!');

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user's posts
        $user->posts()->delete();
    
        // Delete the user
        $user->delete();
    
        return redirect()
            ->route('welcome')
            ->with('success', 'Successfully DELETED!');
    }
}
