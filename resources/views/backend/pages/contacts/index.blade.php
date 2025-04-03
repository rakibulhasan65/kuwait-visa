@extends('backend.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Contact List</h3>
                        <a href="{{ route('admin.contacts.create') }}" class="btn bg-info">
                            <i class="fas fa-plus"></i> Add New Contact
                        </a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Telephone</th>
                                    <th>Fax</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $serial = ($contacts->currentPage() - 1) * $contacts->perPage() + 1;
                                @endphp
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $serial++ }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->telephone }}</td>
                                        <td>{{ $contact->fax }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->type }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer d-flex justify-content-center">
                        {{ $contacts->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
