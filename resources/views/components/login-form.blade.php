<h1 class="d-inline-block mx-auto mt-4 mb-3">Instagram</h1>
<form action="{{ route('accounts.session') }}" method="POST" style="width: 100%;">
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
    </div>
    <div class="ig-mx-40 mb-2">
      <input 
        type="password" 
        class="form-control"
        placeholder="Password"
        name="password"
        value="{{ old('password') }}"
      />
    </div>
    <div class="d-grid ig-mx-40 my-2">
      <button type="submit" class="btn btn-primary">Log in</button>
    </div>
    @error('login_error')
      <div class="mx-5 my-3">
        <span class="text-danger">{{ $message }}</span>
      </div>  
    @enderror
  </div>
</form>