<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
  <title>{{ $setting['site_title'] ?? 'Kuwait eVisa System' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="theme-color" content="#082A64" />
  <meta name="application-name" content="Kuwait Visa" />
  <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Kuwait Visa" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="msapplication-TileColor" content="#082A64" />
  <meta name="description" content="{{ $setting['meta_description'] ?? 'Official Kuwait electronic visa verification system' }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
            @font-face {
      font-family: "Helvetica Neue Arabic 75 Bold";
      src: url("../../../fonts/HelveticaNeueLTArabic-Bold.ttf") format("opentype");
      font-weight: bold;
      font-style: normal;
    }
    @font-face {
      font-family: "Helvetica Neue Arabic 45 Light";
      src: url("../../../fonts/HelveticaNeueLTArabic-Light.ttf") format("opentype");
      font-weight: normal;
      font-style: normal;
    }
        body {
            font-family: "Helvetica Neue Arabic 45 Light";
            background-color: white;
        }
        
        .error-text {
            color: #ef4444;
            font-size: 14px;
            margin-top: 2px;
        }
        .header-text{
                  font-family: "Helvetica Neue Arabic 75 Bold"
        }
        .blue-heading {
            font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
            color: #0060c7;
        }
        input:focus {
    outline: none;
    border-color: #6b7280; /* or whatever border color you want to maintain */
}
    </style>
</head>

<body>
    <div class="w-full max-w-md mx-auto bg-white">
        <div class="bg-[#1d305b] flex items-center p-3">
            <button class="mr-4" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
                    stroke="currentColor" fill="none" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-xl font-bold text-white text-center flex-grow header-text">Visa</h1>
        </div>
        <div class="p-6">
            <p class="blue-heading mb-5 font-bold">Fill the following information to retrieve the visa details</p>

            <form id="visaForm" action="{{ route('web-app-evisa-details') }}" method="POST">
                @csrf
                <div class="space-y-5">
                    <div>
                        <label for="visa_number" class="text-gray-800 mb-6">Visa Number</label>
                        <input type="text" id="visa_number" name="visa_number" 
                            class="w-full p-4 border border-gray-500 rounded-lg mt-1" 
                            placeholder="Enter your visa number" value="{{ old('visa_number') }}">
                        <span id="visa_number_error" class="error-text hidden">Required</span>
                    </div>

                    <div>
                        <label for="moi_reference" class="text-gray-800">MOI Reference</label>
                        <input type="text" id="moi_reference" name="moi_reference" 
                            class="w-full p-4 border border-gray-500 rounded-lg mt-1" 
                            placeholder="Enter your MOI reference" value="{{ old('mio_reference') }}">
                        <span id="moi_reference_error" class="error-text hidden">Required</span>
                    </div>

                    <div>
                        <label for="passport_number" class="text-gray-800">Passport Number</label>
                        <input type="text" id="passport_number" name="passport_number" 
                            class="w-full p-4 border border-gray-500 rounded-lg mt-1 mb-2" 
                            placeholder="Enter your passport number" value="{{ old('passport_number') }}">
                        <span id="passport_number_error" class="error-text hidden">Required</span>
                    </div>

                    <div class="mt-8">
                        <button type="submit" 
                            class="w-full py-4 bg-[#147dec] text-white rounded-lg text-lg font-medium">
                            Inquiry
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
      

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const visaNumberInput = document.getElementById("visa_number");
            const moiReferenceInput = document.getElementById("moi_reference");
            const passportNumberInput = document.getElementById("passport_number");
            
            const visaNumberError = document.getElementById("visa_number_error");
            const moiReferenceError = document.getElementById("moi_reference_error");
            const passportNumberError = document.getElementById("passport_number_error");
            
            const form = document.getElementById("visaForm");
            
            // Validation functions
            const validateVisaNumber = () => {
                const value = visaNumberInput.value.trim();
                if (value.length === 0) {
                    visaNumberError.textContent = "Required";
                    visaNumberError.classList.remove("hidden");
                    return false;
                } else if (!/^\d{9}$/.test(value)) {
                    visaNumberError.textContent = "Invalid";
                    visaNumberError.classList.remove("hidden");
                    return false;
                } else {
                    visaNumberError.classList.add("hidden");
                    return true;
                }
            };
            
            const validateMoiReference = () => {
                const value = moiReferenceInput.value.trim();
                if (value.length === 0) {
                    moiReferenceError.textContent = "Required";
                    moiReferenceError.classList.remove("hidden");
                    return false;
                } else if (!/^\d{9}$/.test(value)) {
                    moiReferenceError.textContent = "Invalid";
                    moiReferenceError.classList.remove("hidden");
                    return false;
                } else {
                    moiReferenceError.classList.add("hidden");
                    return true;
                }
            };
            
            const validatePassportNumber = () => {
                const value = passportNumberInput.value.trim();
                if (value.length === 0) {
                    passportNumberError.textContent = "Required";
                    passportNumberError.classList.remove("hidden");
                    return false;
                } else if (!/^[A-Za-z][0-9]{8}$/.test(value)) {
                    passportNumberError.textContent = "Invalid";
                    passportNumberError.classList.remove("hidden");
                    return false;
                } else {
                    passportNumberError.classList.add("hidden");
                    return true;
                }
            };
            
            // Add blur event listeners to validate on field exit
            visaNumberInput.addEventListener("blur", validateVisaNumber);
            moiReferenceInput.addEventListener("blur", validateMoiReference);
            passportNumberInput.addEventListener("blur", validatePassportNumber);
            
            // Form submission validation
            form.addEventListener("submit", function (event) {
                event.preventDefault();
                
                const isVisaValid = validateVisaNumber();
                const isMoiValid = validateMoiReference();
                const isPassportValid = validatePassportNumber();
                
                if (isVisaValid && isMoiValid && isPassportValid) {
                    // Form is valid, proceed with submission
                    form.submit(); // Uncomment this line when connecting to backend
                }
            });
        });
    </script>
</body>
</html>
