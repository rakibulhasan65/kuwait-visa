@extends('backend.admin')

@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f5faf5;
                font-family: 'Arial', sans-serif;
            }

            .visa-form-container {
                max-width: 1200px;
                background-color: #eef7ee;
                padding: 25px;
                border-radius: 15px;
                margin: 20px auto;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            }

            .visa-form label {
                font-weight: 600;
                margin-bottom: 8px;
                display: block;
                color: #333;
            }

            .visa-form .form-control {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 10px;
                font-size: 1rem;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.08);
                transition: border-color 0.3s ease;
            }

            .visa-form .form-control:focus {
                border-color: #b68a35;
                box-shadow: 0 0 5px rgba(182, 138, 53, 0.3);
            }

            .submit-btn {
                background-color: #b68a35;
                color: white;
                font-weight: bold;
                padding: 12px;
                border-radius: 8px;
                font-size: 1rem;
                width: 100%;
                border: none;
                transition: background 0.3s ease, transform 0.2s ease;
            }

            .submit-btn:hover {
                background-color: #9b702e;
                transform: scale(1.02);
            }

            .pdf-preview-container {
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 15px;
            }

            .error-message {
                color: #dc3545;
                font-size: 0.9rem;
                margin-top: 5px;
            }
        </style>
    @endpush

    <div class="container-fluid">
        <div class="visa-form-container">
            <h2 class="text-center mb-4">Edit Manual Visa</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.admin-manual-visas.update', $manualVisa->id) }}" method="POST"
                enctype="multipart/form-data" class="visa-form">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pdf_file">Visa PDF File</label>
                            <input type="file" name="pdf_file" id="pdf_file" class="form-control" accept=".pdf">
                            @if ($manualVisa->pdf_file)
                                <small class="text-muted">
                                    <a href="{{ asset($manualVisa->pdf_file) }}" target="_blank" class="text-primary">
                                        View Current PDF
                                    </a>
                                </small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="passport_no">Passport Number</label>
                            <input type="text" name="passport_no" id="passport_no"
                                value="{{ old('passport_no', $manualVisa->passport_no) }}"
                                class="form-control @error('passport_no') is-invalid @enderror">
                            @error('passport_no')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" name="dob" id="dob" value="{{ old('dob', $manualVisa->dob) }}"
                                class="form-control @error('dob') is-invalid @enderror">
                            @error('dob')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nationality_en">Nationality</label>
                            <select name="nationality_en" id="nationality_en"
                                class="form-control @error('nationality_en') is-invalid @enderror">
                                <option value="">Select Nationality</option>
                            </select>
                            @error('nationality_en')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="submit-btn mt-3">Update Visa</button>
                    </div>

                    <div class="col-md-6">
                        <div class="pdf-preview-container">
                            <label>PDF Preview</label>
                            <iframe id="pdf_preview"
                                style="width: 100%; height: 400px; border: 1px solid #ddd; border-radius: 8px;"
                                @if ($manualVisa->pdf_file) src="{{ asset($manualVisa->pdf_file) }}" @endif>
                            </iframe>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const pdfFileInput = document.getElementById('pdf_file');
                const pdfPreview = document.getElementById('pdf_preview');

                pdfFileInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file && file.type === "application/pdf") {
                        const objectURL = URL.createObjectURL(file);
                        pdfPreview.src = objectURL;
                    } else {
                        alert("Please upload a valid PDF file.");
                        event.target.value = ''; // Clear the input
                    }
                });

                async function loadNationalities() {
                    try {
                        const response = await fetch("https://restcountries.com/v3.1/all");
                        const countries = await response.json();
                        const nationalitySelect = document.getElementById("nationality_en");

                        countries
                            .map(country => country.name.common)
                            .sort()
                            .forEach(name => {
                                const option = new Option(name, name);
                                nationalitySelect.add(option);
                            });

                        // Set the current nationality
                        nationalitySelect.value = "{{ old('nationality_en', $manualVisa->nationality_en) }}";
                    } catch (error) {
                        console.error("Error fetching country list:", error);
                    }
                }

                loadNationalities();
            });
        </script>
    @endpush
@endsection
