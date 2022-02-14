<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcom back .. <b>{{Auth::user()->name}}</b>
        </h2>
    </x-slot> 

    <div class="py-12" style="margin: 20px;">

    <table class="table">
  <thead>
    
    <tr>
      <th scope="col">ID Number</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">created At</th>
    </tr>
    
  </thead>
  <tbody>
   @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->created_at->diffForHumans() }}</td>
    </tr>
    @endforeach

  </tbody>
</table>


    </div>
    </div>
</x-app-layout>