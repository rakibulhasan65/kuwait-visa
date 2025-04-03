@extends('backend.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title m-0"><i class="fas fa-user-plus"></i> Add New Contact</h3>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.contacts.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter full name" required>
                            </div>

                            <div class="form-group">
                                <label for="telephone">Telephone <span class="text-danger">*</span></label>
                                <input type="text" name="telephone" id="telephone" class="form-control"
                                    placeholder="Enter phone number" required>
                            </div>

                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="text" name="fax" id="fax" class="form-control"
                                    placeholder="Enter fax number (optional)">
                            </div>

                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter email address" required>
                            </div>

                            <div class="form-group">
                                <label for="type">Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    {{-- 'Ministries and Government' and 'State Organization' and Authorities --}}
                                    <option value="Ministries and Government">
                                        Ministries and Government</option>
                                    <option value="State Organization">State
                                        Organization</option>
                                </select>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Save Contact
                                </button>
                                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Back to List
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
