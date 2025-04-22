@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f5faf5;
                font-family: Arial, sans-serif;
            }

            .email-form-container {
                max-width: 700px;
                background-color: #eef7ee;
                padding: 40px;
                border-radius: 15px;
                margin: 50px auto;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }

            .email-form label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
                position: relative;
            }

            .required::after {
                content: "*";
                color: red;
                position: absolute;
                top: -5px;
                font-size: 20px;
            }

            .email-form input,
            .email-form select,
            .email-form textarea {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 12px;
                font-size: 1rem;
                width: 100%;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            }

            .phone-input {
                display: flex;
                align-items: center;
                width: 100%;
            }

            .phone-input .iti {
                width: 100% !important;
            }

            .phone-input input {
                flex: 1;
                width: 100% !important;
            }

            .submit-btn {
                background-color: #b68a35;
                color: white;
                font-weight: bold;
                padding: 14px;
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

            .char-counter {
                font-size: 12px;
                color: #666;
                position: absolute;
                bottom: 10px;
                left: 10px;
            }

            .textarea-container {
                position: relative;
            }

            @media (max-width: 768px) {
                .email-form-container {
                    max-width: 95%;
                    padding: 25px;
                    margin: 20px auto;
                }

                .submit-btn {
                    font-size: 0.9rem;
                    padding: 12px;
                }
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
    @endpush

    <div class="email-form-container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="email-form" action="{{ route('message.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <h2 class="text-center">Email Us</h2>
            </div>
            <br>
            <div class="mb-3">
                <label class="required">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label class="required">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label>Phone Number</label>
                <div class="phone-input">
                    <input type="tel" name="phone_number" id="phone" class="form-control" required>
                    <input type="hidden" name="full_phone_number" id="full_phone_number" value="{{ old('full_phone_number') }}">
                </div>
            </div>

             <div class="mb-3">
                <label for="nationality">Nationality</label>
                <input list="nationality-list" id="nationality" class="form-control" name="nationality"
                    placeholder="Select Nationality" value="{{ old('nationality') }}">

                <datalist id="nationality-list">

                </datalist>
            </div>

            <div class="mb-3">
                <label>Subject</label>
                <div class="textarea-container">
                    <textarea name="subject" id="subject" class="form-control" rows="4" placeholder="Enter your main text here"
                        maxlength="500" required>{{ old('subject') }}</textarea>
                    <span class="char-counter">500/500</span>
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
        @if (session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 3000
                    });
                });
            </script>
        @endif
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
        <script>
            const phoneInputField = document.querySelector("#phone");
            const fullPhoneInput = document.querySelector("#full_phone_number");
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                geoIpLookup: function(success, failure) {
                    fetch("https://ipapi.co/json")
                        .then(res => res.json())
                        .then(data => success(data.country_code))
                        .catch(() => success("US"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });

            phoneInputField.addEventListener("blur", function() {
                fullPhoneInput.value = phoneInput.getNumber();
            });

            const textArea = document.getElementById("subject");
            const charCounter = document.querySelector(".char-counter");

            textArea.addEventListener("input", function() {
                let remaining = 500 - this.value.length;
                charCounter.textContent = `${remaining}/500`;
            });
        </script>

          <script>
            async function loadNationalities() {
                try {
                    let response = await fetch("https://restcountries.com/v3.1/all");
                    let countries = await response.json();
                    let nationalitySelect = document.getElementById("nationality-list");
                    countries.sort((a, b) => a.name.common.localeCompare(b.name.common));

                    countries.forEach(country => {
                        let englishName = country.name.common;
                        let arabicName = country.translations?.ara?.common || "";

                        let option = document.createElement("option");


                        option.value = englishName;
                        option.textContent = arabicName ? `${englishName} - ${arabicName}` : englishName;

                        nationalitySelect.appendChild(option);
                    });
                } catch (error) {
                    console.error("Error fetching country list:", error);
                }
            }

            document.addEventListener("DOMContentLoaded", loadNationalities);
        </script>
        <script>
            const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
          
            if (!isMobile) {
              document.head.innerHTML += `
                <style>
                  body {
                    margin: 0;
                    padding: 0;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                    background: #f4f4f4;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 100vh;
                    text-align: center;
                  }
          
                  .mobile-only-wrapper {
                    background: white;
                    padding: 2rem 3rem;
                    border: 1px solid #ddd;
                    border-radius: 10px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
                  }
          
                  .mobile-only-wrapper h3 {
                    color: #ff3e3e;
                    margin-bottom: 0.5rem;
                  }
          
                  .mobile-only-wrapper p {
                    color: #333;
                  }
                </style>
              `;
          
              document.body.innerHTML = `
                <div class="mobile-only-wrapper">
                  <h3>Mobile Device Required</h3>
                  <p>This app is only accessible on smartphones or tablets.</p>
                </div>
              `;
            }
          </script>
    @endpush
@endsection
