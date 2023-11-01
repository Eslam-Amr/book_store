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
<h2 class="text-center my-5">Add Slider</h2>
<div class=" alert-danger text-center my-5">

    @error('status')
    {{ $message }}
    <br>
    @enderror

</div>
<div class="container w-25 border m-auto mt-2">
    <form action="{{ route('admin.addS') }}" method="post" class="form-group" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">status</label>
            <input type="text" name="status"  class="form-control" id="exampleFormControlInput1" placeholder="Enter status">

        </div>


        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">insert image</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlTextarea1"
            >

        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="add">
        </div>
    </form>
</div>
@endsection
