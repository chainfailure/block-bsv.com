<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;
use Abraham\TwitterOAuth\TwitterOAuth;

class BlockController extends Controller
{
    private $twitter;

    public function __construct(TwitterOAuth $twitter)
    {
        $this->twitter = $twitter;
    }

    public function requestConsent()
    {
        $resp = $this->twitter->oauth('oauth/request_token', [
            'oauth_callback' => route('block.callback'),
        ]);

        return redirect()->to("https://api.twitter.com/oauth/authenticate?oauth_token={$resp['oauth_token']}");
    }

    public function callback(Request $request)
    {
        $token    = $request->get('oauth_token');
        $verifier = $request->get('oauth_verifier');

        if ($request->has('denied')) {
            return redirect()->to(route('block.denied'));
        }

        $access_data = $this->twitter->oauth('oauth/access_token', [
            'oauth_token' => $token,
            'oauth_verifier' => $verifier,
            'oauth_consumer_key' => config('twitter.consumer_key'),
        ]);

        $request->session()->put('user_oauth', $access_data);

        return redirect()->to(route('block.process'));
    }

    public function process(Request $request)
    {
        $access_data = $request->session()->get('user_oauth');
        $user_client = new TwitterOAuth(
            config('twitter.consumer_key'),
            config('twitter.consumer_secret'),
            $access_data['oauth_token'],
            $access_data['oauth_token_secret']
        );

        foreach (Entry::all() as $entry) {
            $user_client->post('blocks/create', [
                'screen_name' => $entry->handle,
                'skip_status' => true,
            ]);
        }

        // Clear session to not keep access tokens lingering around
        $request->session()->forget('user_oauth');

        return redirect()->to(route('block.done'));
    }

    public function denied()
    {
        return view('denied');
    }

    public function done()
    {
        return view('done', [
            'count' => Entry::count(),
        ]);
    }
}
