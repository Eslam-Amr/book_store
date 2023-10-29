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
<h2 class="text-center my-5">Add Branch</h2>
<div class=" alert-danger text-center my-5">

    @error('status')
    {{ $message }}
    <br>
    @enderror

</div>
<div class="container w-25 border m-auto mt-2">
    <form action="" method="post" class="form-group" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">short_address</label>
            <textarea placeholder="enter short_address"  class="form-control" name="short_address" id="" cols="30" rows="5"></textarea>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">full_address</label>
            <textarea placeholder="enter full_address"  class="form-control" name="full_address" id="" cols="30" rows="5"></textarea>

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">city</label>
            <input type="text" name="city"  class="form-control" id="exampleFormControlInput1" placeholder="Enter city">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">phone</label>
            <input type="text" name="phone"  class="form-control" id="exampleFormControlInput1" placeholder="Enter phone">

        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="add">
        </div>
    </form>
</div>
@endsection
