<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Initialize the Guzzle client
        $client = new Client();

        try {
            // Send the login request
            $response = $client->post('https://example.com/api/login', [
                'form_params' => [
                    'username' => $request->input('username'),
                    'password' => $request->input('password'),
                ],
            ]);

            // Get the response data
            $data = json_decode($response->getBody(), true);

            // Check for a successful login
            if ($data['success']) {
                // Store the token in the session
                $request->session()->put('api_token', $data['token']);

                // Redirect to a protected page
                return redirect()->intended('protected');
            } else {
                // Login failed, redirect back with an error message
                return redirect()->back()->withErrors([
                    'error' => 'Invalid username or password',
                ]);
            }
        } catch (\Exception $e) {
            // Something went wrong, redirect back with an error message
            return redirect()->back()->withErrors([
                'error' => 'Unable to connect to the API',
            ]);
        }
    }
}
