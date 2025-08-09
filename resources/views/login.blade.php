<x-layout>

    <div class="registration-form">
        <div class="w-50 mx-auto">
          @error('email_or_username')
            <div class="alert alert-danger">
                <span class="error-message">{{ $message }}</span>
            </div>
          @enderror

            @error('password')
                <div class="alert alert-danger">
                    <span class="error-message">{{ $message }}</span>
                </div>
            @enderror

            @if(session('error'))
                <div class="alert alert-danger text-bold">
                    <span class="error-message">{{ session('error') }}</span>
                </div>
            @endif
        </div>
        <form action="{{ route('log') }}" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>

             <div class="form-group">
                <input type="text" name="email_or_username" value="{{ old('email_or_username') }}" class="form-control item" id="email" placeholder="Email/Username">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
        </form>
        <div class="social-media">
            <p class="mt-3">Don't have an account? <a href="{{ route('users.create') }}">Sign up here</a>.</p>
        </div>
    </div>
</x-layout>
