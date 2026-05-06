<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // This loads table:
        $users = User::Paginate(10);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Tama kohta luo uuden kayttajan
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage. 
     */
    public function store(StoreUserRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('users.index')
         ->with('success', 'User has been created succesfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user' ));

    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.index')
        ->with('success', 'User has been updated succesfully');
    }

    public function destroy(User $user): RedirectResponse
    {
    if ($user->projects()->count() > 0) 
        return redirect()->route('users.index')
            ->with('error', 'The user has active projects and cannot be deleted.');
    $user->delete();
        return redirect()->route('users.index')
        ->with('success', 'User has been deleted succesfully');
    }

}
