<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'name' => 'required|string|max:255',
        ]);

        // If validation fails, return the error messages
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new User instance and save it to the database
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;

        $user->save();

        // Create an associated Applicant record
        $applicant = new Applicant();
        $applicant->user_id = $user->id;
        $applicant->save();

        // Log in the user
        Auth::login($user);

        // Return a success response
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'email' => 'sometimes|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|string|min:8|confirmed',
            'name' => 'sometimes|string|max:255',
            'gender' => 'sometimes|string|in:male,female',
            'date_of_birth' => 'sometimes|date',
            'place_of_birth' => 'sometimes|string|max:255',
            'img' => 'sometimes|string|max:255',
        ]);

        $user = User::findOrFail($id);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($user) {
            $user->update($validated);
            return response()->json($user, 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to the homepage or any other page
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['message' => 'Login successful'], 200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }


    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }

    public function getUser(Request $request)
    {
        $user = User::with('applicant')->find(Auth::id());
        return response()->json(['user' => $user]);
    }
}