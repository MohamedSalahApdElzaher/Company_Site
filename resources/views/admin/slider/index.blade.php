@extends('admin.master_admin')

@section('admin')

<div class="py-12">
    <div class="container">
        <div class="row">

         <a href="{{route('add.slider')}}"><button class="btn btn-primary" style="margin: 10px;">Add Slider</button></a>


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


                    <div class="card-header" style="font-size: 20px; font-weight:bold;">All Slider</div>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">Title</th>
                                <th scope="col" width="25%">Description</th>
                                <th scope="col" width="5%">Image</th>
                                <th scope="col" width="5%">Created At</th>
                                <th scope="col" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                              
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td>
                                    <img src="{{asset($slider->image)}}" style="height: 70px; width:70px;">
                                </td>
                                <td>{{ Carbon\Carbon::parse($slider->created_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{url('slider/edit/'.$slider->id)}}" class="btn btn-warning">edit</a>
                                    <a href="{{url('delete/slider/'.$slider->id)}}" class="btn btn-danger">delete</a>
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