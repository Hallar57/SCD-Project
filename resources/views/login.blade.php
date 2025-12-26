@extends('Layouts.layout')
@section('title', 'Login')

@section('content')

    <div class="min-vh-100 d-flex align-items-center"
         style="background:#fff5f5;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <div class="card shadow-sm border-0 p-4">
                        <h3 class="fw-bold text-center mb-1">Welcome Back</h3>
                        <p class="text-muted text-center mb-4">
                            Login to continue ordering
                        </p>

                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf

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
                                Login
                            </button>

                            <hr class="my-4">

                            <a href="{{ route('auth.google.redirect') }}"
                               class="btn btn-outline-danger w-100">
                                <i class="fab fa-google me-2"></i>
                                Continue with Google
                            </a>

                            <p class="text-center mt-3 small">
                                Don’t have an account?
                                <a href="{{ route('registration') }}"
                                   style="color:#c62828;">
                                    Register
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
