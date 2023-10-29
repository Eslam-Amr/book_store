@extends('adminlte::page')
@section('content')
<button class="btn btn-success p-2 m-2 "><a class="text-white" href="{{ route('admin.addBranch') }}"> Create</a></button>
@if(session()->has('message'))
<div class="alert alert-success" id="alert">

    {{ session()->get('message') }}
</div>
    <script type="text/javascript">
    document.ready(setTimeout(function(){
        document.getElementById('alert').remove()
    },3000))
    </script>
@endif
<table class="table border-dark">
    <thead>
        <tr>
            <th>id</th>
            <th>short_address</th>
            <th>full_address</th>
            <th>city</th>
            <th>phone</th>

            <th>delete</th>
            <th>update</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($branchs as $branch )
        <tr>
            <th>{{ $branch->id }}</th>
            <th>{{ $branch->short_address }}</th>
            <th>{{ $branch->full_address }}</th>
            <th>{{ $branch->city }}</th>
            <th>{{ $branch->phone }}</th>

            <th>
               <button class="btn btn-danger "><a class="text-white" href="{{ route('admin.deleteBranch',$branch->id) }}">Delete</a></button>

            </th>
            <th>
                <button class="btn btn-warning "><a class="text-white" href="{{ route('admin.editBranch',$branch->id) }}"> Update</a></button>
            </th>
        </tr>

        @endforeach
    </tbody>
</table>
{{ $branchs->links() }}
@endsection
