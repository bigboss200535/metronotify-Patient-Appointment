<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $users= User::where('archived', 'No')->get();

       return view('portal.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $users = User::where('user_id', $user_id)->first();
        
        return response()->json([
            'data' => $users,
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
       $user = User::findOrFail($user_id);

         return response()->json([
            'data' => $user,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $user_id)
    {
        $user = User::findOrFail($user_id);

        $validated = $request->validate([
            'firstname' => ['nullable', 'string', 'max:150'],
            'othername' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user_id, 'user_id')],
            'status' => ['required', 'string', 'max:50'],
        ]);

        $user->update([
            'firstname' => $validated['firstname'] ?? $user->firstname,
            'othername' => $validated['othername'] ?? $user->othername,
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        return back()->with('status', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $user_id)
    {
        $user = User::findOrFail($user_id);

        // Archive user instead of hard delete
        $user->archived = 'Yes';
        $user->archived_date = now();
        $user->archived_by = Auth::user()->user_id ?? '';
        $user->status = 'Inactive';
        $user->save();

        return back()->with('status', 'User deleted successfully');
    }

    public function block(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->block();
        return back()->with('status', 'User has been blocked successfully');
    }

    public function unblock(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->unblock();
        return back()->with('status', 'User has been unblocked successfully');
    }
}
