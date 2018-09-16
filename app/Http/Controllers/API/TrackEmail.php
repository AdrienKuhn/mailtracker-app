<?php

namespace App\Http\Controllers\API;

use App\Email;
use App\EmailTracking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class TrackEmail extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $email = Email::where('uniqid', $request->uniqid)->first();

        // If email is found
        if($email) {

            // Get data
            $ip = $_SERVER['REMOTE_ADDR'];
            $host = gethostbyaddr($ip);
            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            // GeoIP
            $gi = geoip_open(
                env('GEOIP_DAT_FILE_PATH', "/usr/share/GeoIP/GeoIP.dat"),
                GEOIP_STANDARD);
            $country = @geoip_country_name_by_addr($gi, $ip);
            geoip_close($gi);

            // Validate entry
            $validator = EmailTracking::validate(array(
                'ip' => $ip,
                'host' => $host,
                'user_agent' => $user_agent,
                'country' => $country
            ));

            if($validator->passes()) {
                $tracking = new EmailTracking();
                $tracking->ip = $ip;
                $tracking->host = $host;
                $tracking->user_agent = $user_agent;
                $tracking->country = $country;

                $email->email_trackings()->save($tracking); // Attach tracking to email

                // Return pixel
                $response = Response::make(File::get(resource_path().'/img/pixel.gif'));
                $response->header('Content-Type', 'image/gif');
                return $response;
            }

            // Otherwise, return error
            abort(500, 'Something went wrong...');
        }

        // If email's not found
        abort(404, 'Email not found!');
    }
}
