@extends('adminlte::page')
@section('content')
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
            <th>notes</th>
            <th>governorate</th>
            <th>phone</th>
            <th>address</th>
            <th>email</th>
            <th>status</th>
            <th>user_id</th>
            <th>total</th>
            <th>delete</th>
            <th>update</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($orders as $order )
        <tr>
            <th>{{ $order->id }}</th>
            <th>{{ $order->notes }}</th>
            <th>{{ $order->governorate }}</th>
            <th>{{ $order->phone }}</th>
            <th>{{ $order->address }}</th>
            <th>{{ $order->email }}</th>
            <th>{{ $order->status }}</th>
            <th>{{ $order->user_id }}</th>
            <th>{{ $order->total }}</th>
            <th>
               <button class="btn btn-danger "><a class="text-white" href="{{ route('admin.deleteOrder',$order->id) }}">Delete</a></button>

            </th>
            <th>
                <button class="btn btn-warning "><a class="text-white" href="{{ route('admin.editOrder',$order->id) }}"> Update</a></button>
            </th>
        </tr>

        @endforeach
    </tbody>
</table>
{{ $orders->links() }}
@endsection
