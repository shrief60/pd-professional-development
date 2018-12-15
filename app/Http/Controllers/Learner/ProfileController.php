<?php

namespace App\Http\Controllers\Learner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Learner;
use App\Classes\CroppedImage;

class ProfileController extends Controller
{


    public function show(Learner $learner = null)
    {

        $learner = $learner ?? auth()->user();

        if(!$learner->profile) {
            $learner->profile()->create();
        }

        return view('learner.profiles.show', compact('learner'));
    }

    public function edit()
    {

        $learner = auth()->user();

        if(!$learner->profile) {
            $learner->profile()->create();
        }

        return view('learner.profiles.edit', compact('learner'));

    }

    public function update(Request $request)
    {
        $learner = auth()->user();

        $learner->name = $request->name;

        $learner->email = $request->email;

        if($request->filled('password')) {
            $learner->password = bcrypt($request->name);
        }

        if($request->hasFile('avatar')) {
            if(CroppedImage::create($request->file('avatar'), 'avatars', "$learner->username.jpg")) {
                $learner->avatar = "/avatars/$learner->username.jpg";
            }
        }


        if ($request->filled('gender')) {
            $learner->gender = $request->gender;
        }

        if ($request->filled('facebook')) {
            $learner->facebook_account = $request->facebook;
        }

        if ($request->filled('youtube')) {
            $learner->youtube_account = $request->youtube;
        }

        if ($request->filled('twitter')) {
            $learner->twitter_account = $request->twitter;
        }

        if ($request->filled('date_of_birth')) {
            $learner->date_of_birth = $request->date_of_birth;
        }

        if ($request->filled('city')) {
            $learner->city = $request->city;
        }

        if ($request->filled('country')) {
            $learner->country = $request->country;
        }

        if ($request->filled('phone_number')) {
            $learner->phone_number = $request->phone_number;
        }

        if ($request->filled('national_id')) {
            $learner->national_id = $request->national_id;
        }

        $profile = $learner->profile;

        if(!$profile) {
            $profile = $learner->profile()->create();
        }

        if($learner->type === 'student') {

            if($request->filled('grade')) {
                $profile->grade = $request->grade;
            }

            if($request->filled('school')) {
                $profile->school = $request->school;
            }

            if($request->filled('favorite_sport')) {
                $profile->favorite_sport = $request->favorite_sport;
            }

            if($request->filled('favorite_color')) {
                $profile->favorite_color = $request->favorite_color;
            }

            if($request->filled('favorite_subject')) {
                $profile->favorite_subject = $request->favorite_subject;
            }

            if($request->filled('grade')) {
                $profile->grade = $request->grade;
            }

        } else if($learner->type === 'teacher' || $learner->type === 'mentor') {

            if ($request->filled('bio')) {
                $profile->bio = $request->bio;
            }

            if ($request->filled('management')) {
                $profile->management = $request->management;
            }

            if ($request->filled('department')) {
                $profile->department = $request->department;
            }

            if($learner->type === 'teacher') {

                if ($request->filled('school')) {
                    $profile->school = $request->school;
                }

                if ($request->filled('subjects')) {
                    $profile->subjects = implode(',', $request->subjects);
                }

                if ($request->filled('levels')) {
                    $profile->levels = implode(',', $request->levels);
                }

            }
        }

        $learner->save();

        $profile->save();

        return redirect()->back()->with([
            'status' => 'Profile data uploaded successfully'
        ]);

    }
}
