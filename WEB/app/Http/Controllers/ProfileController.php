<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    //create new user profile
    public function createProfile()
    {
        return view('auth.profile.create');
    }

    //users accounts
    public function showAllAccounts()
    {
        $users= User::all();
        return view('auth.profile.show-all-account', ['users' => $users]);
    }

    //show profiles registered
    public function showProfiles()
    {
        $profiles= Profile::all();
        return view('auth.profile.show')->with('profiles', $profiles);
    }

    //save profile to database
    public function storeProfile(Request $request) 
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required|unique:profiles',
            'phone'=>'required|min:10|max:13',
            'email'=>'required|email',
            'role'=>'required',
            'date_of_birth'=>'required',
            'gender'=>'required',
            'religion'=>'required',
            'nationality'=>'required',
            'county'=>'required'
        ]);
        // return $request->all();

        $user= new User();
        $user->name= $request->input('firstname');
        $user->username= $request->input('username');
        $user->email= $request->input('email');
        $user->phone= $request->input('phone');
        $user->is_Admin=1;
        $user->password= Hash::make($request['phone']);
        $user->save();

        $profile= new Profile();
        $profile->user_id= $user->id;
        $profile->firstname= $request->input('firstname');
        $profile->lastname= $request->input('lastname');
        $profile->username= $request->input('username');
        $profile->phone= $request->input('phone');
        $profile->email= $request->input('email');
        $profile->role= $request->input('role');
        $profile->date_of_birth= $request->input('date_of_birth');
        $profile->gender= $request->input('gender');
        $profile->religion= $request->input('religion');
        $profile->nationality= $request->input('nationality');
        $profile->county= $request->input('county');
        $profile->status== 'pending';
        $profile->save();
        return redirect()->back()->with('success', 'account created successfully');

    }

    //edit profile record
    public function editAdminProfile($id)
    {
        $profile= Profile::find($id);
        return view('auth.profile.edit')->with('profile', $profile);
    }

    //update profile
    public function updateProfile(Request $request, $id) 
    {
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'username'=>'required',
            'phone'=>'required|min:10|max:13',
            'email'=>'required|email',
            'role'=>'required',
            'date_of_birth'=>'required',
            'gender'=>'required',
            'religion'=>'required',
            'nationality'=>'required',
            'county'=>'required'
        ]);

        $profile= Profile::find($id);
        $profile->firstname= $request->input('firstname');
        $profile->lastname= $request->input('lastname');
        $profile->username= $request->input('username');
        $profile->phone= $request->input('phone');
        $profile->email= $request->input('email');
        $profile->role= $request->input('role');
        $profile->date_of_birth= $request->input('date_of_birth');
        $profile->gender= $request->input('gender');
        $profile->religion= $request->input('religion');
        $profile->nationality= $request->input('nationality');
        $profile->county= $request->input('county');
        $profile->save();

        User::where('id', $profile->user_id)->update([
            'name'=> $request->input('firstname'),
            'username'=> $request->input('username'),
            'email'=> $request->input('email'),
            'phone'=> $request->input('phone'),
        ]);
        return redirect()->route('adminDashboard')->with('success', 'account updated successfully');

    }

    //delete profile account
    public function deleteProfile($id)
    {
        $profile= Profile::find($id);
        $profile->delete();
        return redirect()->back()->with('success', 'account deleted successfully');
    }

    //show personal details
    public function showPersonalInfo()
    {
        $user= Auth::User();
        $profile= $user->profiles;
        return view('auth.profile.show-personal')->with('profiles', $profile);
    }

    //approve profile account
    public function approveUser($id)
    {
        $profile= Profile::find($id);
        $profile->status= 'approved';
        $profile->save();
        return redirect()->back()->with('success', 'account approved successfully');
    }

    //delete user account
    public function deleteUser($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'account deleted permanently');
    }


}
