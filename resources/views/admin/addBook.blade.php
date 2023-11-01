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
<h2 class="text-center my-5">Add Book</h2>
<div class=" alert-danger text-center my-5">

    @error('stock')
    {{ $message }}
    <br>
    @enderror
    @error('price')
    {{ $message }}
    <br>
    @enderror
    @error('discount')
    {{ $message }}
    <br>
    @enderror
    @error('number_of_pages')
    {{ $message }}
    <br>
    @enderror
    @error('name')
    {{ $message }}
    <br>
    @enderror
    @error('code')
    {{ $message }}
    <br>
    @enderror
    @error('author')
    {{ $message }}
    <br>
    @enderror
    @error('category')
    {{ $message }}
    <br>
    @enderror
    @error('description')
    {{ $message }}
    <br>
    @enderror
</div>
<div class="container w-25 border m-auto mt-2">
    <form action="{{ route('admin.addBo') }}" method="Post" class="form-group" enctype="multipart/form-data" >
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">stock</label>
            <input type="number" name="stock"  class="form-control" id="exampleFormControlInput1" placeholder="Enter stock">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">price</label>
            <input type="number" name="price"  class="form-control" id="exampleFormControlInput1" placeholder="Enter price">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">discount</label>
            <input type="number" name="discount"  class="form-control" id="exampleFormControlInput1" placeholder="Enter discount">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">number_of_pages</label>
            <input type="number" name="number_of_pages"  class="form-control" id="exampleFormControlInput1" placeholder="Enter number_of_pages">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Enter name">

        </div>
        {{-- <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">code</label>
            <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="Enter code">

        </div> --}}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">author</label>
            <input type="text" name="author" class="form-control" id="exampleFormControlInput1" placeholder="Enter author">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">category</label>
            <input type="text" name="category" class="form-control" id="exampleFormControlInput1" placeholder="Enter category">

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">description</label>
            <textarea placeholder="enter description"  class="form-control" name="description" id="" cols="30" rows="10"></textarea>

        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">insert image</label>
            <input type="file" name="image" class="form-control" id="exampleFormControlTextarea1">

        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="add">
        </div>
    </form>
</div>
@endsection
