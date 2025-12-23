@extends('Layouts.layout')
@section('content')
<div class="container mt-4">
    <h2>My Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name (pre-populated, editable) --}}
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $user->name) }}"
                required
            >
        </div>

        {{-- Email (pre-populated, read-only or disabled) --}}
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                class="form-control"
                value="{{ $user->email }}"
                disabled
            >
        </div>

        @if($user->profile_image)
            <div class="mb-3">
                <p>Current Profile Image:</p>
                <img src="{{ asset('storage/' . $user->profile_image) }}"
                     alt="Profile Image"
                     style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;">
            </div>
        @endif


        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="profile_image" class="form-control" accept="image/*">
        </div>


        {{-- Phone --}}
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone', $user->phone) }}"
            >
        </div>

        {{-- Address --}}
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input
                type="text"
                name="address"
                class="form-control"
                value="{{ old('address', $user->address) }}"
            >
        </div>

        {{-- City --}}
        <div class="mb-3">
            <label class="form-label">City</label>
            <input
                type="text"
                name="city"
                class="form-control"
                value="{{ old('city', $user->city) }}"
            >
        </div>

        {{-- Country --}}
        <div class="mb-3">
            <label class="form-label">Country</label>
            <input
                type="text"
                name="country"
                class="form-control"
                value="{{ old('country', $user->country) }}"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Profile
        </button>
    </form>
</div>
@endsection
