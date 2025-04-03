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
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Kuwait Visa" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="msapplication-TileColor" content="#082A64" />
  <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('images/icon/mipmap-xhdpi/ic_launcher.png') }}">
  <link rel="manifest" href="{{ route('pwa.manifest') }}">
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
            <p class="text-[#0060c7] text-xl mb-6 font-semibold">Fill the following information to retrieve the visa details</p>

            <form id="visaForm">
                <div class="space-y-5">
                    <div>
                        <label for="visa_number" class="text-gray-800">Visa Number</label>
                        <input type="text" id="visa_number" 
                            class="w-full p-3 border border-gray-300 rounded-lg mt-1" 
                            placeholder="Enter your visa number">
                        <span id="visa_number_error" class="error-text hidden">Required</span>
                    </div>

                    <div>
                        <label for="moi_reference" class="text-gray-800">MOI Reference</label>
                        <input type="text" id="moi_reference" 
                            class="w-full p-3 border border-gray-300 rounded-lg mt-1" 
                            placeholder="Enter your MOI reference">
                        <span id="moi_reference_error" class="error-text hidden">Required</span>
                    </div>

                    <div>
                        <label for="passport_number" class="text-gray-800">Passport Number</label>
                        <input type="text" id="passport_number" 
                            class="w-full p-3 border border-gray-300 rounded-lg mt-1" 
                            placeholder="Enter your passport number">
                        <span id="passport_number_error" class="error-text hidden">Required</span>
                    </div>

                    <div class="mt-8">
                        <button type="submit" 
                            class="w-full py-4 bg-[#0060c7] text-white rounded-lg text-lg font-medium">
                            Inquiry
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                    // form.submit(); // Uncomment this line when connecting to backend
                }
            });
        });
    </script>
</body>
</html>
