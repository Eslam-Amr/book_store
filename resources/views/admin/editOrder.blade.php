@extends('adminlte::page')
@section('content')
<form action="{{ route('admin.updateOrder', $order->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="container mt-5">
            <div class="row">
                    <h1 class="col-12 text-success text-bold text-center">EDIT</h1>
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="notes" value="{{ $order->notes }} "
                        placeholder="notes">
                </div>

                    @error('notes')
                    {{ $message }}
                    @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="governorate" value="{{ $order->governorate }} "
                        placeholder="governorate">
                </div>
                @error('governorate')
                    {{ $message }}
                @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="phone" value="{{ $order->phone }} "
                        placeholder="phone">
                </div>
                @error('phone')
                    {{ $message }}
                @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="address" value="{{ $order->address }} "
                        placeholder="address">
                </div>
                @error('address')
                    {{ $message }}
                @enderror
                <div class="col-12">

                    <input type="text" class="form-control my-3" name="status" value="{{ $order->status }} "
                        placeholder="status">
                </div>
                @error('status')
                    {{ $message }}
                @enderror

                <div class="col-12">

                    <input type="text" class="form-control my-3" name="email" value="{{ $order->email }} "
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
