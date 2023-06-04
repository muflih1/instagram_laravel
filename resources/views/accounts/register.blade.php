@extends('accounts.layout')

@section('content')
    <h1 class="d-inline-block mx-auto mt-4 mb-2">Instagram</h1>
    <h2 class="ig-mx-40 fs-6 text-center text-secondary mb-4">Sign up to see photos and videos from your friends.</h2>
    <form action="{{ route('accounts.store') }}" method="POST">
      @csrf
      <div class="d-flex flex-column mb-4">
        <div class="ig-mx-40 mb-2">
          <input 
            type="email" 
            class="form-control" 
            placeholder="Email" 
            name="email" 
            value="{{ old('email') }}" 
          />
          @error('email')
              <span class="text-danger mt-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="ig-mx-40 mb-2">
          <input 
            type="text" 
            class="form-control" 
            placeholder="Full Name"
            name="name"
            value="{{ old('name') }}"  
          />
          @error('name')
            <span class="text-danger mt-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="ig-mx-40 mb-2">
          <input 
            type="text" 
            class="form-control" 
            placeholder="Username"
            name="username"
            value="{{ old('username') }}"
          />
          @error('username')
            <span class="text-danger mt-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="ig-mx-40 mb-2">
          <input 
            type="password" 
            class="form-control"
            placeholder="Password"
            name="password"
            value="{{ old('password') }}"
          />
          @error('password')
            <span class="text-danger mt-1">{{ $message }}</span>
          @enderror
        </div>
        <div class="d-grid ig-mx-40 my-2">
          <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
      </div>
    </form>
@endsection