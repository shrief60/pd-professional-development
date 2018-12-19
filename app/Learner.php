<?php

namespace App;

use App\Notifications\LearnerResetPassword;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SMartins\PassportMultiauth\HasMultiAuthApiTokens;

class Learner extends Authenticatable implements LikerContract
{
    use Notifiable, HasMultiAuthApiTokens, Liker;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'type', 'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new LearnerResetPassword($token));
    }

    public function findForPassport($value)
    {
        $column = filter_var($value, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return $this->where($column, $value)->first();
    }
}
