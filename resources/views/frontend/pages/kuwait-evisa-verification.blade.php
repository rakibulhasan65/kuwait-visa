<!DOCTYPE html>
<html lang="en" dir="ltr">
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

    html, body {
      font-family: "Helvetica Neue Arabic 45 Light" !important;
      background-color: #F5F5F5 !important;
      margin: 0 !important;
      padding: 0 !important;
      height: 100% !important;
      width: 100% !important;
      overflow-y: auto !important;
      -webkit-overflow-scrolling: touch !important;
      position: relative !important;
    }
    .optional-logo{
      width: 2rem;
    }
    #splash-screen {
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      width: 100% !important;
      height: 100% !important;
      background-color: #fff !important;
      z-index: 100 !important;
      transition: opacity 0.5s ease !important;
      overflow: hidden !important;
    }
    #splash-image-1,
    #splash-image-2 {
      position: absolute !important;
      top: 50% !important;
      left: 50% !important;
      transform: translate(-50%, -50%) !important;
      height: auto !important;
      transition: opacity 0.5s ease !important;
    }
    #splash-image-1 {
      max-width: 80px !important;      
    }
    #splash-image-2 {
      max-width: 70% !important;
      opacity: 0 !important;
      align-items: start;
    }
    header {
      background-color: #082A64 !important;
      width: 100% !important;
    }
    .hamburger-svg {
      height: 2rem !important;
      color: #fff !important;
    }


    .sidebar {
      background-color: white !important;
      width: 280px !important;
      height: 100% !important;
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      z-index: 50 !important;
      transform: translateX(-100%) !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: space-between !important;
      overflow: hidden !important;
      -webkit-overflow-scrolling: touch !important;
      transition: transform 0.3s ease !important;
    }
    .sidebar-visible {
      transform: translateX(0) !important;
    }
    .banner {
      background-color: #E5E8EF !important;
    }
    .width-sidebar-logo {
      width: 12rem !important;
    }
    .footer-text {
      color: #172845 !important;
      font-family: "Helvetica Neue Arabic 45 Light" !important;
      font-size: 11px !important;
    }
    .language-arabic {
      font-family: "Helvetica Neue Arabic 45 Light" !important;
      color: #072a64 !important;
    }
    #overlay {
      position: fixed !important;
      inset: 0 !important;
      background-color: rgba(0, 0, 0, 0.5) !important;
      z-index: 40 !important;
      display: none !important;
    }
    .main-container {
      max-width: 100% !important;
      margin: 0 auto !important;
      background-color: #fff !important;
      min-height: 100vh !important;
      overflow-y: auto !important;
      -webkit-overflow-scrolling: touch !important;
      position: relative !important;
      visibility: visible !important;
    }
    .content-container {
      padding: 1rem;
      overflow-y: visible !important;
    }
    h2.verify-title {
      font-family: "Helvetica Neue Arabic 75 Bold" !important;
      font-weight: 700 !important;
      font-size: 18px !important;
      color: #2E68BF !important;
    }
    p.text-gray-600 {
      color: #555 !important;
      font-size: 14px !important;
      margin-bottom: 10px;
    }
    p.text-xs {
      font-size: 13px !important;
    }

    .card {
      background-color: #EEF0F5 !important;
      border-radius: 0.5rem !important;
      padding: 1rem !important;
      display: flex !important;
      flex-direction: column !important;
      align-items: flex-start !important;
      margin-bottom: 1rem !important;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
      min-height: 8rem !important;
    }
    .card img {
      width: auto !important;
      height: 85px !important;
      object-fit: contain !important;
      margin-bottom: 0.5rem !important;
    }
    .blue-card {
      background-color: #0D3C91 !important;
      color: white !important;
      border-radius: 0.5rem !important;
      padding: 1.25rem !important;
      text-align: center !important;
      margin-bottom: 1rem !important;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
    }
    .blue-card img {
      width: auto !important;
      height: 85px !important;
      margin: 0 auto 0.75rem !important;
    }

    .blue-button, .verification-button {
      background-color: white !important;
      color: #0D3C91 !important;
      border-radius: 0.5rem !important;
      padding: 0.75rem 1rem !important;
      font-family: "Helvetica Neue Arabic 75 Bold" !important;
      border: none !important;
      width: 100% !important;
      font-size: 16px !important;
      cursor: pointer !important;
    }
    .blue-button:hover, .verification-button:hover {
      background-color: #f0f2f7 !important;
    }

    .app-banner {
      display: block !important;
      width: 100% !important;
      height: auto !important;
      object-fit: contain !important;
    }

    .touch-target {
      min-height: 44px !important;
      min-width: 44px !important;
    }

    @media (max-width: 640px) {
      .sidebar {
        width: 85% !important;
        max-width: 280px !important;
      }
      .content-container {
        padding-left: 1rem !important;
        padding-right: 1rem !important;
      }
      html, body, .main-container {
        overflow-x: hidden !important;
      }
      h2.verify-title {
        font-size:18px !important;
      }
      .card {
        min-height: 7rem !important;
      }
    }
    @supports (-webkit-touch-callout: none) {
      html, body {
        height: -webkit-fill-available !important;
        -webkit-overflow-scrolling: touch !important;
      }
      .main-container {
        min-height: -webkit-fill-available !important;
      }
    }
  </style>
</head>
<body>
  <div id="splash-screen">
    <img id="splash-image-1" src="{{ asset('images/splash-1.png') }}" alt="Kuwait Visa Logo" />
    <img id="splash-image-2" src="{{ asset('images/app-splash.png') }}" alt="Kuwait Visa Splash" />
  </div>
  <header class="w-full flex items-center p-2 touch-target">
    <button id="hamburger-button" class="focus:outline-none touch-target">
      <img src="{{ asset('images/hamburger-menu.svg') }}" alt="Menu" class="hamburger-svg" />
    </button>
  </header>
  <div id="sidebar" class="sidebar">
    <div class="flex flex-col justify-between h-full">
      <div>
        <div class="p-4 text-center banner" style="border-bottom: 1px solid black;">
          <img src="{{ asset('images/kuwaitappslogo-r.png') }}" alt="Kuwait Apps Logo" class="mx-auto mb-4 width-sidebar-logo" />
        </div>
        <div class="flex items-center gap-2 p-4" style="border-bottom: 1px solid #c7c7c7;">
          <img src="{{ asset('images/globe.svg') }}" alt="Language Icon" class="optional-logo h-6" />
          <span class="language-arabic">العربية</span>
        </div>
      </div>
      <div class="p-4 text-center">
        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo" class="mx-auto mb-2 optional-logo" />
        <p class="footer-text">Privacy Policy</p>
        <p class="footer-text">Design &amp; Development by Ministry of Interior</p>
      </div>
    </div>
  </div>
  <div id="overlay"></div>
  <div class="main-container">
    <div class="text-center card-position">
      <img src="{{ asset('images/apps-banner.png') }}" alt="Kuwait Visa Logo" class="app-banner" />
    </div>
    <div class="content-container" style="padding-bottom:0px !important">
      <h2 class="verify-title">Verify the Visa</h2>
      <p class="text-gray-600 text-sm">Verify visa that issued by the Ministry of Interior</p>
      <div class="grid grid-cols-2 gap-4 mt-3">
        <a href="{{ route('web-app-visa-inquiries') }}" class="block">
          <div class="card p-4 flex flex-col items-start">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/user-icon.png') }}" alt="Inquiry Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Inquiry</p>
            <p class="text-xs text-gray-500">Visa Inquiries</p>
          </div>
        </a>
        <a href="{{ route('visa-verification-scan') }}" class="block">
          <div class="card p-4 flex flex-col items-start">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/barcode-scaner-icon.png') }}" alt="Verify Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Verify</p>
            <p class="text-xs text-gray-500">Visa Verification</p>
          </div>
        </a>
      </div>
    </div>
    <div class="content-container"style="padding-top:0px !important; padding-bottom:0px;">
      <h2 class="verify-title">Residency Inquiry</h2>
      <p class="text-gray-600 text-sm">Inquire the status of the residency</p>
      <div class="grid grid-cols-2 gap-4 mt-3">
        <a href="{{ route('residency-inquiries') }}" class="block">
          <div class="card p-4 flex flex-col items-start">
            <div class="text-blue-600 mb-2">
              <img class="w-16 h-16" src="{{ asset('images/residency-icon.png') }}" alt="Inquiry Icon" />
            </div>
            <p class="font-semibold text-gray-800 mb-1">Inquiry</p>
            <p class="text-xs text-gray-500">Residency Inquiries</p>
          </div>
        </a>
        <a href="{{ route('visa-verification-scan') }}" class="block" style="display: none;">
          <div class="card p-4 flex flex-col items-start"></div>
        </a>
      </div>
    </div>
    <div class="content-container">
      <h2 class="text-lg font-bold text-blue-700" style="padding-top:0px !important;">Verify the Documents and Certificates</h2>
      <p class="text-gray-600 text-sm">Verify the documents and certificates issued by the Ministry of Interior</p>
      <div class="blue-card">
        <div class="flex justify-center mb-3">
          <img class="w-16 h-16" src="{{ asset('images/qr-code.png') }}" alt="MOI Logo" />
        </div>
        <p class="font-semibold mb-4">Verify the Documents and Certificates</p>
        <a href="{{ route('visa-verification-scan') }}" class="block">
        <button class="blue-button"  >Verification</button></a>
      </div>
    </div>
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      initializeSplashScreen();
      initializeSidebar();
      initializeBodyClickToCloseSidebar();
    });

    function initializeSplashScreen() {
      const splashScreen = document.getElementById('splash-screen');
      const splashImage1 = document.getElementById('splash-image-1');
      const splashImage2 = document.getElementById('splash-image-2');
      const mainContent = document.querySelector('.main-container');
      
      if (!splashScreen || !splashImage1 || !splashImage2 || !mainContent) {
        console.warn('Splash screen elements not found');
        return;
      }
      // Fade out first, fade in second
      setTimeout(() => {
        splashImage1.style.setProperty('opacity', '0', 'important');
        splashImage2.style.setProperty('opacity', '1', 'important');
      }, 1500);

      // Fade out entire splash after 4.5s
      setTimeout(() => {
        splashScreen.style.setProperty('opacity', '0', 'important');
        mainContent.style.visibility = 'visible';
        if (mainContent.classList.contains('hidden')) {
          mainContent.classList.remove('hidden');
          mainContent.classList.add('block');
        }
        setTimeout(() => {
          splashScreen.style.display = 'none';
        }, 500);
      }, 4500);
    }

    function initializeSidebar() {
      const hamburgerButton = document.getElementById('hamburger-button');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      
      if (!hamburgerButton || !sidebar || !overlay) {
        console.warn('Sidebar elements not found');
        return;
      }
      function openSidebar() {
        sidebar.classList.add('sidebar-visible');
        overlay.style.display = 'block';
        document.body.style.overflow = 'hidden'; 
      }
      function closeSidebar() {
        sidebar.classList.remove('sidebar-visible');
        overlay.style.display = 'none';
        document.body.style.overflow = ''; 
      }
      hamburgerButton.addEventListener('click', openSidebar);
      overlay.addEventListener('click', closeSidebar);
      hamburgerButton.addEventListener('touchend', function(e) {
        e.preventDefault();
        openSidebar();
      });
      overlay.addEventListener('touchend', function(e) {
        e.preventDefault();
        closeSidebar();
      });
      window.closeSidebar = closeSidebar;
      window.sidebar = sidebar;
      window.hamburgerButton = hamburgerButton;
    }

    function initializeBodyClickToCloseSidebar() {
      document.addEventListener('click', function(e) {
        if (
          window.sidebar && 
          window.sidebar.classList.contains('sidebar-visible') &&
          !window.sidebar.contains(e.target) &&
          !window.hamburgerButton.contains(e.target)
        ) {
          window.closeSidebar();
        }
      });
    }

    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker
          .register('/sw.js', { scope: '/kuwait-evisa-verification/' })
          .then((reg) => {
            console.log('Service Worker registered for:', reg.scope);
            reg.addEventListener('updatefound', () => {
              const newWorker = reg.installing;
              newWorker.addEventListener('statechange', () => {
                if (newWorker.state === 'activated') {
                  console.log('Service Worker activated - refreshing page');
                  window.location.reload();
                }
              });
            });
          })
          .catch((error) => {
            console.error('Service Worker registration failed:', error);
          });
      });
    }
  </script>
</body>
</html>
