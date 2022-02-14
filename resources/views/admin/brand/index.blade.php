@extends('admin.master_admin')

@section('admin')

  <div class="py-12">
    <div class="container">
      <div class="row">


        <div class="col-md-8">
          <div class="card">

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif


            <div class="card-header" style="font-size: 20px; font-weight:bold;">All Brands</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SL No</th>
                  <th scope="col">Brand Name</th>
                  <th scope="col">Brand image</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($brands as $brand)
                <tr>
                  <td>{{$brands->firstItem()+$loop->index}}</td>
                  <td>{{$brand->brand_name}}</td>
                  <td>
                      <img src="{{asset($brand->brand_image)}}" style="height: 70px; width:70px;">
                  </td>
                  <td>{{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }}</td>
                  <td>
                    <a href="{{url('brand/edit/'.$brand->id)}}" class="btn btn-warning">edit</a>
                    <a href="{{url('delete/brand/'.$brand->id)}}" class="btn btn-danger">delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            {{$brands->links()}}

          </div>
        </div>


        <div class="col-md-4">
          <div class="card">
            <div class="card-header"> Add Brand </div>
            <div class="card-body">

              <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Brand Name</label>
                  <input type="text" name="brand_name" class="form-control">
                  @error('brand_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror<br>
                  <label for="exampleInputEmail1">Brand Image</label>
                  <input type="file" name="brand_image" class="form-control">
                  @error('brand_image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Add Brand</button>
              </form>

            </div>

          </div>
        </div>



      </div>
    </div>


  </div>
  @endsection