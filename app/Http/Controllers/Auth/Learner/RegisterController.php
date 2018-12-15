<?php

namespace App\Http\Controllers\Auth\Learner;

use App\Learner;
use App\Group_Statement;
use App\Track;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('learner.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:learners',
            'email' => 'required|email|max:255|unique:learners',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Learner
     */
    protected function create(array $data)
    {
        $data = (object) $data;

        return Learner::create([
            'name' => $data->name,
            'username' => $data->username,
            'email' => $data->email,
            'password' => bcrypt($data->password),
            'type' => 'teacher'
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('learner.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('learner');
    }


    protected function registered(Request $request , $user)
    {

        if($user->type != 'teacher') return;

        $teacher_id=$user->id;
        $statemens=Group_Statement::getStatements();
        //dd($statemens);
        $track=array();
        foreach($statemens as $value){ 
            $track =[
                'learner_id' => $teacher_id,
                'statement_id' => $value->id,
                'opened'=>'1',
                'achieved'=> '0',
                'rest_points'=>$value->require_points
               ]; 
               Track::create($track);
        } 
        return redirect()->route('tracks.index',[$teacher_id]);

    }
    

}
