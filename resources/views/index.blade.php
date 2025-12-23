@extends('Admin.admin_layout') {{-- or your main layout --}}
@section('title','View Users')
@section('content')
    <div class="container">

        <h1>All Users</h1>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Image</th> {{-- optional --}}
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                    {{-- Show small profile image if exists --}}
                    <td>
                        @if ($user->profile_image)
                            <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image"
                                 width="50" height="50" style="object-fit: cover;">
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        {{-- Delete form with confirmation --}}
                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No users found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection
