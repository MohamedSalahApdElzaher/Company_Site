<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

      Edit Category<b> </b>


    </h2>
  </x-slot>

  <div class="py-12">
    <div class="container">
      <div class="row">
          <div class="card">
            <div class="card-header"> Edit Category </div>
            <div class="card-body">

              <form action="{{ url('category/update/'.$cat->id) }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name</label>
                  <input type="text" name="category_name" class="form-control" value="{{$cat->category_name}}">
                  @error('category_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div> <br>
                <button type="submit" class="btn btn-primary">Edit Category</button>
              </form>

            </div>

          </div>
        



      </div>
    </div>
  </div>
</x-app-layout>