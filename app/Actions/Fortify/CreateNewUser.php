<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $input_v=$input;
        $input_v['education_level']=str_replace(' ', '', $input_v['education_level']);
        $input_v['civil_status']=str_replace('(', '',str_replace(')', '', str_replace(' ', '', $input_v['civil_status'])));
        $input_v['occupation']=str_replace(' ', '', $input_v['occupation']);
        $input_v['residence_state']=str_replace(' ', '', $input_v['residence_state']);
        $input_v['residence_province']=str_replace(' ', '', $input_v['residence_province']);
        $input_v['residence_district']=str_replace(' ', '', $input_v['residence_district']);
        $input_v['covid_family']=$input_v['covid_family'] == 'Si' ? true : false ;
        $input_v['caretaker_you']=$input_v['caretaker_you'] == 'Si' ? true : false ;
        $input_v['caretaker_pro']=$input_v['caretaker_pro'] == 'Si' ? true : false ;

        Validator::make($input_v, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'acepto'=>['required','accepted'],
            'gender'=>['required'],
            'birth_date'=>['required','date'],
            'education_level'=>['required','alpha'],
            'civil_status'=>['required','alpha'],
            'occupation'=>['required','alpha'],
            'residence_state'=>['required'],
            'residence_province'=>['required'],
            'residence_district'=>['required'],
            'covid_family'=>['required','boolean'],
            'caretaker_you'=>['required','boolean'],
            'caretaker_pro'=>['required','boolean'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        /** **/

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'gender'=>$input['gender'],
            'birth_date'=>$input['birth_date'],
            'education_level'=>$input['education_level'],
            'civil_status'=>$input['civil_status'],
            'occupation'=>$input['occupation'],
            'residence_state'=>$input['residence_state'],
            'residence_province'=>$input['residence_province'],
            'residence_district'=>$input['residence_district'],
            'covid_family'=>$input['covid_family'],
            'caretaker_you'=>$input['caretaker_you'],
            'caretaker_pro'=>$input['caretaker_pro'],
            'lesson_now'=>0,
            'lesson_max'=>0,
            'usability'=>0,
            'password' => Hash::make($input['password']),
        ]);
    }
}
