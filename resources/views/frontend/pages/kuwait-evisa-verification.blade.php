<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>{{ $setting['site_title'] ?? 'Kuwait eVisa System' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover, maximum-scale=1.0, user-scalable=no" />
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
      font-display: swap;
    }
    @font-face {
      font-family: "Helvetica Neue Arabic 45 Light";
      src: url("../../../fonts/HelveticaNeueLTArabic-Light.ttf") format("opentype");
      font-weight: normal;
      font-style: normal;
      font-display: swap;
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
  width: 92% !important;
  max-width: 500px !important;
  margin: 0 auto !important;
  position: sticky !important;
  top: 0 !important;
  z-index: 30 !important;
}
    .hamburger-svg {
      height: 2rem !important;
      color: #fff !important;
    }

    .sidebar {
      background-color: white !important;
      width: 280px !important;
      height: 100vh !important;
      position: fixed !important;
      top: 0 !important;
      left: 0 !important;
      z-index: 50 !important;
      transform: translateX(-100%) !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: space-between !important;
      overflow: auto !important;
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
      max-width: 90% !important;
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
    
    /* Mobile-first container for all screen sizes */
    .centered-content-wrapper {
      width: 92% !important;
      max-width: 500px !important;
      margin: 0 auto !important;
      position: relative !important;
    }
    
    /* Header responsive adjustments - Updated to match app-banner */
    .header-content {
      width: 92% !important;
      max-width: 500px !important;
      margin: 0 auto !important;
      display: flex !important;
      align-items: center !important;
      padding: 0.25rem 0 !important;
      justify-content: space-between !important;
    }
    
    /* Ensure hamburger button alignment matches other elements */
    #hamburger-button {
      padding: 0.5rem !important;
      margin-left: -0.5rem !important;
    }
    
    .content-container {
      padding: 1rem;
      overflow-y: visible !important;
    }
    
    /* Banner container - mobile-like on desktop, full width on mobile */
    .banner-container {
      width: 92% !important;
      max-width: 500px !important;
      margin: 0 auto !important;
      text-align: center !important;
    }
    
    /* Make banner full width only on mobile */
    @media (max-width: 640px) {
      header {
    	width: 100% !important;
    	max-width: 100% !important;
  	  }
      .banner-container {
        width: 100% !important;
        max-width: 100% !important;
      }
      
    }
    
    h2.verify-title {
      font-family: "Helvetica Neue Arabic 75 Bold" !important;
      font-weight: 700 !important;
      font-size: 18px !important;
      color: #2E68BF !important;
      margin-bottom: 0rem !important;
    }
    
    /* Added margin to Residency Inquiry heading */
    h2.verify-title.residency-title {
      margin-top: 1.5rem !important;
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
      //margin-bottom: 1rem !important;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
      min-height: 6.5rem !important; /* Reduced by 10px from 6.5rem */
      height: 100% !important;
      transition: transform 0.2s ease, box-shadow 0.2s ease !important;
    }
    .card:active {
      transform: scale(0.98) !important;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
    }
    
    .card-narrow {
      width: 100% !important;
    }
    
    .card img {
      width:auto !important;
     
      object-fit: contain !important;
      
    }
    
    .blue-card {
      background-color: #0D3C91 !important;
      color: white !important;
      border-radius: 0.5rem !important;
      padding: 1rem !important;
      text-align: center !important;
      margin-bottom: 0rem !important;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1) !important;
      transition: transform 0.2s ease, box-shadow 0.2s ease !important;
      
     
    }
    .blue-card:active {
      transform: scale(0.98) !important;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
    }
    
    .blue-card:hover {
      box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important;
    }
    
    .blue-card img {
      width: auto !important;
      height: 85px !important;
      margin: 0 auto 0.75rem !important;
    }

    .blue-button, .verification-button {
      background-color: white !important;
      color: grey !important;
      border-radius: 0.5rem !important;
      padding: 0.75rem 1rem !important;
      font-family: "Helvetica Neue Arabic 75" !important;
      border: none !important;
      width: 100% !important;
      font-size: 16px !important;
      cursor: pointer !important;
      transition: background-color 0.2s ease !important;
    }
    .blue-button:hover, .verification-button:hover {
      background-color: #f0f2f7 !important;
    }
    .blue-button:active, .verification-button:active {
      background-color: #e0e4f0 !important;
      transform: scale(0.98) !important;
    }

    .app-banner {
      display: block !important;
      width: 100% !important;
      height: auto !important;
      object-fit: contain !important;
      max-width: 100% !important;
    }

    .touch-target {
      min-height: 44px !important;
      min-width: 44px !important;
      display: flex !important;
      align-items: center !important;
    }

    .grid-cols-2 {
      display: grid !important;
      grid-template-columns: repeat(2, 1fr) !important;
      gap: 1rem !important;
      margin-top: 1rem !important; /* Increased margin from top */
    }
    

    /* Mobile and small screens */
    @media (max-width: 400px) {
      .grid-cols-2 {
        gap: 0.75rem !important;
      }
      .card {
        min-height: 5rem !important; /* Reduced from 5.5rem */
        padding: 0.75rem !important;
      }
      .content-container {
        padding: 0.75rem !important;
      }
      .card img {
        height: 55px !important; /* Reduced from 45px */
      }
      h2.verify-title {
        font-size: 16px !important;
      }
      .header-content {
        padding: 0.1rem 0 !important;
      }
    }

    /* Extra small mobile screens */
    @media (max-width: 350px) {
      .centered-content-wrapper {
        width: 94% !important;
      }
      .header-content {
        width: 94% !important;
      }
      .grid-cols-2 {
        grid-template-columns: 1fr !important;
      }
      .card {
        min-height: 4rem !important; /* Reduced from 4.5rem */
      }
      .card img {
        height: 55px !important; /* Reduced from 40px */
      }
      h2.verify-title {
        font-size: 15px !important;
      }
      .content-container {
        padding: 0.5rem !important;
      }
      p.text-gray-600 {
        font-size: 12px !important;
      }
      .header-content {
        padding: 0rem 0 !important;
      }
    }

    /* Support for iOS devices */
    @supports (-webkit-touch-callout: none) {
      html, body {
        height: -webkit-fill-available !important;
        -webkit-overflow-scrolling: touch !important;
      }
      .main-container {
        min-height: -webkit-fill-available !important;
      }
      .sidebar {
        height: -webkit-fill-available !important;
      }
    }

    /* Fix for notched phones */
    @supports (padding-top: env(safe-area-inset-top)) {
      body {
        padding-top: env(safe-area-inset-top) !important;
        padding-bottom: env(safe-area-inset-bottom) !important;
        padding-left: env(safe-area-inset-left) !important;
        padding-right: env(safe-area-inset-right) !important;
      }
      .sidebar {
        padding-top: env(safe-area-inset-top) !important;
        padding-bottom: env(safe-area-inset-bottom) !important;
      }
    }

    /* Prevent text size adjustment on orientation change */
    html {
      -webkit-text-size-adjust: 100% !important;
      text-size-adjust: 100% !important;
    }
  </style>
</head>
<body>
  <div id="splash-screen">
    <img id="splash-image-1" src="{{ asset('images/splash-1.png') }}" alt="Kuwait Visa Logo" />
    <img id="splash-image-2" src="{{ asset('images/app-splash.png') }}" alt="Kuwait Visa Splash" />
  </div>
  
  <header class="w-full">
    <div class="header-content">
      <button id="hamburger-button" class="focus:outline-none touch-target">
        <img src="{{ asset('images/hamburger-menu.svg') }}" alt="Menu" class="hamburger-svg" />
      </button>
    </div>
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
    <!-- Banner container - mobile-like on desktop, full width on mobile -->
    <div class="banner-container">
      <img src="{{ asset('images/apps-banner.png') }}" alt="Kuwait Visa Logo" class="app-banner" />
    </div>
    
    <div class="centered-content-wrapper">
      <div class="content-container" style="padding-bottom:0px !important">
        <h2 class="verify-title mt-2">Verify the Visa</h2>
        <p class="text-gray-600 text-sm">Verify visa that issued by the Ministry of Interior</p>
        <div class="grid-cols-2">
          <a href="{{ route('web-app-visa-inquiries') }}" class="block">
            <div class="card card-narrow p-4 flex flex-col items-start">
              <div class="text-blue-900">
                <img class="w-20 h-20" src="{{ asset('images/user-icon.png') }}" alt="Inquiry Icon" />
              </div>
<p class="font-bold text-gray-800 mb-1" style="font-weight: 700; 
                                               font-size: 15px; font-family: 'Helvetica Neue Arabic 75 Bold', sans-serif; 
                                               color: #4e5054; letter-spacing: -0.01em; text-shadow: 0 0 0.01px #6B7280;">
  Inquiry</p>              
              <p class="text-xs text-gray-500">Visa Inquiries</p>
            </div>
          </a>
          <a href="{{ route('visa-verification-scan') }}" class="block">
            <div class="card card-narrow p-4 flex flex-col items-start">
              <div class="text-blue-900">
                <img class="w-200 h-20" src="{{ asset('images/barcode-scaner-icon.png') }}" alt="Verify Icon" />
              </div>
              <p class="font-bold text-gray-800 mb-1" style="font-weight: 900; 
                                               font-size: 15px; font-family: 'Helvetica Neue Arabic 75 Bold', sans-serif; 
                                               color: #4e5054; letter-spacing: -0.01em; text-shadow: 0 0 0.01px #6B7280;">Verify</p>
              <p class="text-xs text-gray-500">Visa Verification</p>
            </div>
          </a>
        </div>
      </div>
      
      <div class="content-container" style="padding-top:0px !important; padding-bottom:0px;">
        <h2 class="verify-title residency-title">Residency Inquiry</h2>
        <p class="text-gray-600 text-sm">Inquire the status of the residency</p>
        <div class="grid-cols-2">
          <a href="{{ route('residency-inquiries') }}" class="block">
            <div class="card card-narrow flex flex-col items-start">
              <div class="text-blue-900">
                <img class="w-20 h-20" src="{{ asset('images/residency-icon.png') }}" alt="Inquiry Icon" />
              </div>
              <p class="font-bold text-gray-800 mb-1" style="font-weight: 900; 
                                               font-size: 15px; font-family: 'Helvetica Neue Arabic 75 Bold', sans-serif; 
                                               color: #4e5054; letter-spacing: -0.01em; text-shadow: 0 0 0.01px #6B7280;">Inquiry</p>
              <p class="text-xs text-gray-500">Residency Inquiries</p>
            </div>
          </a>
          <div class="block" style="visibility: hidden;">
            <div class="card card-narrow p-4 flex flex-col items-start"></div>
          </div>
        </div>
      </div>
      
      <div class="content-container">
        <h2 class="verify-title">Verify the Documents and Certificates</h2>
        <p class="text-gray-600 text-sm">Verify the documents and certificates issued by the Ministry of Interior</p>
        
        <div class="flex justify-center w-full">
          <div class="blue-card w-full">
            <div class="flex justify-center">
              <img class="w-16 h-16" src="{{ asset('images/qr-code.png') }}" alt="MOI Logo" />
            </div>
            <p class="font-semibold mb-4 text-center">Verify the Documents and Certificates</p>
            <a href="{{ route('home-visa-verification-scan') }}" class="block">
              <button class="blue-button">Verification</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      initializeSplashScreen();
      initializeSidebar();
      initializeBodyClickToCloseSidebar();
      handleOrientationChange();
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
      
      // Handle both click and touch events
      hamburgerButton.addEventListener('click', function(e) {
        e.preventDefault();
        openSidebar();
      });
      
      overlay.addEventListener('click', function(e) {
        e.preventDefault();
        closeSidebar();
      });
      
      // Add touch-specific handlers
      hamburgerButton.addEventListener('touchend', function(e) {
        e.preventDefault();
        openSidebar();
      }, {passive: false});
      
      overlay.addEventListener('touchend', function(e) {
        e.preventDefault();
        closeSidebar();
      }, {passive: false});
      
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
      
      // Add touch handler
      document.addEventListener('touchend', function(e) {
        if (
          window.sidebar && 
          window.sidebar.classList.contains('sidebar-visible') &&
          !window.sidebar.contains(e.target) &&
          !window.hamburgerButton.contains(e.target)
        ) {
          window.closeSidebar();
        }
      }, {passive: true});
    }

    // Handle orientation change
    function handleOrientationChange() {
      window.addEventListener('orientationchange', function() {
        // Force layout recalculation
        setTimeout(function() {
          window.scrollTo(0, 0);
          
          // Adjust sidebar height if needed
          const sidebar = document.getElementById('sidebar');
          if (sidebar) {
            sidebar.style.height = window.innerHeight + 'px';
          }
        }, 100);
      });
    }

    // PWA service worker registration
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
    
    // Add passive event listeners to improve scrolling performance
    document.addEventListener('touchstart', function(){}, {passive: true});
    document.addEventListener('touchmove', function(){}, {passive: true});
    
    // Add hover effects for desktop users
    if (!('ontouchstart' in window)) {
      const cards = document.querySelectorAll('.card, .blue-card');
      cards.forEach(card => {
        card.classList.add('hover:shadow-lg');
      });
    }
  </script>
</body>
</html>