@extends('backend.admin')

@section('content')
<div class="container mt-4">
    <div class="email-form-container p-4"> 
        <h2 class="mb-4">Messages</h2>
        <table class="table table-bordered bg-white rounded shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Nationality</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                    <tr class="{{ $message->status == 'unseen' ? 'table-warning' : '' }}">
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone_number }}</td>
                        <td>{{ $message->nationality }}</td>
                        <td>{{ Str::limit($message->subject, 50) }}</td>
                        <td>
                            <span class="badge {{ $message->status == 'unseen' ? 'bg-danger' : 'bg-success' }}">
                                {{ ucfirst($message->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-primary">
                                Read
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('styles')
<style>
    .email-form-container {
        max-width: 95%;
        background-color: #eef7ee; 
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        margin: auto;
    }

    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .btn-primary {
        background-color: #b68a35;
        border-color: #b68a35;
    }

    .btn-primary:hover {
        background-color: #9b702e;
        border-color: #9b702e;
    }
</style>
@endpush
@endsection
