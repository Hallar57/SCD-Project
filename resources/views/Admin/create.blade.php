@extends('Layouts.admin_layout')
@section('title', 'Create Restaurant')
@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">
                Create Restaurant
            </h3>

            <a href="{{ route('admin.home') }}" class="btn btn-outline-secondary btn-sm">
                ← Back to Restaurants
            </a>
        </div>

        <form action="{{ route('admin.createPost')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control"
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
                ></textarea>
                    <label for="floatingTextarea">Description</label>
            </div>

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
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input
                    type="text"
                    name="address"
                    class="form-control"
                >
            </div>
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </form>
    </div>
@endsection
