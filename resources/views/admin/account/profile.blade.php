@extends('admin.master_admin')
@section('admin')

<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header"> Edit Profile </div>
            <div class="card-body">

                <form action="{{url('profile/update')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"style="font-weight: bold;">Update Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{Auth::User()->name}}">


                        <label for="exampleInputEmail1"style="font-weight: bold;">Update Email</label>
                        <input type="email"id="email" name="email" class="form-control" value="{{Auth::User()->email}}">

                        <label for="exampleInputEmail1"style="font-weight: bold;">Current Password </label>
                        <input type="password" id="current_password" name="pass" class="form-control">
                        @error('pass')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        <label for="exampleInputEmail1" style="font-weight: bold;">New Password </label>
                        <input type="password" id="password" name="new_pass" class="form-control">
                        @error('new_pass')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                       
                    </div> <br>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>



            </div>

        </div>


    </div>
</div>

@endsection