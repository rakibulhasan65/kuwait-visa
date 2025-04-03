@extends('backend.admin')

@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f5faf5;
                font-family: Arial, sans-serif;
            }

            .visa-form-container {
                max-width: 1200px;
                background-color: #eef7ee;
                padding: 15px 15px;
                border-radius: 15px;
                margin: 10px 10px;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }

            .visa-form label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .visa-form input,
            .visa-form select,
            .visa-form textarea {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 10px;
                font-size: 1rem;
                width: 100%;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
                margin-bottom: 15px;
            }

            .submit-btn {
                background-color: #b68a35;
                color: white;
                font-weight: bold;
                padding: 8px;
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

            .section-heading {
                font-size: 22px;
                font-weight: bold;
                margin-top: 5px;
                color: #0000FE;
                text-align: center;
            }

            hr {
                border: 1px solid #b68a35;
                margin: 20px 0;
            }
        </style>
    @endpush

    <div class="visa-form-container">
        <h2 class="text-center">Edit Visa Form</h2>

        <!-- Displaying All Errors at the Top -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form action="{{ route('admin.visas.update', $visa->id) }}" method="POST" class="visa-form">
    @csrf
    @method('PUT')

    <div class="section-heading">Visa Details (ﺑﻴﺎﻧﺎت اﻟﺘﺄﺷﻴﺮﻩ)</div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label>Visa Number</label>
            <input type="text" name="visa_number" value="{{ old('visa_number', $visa->visa_number) }}" placeholder="Enter Visa Number"
                class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Visa Type In Arabic</label>
            <input type="text" name="visa_type_ar" value="{{ old('visa_type_ar', $visa->visa_type_ar) }}" placeholder="نوع التأشيرة"
                class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Visa Type In English</label>
            <input type="text" name="visa_type_en" value="{{ old('visa_type_en', $visa->visa_type_en) }}" placeholder="Visa Type In English"
                class="form-control">
        </div>

        <div class="col-md-6">
            <label>Visa Purpose</label>
            <input type="text" name="visa_purpose" value="{{ old('visa_purpose', $visa->visa_purpose) }}" placeholder="Enter Visa Purpose"
                class="form-control">
        </div>

        <div class="col-md-6">
            <label>Place of Issue</label>
            <input type="text" name="place_of_issue" value="{{ old('place_of_issue', $visa->place_of_issue) }}" placeholder="Enter Place of Issue"
                class="form-control">
        </div>

        <div class="col-md-6">
            <label>Visa Issue Date</label>
            <input type="date" name="issue_date" value="{{ old('issue_date', $visa->issue_date) }}" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Visa Expiry Date</label>
            <input type="date" name="expiry_date" value="{{ old('expiry_date', $visa->expiry_date) }}" class="form-control">
        </div>
    </div>

    <div class="section-heading">Visa Holder Details (بيانات صاحب التأشيرة)</div>
    <hr>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Full Name in Arabic</label>
            <input type="text" name="full_name_ar" value="{{ old('full_name_ar', $visa->full_name_ar) }}" placeholder="الاسم الكامل"
                class="form-control">
        </div>
        <div class="col-md-6 mb-3">
            <label>Full Name in English</label>
            <input type="text" name="full_name_en" value="{{ old('full_name_en', $visa->full_name_en) }}" placeholder="Full Name"
                class="form-control">
        </div>
        <div class="col-md-12">
            <label>MOI Reference</label>
            <input type="text" name="moi_reference" value="{{ old('moi_reference', $visa->moi_reference) }}"
                placeholder="Enter MOI Reference" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Nationality Arabic</label>
            <input type="text" name="nationality_ar" value="{{ old('nationality_ar', $visa->nationality_ar) }}"
                placeholder="Enter National Arabic" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Nationality English</label>
            <input type="text" name="nationality_en" value="{{ old('nationality_en', $visa->nationality_en) }}"
                placeholder="Enter National English" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Date of Birth</label>
            <input type="date" name="dob" value="{{ old('dob', $visa->dob) }}" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Sex (English)</label>
            <input type="text" name="gender" value="{{ old('gender', $visa->gender) }}" placeholder="Enter Sex"
                class="form-control">
        </div>

        <div class="col-md-3">
            <label>Sex (Arabic)</label>
            <input type="text" name="gender_ar" value="{{ old('gender_ar', $visa->gender_ar) }}" placeholder="Enter Sex Arabic"
                class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label>Occupation In Arabic</label>
            <input type="text" name="occupation_ar" value="{{ old('occupation_ar', $visa->occupation_ar) }}" class="form-control"
                placeholder="Enter Occupation In Arabic">
        </div>

        <div class="col-md-6 mb-3">
            <label>Occupation In English</label>
            <input type="text" name="occupation_en" value="{{ old('occupation_en', $visa->occupation_en) }}" class="form-control"
                placeholder="Enter Occupation In English">
        </div>

        <div class="col-md-6">
            <label>Passport No</label>
            <input type="text" name="passport_no" value="{{ old('passport_no', $visa->passport_no) }}"
                placeholder="Enter Passport Number" class="form-control">
        </div>
        
        <div class="col-md-6">
            <label>Passport Issue Place</label>
            <input type="text" name="passport_issue_place" value="{{ old('passport_issue_place', $visa->passport_issue_place) }}"
                placeholder="Enter Passport Issue Place" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Passport Type In English</label>
            <input type="text" name="passport_type_en" value="{{ old('passport_type_en', $visa->passport_type_en) }}"
                placeholder="Enter Passport Type In English" class="form-control">
        </div>
        
        <div class="col-md-6 mb-3">
            <label>Passport Type In Arabic</label>
            <input type="text" name="passport_type_ar" value="{{ old('passport_type_ar', $visa->passport_type_ar) }}"
                placeholder="Passport Type In Arabic" class="form-control">
        </div>

        <div class="col-md-6">
            <label>Passport Issue Date</label>
            <input type="date" name="passport_issue_date" value="{{ old('passport_issue_date', $visa->passport_issue_date) }}"
                class="form-control">
        </div>
       
        <div class="col-md-6">
            <label>Passport Expiry Date</label>
            <input type="date" name="passport_expiry_date" value="{{ old('passport_expiry_date', $visa->passport_expiry_date) }}"
                placeholder="Enter Passport Expiry Date" class="form-control">
        </div>
    </div>

    <div class="section-heading">Employer/Family Breadwinner Details (بيانات صاحب العمل/العائل)</div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <label>Full Name of Company in Arabic</label>
            <input type="text" name="company_name_ar" value="{{ old('company_name_ar', $visa->company_name_ar) }}"
                placeholder="Enter Full Name of Company in Arabic" class="form-control">
        </div>

        <div class="col-md-12">
            <label>Phone Number</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $visa->phone_number) }}" placeholder="Enter Phone Number"
                class="form-control">
        </div>

        <div class="col-md-12">
            <label for="barcode_text_up" class="form-label">Barcode Text (Up)</label>
            <textarea name="barcode_text_up" id="barcode_text_up" class="form-control" rows="1" style="resize: none;"
                placeholder="Enter Barcode Text Up">{{ old('barcode_text_up', $visa->barcode_text_up) }}</textarea>
        </div>

        <div class="col-md-12 mt-3">
            <label for="barcode_text_down" class="form-label">Barcode Text (Down)</label>
            <textarea name="barcode_text_down" id="barcode_text_down" class="form-control" rows="1" style="resize: none;"
                placeholder="Enter Barcode Text Down">{{ old('barcode_text_down', $visa->barcode_text_down) }}</textarea>
        </div>
    </div>

    <button type="submit" class="submit-btn">Update Visa</button>
</form>

    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let barcodeTextUp = document.getElementById("barcode_text_up");
            let barcodeTextDown = document.getElementById("barcode_text_down");

            function limitInputLength(event) {
                if (event.target.value.length > 45) {
                    event.target.value = event.target.value.substring(0, 45);
                }
            }

            barcodeTextUp.addEventListener("input", limitInputLength);
            barcodeTextDown.addEventListener("input", limitInputLength);
        });
    </script>
@endsection