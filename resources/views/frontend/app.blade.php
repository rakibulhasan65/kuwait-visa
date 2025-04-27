<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#082A64"/>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Kuwait Visa">
    <link rel="manifest" href="{{ route('pwa.manifest') }}">
    <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
    <title>{{ $setting['site_title'] ?? 'Kuwait eVisa System' }}</title>
    <meta name="description" content="{{ $setting['meta_description'] ?? 'Official Kuwait electronic visa verification system' }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

 <link rel="icon" type="image/png" sizes="192x192" href="{{ asset($setting['favicon'] ?? '') }}">


    {{-- Cached Styles --}}
    @include('frontend.includes.styles')
    
    <style>

        :root {
            --safe-area-top: env(safe-area-inset-top);
            --safe-area-bottom: env(safe-area-inset-bottom);
        }
        
        @media (display-mode: standalone) {
            body { 
                padding-top: var(--safe-area-top);
                padding-bottom: var(--safe-area-bottom);
            }
        }
    </style>
</head>


<body>
<?php
function getKuwaitTime() {
    date_default_timezone_set('Asia/Kuwait');
    $url = 'https://timeapi.io/api/time/current/zone?timeZone=Asia/Kuwait';
    
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => ['accept: application/json'],
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 3
    ]);
    
    try {
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        
        if ($httpCode !== 200) throw new Exception("API Error: HTTP $httpCode");
        if (!$response) throw new Exception(curl_error($curl));
        
        $data = json_decode($response, true);
        
        if (!isset($data['dateTime'])) {
            throw new Exception("Invalid API response format");
        }
        
        return (new DateTime($data['dateTime']))->format('d-m-Y h:i:s A');

    } catch (Exception $e) {
        return date('d-m-Y h:i:s A');
    } finally {
        curl_close($curl);
    }
}

$kuwaitTime = getKuwaitTime();
?>
    <div class="date-bar">
        <div class="container">
            <i class="fas fa-calendar-alt"></i> 
            <span id="datetime"><?= htmlspecialchars($kuwaitTime) ?></span>
        </div>
    </div>
    <div class="title-container" style="justify-content:space-between">
    <a href="{{ route('home') }}"><img src="{{ asset($setting['left_logo']) }}" alt="Left Image"></a>

        <div class="title-section" style="overflow: hidden;">
            {{ $setting['site_title'] ?? 'Kuwait Employment Visa Information - Kuwait' }}
        </div>
        <a href="{{ route('home') }}"><img src="{{ asset($setting['right_logo']) }}" alt="Right Image"></a>
    </div>

    <script>
        function refreshTime() {
            fetch(window.location.href, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Cache-Control': 'no-cache'
                }
            })
            .then(response => response.text())
            .then(text => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(text, 'text/html');
                const newTime = doc.getElementById('datetime').textContent;
                document.getElementById('datetime').textContent = newTime;
            });
        }
        
        setInterval(refreshTime, 30000);
    </script>


    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="#">Home</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('about') }}"
                            class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="#">About
                            us</a></li>
                    <li class="nav-item">
                        <a href="{{ route('visa-information') }}"
                            class="nav-link {{ request()->routeIs(['visa-information', 'visa-inquiry', 'visa-email']) ? 'active' : '' }}"
                            href="#">Visa Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('contact') ? 'active' : '' }}"
                            href="{{ route('contact') }}">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            @yield('content')
        </div>

        <!-- Install Modal -->
      <div class="modal fade" id="installModal" tabindex="-1" aria-labelledby="installModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body d-flex flex-column align-items-center">
                        <p id="install-text" class="text-center" style="font-size: 1rem; color: #0000FF;">
                            The user must install <span style="font-weight: bold;color: #0000FF;">Kuwait Visa</span> app
                            before entering this website.
                        </p>
                        <button id="install-pwa-btn" class="btn btn-light mt-3"
                            style="border: 2px solid blue; background-color: transparent; font-weight: bold;">
                            Install
                            <img src="{{ asset('images/kuwaitappslogo-r.png') }}" width="40px" alt="kuwait app">
                            app
                        </button>
                    </div>
                </div>
            </div>
        </div>



    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 footer-section">
                    <h3 class="fw-bold feature-title">Feature</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About us</a></li>
                        <li><a href="{{ route('visa-information') }}">Visa Service</a></li>
                        <li><a href="{{ route('contact') }}">Contact us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-section">
                    <h3 class="fw-bold feature-title">Physical Location</h3>
                    <ul>
                        <li>{!! nl2br(e($setting['address'])) !!}</li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-section text-lg-end text-md-center">
                    <a href="{{ route('visa-email') }}" class="btn-email text-dark">
                        Email Us <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <hr class="footer-hr m-0" />
            <div class="social-icons">
                @php
                    $socialLinks = json_decode($setting['social_links'], true);
                @endphp
                <a href="{{ $socialLinks[0]['url'] }}"><img src="{{ asset('images/icons8-instagram-100.png') }}"
                        width="40px" alt="Instagram" class="social-img"></a>
                <a href="{{ $socialLinks[1]['url'] }}"><img src="{{ asset('images/icons8-x-50.png') }}" width="40px"
                        alt="X" class="social-img"></a>
                <a href="{{ $socialLinks[2]['url'] }}"><img src="{{ asset('images/icons8-youtube-48.png') }}"
                        width="40px" alt="YouTube" class="social-img"></a>
                <a href="{{ $socialLinks[3]['url'] }}"><img src="{{ asset('images/icons8-facebook-48.png') }}"
                        alt="Facebook" width="40px" class="social-img"></a>
            </div>
            <div class="copyright">
                <strong style="font-weight: bold">All rights reserved to the Public Authority of Manpower ©</strong>
            </div>
        </div>
    </div>

    @include('frontend.includes.scripts')
    <script>
function updateDateTime() {
    let now = new Date();
    
    let day = String(now.getDate()).padStart(2, '0');
    let month = String(now.getMonth() + 1).padStart(2, '0');
    let year = now.getFullYear();
    
    let hour = String(now.getHours() % 12 || 12).padStart(2, '0');
    let minute = String(now.getMinutes()).padStart(2, '0');
    let second = String(now.getSeconds()).padStart(2, '0');
    let ampm = now.getHours() >= 12 ? 'PM' : 'AM';
    
    let formattedDate = `${day}-${month}-${year} ${hour}:${minute}:${second} ${ampm}`;
    
    document.getElementById('datetime').innerHTML = formattedDate;
}

    </script>

    {{-- <script>
        document.addEventListener('copy', function(event) {
            event.preventDefault();
            alert('Copying content is disabled.');
        });

        document.addEventListener('cut', function(event) {
            event.preventDefault();
            alert('Cutting content is disabled.');
        });

        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey && (event.key === 'c' || event.key === 'x')) {
                event.preventDefault();
                alert('Copy & Cut functions are disabled.');
            }
        });
    </script> --}}

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Only register Service Worker once
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/sw.js', { scope: '/kuwait-evisa-verification/' })
                    .then(reg => {
                        console.log('✅ Service Worker registered for:', reg.scope);
        
                        reg.addEventListener('updatefound', () => {
                            const newWorker = reg.installing;
                            newWorker.addEventListener('statechange', () => {
                                if (newWorker.state === 'installed' && navigator.serviceWorker.controller) {
                                    // Ask user to refresh when a new SW is available
                                    if (confirm("A new version is available. Reload now?")) {
                                        window.location.reload();
                                    }
                                }
                            });
                        });
                    })
                    .catch(error => {
                        console.error('❌ Service Worker registration failed:', error);
                    });
            }
        
            let deferredPrompt;
            const installButton = document.getElementById("install-pwa-btn");
            const iosInstructions = document.getElementById("ios-instructions");
            const modalElement = document.getElementById("installModal");
            let modal;
        
            function isIos() {
                return /iPhone|iPad|iPod/.test(navigator.userAgent) && !window.MSStream;
            }
        
            function isInStandaloneMode() {
                return (window.navigator.standalone === true);
            }
        
            if (modalElement) {
                modal = new bootstrap.Modal(modalElement);
        
                if (isIos() && !isInStandaloneMode()) {
                    if (iosInstructions) {
                        iosInstructions.style.display = "block";
                    }
                    modal.show();
                }
        
                window.addEventListener("beforeinstallprompt", (e) => {
                    e.preventDefault();
                    deferredPrompt = e;
                    if (installButton) {
                        installButton.style.display = "block";
                    }
                    modal.show();
                });
        
                if (installButton) {
                    installButton.addEventListener("click", () => {
                        // alert("Please click the 'Share' button in Safari and select 'Add to Home Screen'.");
                        if (deferredPrompt) {
                            deferredPrompt.prompt();
                            deferredPrompt.userChoice.then(() => {
                                deferredPrompt = null;
                                modal.hide();
                            });
                        }
                    });
                }
            }
        
            // Handle PWA redirects
            function isInStandalonePWA() {
                return window.matchMedia('(display-mode: standalone)').matches ||
                       window.navigator.standalone ||
                       document.referrer.includes('android-app://');
            }
        
            function handlePWARedirect() {
                const currentPath = window.location.pathname;
        
                if (isInStandalonePWA() && 
                   (currentPath === '/public/' || currentPath === '/public')) {
                    window.location.href = 'https://visa-kuwait.online/kuwait-evisa-verification';
                }
            }
        
            handlePWARedirect();
        });
        </script>


</body>

</html>
