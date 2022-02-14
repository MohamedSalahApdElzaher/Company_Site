<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPicModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
// import the Intervention Image Manager Class
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{

    // add auth
    public function __construct()
    {
        $this->middleware('auth');
    }

    // show all brands
    public function allBrand()
    {
        // get data using ORM
        $brands = Brand::latest()->paginate(6);
        return view('admin.brand.index', compact('brands'));
    }

    // add new brand to database
    public function storeBrand(Request $request)
    {
        // validate data
        $validation = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes: jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'please Enter brand name',
                'brand_image.min' => 'Brand must be >= 4 characters'
            ]
        );

        // get image from the form
        $image = $request->file('brand_image');
        // // uniqe id for each image
        // $img_gen = hexdec(uniqid());
        // // get extension
        // $ext = strtolower($image->getClientOriginalExtension());
        // $image_Name = $img_gen . '.' . $ext;
        // // save location
        // $loc = 'image/brand/';
        // $lastImage = $loc . $image_Name;
        // $image->move($loc, $image_Name);

        // using Image resize
        $img_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('image/brand/' . $img_gen);
        $lastImage = 'image/brand/' . $img_gen;


        // save data
        Brand::insert([

            'brand_name' => $request->brand_name,
            'brand_image' => $lastImage,
            'created_at' => Carbon::now()

        ]);

        $notifiction = array(
            'message' => 'Brand inserted Succesfully',
            'alert-type' => 'success'
        );

        return Redirect::back()->with($notifiction);
    }

    // edit brand
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    // update brand
    public function update(Request $request, $id)
    {
        // validate data
        $validation = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],
            [
                'brand_name.required' => 'please Enter brand name',
                'brand_image.min' => 'Brand must be >= 4 characters'
            ]
        );

        // get old image to unlink
        $old_image = $request->old_image;
        // get image from the form
        $image = $request->file('brand_image');

        $notifiction = array(
            'message' => 'Brand updated Succesfully',
            'alert-type' => 'warning'
        );

        if ($image) {
            // uniqe id for each image
            $img_gen = hexdec(uniqid());
            // get extension
            $ext = strtolower($image->getClientOriginalExtension());
            $image_Name = $img_gen . '.' . $ext;
            // save location
            $loc = 'image/brand/';
            $lastImage = $loc . $image_Name;
            $image->move($loc, $image_Name);

            unlink($old_image);
            // save data
            Brand::find($id)->update([

                'brand_name' => $request->brand_name,
                'brand_image' => $lastImage,
                'created_at' => Carbon::now()

            ]);

            return Redirect::back()->with($notifiction);
        } else {
            Brand::find($id)->update([

                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()

            ]);
            return Redirect::back()->with($notifiction);
        }
    }

    // delete brand
    public function delete($id)
    {
        $img = Brand::find($id);
        $old_img = $img->brand_image;
        unlink($old_img);
        Brand::find($id)->delete();
        $notifiction = array(
            'message' => 'Brand Deleted Succesfully',
            'alert-type' => 'error'
        );
        return Redirect::back()->with($notifiction);
    }

    // mutli images
    public function all_Multi_Pic()
    {
        $images = MultiPicModel::all();
        return view('admin.multi_pic.index', compact('images'));
    }

    // store images
    public function store_Multi_Pic(Request $request)
    {
        $image = $request->file('multi_image');
        // for loop for all images
        foreach ($image as $img) {
            $img_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(300, 300)->save('image/multipic/' . $img_gen);
            $lastImage = 'image/multipic/' . $img_gen;

            // save data
            MultiPicModel::insert([
                'image' => $lastImage,
                'created_at' => Carbon::now()
            ]);
        } // end foreach

        $notifiction = array(
            'message' => 'Images Added Succesfully',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notifiction);
    }

    // logout user
    public function logout(){
        Auth::logout();
        return Redirect::route('login');
    }
}
