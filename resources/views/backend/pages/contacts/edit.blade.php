@extends('backend.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h3 class="card-title m-0"><i class="fas fa-edit"></i> Edit Contact</h3>
                    </div>

                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $contact->name) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="telephone">Telephone <span class="text-danger">*</span></label>
                                <input type="text" name="telephone" id="telephone" class="form-control"
                                    value="{{ old('telephone', $contact->telephone) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fax">Fax</label>
                                <input type="text" name="fax" id="fax" class="form-control"
                                    value="{{ old('fax', $contact->fax) }}">
                            </div>

                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control"
                                    value="{{ old('email', $contact->email) }}" required>
                            </div>

                            <div class="form-group">
                                {{-- type --}}
                                <label for="type">Type <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value="">Select Type</option>
                                    {{-- 'Ministries and Government' and 'State Organization' and Authorities --}}
                                    <option value="Ministries and Government"
                                        {{ old('type', $contact->type) == 'Ministries and Government' ? 'selected' : '' }}>
                                        Ministries and Government</option>
                                    <option value="State Organization"
                                        {{ old('type', $contact->type) == 'State Organization' ? 'selected' : '' }}>State
                                        Organization</option>
                                </select>
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i> Update Contact
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
