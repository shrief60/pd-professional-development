<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class SocialAccountController extends Controller
{

    /**
     * Redirect the user to the Provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {

        request()->session()->flush();

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information
     *
     * @return Response
     */
    public function handleProviderCallback(SocialAccountService $accountService, $provider)
    {


        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect()->route('learner.login');
        }

        $authUser = $accountService->findOrCreate(
            $user,
            $provider
        );

        Auth::guard('learner')->login($authUser, true);

        return redirect()->route('learner.profile.show');
    }

}
