@extends('layout')
@section('title', 'Login')
@section('content')

    <div class="d-flex justify-content-center mt-5">
        <form action="{{route('login.post')}}" method="POST" style="width: 500px">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>

            <div class="mb-3 position-relative">
                <label class="form-label">Password</label>

                <input type="password" id="password" class="form-control" name="password">

                <!-- Eye icon -->
                <span
                    onclick="togglePassword()"
                    style="position:absolute; right:10px; top:38px; cursor:pointer;">
                    ◉
                </span>
            </div>

            {{-- Google reCAPTCHA --}}
            <div class="mb-3">
                {!! NoCaptcha::display() !!}

                @if ($errors->has('g-recaptcha-response'))
                    <span class="text-danger">
                        {{ $errors->first('g-recaptcha-response') }}
                    </span>
                @endif
            </div>

            <hr>

            <div class="text-center mt-3">
                <a href="{{ route('auth.google.redirect') }}" class="btn btn-danger w-100">
                    <i class="fab fa-google me-2"></i> Login with Google
                </a>
            </div>


            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    <script>
        function togglePassword() {
            const field = document.getElementById("password");

            if (field.type === "password") {
                field.type = "text";      // show password
            } else {
                field.type = "password";  // hide password
            }
        }
    </script>

    {{-- reCAPTCHA JS (required) --}}
    {!! NoCaptcha::renderJs() !!}
@endsection
