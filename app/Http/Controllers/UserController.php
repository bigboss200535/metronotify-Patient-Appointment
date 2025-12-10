<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display all users
     */
    public function index()
    {
       $users= User::where('archived', 'No')->get();

       return view('portal.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('portal.users.create');
    }

    /**
     * Store a newly created user
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => ['nullable', 'string', 'max:150'],
            'othername' => ['nullable', 'string', 'max:150'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['nullable', 'string', 'min:8'],
            'status' => ['nullable', 'string', 'max:50'],
            'telephone' => ['nullable', 'string', 'max:50'],
            'gender' => ['nullable', 'string', 'max:10'],
            'user_role' => ['nullable', 'string', 'max:50'],
            'is_admin' => ['nullable'],
        ]);

        $user = new User();
        $user->user_id = (string) Str::uuid();
        $user->firstname = $validated['firstname'] ?? null;
        $user->othername = $validated['othername'] ?? null;
        $user->email = $validated['email'];
        $user->password = $validated['password'] ?? Str::random(12);
        $user->status = $validated['status'] ?? 'Active';

        // optional fields present in schema
        if (array_key_exists('telephone', $validated)) { $user->telephone = $validated['telephone']; }
        if (array_key_exists('gender', $validated)) { $user->gender = $validated['gender']; }
        if (array_key_exists('user_role', $validated)) { $user->user_role = $validated['user_role']; }
        if (array_key_exists('is_admin', $validated)) { $user->is_admin = $validated['is_admin'] ? 'true' : 'false'; }

        // audit
        $user->added_id = Auth::user()->user_id ?? null;
        $user->added_date = now();
        $user->save();

        return back()->with('status', 'User created successfully');
    }

    /**
     * Display the specified user.
     */
    public function show(string $user_id)
    {
        $users = User::where('user_id', $user_id)->first();
        
        return response()->json([
            'data' => $users,
        ], 201);
    }

    /**
     * Show the form for editing a user
     */
    public function edit(string $user_id)
    {
       $user = User::findOrFail($user_id);

         return response()->json([
            'data' => $user,
        ], 200);
    }

    /**
     * Update the specified user
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
     * Remove the specified user by archiving it.
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
    //block users from login   
    public function block(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->block();
        return back()->with('status', 'User has been blocked successfully');
    }

     //unblock users from login 
    public function unblock(string $user_id)
    {
        $user = User::findOrFail($user_id);
        $user->unblock();
        return back()->with('status', 'User has been unblocked successfully');
    }
}
