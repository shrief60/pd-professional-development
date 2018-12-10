<?php

namespace App\Http\Controllers\API\Auth;

use App\Learner;
use Illuminate\Http\Request;
use Laravel\Passport\Client;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client as GuzzleClient;

class LearnerController extends Controller
{
    public function login(Request $request)
    {

        return $this->createUserToken($request->username, $request->password);
    }

    public function register(Request $request)
    {

        $learner = Learner::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'type' => $request->type,
            'password' => bcrypt($request->password),
        ]);

        return $this->createUserToken($request->username, $request->password);

    }

    public function logout()
    {

        auth()->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json('Logged out successfully');
    }

    protected function createUserToken($username, $password)
    {
        $http = new GuzzleClient;

        $client = Client::wherePasswordClient(true)->first();

        try {
            $response = $http->post(url('/oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $client->id,
                    'client_secret' => $client->secret,
                    'username' => $username,
                    'password' => $password,
                    'provider' => "learners"
                ],
            ]);

            return $response->getBody();

        } catch (BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json("Invalid Request. Please enter a username and password", $e->getCode());
            } else if ($e->getCode() === 401) {
                return response()->json("Your credentials are incorrect. Please try again", $e->getCode());
            }
            return response()->json("Something went wrong on the server", $e->getCode());
        }

    }
}
