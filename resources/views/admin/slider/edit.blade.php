@extends('admin.master_admin')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header"> Edit Slider </div>
                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif


                    <form action="{{url('update/slider/'.$slider->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Update Title</label>
                            <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <label for="exampleInputEmail1">Update Description</label>
                            <input type="text" name="description" class="form-control" value="{{$slider->description}}">

                            <input type="hidden" name="old_image" value="{{$slider->image}}">

                            <label for="exampleInputEmail1">Update Slider Image</label>
                            <input type="file" name="image" class="form-control">
                        </div> <br>
                        <div>
                            <img src="{{asset($slider->image)}}" style="width: 150px; height:100px;">
                        </div><br>
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                    </form>

                </div>

            </div>


        </div>
    </div>
</div>
@endsection