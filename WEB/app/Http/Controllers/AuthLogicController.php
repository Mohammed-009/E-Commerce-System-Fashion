<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\M_Shoe;
use App\Models\Women_Shoe;
use Illuminate\Support\Str;
use App\Models\Men_official;
use Illuminate\Http\Request;
use App\Models\Children_Shoe;
use App\Models\men_lifestyle;
use App\Models\ChildLifestyle;
use App\Models\Women_official;
use App\Models\Women_lifestyle;
use App\Mail\ForgotPasswordMail;
use App\Models\Children_official;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthLogicController extends Controller
{

    
    //Create new user account for login
    public function CreateNewUserAccount(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:50',
            'username'=> 'required|min:3|unique:users',
            'email'=> 'required|email|unique:users',
            'phone'=>'required|min:10|max:13',
            'password'=>'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'required|string|min:6'

        ]);
        $register= new User();
        $register->name= $request->input('name');
        $register->username= $request->input('username');
        $register->email= $request->input('email');
        $register->phone= $request->input('phone');
        $register->is_Admin= 2;
        $register->password= Hash::make($request['password']);
        $register->save();
        return redirect()->route('LoginPage')->with('success', 'Account created successfully');
    }
    // Display register page for user to sign in
    public function ViewCreateUserAccount()
    {
        return view('auth.register-user');
    }

        // Display login page for both user and admin
    public function LoginPage()
    {
        return view('auth.login');
    }



    // middleware authentication
    public function LoginUserLogic(Request $request)
    {
        $request->validate([
            'username'=>'required|min:3',
            'password'=>'required|string|min:6'
        ]);

        if(Auth::attempt(['username'=> $request->username, 'password'=> $request->password], true))
        {
            if(auth()->user()->is_Admin==1)
            {
                return redirect()->route('adminDashboard')->with('success', 'login successfully');
                // return dd(Auth::user());
            }
            else{
                return redirect()->route('homePage')->with('success', 'login successfully');
            }
        }
        else{
            return redirect()->back()->with('error', 'incorrect username/password');
        }
    }

    // logout for both user and admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('homePage');
    }
    // end middleware //

    // Create new account for admin to login
    public function CreateNewAdminAccount(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|max:50',
            'username'=>'required|min:3|unique:users',
            'email'=>'required|email|unique:users',
            'phone'=>'required|min:10|max:13',
            'password'=>'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password'=>'required|string|min:6'
        ]);
        $register_admin= new User();
        $register_admin->name= $request->input('name');
        $register_admin->username= $request->input('username');
        $register_admin->email= $request->input('email');
        $register_admin->phone= $request->input('phone');
        $register_admin->is_Admin=1;
        $register_admin->password= Hash::make($request['password']);
        $register_admin->save();
        return redirect()->route('LoginPage')->with('success', 'Account created successfully');
    }

    public function ViewCreateAdminAccount()
    {
        return view('auth.register-admin');
    }

        // Admin dashboard
    public function adminDashboard()
    {
        $men_official_count= Men_official::count();
        $women_official_count= Women_official::count();
        $children_official_count= Children_official::count();
        $men_lifestyle_count= men_lifestyle::count();
        $women_lifestyle_count= Women_lifestyle::count();
        $children_lifestyle_count= ChildLifestyle::count();
        $men_shoes_count= M_Shoe::count();
        $women_shoes_count= Women_Shoe::count();
        $children_shoes_count= Children_Shoe::count();
        return view('Admin_dashboard')->with([
            'men_official_count'=>$men_official_count,
            'women_official_count'=>$women_official_count,
            'children_official_count'=>$children_official_count,
            'men_lifestyle_count'=>$men_lifestyle_count,
            'women_lifestyle_count'=>$women_lifestyle_count,
            'children_lifestyle_count'=>$children_lifestyle_count,
            'men_shoes_count'=>$men_shoes_count,
            'women_shoes_count'=>$women_shoes_count,
            'children_shoes_count'=>$children_shoes_count
        ]);
    }



    
            /* password reset logic */

    //reset password form
    public function sendEmailForm()
    {
        return view('auth.passwords.email');
    }

    //verify email in the database
    public function emailLogic(Request $request)
    {
        $email =  $request->email;
         $user = User::where('email',$email)->first();
        $token =Str::Random(32);

    //    return $name = User_profile::where('email',$email)->first();
        // $profile = $name->Firstname.' '.$name->Lastname;
        if(!$user){
        return redirect()->back()->with('warning', 'Email not found in our database');
        }

        $user->update(['remember_token' => $token]);

        Mail::to($email)->send(new ForgotPasswordMail($email, $token ));

        return redirect()->back()->with('success', 'Email sent successfully');

    }

    // token validations
    public function resetForm(Request $request)
    {
        $user =  User::where('remember_token', $request->token)->first();
        $email = $user->email;
        $token =  $request->token;

        if(!$user){
            return redirect()->back()->with('error', 'Invalid token used.');
        }
      
        return view('auth.passwords.reset')->with(['email' => $email, 'token' =>  $token]);
    }

    //New password and confirm password logic
    public function resetLogic(Request $request)
    {
        $request->validate([
            'password' => [
                'required',
                'confirmed',
                'min:4',
                'regex:/^(?=.*[A-Z])(?=.*[a-z]).{4,}$/',
            ],
            'password_confirmation' => 'required|string',
        ], [
            'password.password_confirm' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 4 characters long.',
            'password.regex' => 'The password must be at least 4 characters long and include at least one uppercase letter, one lowercase letter.',
        ]);

        $user =  User::where('email', $request->email)
                    ->update([
                        'password' =>  Hash::make($request->password)
                    ]);

        // return redirect()->route('login')->with('success', 'Password reset successfully');

        return redirect()->route('logout')->with('success', 'Password reset successfully');
            
    }


}
