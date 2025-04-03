<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8" />
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
            font-family: "Helvetica Neue Arabic 45 Light", Arial, sans-serif;
            background-color: white;
        }
        
        .bold-text {
            font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
        }
        
        .header-title {
            font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
        }
        
        .blue-heading {
            font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
            color: #0060c7;
        }
        
        .error-text {
            color: #e53e3e;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div class="w-full min-h-screen bg-white">
        <!-- Header with Back Icon -->
        <div class="bg-[#0a1e4d] flex items-center p-4">
            <button class="mr-4" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <h1 class="text-xl header-title text-white text-center flex-grow">Residency Inquiry</h1>
        </div>

        <!-- Form Section -->
        <div class="p-6">
            <p class="blue-heading text-xl mb-6 font-bold">Please enter the Civil Id to verify the residency status</p>

            <form id="residency-form">
                <div>
                    <label for="civil_id" class="block text-gray-800">Civil ID</label>
                    <input type="text" id="civil_id" class="w-full p-3 border border-gray-300 rounded-lg mt-1" 
                           placeholder="Enter the civil Id number">
                    <p id="error-message" class="error-text mt-1">Required</p>
                </div>

                <div class="mt-8">
                    <button type="submit" class="w-full py-4 bg-[#007bff] text-white rounded-lg text-lg bold-text">
                        Inquiry
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('residency-form');
            const civilIdInput = document.getElementById('civil_id');
            const errorMessage = document.getElementById('error-message');
            
            // Initially hide error message until field is interacted with
            errorMessage.style.display = 'none';
            
            // Validate on blur (when leaving the field)
            civilIdInput.addEventListener('blur', function() {
                validateCivilId();
            });
            
            // Form submission
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                
                const isValid = validateCivilId();
                
                if (isValid) {
                    // Valid input but show "Invalid Data" message
                    errorMessage.textContent = 'Invalid Data';
                    errorMessage.style.display = 'block';
                }
                // If invalid, validateCivilId already shows appropriate message
            });
            
            // Validation function
            function validateCivilId() {
                const value = civilIdInput.value.trim();
                
                if (value === '') {
                    errorMessage.textContent = 'Required';
                    errorMessage.style.display = 'block';
                    return false;
                } else if (!/^\d{9}$/.test(value)) {
                    errorMessage.textContent = 'Invalid';
                    errorMessage.style.display = 'block';
                    return false;
                } else {
                    errorMessage.style.display = 'none';
                    return true;
                }
            }
        });
    </script>
</body>
</html>
