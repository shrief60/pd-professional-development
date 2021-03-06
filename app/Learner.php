<?php

namespace App;

use App\Notifications\LearnerResetPassword;
use Carbon\Carbon;
use Cog\Contracts\Love\Liker\Models\Liker as LikerContract;
use Cog\Laravel\Love\Liker\Models\Traits\Liker;
use Cviebrock\EloquentSluggable\Sluggable;
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

    /*************************************************************************/
    /*                               Relations                               */
    /*************************************************************************/
    public function accounts()
    {
        return $this->morphMany(LinkedSocialAccount::class, 'accountable');
    }

    public function profile()
    {
        switch ($this->type) {
            case 'student':
                return $this->hasOne(StudentProfile::class);
            case 'teacher':
                return $this->hasOne(TeacherProfile::class);
            case 'mentor':
                return $this->hasOne(MentorProfile::class);
        }
    }

    public function friends()
    {
        return $this->belongsToMany(Learner::class, 'friends', 'learner_id', 'friend_id');
    }

    public function credits()
    {
        return $this->hasMany(Credit::class, 'from_id');
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    /*************************************************************************/
    /*                          Route Model Binding                          */
    /*************************************************************************/
    public function getRouteKeyName()
    {
        return 'username';
    }

    /*************************************************************************/
    /*                          Slug                                         */
    /*************************************************************************/
    public function sluggable()
    {
        return [
            'username' => [
                'source' => 'name',
            ],
        ];
    }

    /*************************************************************************/
    /*                              Accessors                                */
    /*************************************************************************/
    public function getAvatarAttribute($avatar)
    {
        return $avatar ? asset("storage/$avatar") : null;
    }


    public function getBirthdayAttribute()
    {

        $birthday = $this->date_of_birth;

        return $birthday ? Carbon::createFromFormat('Y-m-d', $birthday)->toFormattedDateString() : null;
    }

    public function getFirstNameAttribute()
    {
        $name = explode(' ', $this->name);

        return $name[0];
    }

    /*************************************************************************/
    /*                         Methods                                       */
    /*************************************************************************/
    public function canAdd(Learner $learner)
    {

        return true;

        if ($this->id === $learner->id) {
            return false;
        }

        if ($this->isFriend($learner)) {
            return false;
        }

        return true;
    }

    public function isFriend(Learner $learner)
    {
        return false;
    }
}
