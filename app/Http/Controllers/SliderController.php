<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    // all slider
    public function allSlider()
    {
        $sliders = Slider::get();
        return view('admin.slider.index', compact('sliders'));
    }

    // add
    public function Add()
    {
        return view('admin.slider.add');
    }

    // insert
    public function insert(Request $request)
    {
        // validate data
        $validation = $request->validate(
            [
                'title' => 'required|unique:sliders|min:4',
                'image' => 'required|mimes: jpg,jpeg,png',
            ]
        );

        // get image ready for saving
        $image = $request->file('image');
        $unique_id = hexdec(uniqid());
        $extention = $image->getClientOriginalExtension();
        $imgeneration = $unique_id . '.' . $extention;
        $lastImage = 'image/sliders/' . $imgeneration;
        Image::make($image)->resize(500, 500)->save($lastImage);

        // save to DB
        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $lastImage,
            'created_at' => Carbon::now()
        ]);

        return Redirect::back()->with('success', 'Slider Inserted Successfully');
    }

    // edit
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    // update
    public function update(Request $request, $id)
    {
        $old_Img = $request->old_image;
        // get image ready for saving
        $image = $request->file('image');
        if ($image) {
            unlink($old_Img);
            $unique_id = hexdec(uniqid());
            $extention = $image->getClientOriginalExtension();
            $imgeneration = $unique_id . '.' . $extention;
            $lastImage = 'image/sliders/' . $imgeneration;
            Image::make($image)->resize(500, 500)->save($lastImage);

            // save to DB
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $lastImage,
                'created_at' => Carbon::now()
            ]);

            return Redirect::back()->with('success', 'Slider Updated Successfully');
        } else {
            // save to DB
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => Carbon::now()
            ]);

            return Redirect::back()->with('success', 'Slider Updated Successfully');
        }
    }

    // delete
    public function delete($id)
    {
        $slider = Slider::find($id);
        unlink($slider->image);
        $slider->delete();

        return Redirect::back()->with('success', 'Slider Deleted Successfully');
    }
}
