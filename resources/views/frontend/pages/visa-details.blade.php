@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            @media print {
                body * {
                    visibility: hidden;
                }

                .action-btn * {
                    display: none;
                }

                #visa-details-print,
                #visa-details-print * {
                    visibility: visible;
                }

                #visa-details-print {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                    max-width: 100%;
                    page-break-before: always;
                }

                @page {
                    size: A4;
                    margin: 0;
                }

                .card {
                    margin-bottom: 20px;
                }
            }
        </style>
    @endpush
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow border-0" id="visa-details-print">
                    <!-- Card Header -->
                    <div class="card-header text-white" style="background-color: #b68a35">
                        <h3 class="mb-0 text-center">Visa Details</h3>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Visa Summary -->
                        <div class="alert alert-info mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h5 class="mb-1">Visa #{{ $visa->visa_number }}</h5>
                                    <p class="mb-0 text-muted small">
                                        <i class="fas fa-calendar-alt"></i> Valid from {{ $visa->issue_date }} to
                                        {{ $visa->expiry_date }}
                                    </p>
                                </div>
                                <div class="col-md-6 text-md-end mt-3 mt-md-0">
                                    <span class="badge bg-success p-2">{{ $visa->visa_type_en }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Main Information -->
                        <div class="row g-4">
                            <!-- Visa Information -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">
                                            <i class="fas fa-passport me-2"></i>Visa Information
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Visa Number:</strong></td>
                                                    <td>{{ $visa->visa_number }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Visa Type (EN):</strong></td>
                                                    <td>{{ $visa->visa_type_en }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Visa Type (AR):</strong></td>
                                                    <td>{{ $visa->visa_type_ar }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Visa Purpose (EN):</strong></td>
                                                    <td>{{ $visa->visa_purpose_en }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Visa Purpose (AR):</strong></td>
                                                    <td>{{ $visa->visa_purpose_ar }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Issue Date:</strong></td>
                                                    <td>{{ $visa->issue_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Expiry Date:</strong></td>
                                                    <td>{{ $visa->expiry_date }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Place of Issue:</strong></td>
                                                    <td>{{ $visa->place_of_issue }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Visa Holder Details -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">
                                            <i class="fas fa-user me-2"></i>Visa Holder Details
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Full Name (EN):</strong></td>
                                                    <td>{{ $visa->full_name_en }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Full Name (AR):</strong></td>
                                                    <td>{{ $visa->full_name_ar }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>MOI Reference:</strong></td>
                                                    <td>{{ $visa->moi_reference }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nationality:</strong></td>
                                                    <td>{{ $visa->nationality }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Gender:</strong></td>
                                                    <td>{{ $visa->gender }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Occupation (EN):</strong></td>
                                                    <td>{{ $visa->occupation_en }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Occupation (AR):</strong></td>
                                                    <td>{{ $visa->occupation_ar }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date of Birth:</strong></td>
                                                    <td>{{ $visa->dob }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Passport Information -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">
                                            <i class="fas fa-id-card me-2"></i>Passport Information
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Passport No:</strong></td>
                                                    <td>{{ $visa->passport_no }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Passport Type:</strong></td>
                                                    <td>{{ $visa->passport_type }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Employer Details -->
                            <div class="col-md-6">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">
                                            <i class="fas fa-building me-2"></i>Employer Details
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Company Name (AR):</strong></td>
                                                    <td>{{ $visa->company_name_ar }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>MOI Reference:</strong></td>
                                                    <td>{{ $visa->company_moi_reference }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Mobile Number:</strong></td>
                                                    <td>{{ $visa->mobile_number }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message Section -->
                        @if ($visa->message)
                            <div class="card mt-4 border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="mb-0">
                                        <i class="fas fa-comment-alt me-2"></i>Message
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="mb-0">{{ $visa->message }}</p>
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center mt-4 gap-3 action-btn">
                            <a href="{{ route('visa.find') }}" class="btn btn-sm"
                                style="background-color: #b68a35; color: #fff;">
                                <i class="fas fa-search me-2"></i>Back to Search
                            </a>
                            <button onclick="window.print()" class="btn btn-secondary btn-sm">
                                <i class="fas fa-print me-2"></i>Print Details
                            </button>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer bg-light text-center text-muted">
                        <small>For any discrepancies, please contact the visa issuing authority.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function printVisaDetails() {
                let printContents = document.getElementById('visa-details-print').innerHTML;
                let originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }
        </script>
    @endpush
@endsection
