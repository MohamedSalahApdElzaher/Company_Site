@extends('admin.master_admin')

@section('admin')
<div class="col-md-12">
    <div class="card">

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="card-header"> Add Slider </div>
        <div class="card-body">

            <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <label for="exampleInputEmail1">Description</label>
                    <input type="text" name="description" class="form-control">
                    <label for="exampleInputEmail1">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Add Slider</button>
            </form>

        </div>

    </div>
</div>
@endsection