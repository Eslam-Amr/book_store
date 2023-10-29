@extends('adminlte::page')
@section('content')

    <form action="{{ route('admin.update', $user->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="container mt-5">
            <div class="row">
                    <h1 class="col-12 text-success text-bold text-center">EDIT</h1>
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="first_name" value="{{ $user->first_name }} "
                        placeholder="first_name">
                </div>

                    @error('first_name')
                    {{ $message }}
                    @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="last_name" value="{{ $user->last_name }} "
                        placeholder="last_name">
                </div>
                @error('last_name')
                    {{ $message }}
                @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="user_name" value="{{ $user->user_name }} "
                        placeholder="user_name">
                </div>
                @error('user_name')
                    {{ $message }}
                @enderror

                <div class="col-12">

                    <input type="text" class="form-control my-3" name="email" value="{{ $user->email }} "
                        placeholder="email">
                </div>
                @error('email')
                    {{ $message }}
                @enderror

                <input type="submit" class="btn btn-success">
            </div>
        </div>
    </form>
@endsection
