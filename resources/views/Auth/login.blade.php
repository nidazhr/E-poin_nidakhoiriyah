@extends('auth.layouts')

@section('content')

<h1 class="text-white text-center mb-4">Login</h1>

<form action="{{ route('authenticate') }}" method="post" class="bg-white p-4 rounded shadow">
    @csrf
    <div class="mb-3">
        <label class="form-label">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control">
    </div>
    <div class="d-grid">
        <input type="submit" value="Login" class="btn text-white" style="background-color: #5F52D3;">
    </div>
</form>

@endsection
