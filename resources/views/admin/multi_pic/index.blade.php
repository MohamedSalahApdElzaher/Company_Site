@extends('admin.master_admin')

@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">


                <div class="col-md-8">
                    <div class="card-group">

                        @foreach($images as $img)
                        <div class="col-md-4 mt-5">
                            <div class="card">
                                <img src="{{asset($img->image)}}">
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> Add Multiple Images </div>
                        <div class="card-body">

                            <form action="{{route('store.multi.pic')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">

                                    <label for="exampleInputEmail1">Brand Image</label>
                                    <input type="file" name="multi_image[]" class="form-control" multiple="">
                                    @error('multi_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div> <br>
                                <button type="submit" class="btn btn-primary">Add Image</button>
                            </form>

                        </div>

                    </div>
                </div>



            </div>
        </div>


    </div>
@endsection