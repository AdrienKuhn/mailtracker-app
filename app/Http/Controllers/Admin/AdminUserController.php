<?php

namespace MailTracker\Http\Controllers\Admin;

use MailTracker\User;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

use MailTracker\Http\Requests;
use MailTracker\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use PHPushbullet\PHPushbullet;

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
		if($user){
			if($user->pushbullet_api_key){
				$pushbullet = new PHPushbullet($user->pushbullet_api_key);
				try{
					$devices = $pushbullet->devices();
					foreach($devices as $device){
						$devices_array[$device->nickname] = $device->nickname;
					}
				}catch (RequestException $e) {
					$devices_array = null;
				}
			}else $devices_array = null;

			return View::make('admin.users.edit',array('user' => $user, 'devices' => $devices_array));
		}

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

			//Pushbullet
			if(isset($inputs['pushbullet'])){
				$pushbullet = new PHPushbullet($inputs['pushbullet_api_key']);

				// Verify API key
				try{
					$devices = $pushbullet->devices();
				}catch (RequestException $e) {
					// If error, redirect back with message
					Session::flash('pushbullet_error', 'Could not connect to Pushbullet. Please verify your API key');
					return Redirect::back()->withInput();
				}

				// If device defined
				if(isset($inputs['pushbullet_device'])){
					$user->pushbullet_device = $inputs['pushbullet_device'];
					$user->pushbullet = true;
				}
			} else{
				$user->pushbullet = false;
				$user->pushbullet_device = null;
			}

			$user->pushbullet_api_key = $inputs['pushbullet_api_key'];
			$user->save();

			// If trying to enable pushbullet but no devices selected
			if(isset($inputs['pushbullet']) && !$user->pushbullet_device){
				Session::flash('pushbullet_error', 'Please select device to send notifications');
				return Redirect::back()->withInput();
			}else return Redirect::action('Admin\AdminUserController@edit');

		}else
			return Redirect::back()->withInput()->withErrors($validator);

    }
}
