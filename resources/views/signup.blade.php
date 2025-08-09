<x-layout>


   <div class="registration-form">
        <div class="w-50 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="error-message">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control item" id="full_name" placeholder="Full Name">
            </div>

            <div class="form-group">
                <input type="text" name="username" class="form-control item" id="username" placeholder="User Name">
            </div>

            <div class="form-group">
                <input type="text" name="email" class="form-control item" id="email" placeholder="Email">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
        <div class="social-media">
            <p class="mt-3">Already have an account? <a href="{{ route('users.index') }}">Login here</a>.</p>
        </div>
    </div>
</x-layout>
