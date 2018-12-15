<?php

namespace App\Services;

use App\Learner;
use App\LinkedSocialAccount;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser, $provider)
    {

        $account = LinkedSocialAccount::whereProviderNameAndProviderId($provider, $providerUser->getId())
            ->first();

        if ($account) {
            return $account->accountable;
        }

        $learner = Learner::where('email', $providerUser->getEmail())->first();

        if (!$learner) {
            $learner = Learner::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }

        $learner->accounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $learner;

    }

}
