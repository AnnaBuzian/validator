<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UsersRequest;
use App\Entity\Role;
use App\Entity\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application users index.
     */
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::latest()->paginate(10)
        ]);
    }

    /**
     * Display the specified resource edit form.
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('admin.users.edit', [
            'user' => $user,
            'roles' => Role::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param UsersRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UsersRequest $request, User $user): RedirectResponse
    {
        if ($request->filled('password')) {
            $request->merge([
                'password' => Hash::make($request->input('password'))
            ]);
        }

        $user->update(array_filter($request->only(['name', 'email', 'password'])));

        $role_ids = array_values($request->get('roles', []));
        $user->roles()->sync($role_ids);

        return redirect()->route('admin.users.edit', $user)->withSuccess(__('users.updated'));
    }


    /**
     * Remove the user from storage.
     *
     * @param  \App\Entity\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete ();

        return response ()->json ();
    }
}
