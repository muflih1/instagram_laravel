@extends('layout.layout')

@section('content')
    @auth
        <h1>Welcome</h1>
        <h3>Hello, {{ auth()->user()->username }}</h3>
        @foreach ($posts as $post)
            <div>
                <h1>{{ $post->user->username }}</h1>
                <img src='/storage/{{ $post->image ?? $post->image }}' alt="" style="max-width: 350px;">
                <h3>{{ $post->caption }}</h3>
            </div>
        @endforeach
    @endauth
@endsection

@section('auth')
    <div class="d-flex flex-column" style="min-height: 100vh;">
        <div class="d-flex m-h-full flex-column align-items-center mb-5">
            <div class="mt-3" style="width: 350px;">
                <div class="border flex-grow-1 py-2 m-h-full d-flex flex-column align-items-center mb-3 justify-content-center">
                    <x-login-form />
                </div>
                <div class="border d-flex flex-column align-items-center py-2">
                    <p class="m-3 d-inline-block"> <a href="{{ route('accounts.register') }}" class="fw-semibold">Sign up</a></p>
                </div>
            </div>    
        </div>
    </div>
@endsection