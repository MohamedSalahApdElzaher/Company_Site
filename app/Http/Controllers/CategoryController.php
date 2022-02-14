<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Void_;

class CategoryController extends Controller
{

     // add auth
     public function __construct()
     {
         $this->middleware('auth');
     }
     
    public function AllCategory()
    {
        /**
         * get data using ORM model
         */
         // $cat = Category::paginate(5);
        /**
         * get data using query builder
         */
        $cat = DB::table('categories')->join('users', 'categories.user_id', 'users.id')
        ->select('categories.*', 'users.name')->paginate(3);

        $trashed = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('cat', 'trashed'));
    }

    public function addCat(Request $request)
    {
        /**
         * check validations
         */
        $validated = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'please Enter a valid data',
            ]
        );

        /**
         * insert data using ORM
         */
        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        /**
         * insert data using query builder
         */
        $data = [];
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        $data['created_at'] = Carbon::now();
        DB::table('categories')->insert($data);

        $notifiction = array(
            'message' => 'Category inserted Succesfully',
            'alert-type' => 'success'
        );
        return Redirect::back()->with($notifiction);
    }

    public function edit($id){
        $cat = DB::table('categories')->find($id); // return this row
        return view('admin.category.edit', compact('cat'));
    }

    public function update(Request $request, $id){
        $cat = Category::find($id)->update([
             'category_name' => $request->category_name,
             'user_id' => Auth::user()->id
        ]); 
        $notifiction = array(
            'message' => 'Category Upated Succesfully',
            'alert-type' => 'warning'
        );
        return Redirect::route('all.cat')->with($notifiction);
    }

    public function softDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect::back()->with('success', 'SoftDelete Successfuly');
    }

    public function restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect::back()->with('success', 'Restored Category Successfuly');
    }

    function Pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect::back()->with('success', 'Force Delete Successfuly');
    }

}
