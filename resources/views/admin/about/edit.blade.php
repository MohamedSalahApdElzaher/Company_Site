@extends('admin.master_admin')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header"> Edit About </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <form action="{{url('about/update/'.$about->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Title</label>
                            <input type="text" name="title" class="form-control" value="{{$about->title}}">


                            <label for="exampleInputEmail1">Update Short Description</label>
                            <input type="text" name="short_desc" class="form-control" value="{{$about->short_desc}}">

                            <label for="exampleInputEmail1">Update Long Description</label>
                            <input type="text" name="long_desc" class="form-control" value="{{$about->long_desc}}">
                        </div> <br>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>



                </div>

            </div>


        </div>
    </div>
</div>
@endsection