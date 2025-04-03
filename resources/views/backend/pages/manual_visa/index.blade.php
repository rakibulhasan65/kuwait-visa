@extends('backend.admin')

@section('title', 'Visa List')

@section('content')
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0"><i class="fas fa-passport"></i> Visa List</h3>

                    <div class="d-flex">
                        <!-- Search Form -->
                        <form action="{{ route('admin.admin-manual-visas.index') }}" method="get"
                            class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by visa number" value="{{ request()->search }}"
                                    aria-label="Search Manual Visa">
                                <button type="submit" class="btn btn-primary input-group-append">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Add Visa Button -->
                        <a href="{{ route('admin.admin-manual-visas.create') }}" class="btn btn-success ms-3 ml-3">
                            <i class="fas fa-plus-circle"></i> Add Manual Visa
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="visaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Passport Number</th>
                            <th>Date of Birth</th>
                            <th>Nationality</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($manual_visas as $key => $manual_visa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $manual_visa->passport_no }}</td>
                                <td>{{ $manual_visa->dob }}</td>
                                <td>{{ $manual_visa->nationality_en }}</td>
                                <td>
                                    <a href="{{ route('admin.admin-manual-visas.edit', $manual_visa->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{ route('admin.admin-manual-visas.show', $manual_visa->id) }}"
                                        class="btn btn-info btn-sm">Show</a>

                                    <a href="{{ route('admin.manual-visa-download', $manual_visa->id) }}" target="_blank"
                                        class="btn btn-info btn-sm">
                                        </i> Download
                                    </a>
                                    <form id="delete-form-{{ $manual_visa->id }}"
                                        action="{{ route('admin.admin-manual-visas.destroy', $manual_visa->id) }}"
                                        method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $manual_visa->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function confirmDelete(visaId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + visaId).submit();
                    }
                });
            }
        </script>
    @endpush


@endsection
