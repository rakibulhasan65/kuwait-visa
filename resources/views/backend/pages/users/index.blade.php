@extends('backend.admin')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <h3 class="card-title m-0"><i class="fas fa-users"></i> User List</h3>
                <a href="{{ route('admin.users.create') }}" class="btn btn-success float-right">
                    <i class="fas fa-user-plus"></i> Add User
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover">
                    <thead class="bg-light">
                        <tr>
                            <th>#SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $serial = ($users->currentPage() - 1) * $users->perPage() + 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $serial++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
