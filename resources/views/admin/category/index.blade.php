<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

      All Category<b> </b>


    </h2>
  </x-slot>

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


            <div class="card-header" style="font-size: 20px; font-weight:bold;">All Category</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SL No</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">User</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cat as $c)
                <tr>
                  <td>{{$cat->firstItem()+$loop->index}}</td>
                  <td>{{$c->category_name}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{ Carbon\Carbon::parse($c->created_at)->diffForHumans() }}</td>
                  <td>
                    <a href="{{url('category/edit/'.$c->id)}}" class="btn btn-warning">edit</a>
                    <a href="{{url('softdelete/category/'.$c->id)}}" class="btn btn-danger">delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            {{$cat->links()}}

          </div>
        </div>


        <div class="col-md-4">
          <div class="card">
            <div class="card-header"> Add Category </div>
            <div class="card-body">

              <form action="{{ route('store.category') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" name="category_name" class="form-control">
                  @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>

            </div>

          </div>
        </div>



      </div>
    </div>


    <!-- Trached Part -->

    <div class="container">
      <div class="row">


        <div class="col-md-8">
          <div class="card">



            <div class="card-header" style="font-size: 20px; font-weight:bold;">Trashed Category List</div>


            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SL No</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">User</th>
                  <th scope="col">Created At</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($trashed as $c)
                <tr>
                  <td>{{$cat->firstItem()+$loop->index}}</td>
                  <td>{{$c->category_name}}</td>
                  <td>{{$c->name}}</td>
                  <td>{{ Carbon\Carbon::parse($c->created_at)->diffForHumans() }}</td>
                  <td>
                    <a href="{{url('category/restore/'.$c->id)}}" class="btn btn-warning">Restore</a>
                    <a href="{{url('category/pdelete/'.$c->id)}}" class="btn btn-danger">P delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            {{$trashed->links()}}

          </div>
        </div>


        <div class="col-md-4">

        </div>



      </div>
    </div>


  </div>
</x-app-layout>