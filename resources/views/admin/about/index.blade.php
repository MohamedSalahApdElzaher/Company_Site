@extends('admin.master_admin')

@section('admin')

<div class="col-md-12">
          <div class="card">
            <div class="card-header"> Add About </div>
            <div class="card-body">

              <form action="{{url('store/about')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" name="title" class="form-control">
                 
                  <label for="exampleInputEmail1">Short Description</label>
                  <input type="text" name="short_desc" class="form-control">

                  <label for="exampleInputEmail1">Long Description</label>
                  <input type="text" name="long_desc" class="form-control">
                
                </div> <br>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>

            </div>

          </div>
        </div>

  <div class="py-12">
    <div class="container">
      <div class="row">

      


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


            <div class="card-header" style="font-size: 20px; font-weight:bold;">All About</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col" width="15%">Title</th>
                  <th scope="col"width="15%">Short Description</th>
                  <th scope="col"width="25%">Long Description</th>
                  <th scope="col"width="10%">Created At</th>
                  <th scope="col"width="20%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($abouts as $about)
                <tr>
                  <td>{{$about->title}}</td>
                  <td>
                      {{$about->short_desc}}
                  </td>
                  <td>
                      {{$about->long_desc}}
                  </td>
                  <td>{{ Carbon\Carbon::parse($about->created_at)->diffForHumans() }}</td>
                  <td>
                    <a href="{{url('about/edit/'.$about->id)}}" class="btn btn-warning">edit</a>
                    <a href="{{url('delete/about/'.$about->id)}}" class="btn btn-danger">delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>


  </div>
  @endsection