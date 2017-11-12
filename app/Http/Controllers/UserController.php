<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // USER CODES: 1 = LAZ MEMBER, 2 = NOT LAZ, 3 = STUDENT, 4 = GUEST

    public function login(Request $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication passed...
            return redirect()->intended('/');
        }else{
            echo "Fail";
        }
    }

    public function view_account(){
        if(Auth::check()){
            return view('pages.profile');
        }else{
            return redirect('/');
        }

    }

    public function create(){
        return view('admin.create_user');
    }

    public function store(Request $request){
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user_status = $request->type;
        $user->password = $request->password ;

        $user->admin_id = 1;
        $user->is_admin = 0;
        $user->is_active = 1;

        $count = User::where('username', 'like', '%'. strtolower($request->first_name) . '.' . strtolower($request->last_name) . '%')->count();

        if($count > 0) {
            $user->username = strtolower($request->first_name) . '.' . strtolower($request->last_name) . rand(1,999);
        }
        else {
            $user->username = strtolower($request->first_name) . '.' . strtolower($request->last_name);
        }

        $user->save();

        $mail = "Dear " . $request->first_name . ' '. $request->last_name . ',

        We are pleased to confirm your subscription to the LEGAL INDABA. Your login details are:
        username:' . $user->username . '
        password:' . $request->password . '
        With these details you will now have full access to the current and past issues of the Magazine. We hope you enjoy the read and look forward to receiving any comments or contributions you may have.
        Please note our subscription terms and conditions.
        Kind Regards
        The LEGAL INDABA.
        
        Please visit the website at:
        https://legalindaba.org
        ';

        $to = $request->email;

        Mail::raw($mail, function($message) use ($to){
            $message->subject('Legal Indaba Login Details');
            $message->from('no-reply@legalindaba.org', 'Legal Indaba');
            $message->to($to);
        });

        return redirect('/admin-section/users/')->with('message', 'User sucessfully created!');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->user_status = $request->type;

        $user->update();

        if(Auth::user()->is_admin){
            return redirect('/admin-section/users/');
        }else{
            return redirect('/account/')->with('message', "Your profile has been updated.");
        }
    }

    public function update_password(Request $request, $id){
        $user = User::findOrFail($id);

        if(Hash::check($request->old_password, $user->password)){
            $user->password = $request->password;

            $user->update();
            return redirect('/account/')->with('message', "Password sucessfully changed.");
        }else{
            return redirect('/account/')->with('message', "The old password entered is incorrect");
        }
    }

    public function suspend($id){
        $user = User::findOrFail($id);
        if($user->is_active){
            $user->is_active = false;
        }else{
            $user->is_active = true;
        }

        $user->update();
        return redirect('/admin-section/users/');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->forceDelete();
        return redirect('/admin-section/users/');
    }
}
