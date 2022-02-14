@extends('admin.master_admin')

@section('admin')

  <div class="py-12">
    <div class="container">
      <div class="row">
          <div class="card">
            <div class="card-header"> Edit Brand </div>
            <div class="card-body">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif

              <form action="{{ url('brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Update Brand Name</label>
                  <input type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}">
                  @error('brand_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  
                  <input type="hidden" name="old_image" value="{{$brand->brand_image}}">

                  <label for="exampleInputEmail1">Update Brand Image</label>
                  <input type="file" name="brand_image" class="form-control">
                </div> <br>  
                <div>
              <img src="{{asset($brand->brand_image)}}" style="width: 150px; height:100px;">
              </div><br>         
                <button type="submit" class="btn btn-primary">Edit Brand</button>
              </form>

          

            </div>

          </div>
        

      </div>
    </div>
  </div>
@endsection