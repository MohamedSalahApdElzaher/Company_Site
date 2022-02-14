<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    // display all contacts
    public function contact()
    {
        $contacts = Contact::all();
        return view('layouts.pages.contact', compact('contacts'));
    }

    // contact page
    public function contactDetails()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    // insert new contact to DB
    public function add(Request $request)
    {

        Contact::insert([

            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'created_at' => Carbon::now()

        ]);

        return Redirect::back()->with('success', 'Contact Added Successfully');
    }

    // delete contact
    public function delete($id)
    {
        Contact::find($id)->delete();
        return Redirect::back()->with('success', 'Contact Deleted Successfully');
    }

    // show profile page
    public function adminProfile()
    {
        return view('admin.account.profile');
    }

    // update profile info (password)
    public function updateProfile(Request $request)
    {
        // validate data
        $validateData = $request->validate([
            'pass' => 'required',
            'new_pass' => 'required',
        ]);

        // check hashed password
        $hashedPass = Auth::user()->password;
        if (Hash::check($request->pass, $hashedPass)) {
            $user = User::find(Auth::id());
            $user->password =  Hash::make($request->new_pass);
            $user->save();
            Auth::logout();
            return Redirect::route('login')->with('success', 'Password Updated Successfully');
        }
        else{
            return Redirect::back()->with('error', 'Password Error');
        }
    }
}
