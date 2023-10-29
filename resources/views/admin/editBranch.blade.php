@extends('adminlte::page')
@section('content')

<form action="{{ route('admin.updateBranch', $branch->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="container mt-5">
            <div class="row">
                    <h1 class="col-12 text-success text-bold text-center">EDIT</h1>
                <div class="col-12">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">short_address</label>
                        <textarea placeholder="enter short_address"  class="form-control" name="short_address" id="" cols="30" rows="5">{{ $branch->short_address }}</textarea>

                        @error('short_address')
                        {{ $message }}
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">full_address</label>
                        <textarea placeholder="enter full_address"  class="form-control" name="full_address" id="" cols="30" rows="5">{{ $branch->full_address }}</textarea>
                        @error('full_address')
                        {{ $message }}
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">city</label>
                        <input type="text" name="city" value="{{ $branch->city }}"  class="form-control" id="exampleFormControlInput1" placeholder="Enter city">
                        @error('city')
                        {{ $message }}
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">phone</label>
                        <input type="text" name="phone" value="{{ $branch->phone }}"  class="form-control" id="exampleFormControlInput1" placeholder="Enter phone">

                        @error('phone')
                        {{ $message }}
                        @enderror
                    </div>









                </div>


                <input type="submit" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection
