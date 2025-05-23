@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            body {
                background-color: #f5faf5;
                font-family: Arial, sans-serif;
            }

            .visa-form-container {
                max-width: 700px;
                background-color: #eef7ee;
                padding: 40px;
                border-radius: 15px;
                margin: 50px auto;
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
            }

            .visa-form label {
                font-weight: bold;
                margin-bottom: 5px;
                display: block;
            }

            .visa-form input,
            .visa-form select {
                border: 1px solid #ced4da;
                border-radius: 8px;
                padding: 12px;
                font-size: 1rem;
                width: 100%;
                box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
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


            .visa-heading {
                text-decoration: underline;
                font-size: 24px;
                font-weight: bold;
                color: #0000FE;
            }


            .date-picker-wrapper {
                position: relative;
            }

            .date-picker-wrapper input {
                cursor: pointer;
                background-color: #fff;
                border-radius: 8px;
                padding: 12px;
            }


            @media (max-width: 768px) {
                .visa-form-container {
                    max-width: 90%;
                    padding: 25px;
                    margin: 20px auto;
                }

                .submit-btn {
                    font-size: 0.9rem;
                    padding: 12px;
                }
            }

            .captcha-box {
                display: flex;
                align-items: center;
                gap: 10px;
                background: #f8f9fa;
                padding: 10px;
                border-radius: 5px;
            }

            .captcha-box img {
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .captcha-refresh {
                cursor: pointer;
                font-size: 20px;
                color: #007bff;
            }
        </style>
    @endpush


    <div class="visa-form-container">
        <h2 class="text-center mt-4">
            Visa Inquiry
        </h2>
        <form class="visa-form" action="{{ route('visa.find') }}" method="GET">
            {{-- any error will be shown here --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="passport">Passport No.</label>
                <input type="text" name="passport_no" id="passport" class="form-control" placeholder="Enter Passport No"
                    value="{{ old('passport_no') }}">
            </div>

            <div class="mb-3">
                <label for="dob">Date of Birth</label>
                <div class="date-picker-wrapper">
                    <input type="date" id="dob" class="form-control" data-date="" data-date-format="DD MMMM YYYY" name="dob" value="{{ old('dob') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="nationality">Nationality</label>
                <select id="nationality" class="form-control" name="nationality" value="{{ old('nationality') }}">
                    <option value="" selected>Select Nationality</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="captcha">Enter Captcha</label>
                <input type="text" id="captcha" name="captcha" class="form-control mb-2"
                    placeholder="Enter Captcha Here">

                <div class="captcha-box">
                    @captcha
                </div>
            </div>

            <button type="submit" class="submit-btn">Submit and Find</button>
        </form>
    </div>
    @push('scripts')
        <script>
            function reloadCaptcha() {
                document.getElementById('captchaImage').src = "{{ url('/captcha') }}?" + Math.random();
            }
        </script>
        <script>
            async function loadNationalities() {
                try {
                    let response = await fetch("https://restcountries.com/v3.1/all");
                    let countries = await response.json();
                    let nationalitySelect = document.getElementById("nationality");
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
