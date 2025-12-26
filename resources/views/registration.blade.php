@extends('Layouts.layout')
@section('title', 'Register')

@section('content')

    <div class="min-vh-100 d-flex align-items-center"
         style="background:#fff5f5;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <div class="card shadow-sm border-0 p-4">
                        <h3 class="fw-bold text-center mb-1">
                            Create Account
                        </h3>

                        <p class="text-muted text-center mb-4">
                            Sign up to start ordering food
                        </p>

                        <form action="{{ route('registration.post') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       required>
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="form-label">Password</label>
                                <input type="password"
                                       id="password"
                                       class="form-control"
                                       name="password"
                                       required>

                                <span onclick="togglePassword()"
                                      style="position:absolute; right:12px; top:38px; cursor:pointer; color:#c62828;">
                                👁
                            </span>
                            </div>

                            {{-- reCAPTCHA --}}
                            <div class="mb-3">
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <span class="text-danger small">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="btn btn-primary w-100">
                                Register
                            </button>

                            <p class="text-center mt-3 small">
                                Already have an account?
                                <a href="{{ route('login') }}"
                                   style="color:#c62828;">
                                    Login
                                </a>
                            </p>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const field = document.getElementById("password");
            field.type = field.type === "password" ? "text" : "password";
        }
    </script>

    {!! NoCaptcha::renderJs() !!}
@endsection
