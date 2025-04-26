<!DOCTYPE html>
<html lang="en">
<head>
  <title>Visa</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="theme-color" content="#0a1e4d" />
  <meta name="application-name" content="Kuwait Visa" />
  <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-title" content="Kuwait Visa" />
  <meta name="apple-mobile-web-app-status-bar-style" content="default" />
  <meta name="msapplication-TileColor" content="#0a1e4d" />
  <!-- <link rel="icon" type="image/png" sizes="192x192" href="http://localhost/images/icon/mipmap-xhdpi/ic_launcher.png"> -->
  <link rel="manifest" href="http://localhost/manifest.json">
  <meta name="description" content="Official Kuwait electronic visa verification system">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://unpkg.com/html5-qrcode"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style>
    @font-face {
      font-family: "Helvetica Neue Arabic 75 Bold";
      src: url("../../../fonts/HelveticaNeueLTArabic-Bold.ttf") format("truetype");
      font-weight: bold;
      font-style: normal;
    }
    
    @font-face {
      font-family: "Helvetica Neue Arabic 45 Light";
      src: url("../../../fonts/HelveticaNeueLTArabic-Light.ttf") format("truetype");
      font-weight: normal;
      font-style: normal;
    }
    
    body {
      font-family: "Helvetica Neue Arabic 45 Light", Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    .font-bold-arabic {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
    }
    
    .blue-heading {
      font-family: "Helvetica Neue Arabic 75 Bold", Arial, sans-serif;
      color: #0060c7;
    }
    
    /* Content container - keeping original 32% width */
    .content-container {
      width: 32%;
      margin-left: 34%;
      margin-right: 34%;
    }
    
    /* Header styling with original width */
    .header-wrapper {
      display: flex;
      justify-content: center;
      background-color: #0a1e4d;
    }
    
    .header-container {
      width: 30%;
      padding: 1rem;
    }
    
    /* QR scanner styling - Adjusted height (increased by 5rem from original) */
    #reader {
      width: 100% !important; 
      height: 32.5rem !important; /* Adjusted: 26rem + 10rem - 5rem = 31rem */
      border: none !important;
    }
    
    #reader video {
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
    }
    
    /* Remove default UI elements */
    #reader__dashboard_section_csr,
    #reader__dashboard_section_swaplink,
    #reader__status_span,
    #reader__scan_region img {
      display: none !important;
    }
    
    /* Scanner container - Adjusted height (increased by 5rem from original) */
    .scanner-container {
      position: relative;
      margin-top: 0.75rem; /* Reduced from 1.5rem to bring it closer to checklist */
      width: 100% !important;
      margin-left: auto;
      margin-right: auto;
      height: 32.5rem; /* Adjusted: 26rem + 10rem - 5rem = 31rem */
      overflow: hidden;
      margin-bottom: 3rem; /* Reduced from 5rem */
    }
    
    /* Green border - keeping original size and centered */
    .green-border {
      position: absolute;
      /* Center horizontally */
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%) translateY(-24px);
      /* Make it a square with equal width/height */
      width: 75%;
      height: 65%;
      aspect-ratio: 1/1;
      border: 2px solid #00FF00;
      pointer-events: none;
      z-index: 50;
    }
    
    /* Checklist styling with proper blue color */
    .checklist-item {
      display: flex;
      align-items: center;
      margin-bottom: 6px;
    }
    
    .blue-check {
      width: 18px;
      height: 18px;
      border-radius: 50%;
      background-color: #0980FF;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      flex-shrink: 0;
    }
    
    .blue-check svg {
      width: 14px;
      height: 14px;
    }
    
    /* Checklist container with original width */
    .checklist-container {
      width: 100%;
      margin-left: auto;
      margin-right: auto;
    }

    /* Make just the checklist box wider */
    .checklist-box {
      width: 90%; /* Wider checklist box while keeping container width the same */
      margin-left: auto;
      margin-right: auto;
    }
    
    /* Custom Error Popup Styling */
    .error-popup-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
      display: none;
    }
    
    .error-popup {
      background-color: white;
      border-radius: 8px;
      width: 250px;
      padding: 20px 20px;
      display: flex; 
      flex-direction: column;
      align-items: center;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .error-icon {
      width: 60px;
      height: 60px;
      background-color: #ff3b30;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 20px;
    }
    
    .error-message {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 25px;
      text-align: center;
    }
    
    .error-button {
      background-color: #ff3b30;
      color: white;
      border: none;
      border-radius: 4px;
      padding: 10px 0;
      width: 80%;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
    
    /* Media query for mobile responsiveness */
    @media (max-width: 768px) {
      .content-container, .header-container {
        width: 100%;
        margin-left: 0;
        margin-right: 0;
      }
      
      /* Ensure header has no horizontal padding on mobile */
      .content-container.bg-[#0a1e4d] {
        padding-left: 1rem;
        padding-right: 1rem;
      }
      
      /* Make scanner box rectangular and full width - Adjusted height (increased by 5rem from original) */
      .scanner-container {
        width: 100% !important;
        margin-left: 0;
        margin-right: 0;
        padding: 0;
        box-sizing: border-box;
        height: 28.5rem; /* Adjusted: 22rem + 10rem - 5rem = 27rem */
        margin-top: 0.5rem; /* Even smaller margin on mobile */
      }
      
      #reader {
        width: 100% !important;
        height: 28.5rem !important; /* Adjusted: 22rem + 10rem - 5rem = 27rem */
      }
      
      /* Original green border dimensions for mobile */
      .green-border {
        width: 65%;
        height: 55%;
        aspect-ratio: 1/1;
        transform: translate(-50%, -50%) translateY(-24px);
      }
      
      /* Adjust checklist container to match scanner width */
      .checklist-container {
        width: 100%;
        padding: 0 1rem;
        box-sizing: border-box;
      }

      /* Make the checklist box wider on mobile */
      .checklist-box {
        width: 95%;
      }
      
      .error-popup {
        width: 85%;
        max-width: 250px;
      }
      
      /* Ensure consistent text wrapping on mobile devices */
      .checklist-item p {
        font-size: 0.85rem;
        line-height: 1.2;
        word-break: normal;
        hyphens: none;
        white-space: normal;
      }
    }

    /* Extra small screens adjustment */
    @media (max-width: 377px) {
      #reader {
        height: 26.5rem !important; /* Adjusted: 20rem + 10rem - 5rem = 25rem */
      }
      
      .scanner-container {
        height: 28.5rem; /* Adjusted: 22rem + 10rem - 5rem = 27rem */
      }
      
      /* Original green border dimensions for very small screens */
      .green-border {
        width: 60%;
        height: 50%;
        transform: translate(-50%, -50%) translateY(-24px); 
      }
      
      /* Make sure the QR scanner is full width */
      .content-container {
        padding: 0;
      }
      
      .scanner-container {
        padding: 0;
        width: 100vw !important;
        margin-left: 0;
        left: 0;
        right: 0;
      }
      
      /* Fix text wrapping on specific screen sizes */
      .checklist-item p {
        font-size: 0.8rem;
        line-height: 1.2;
        white-space: nowrap;
      }
    }
    
    /* Specific fix for 375px-377px screen size to ensure consistent wrapping */
    @media (min-width: 375px) and (max-width: 377px) {
      .mobile-app-text {
        white-space: nowrap;
        font-size: 0.8rem;
      }
    }

    /* Added styles for the text headers */
    .verify-text {
      font-size: 1rem;
      color: #4B5563;
      margin-bottom: 0rem;
    }

    .scan-text {
      font-size: 1rem;
      color: #0060c7;
      font-weight: bold;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body class="bg-white">
  <div class="w-full h-screen mx-auto bg-white">
    <!-- Header Section with blue background -->
    <div class="bg-white w-full">
      <div class="content-container bg-[#0a1e4d] text-white p-4 flex items-center">
        <button class="mr-4" onclick="window.history.back();">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 24 24"
            stroke="currentColor" fill="none" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>
        <h1 class="text-xl font-bold-arabic text-center w-full mr-6">Verify</h1>
      </div>
    </div>
    
    <!-- Content Section -->
    <div class="content-container">
      <div class="p-4 text-center">
        <!-- Updated text for "To verify Visa" and "Scan the QR code" -->
        <h2 class="verify-text mb-0">To Verify Visa</h2>
            <h3 class="blue-heading text-lg font-bold">Scan the QR Code</h3>

        
        <!-- Checklist with Blue Circle Checkboxes - Wider box but same container width -->
        <div class="checklist-container">
          <div class="bg-[#f0f2f5] p-4 rounded-lg mt-2 mx-auto checklist-box">
            {{-- <div class="checklist-item" style="margin-bottom: 6px;">
              <div class="blue-check">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12l5 5L20 7"></path>
                </svg>
              </div>
              <p class="text-gray-800">Generated in the document</p>
            </div> --}}
            <div class="checklist-item">
              <div class="blue-check">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="10" height="10" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12l5 5L20 7"></path>
                </svg>
              </div>
              <p class="text-black mobile-app-text">Generated in the mobile application</p>
            </div>
          </div>
        </div>
      </div>
      <div class="scanner-container">
        <div id="reader"></div>
        <div class="green-border"></div>
      </div>
    </div>
  </div>
  
  <!-- Custom Error Popup -->
  <div id="errorPopupOverlay" class="error-popup-overlay">
    <div class="error-popup">
      <div class="error-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </div>
      <div class="error-message">Invalid QR Code</div>
      <button id="errorOkButton" class="error-button">OK</button>
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
    // Function to show the custom error popup
    function showErrorPopup() {
      document.getElementById('errorPopupOverlay').style.display = 'flex';
    }
    
    // Function to hide the custom error popup
    function hideErrorPopup() {
      document.getElementById('errorPopupOverlay').style.display = 'none';
    }
    
    // Add event listener to the OK button
    document.getElementById('errorOkButton').addEventListener('click', hideErrorPopup);
    
    // Enforce consistent text formatting for small screens
    function adjustTextWrapping() {
      const windowWidth = window.innerWidth;
      const mobileAppTextElement = document.querySelector('.mobile-app-text');
      
      if (windowWidth >= 375 && windowWidth <= 377) {
        // Force consistent behavior for the problematic size range
        mobileAppTextElement.style.whiteSpace = 'nowrap';
        mobileAppTextElement.style.fontSize = '0.8rem';
      } else if (windowWidth < 375) {
        // Allow wrapping for very small screens
        mobileAppTextElement.style.whiteSpace = 'normal';
        mobileAppTextElement.style.fontSize = '0.8rem';
      } else {
        // Default behavior for larger screens
        mobileAppTextElement.style.whiteSpace = 'normal';
        mobileAppTextElement.style.fontSize = '';
      }
    }
    
    function onScanSuccess(decodedText, decodedResult) {
      console.log("Scanned Code:", decodedText);

      $.ajax({
        url: `/barcode-search-evisa`,
        type: 'GET',
        data: {
          'barcode': decodedText
        },
        success: function(data) {
          if (data.success) {
            console.log("Visa Data:", data);
            window.location.href = data.route;
          } else {
            // Show custom error popup instead of alert
            showErrorPopup();
          }
        },
        error: function(error) {
          console.error("Error fetching data:", error);
          // Show custom error popup instead of alert
          showErrorPopup();
        }
      });
    }

    // Initialize QR scanner
    function initQRScanner() {
      const html5QrCode = new Html5Qrcode("reader");
      html5QrCode.start(
        { facingMode: "environment" }, 
        { fps: 10 },
        onScanSuccess
      ).then(() => {
        setTimeout(() => {
          const elementsToHide = document.querySelectorAll("#reader__dashboard_section_csr, #reader__dashboard_section_swaplink, #reader__status_span, #reader__scan_region img");
          elementsToHide.forEach(el => {
            if (el) el.style.display = "none";
          });
          const scanRegion = document.getElementById('reader__scan_region');
          if (scanRegion) {
            scanRegion.style.border = "none";
            scanRegion.style.width = "100%";
            const qrRegionElements = scanRegion.querySelectorAll('div');
            qrRegionElements.forEach(el => {
              if (el.style.position === 'absolute') {
                el.style.display = 'none';
              }
            });
          }
          const videoElements = document.querySelectorAll('video');
          videoElements.forEach(video => {
            video.style.width = "100%";
            video.style.height = "100%";
            video.style.objectFit = "cover";
          });
        }, 500);
      }).catch(err => {
        console.error("Error starting scanner:", err);
      });
    }
    
    // Initialize scanner on page load and adjust text wrapping
    window.addEventListener('load', function() {
      initQRScanner();
      adjustTextWrapping();
    });
    
    // Re-initialize scanner and adjust text wrapping on resize
    window.addEventListener('resize', function() {
      // Adjust text wrapping immediately on resize
      adjustTextWrapping();
      
      // Handle scanner resizing
      setTimeout(function() {
        const videoElements = document.querySelectorAll('video');
        videoElements.forEach(video => {
          video.style.width = "100%";
          video.style.height = "100%";
          video.style.objectFit = "cover";
        });
        
        const scanRegion = document.getElementById('reader__scan_region');
        if (scanRegion) {
          scanRegion.style.width = "100%";
        }
      }, 100);
    });
  </script>
</body>
</html>