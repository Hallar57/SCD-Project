@extends('Layouts.admin_layout')
@section('title', 'Edit Restaurant')
@section('content')
<div class="container mt-4">
    <h2 class="fw-bold mb-0" >Edit Restaurant</h2>

    <form action="{{ route('admin.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $restaurant->name) }}"
                required
            >
        </div>

        <div class="form-floating mb-3">
            <textarea
                name="description"
                class="form-control"
                id="floatingTextarea"
                placeholder="Description"
                style="height: 120px"
            >{{ old('description', $restaurant->description) }}</textarea>
                    <label for="floatingTextarea">Description</label>
        </div>


    @if($restaurant->image)
            <div class="mb-3">
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $restaurant->image) }}"
                     alt="Image"
                     style="width: 200px; height: 120px; object-fit: cover; border-radius: 10%;">
            </div>
        @endif


        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input
                type="text"
                name="phone"
                class="form-control"
                value="{{ old('phone', $restaurant->phone) }}"
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <input
                type="text"
                name="address"
                class="form-control"
                value="{{ old('address', $restaurant->address) }}"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Profile
        </button>
    </form>
</div>
@endsection
