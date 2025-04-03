@extends('backend.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-10">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title mb-0">
                            <i class="fas fa-passport me-2"></i> Manual Visa Details
                        </h3>
                        {{-- <a href="{{ route('admin.admin-manual-visas.index') }}" class="btn btn-dark">
                            <i class="fas fa-arrow-left me-1"></i>Back to Visa List
                        </a> --}}
                    </div>

                    <div class="card-body p-4">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="card bg-light border-0 mb-3">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-6">
                                                <label class="text-muted small text-uppercase fw-bold">Passport
                                                    Number</label>
                                                <p class="h5 mb-0">{{ $manual_visa->passport_no }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label class="text-muted small text-uppercase fw-bold">Date of Birth</label>
                                                <p class="h5 mb-0">{{ $manual_visa->dob }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="text-muted small text-uppercase fw-bold">Nationality</label>
                                                <p class="h5 mb-0">{{ $manual_visa->nationality_en }}</p>
                                            </div>
                                            <div class="col-6">
                                                <label class="text-muted small text-uppercase fw-bold">PDF File</label>
                                                <div>
                                                    <a href="{{ route('admin.manual-visa-download', $manual_visa->id) }}"
                                                        class="btn btn-sm btn-outline-primary" target="_blank">
                                                        <i class="fas fa-download me-1"></i>Download PDF
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-header bg-light border-0 py-3">
                                        <h5 class="card-title mb-0">PDF Preview</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <embed src="{{ asset($manual_visa->pdf_file) }}" type="application/pdf"
                                            class="w-100 rounded-bottom" style="min-height: 400px; border: none;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-color: #f4f6f9;
        }

        .card-header {
            transition: background-color 0.3s ease;
        }

        .card-header:hover {
            background-color: #0b5ed7 !important;
        }
    </style>
@endpush
