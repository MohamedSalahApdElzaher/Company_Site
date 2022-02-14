<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MultiPicModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    // add auth
    public function __construct()
    {
        $this->middleware('auth')->except('portfolio');
    }

    public function about()
    {
        $abouts = About::get();
        return view('admin.about.index', compact('abouts'));
    }

    public function add(Request $request)
    {
        About::insert([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now(),
        ]);

        $notifiction = array(
            'message' => 'Added Succesfully',
            'alert-type' => 'success'
        );

        return Redirect::back()->with($notifiction);
    }

    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        About::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        $notifiction = array(
            'message' => 'Updated Succesfully',
            'alert-type' => 'warning'
        );
        return Redirect::back()->with($notifiction);
    }

    public function delete($id)
    {
        About::find($id)->delete();
        $notifiction = array(
            'message' => 'Deleted Succesfully',
            'alert-type' => 'error'
        );
        return Redirect::back()->with($notifiction);
    }

    public function portfolio(){
        $images = MultiPicModel::all();
        return view('layouts.pages.portfolio', compact('images'));
    }
}
