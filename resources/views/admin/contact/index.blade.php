@extends('admin.master_admin')

@section('admin')

<div class="col-md-12">
          <div class="card">
            <div class="card-header"> Add Contact </div>
            <div class="card-body">

              <form action="{{url('add/contact')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Address</label>
                  <input type="text" name="address" class="form-control">
                 
                  <label for="exampleInputEmail1">Emails</label>
                  <input type="text" name="email" class="form-control">

                  <label for="exampleInputEmail1">Phones</label>
                  <input type="text" name="phone" class="form-control">
                
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


            <div class="card-header" style="font-size: 20px; font-weight:bold;">All Contacts</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col" width="15%">Address</th>
                  <th scope="col"width="15%">Emails</th>
                  <th scope="col"width="15%">Phones</th>
                  <th scope="col"width="10%">Created At</th>
                  <th scope="col"width="20%">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $con)
                <tr>
                  <td>{{$con->address}}</td>
                  <td>
                      {{$con->email}}
                  </td>
                  <td>
                      {{$con->phone}}
                  </td>
                  <td>{{ Carbon\Carbon::parse($con->created_at)->diffForHumans() }}</td>
                  <td>
                    <a href="{{url('contact/delete/'.$con->id)}}" class="btn btn-danger">delete</a>
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