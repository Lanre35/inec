<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login'); // Assuming you want to return a view named 'login'
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signup'); // Assuming you want to return a view named 'signup'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|',
        ]);
        $users = User::create($validatedData);

        if ($users) {
            return redirect()->route('users.index')->with('success', 'User created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email_or_username' => 'required|string|',
            'password' => 'required|string|min:8',
        ]);

//        session([
//            'username' => $fields['email_or_username']
//        ]);


        $name = $request->input('email_or_username');
        $fieldType = filter_var($name, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';


        $credentials = Auth::attempt([
            $fieldType => $name,
            'password' => $request->get('password'),
        ]);


        if ($credentials) {
            $user = User::where('username',$request->email_or_username)
                ->orwhere('email', $request->email_or_username)
                ->get();
//            dd($user[0]['username']);
            $d = session(['username'=>$user[0]['username']]);

            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');

    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
