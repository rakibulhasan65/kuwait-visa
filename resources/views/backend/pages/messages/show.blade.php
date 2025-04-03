@extends('backend.admin')

@section('content')
<div class="container mt-4">
    <div class="email-form-container p-4"> 
        <h2 class="mb-4">Message Details</h2>
        <div class="card bg-white shadow-sm p-4 rounded">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Phone Number:</strong> {{ $message->phone_number }}</p>
            <p><strong>Nationality:</strong> {{ $message->nationality }}</p>
            <p><strong>Subject:</strong></p>
            <p class="border p-3 rounded bg-light">{{ $message->subject }}</p>
            <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>

@push('styles')
<style>
    .email-form-container {
        max-width: 80%;
        background-color: #eef7ee; 
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
        margin: auto;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-primary {
        background-color: #b68a35;
        border-color: #b68a35;
    }

    .btn-primary:hover {
        background-color: #9b702e;
        border-color: #9b702e;
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }
</style>
@endpush
@endsection
