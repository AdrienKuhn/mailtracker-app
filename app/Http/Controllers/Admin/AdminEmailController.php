<?php

namespace App\Http\Controllers\Admin;

use App\Email;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class AdminEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$emails = Email::where('user_id', Auth::id())->get();
		return View::make('admin.emails.index',array('emails' => $emails));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		return View::make('admin.emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
		$inputs = Input::all();
		$validator = Email::validate($inputs);

		if($validator->passes()){
			$email = new Email();
			$email->title = $inputs['title'];
			$email->uniqid = uniqid();
			$email->save();
			Auth::user()->emails()->save($email); // Attach user
			return Redirect::route('admin.email.index');
		}else return Redirect::back()->withInput()->withErrors($validator);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
		$email = Email::where('user_id', Auth::id())->find($id);

		// If email exist and related to current user
		if($email) return View::make('admin.emails.show',array('email' => $email));

		// Otherwise, return to index
		return Redirect::route('admin.email.index');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$email = Email::where('user_id', Auth::id())->find($id);

		// If email exist and related to current user
		if($email) return View::make('admin.emails.edit',array('email' => $email));

		// Otherwise, return to index
		return Redirect::route('admin.email.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
		$email = Email::where('user_id', Auth::id())->find($id);

		// If email exist and related to current user
		if($email) {
			$inputs = Input::all();
			$validator = Email::validate($inputs);

			if ($validator->passes()) {

				if (!$email)
					$email->title = $inputs['title'];
				$email->save();
				return Redirect::route('admin.email.index');
			} else return Redirect::back()->withInput()->withErrors($validator);
		}

		// Otherwise, return to index
		return Redirect::route('admin.email.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

	/**
	 * Generate file containing signature with tracking pixel
	 * @param $id
	 * @param $uniqid
	 * @return mixed
	 */
	public function generate_signature($id, $uniqid){
		$email = Email::where('user_id', Auth::id())->where('id',$id)->where('uniqid',$uniqid)->first();

		// If email is found
		if($email) {
			// Generate file
			$response = Response::make('<img src="'.action('EmailTrackingController@track',array($id, $uniqid)).'" height="1" width="1" />');
			$response->header('Content-Type', 'application/octet-stream');
			return $response;
		}

		// Otherwise, exit
		abort(500, 'Email not found!');
	}
}
