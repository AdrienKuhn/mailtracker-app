<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class AdminUserController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @return Response
     */
    public function edit()
    {
		$user = User::find(Auth::id());

		// If user found
		if($user) return View::make('admin.users.edit',array('user' => $user));

		// Otherwise, return to index
		return Redirect::route('dashboard');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return Response
     */
    public function update()
    {
		$user = User::find(Auth::id());

		// If no user found
		if(!$user) Redirect::route('dashboard');

		// If user found
		$inputs = Input::all();
		$validator = User::validate($inputs);
		if($validator->passes()){
			$user->name = $inputs['name'];
			$user->email = $inputs['email'];
			if($inputs['password']) $user->password = Hash::make($inputs['password']);
			$user->save();
			return Redirect::action('Admin\AdminUserController@edit');
		}else return Redirect::back()->withInput()->withErrors($validator);

    }
}
