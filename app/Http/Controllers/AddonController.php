<?php namespace App\Http\Controllers;

use App\Models\ParseSession;
use Illuminate\Http\Request;

class AddonController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getSession($sid)
    {
        $sessions       = ParseSession::OfStatus('new')->get();
        $sessions_array = [];

        if ($sessions->count()) {
            foreach ($sessions as $session) {
                foreach ($session['items'] as &$item) {
                    $item = parse_item($item);
                }
                $sessions_array[] = $session;
            }
        }

        $data = [
            'sessions' => $sessions_array,
            'token'    => $sid,
        ];

        return view('ff-addon/session', $data);
    }

    public function setSession(Request $request)
    {
        $urls  = $request->input('urls', []);
        $token = '';

        if ($urls) {
            $token = md5(time() . microtime(true));

            $session = [
                'token' => $token,
                'items' => [],
            ];

            foreach ($urls as $url) {
                $session['items'][] = [
                    'url'  => $url['url'],
                    'html' => base64_encode($url['html']),
                    'type' => $url['type'],
                ];
            }

            $parse_session = new ParseSession($session);
            if ($parse_session->save()) {
                $parse_session->update(['items' => $session['items']]);
            }
        }

        return $token;
    }
}
