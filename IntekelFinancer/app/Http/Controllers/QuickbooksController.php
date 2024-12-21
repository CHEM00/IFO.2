<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class QuickbooksController extends Controller
{
    public function connect()
    {
        $clientId = env('QUICKBOOKS_CLIENT_ID');
        $redirectUri = route('callback.quickbooks');
        $url = "https://appcenter.intuit.com/connect/oauth2?client_id={$clientId}&response_type=code&scope=com.intuit.quickbooks.accounting&redirect_uri={$redirectUri}&state=12345";
        return redirect($url);
    }

    public function callback(Request $request)
    {
        $code = $request->input('code');
        $client = new Client();
        $response = $client->post('https://developer.intuit.com/v2/OAuth2Playground/RedirectUrl', [
            'auth' => [env('QUICKBOOKS_CLIENT_ID'), env('QUICKBOOKS_CLIENT_SECRET')],
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => route('callback.quickbooks'),
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $accessToken = $data['access_token'];
        $refreshToken = $data['refresh_token'];

        // Save the access token and refresh token in the database
    }
}
