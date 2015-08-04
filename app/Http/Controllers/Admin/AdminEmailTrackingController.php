<?php

namespace MailTracker\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use MailTracker\EmailTracking;
use MailTracker\Http\Requests;
use MailTracker\Http\Controllers\Controller;

class AdminEmailTrackingController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tracking = EmailTracking::find($id);

        // If tracking exists, and related email belongs to authenticated user
        if($tracking && $tracking->email->user_id == Auth::id()){
            $tracking->delete();
        }

        // Redirect to previous page
        return Redirect::back();
    }
}
