<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
        }

        .header-blue {
            background-color: #1A2F5D;
        }

        .active-tab-blue {
            color: #1A2F5D;
            border-color: #1A2F5D;
        }

        .inactive-tab {
            color: #6B7280;
            border-color: transparent;
        }

        .approved-green {
            background-color: #EBFAEF;
            color: #28A745;
        }

        .visa-holder-blue {
            color: #1A72C9;
        }

        .card-bg {
            background-color: #F7F8FA;
        }

        .rtl-text {
            direction: rtl;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .page-preloader {
            top: 0;
            left: 0;
            z-index: 99999;
            position: fixed;
            height: 100%;
            width: 100%;
            text-align: center;
            background: #fff;
        }

        .preloader-logo,
        .preloader-preview-area {
            top: 60%;
        }

        .preloader-preview-area {
            -webkit-animation-delay: -.2s;
            animation-delay: -.2s;
            -webkit-transform: translateY(100%);
            -ms-transform: translateY(100%);
            transform: translateY(100%);
            margin-top: 10px;
            width: 100%;
            text-align: center;
            position: absolute
        }

        .preloader-logo {
            max-width: 90%;
            -webkit-transform: translateY(-100%);
            -ms-transform: translateY(-100%);
            transform: translateY(-100%);
            margin: -10px auto 0;
            position: relative
        }

        .ball-pulse>div,
        .ball-scale>div,
        .line-scale>div {
            margin: 2px;
            display: inline-block;
            background: #00AEEF;
        }

        .ball-pulse>div {
            width: 15px;
            height: 15px;
            border-radius: 100%;
            -webkit-animation: ball-pulse .75s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: ball-pulse .75s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        .ball-pulse>div:nth-child(1) {
            -webkit-animation-delay: -.36s;
            animation-delay: -.36s
        }

        .ball-pulse>div:nth-child(2) {
            -webkit-animation-delay: -.24s;
            animation-delay: -.24s
        }

        .ball-pulse>div:nth-child(3) {
            -webkit-animation-delay: -.12s;
            animation-delay: -.12s
        }

        @-webkit-keyframes ball-pulse {

            0%,
            80% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }

            45% {
                -webkit-transform: scale(.1);
                transform: scale(.1);
                opacity: .7
            }
        }

        @keyframes ball-pulse {

            0%,
            80% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 1
            }

            45% {
                -webkit-transform: scale(.1);
                transform: scale(.1);
                opacity: .7
            }
        }

        .ball-clip-rotate-pulse {
            position: relative;
            -webkit-transform: translateY(-15px);
            -ms-transform: translateY(-15px);
            transform: translateY(-15px);
            display: inline-block
        }

        .ball-clip-rotate-pulse>div {
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 100%
        }

        .ball-clip-rotate-pulse>div:first-child {
            height: 36px;
            width: 36px;
            top: 7px;
            left: -7px;
            -webkit-animation: ball-clip-rotate-pulse-scale 1s 0s cubic-bezier(.09, .57, .49, .9) infinite;
            animation: ball-clip-rotate-pulse-scale 1s 0s cubic-bezier(.09, .57, .49, .9) infinite
        }

        .ball-clip-rotate-pulse>div:last-child {
            position: absolute;
            width: 50px;
            height: 50px;
            left: -16px;
            top: -2px;
            background: 0 0;
            border: 2px solid;
            -webkit-animation: ball-clip-rotate-pulse-rotate 1s 0s cubic-bezier(.09, .57, .49, .9) infinite;
            animation: ball-clip-rotate-pulse-rotate 1s 0s cubic-bezier(.09, .57, .49, .9) infinite;
            -webkit-animation-duration: 1s;
            animation-duration: 1s
        }

        @-webkit-keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -webkit-transform: rotate(0) scale(1);
                transform: rotate(0) scale(1)
            }

            50% {
                -webkit-transform: rotate(180deg) scale(.6);
                transform: rotate(180deg) scale(.6)
            }

            100% {
                -webkit-transform: rotate(360deg) scale(1);
                transform: rotate(360deg) scale(1)
            }
        }

        @keyframes ball-clip-rotate-pulse-rotate {
            0% {
                -webkit-transform: rotate(0) scale(1);
                transform: rotate(0) scale(1)
            }

            50% {
                -webkit-transform: rotate(180deg) scale(.6);
                transform: rotate(180deg) scale(.6)
            }

            100% {
                -webkit-transform: rotate(360deg) scale(1);
                transform: rotate(360deg) scale(1)
            }
        }

        @-webkit-keyframes ball-clip-rotate-pulse-scale {
            30% {
                -webkit-transform: scale(.3);
                transform: scale(.3)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes ball-clip-rotate-pulse-scale {
            30% {
                -webkit-transform: scale(.3);
                transform: scale(.3)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @-webkit-keyframes square-spin {
            25% {
                -webkit-transform: perspective(100px) rotateX(180deg) rotateY(0);
                transform: perspective(100px) rotateX(180deg) rotateY(0)
            }

            50% {
                -webkit-transform: perspective(100px) rotateX(180deg) rotateY(180deg);
                transform: perspective(100px) rotateX(180deg) rotateY(180deg)
            }

            75% {
                -webkit-transform: perspective(100px) rotateX(0) rotateY(180deg);
                transform: perspective(100px) rotateX(0) rotateY(180deg)
            }

            100% {
                -webkit-transform: perspective(100px) rotateX(0) rotateY(0);
                transform: perspective(100px) rotateX(0) rotateY(0)
            }
        }

        @keyframes square-spin {
            25% {
                -webkit-transform: perspective(100px) rotateX(180deg) rotateY(0);
                transform: perspective(100px) rotateX(180deg) rotateY(0)
            }

            50% {
                -webkit-transform: perspective(100px) rotateX(180deg) rotateY(180deg);
                transform: perspective(100px) rotateX(180deg) rotateY(180deg)
            }

            75% {
                -webkit-transform: perspective(100px) rotateX(0) rotateY(180deg);
                transform: perspective(100px) rotateX(0) rotateY(180deg)
            }

            100% {
                -webkit-transform: perspective(100px) rotateX(0) rotateY(0);
                transform: perspective(100px) rotateX(0) rotateY(0)
            }
        }

        .square-spin {
            display: inline-block
        }

        .square-spin>div {
            width: 50px;
            height: 50px;
            -webkit-animation: square-spin 3s 0s cubic-bezier(.09, .57, .49, .9) infinite;
            animation: square-spin 3s 0s cubic-bezier(.09, .57, .49, .9) infinite
        }

        .cube-transition {
            position: relative;
            -webkit-transform: translate(-25px, -25px);
            -ms-transform: translate(-25px, -25px);
            transform: translate(-25px, -25px);
            display: inline-block
        }

        .cube-transition>div {
            width: 15px;
            height: 15px;
            position: absolute;
            top: -5px;
            left: -5px;
            -webkit-animation: cube-transition 1.6s 0s infinite ease-in-out;
            animation: cube-transition 1.6s 0s infinite ease-in-out
        }

        .cube-transition>div:last-child {
            -webkit-animation-delay: -.8s;
            animation-delay: -.8s
        }

        @-webkit-keyframes cube-transition {
            25% {
                -webkit-transform: translateX(50px) scale(.5) rotate(-90deg);
                transform: translateX(50px) scale(.5) rotate(-90deg)
            }

            50% {
                -webkit-transform: translate(50px, 50px) rotate(-180deg);
                transform: translate(50px, 50px) rotate(-180deg)
            }

            75% {
                -webkit-transform: translateY(50px) scale(.5) rotate(-270deg);
                transform: translateY(50px) scale(.5) rotate(-270deg)
            }

            100% {
                -webkit-transform: rotate(-360deg);
                transform: rotate(-360deg)
            }
        }

        @keyframes cube-transition {
            25% {
                -webkit-transform: translateX(50px) scale(.5) rotate(-90deg);
                transform: translateX(50px) scale(.5) rotate(-90deg)
            }

            50% {
                -webkit-transform: translate(50px, 50px) rotate(-180deg);
                transform: translate(50px, 50px) rotate(-180deg)
            }

            75% {
                -webkit-transform: translateY(50px) scale(.5) rotate(-270deg);
                transform: translateY(50px) scale(.5) rotate(-270deg)
            }

            100% {
                -webkit-transform: rotate(-360deg);
                transform: rotate(-360deg)
            }
        }

        .ball-scale>div {
            border-radius: 100%;
            height: 60px;
            width: 60px;
            -webkit-animation: ball-scale 1s 0s ease-in-out infinite;
            animation: ball-scale 1s 0s ease-in-out infinite
        }

        @-webkit-keyframes ball-scale {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }

        @keyframes ball-scale {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }

        .line-scale>div {
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            width: 5px;
            height: 50px;
            border-radius: 2px
        }

        .line-scale>div:nth-child(1) {
            -webkit-animation: line-scale 1s -.5s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: line-scale 1s -.5s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        .line-scale>div:nth-child(2) {
            -webkit-animation: line-scale 1s -.4s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: line-scale 1s -.4s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        .line-scale>div:nth-child(3) {
            -webkit-animation: line-scale 1s -.3s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: line-scale 1s -.3s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        .line-scale>div:nth-child(4) {
            -webkit-animation: line-scale 1s -.2s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: line-scale 1s -.2s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        .line-scale>div:nth-child(5) {
            -webkit-animation: line-scale 1s -.1s infinite cubic-bezier(.2, .68, .18, 1.08);
            animation: line-scale 1s -.1s infinite cubic-bezier(.2, .68, .18, 1.08)
        }

        @-webkit-keyframes line-scale {

            0%,
            100% {
                -webkit-transform: scaley(1);
                transform: scaley(1)
            }

            50% {
                -webkit-transform: scaley(.4);
                transform: scaley(.4)
            }
        }

        @keyframes line-scale {

            0%,
            100% {
                -webkit-transform: scaley(1);
                transform: scaley(1)
            }

            50% {
                -webkit-transform: scaley(.4);
                transform: scaley(.4)
            }
        }

        .ball-scale-multiple {
            position: relative;
            -webkit-transform: translateY(30px);
            -ms-transform: translateY(30px);
            transform: translateY(30px);
            display: inline-block
        }

        .ball-scale-multiple>div {
            border-radius: 100%;
            position: absolute;
            left: -30px;
            top: 0;
            opacity: 0;
            margin: 0;
            width: 50px;
            height: 50px;
            -webkit-animation: ball-scale-multiple 1s 0s linear infinite;
            animation: ball-scale-multiple 1s 0s linear infinite
        }

        .ball-scale-multiple>div:nth-child(2),
        .ball-scale-multiple>div:nth-child(3) {
            -webkit-animation-delay: -.2s;
            animation-delay: -.2s
        }

        @-webkit-keyframes ball-scale-multiple {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0
            }

            5% {
                opacity: 1
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }

        @keyframes ball-scale-multiple {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0);
                opacity: 0
            }

            5% {
                opacity: 1
            }

            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }

        .ball-pulse-sync {
            display: inline-block
        }

        .ball-pulse-sync>div {
            width: 15px;
            height: 15px;
            border-radius: 100%;
            margin: 2px;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            display: inline-block
        }

        .ball-pulse-sync>div:nth-child(1) {
            -webkit-animation: ball-pulse-sync .6s -.21s infinite ease-in-out;
            animation: ball-pulse-sync .6s -.21s infinite ease-in-out
        }

        .ball-pulse-sync>div:nth-child(2) {
            -webkit-animation: ball-pulse-sync .6s -.14s infinite ease-in-out;
            animation: ball-pulse-sync .6s -.14s infinite ease-in-out
        }

        .ball-pulse-sync>div:nth-child(3) {
            -webkit-animation: ball-pulse-sync .6s -70ms infinite ease-in-out;
            animation: ball-pulse-sync .6s -70ms infinite ease-in-out
        }

        @-webkit-keyframes ball-pulse-sync {
            33% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            66% {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }
        }

        @keyframes ball-pulse-sync {
            33% {
                -webkit-transform: translateY(10px);
                transform: translateY(10px)
            }

            66% {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px)
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0)
            }
        }

        .transparent-circle {
            display: inline-block;
            border-top: .5em solid rgba(255, 255, 255, .2);
            border-right: .5em solid rgba(255, 255, 255, .2);
            border-bottom: .5em solid rgba(255, 255, 255, .2);
            border-left: .5em solid #fff;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation: transparent-circle 1.1s infinite linear;
            animation: transparent-circle 1.1s infinite linear;
            width: 50px;
            height: 50px;
            border-radius: 50%
        }

        .transparent-circle:after {
            border-radius: 50%;
            width: 10em;
            height: 10em
        }

        @-webkit-keyframes transparent-circle {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes transparent-circle {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        .ball-spin-fade-loader {
            position: relative;
            top: -10px;
            left: -10px;
            display: inline-block
        }

        .ball-spin-fade-loader>div {
            width: 15px;
            height: 15px;
            border-radius: 100%;
            margin: 2px;
            position: absolute;
            -webkit-animation: ball-spin-fade-loader 1s infinite linear;
            animation: ball-spin-fade-loader 1s infinite linear
        }

        .ball-spin-fade-loader>div:nth-child(1) {
            top: 25px;
            left: 0;
            animation-delay: -.84s;
            -webkit-animation-delay: -.84s
        }

        .ball-spin-fade-loader>div:nth-child(2) {
            top: 17.05px;
            left: 17.05px;
            animation-delay: -.72s;
            -webkit-animation-delay: -.72s
        }

        .ball-spin-fade-loader>div:nth-child(3) {
            top: 0;
            left: 25px;
            animation-delay: -.6s;
            -webkit-animation-delay: -.6s
        }

        .ball-spin-fade-loader>div:nth-child(4) {
            top: -17.05px;
            left: 17.05px;
            animation-delay: -.48s;
            -webkit-animation-delay: -.48s
        }

        .ball-spin-fade-loader>div:nth-child(5) {
            top: -25px;
            left: 0;
            animation-delay: -.36s;
            -webkit-animation-delay: -.36s
        }

        .ball-spin-fade-loader>div:nth-child(6) {
            top: -17.05px;
            left: -17.05px;
            animation-delay: -.24s;
            -webkit-animation-delay: -.24s
        }

        .ball-spin-fade-loader>div:nth-child(7) {
            top: 0;
            left: -25px;
            animation-delay: -.12s;
            -webkit-animation-delay: -.12s
        }

        .ball-spin-fade-loader>div:nth-child(8) {
            top: 17.05px;
            left: -17.05px;
            animation-delay: 0s;
            -webkit-animation-delay: 0s
        }

        @-webkit-keyframes ball-spin-fade-loader {
            50% {
                opacity: .3;
                -webkit-transform: scale(.4);
                transform: scale(.4)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }

        @keyframes ball-spin-fade-loader {
            50% {
                opacity: .3;
                -webkit-transform: scale(.4);
                transform: scale(.4)
            }

            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1)
            }
        }
    </style>
</head>

<body>
    <div id="page-preloader" class="page-preloader">
        <img class="preloader-logo" src="{{ asset('images/kuwaitappslogo-r.png') }}" width="128">
        <div class="preloader-preview-area">
            <div class="ball-pulse">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div class="max-w-md mx-auto bg-[#F7F8FA] shadow h-screen">
        <!-- Header -->
        <div class="header-blue text-white px-4 py-3 flex items-center">
            <button class="mr-2" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <h1 class="text-base font-medium">Visa Details</h1>
        </div>

        <!-- Tabs -->
        <div class="flex border-b border-gray-200">
            <button id="details-tab" onclick="switchTab('details')"
                class="flex-1 py-3 px-4 text-sm font-medium active-tab-blue border-b-2 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                Details
            </button>
            <button id="qr-tab" onclick="switchTab('qr')"
                class="flex-1 py-3 px-4 text-sm font-medium inactive-tab border-b-2 border-transparent flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="7" y1="7" x2="7" y2="7"></line>
                    <line x1="17" y1="7" x2="17" y2="7"></line>
                    <line x1="7" y1="12" x2="7" y2="12"></line>
                    <line x1="17" y1="12" x2="17" y2="12"></line>
                    <line x1="7" y1="17" x2="7" y2="17"></line>
                    <line x1="17" y1="17" x2="17" y2="17"></line>
                </svg>
                QR Code
            </button>
        </div>

        <!-- Main Content -->
        <div class="p-4">
            <!-- Details Tab Content -->
            <div id="details-content" class="tab-content active">
                <!-- Visa Status Card -->
                <div class="card-bg rounded-lg p-4 mb-4">
                    <div class="flex justify-between items-start">
                        <div>
                            <div class="text-xs text-gray-500">Visa Number</div>
                            <div class="text-sm font-medium">{{ $evisaApps->visa_number }}</div>
                        </div>
                        <div>
                            <div class="text-xs text-right text-gray-500">Visa Status</div>
                            @php
                                $status = $evisaApps->visa_status ?? 'change visa status';
                            
                                // Define color map
                                $statusMap = [
                                    'approved' => ['bg' => '#16a34a', 'text' => 'white'], // Tailwind green-600
                                    'awaiting approval' => ['bg' => '#facc15', 'text' => 'black'], // Tailwind yellow-400
                                    'pending approved' => ['bg' => '#dc2626', 'text' => 'white'], // Tailwind red-600
                                ];
                            
                                // Fallback color if status not found
                                $currentStatus = $statusMap[strtolower($status)] ?? [
                                    'bg' => '#9ca3af', // Tailwind gray-400
                                    'text' => 'white',
                                ];
                            @endphp
                            
                            <!-- Status Badge with inline background -->
                            <div
                                style="background-color: {{ $currentStatus['bg'] }}; color: {{ $currentStatus['text'] }};"
                                class="px-3 py-1 rounded-full text-xs font-medium inline-block mt-1">
                                {{ ucfirst($status) }}
                            </div>
                        
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <div class="text-xs text-gray-500">Visa Type</div>
                                <div class="text-sm font-medium">{{ $evisaApps->visa_type_en }}</div>
                            </div>
                            <div>
                                <div class="text-xs text-gray-500">Visa Purpose</div>
                                <div class="text-sm font-medium">{{ $evisaApps->visa_purpose }}</div>
                            </div>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div>
                                <div class="text-xs text-gray-500">Place of Issue</div>
                                <div class="text-sm font-medium rtl-text">{{ $evisaApps->place_of_issue }}</div>
                            </div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Date of Issue</div>
                                <div class="text-sm font-medium">{{ $evisaApps->issue_date }}</div>
                            </div>
                        </div>

                        <div class="mt-3 grid grid-cols-2 gap-3">
                            <div></div>
                            <div class="text-right">
                                <div class="text-xs text-gray-500">Date of Expiry</div>
                                <div class="text-sm font-medium">{{ $evisaApps->expiry_date }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visa Holder Details -->
                <div>
                    <div class="visa-holder-blue text-sm font-medium mb-4">Visa Holder Details</div>

                    <div class="divide-y divide-gray-200">
                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Full Name</div>
                            <div class="text-sm font-medium">{{ $evisaApps->full_name_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">MOI Reference</div>
                            <div class="text-sm font-medium">{{ $evisaApps->moi_reference }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Occupation</div>
                            <div class="text-sm font-medium">{{ $evisaApps->occupation_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Nationality</div>
                            <div class="text-sm font-medium uppercase">{{ $evisaApps->nationality_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Gender</div>
                            <div class="text-sm font-medium">{{ $evisaApps->gender }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Passport No</div>
                            <div class="text-sm font-medium">{{ $evisaApps->passport_no }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Passport Type</div>
                            <div class="text-sm font-medium">{{ $evisaApps->passport_type_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Date of Birth</div>
                            <div class="text-sm font-medium">{{ $evisaApps->dob }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Place of Issue</div>
                            <div class="text-sm font-medium rtl-text">{{ $evisaApps->passport_issue_place }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Date of Expiry</div>
                            <div class="text-sm font-medium">{{ $evisaApps->passport_expiry_date }}</div>
                        </div>
                    </div>
                </div>



                <div>
                    <div class="visa-holder-blue text-sm font-medium mb-4">Employer / Family Breadwinner Details</div>

                    <div class="divide-y divide-gray-200">
                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">Full Name</div>
                            <div class="text-sm font-medium">{{ $evisaApps->full_name_en }}</div>
                        </div>

                        <div class="py-2.5 flex justify-between">
                            <div class="text-xs text-gray-500">MOI Reference</div>
                            <div class="text-sm font-medium">{{ $evisaApps->moi_reference }}</div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- QR Code Tab Content -->
            <div id="qr-content" class="tab-content h-scree">
                <div class="flex flex-col items-center justify-center py-8">
                    <div class="text-center mb-6">
                        <p class="text-sm text-blue-500 font-bold">Scan this QR code to verify visa details</p>
                    </div>
                    <div class="w-80 h-80 flex items-center justify-center mb-6">
                        <!-- QR Code Placeholder with Thicker Border -->
                        <img src="data:image/png;base64,{{ $qrCode }}" alt="Visa QR Code" class="w-80 h-80">
                    </div>
                </div>
            </div>



            <!-- No Data State (Hidden by default) -->
            <div id="no-data" class="hidden text-center py-12">
                <p class="text-gray-600 text-sm">No data found</p>
            </div>
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
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });

            // Remove active class from all tabs
            document.getElementById('details-tab').classList.remove('active-tab-blue');
            document.getElementById('qr-tab').classList.remove('active-tab-blue');

            document.getElementById('details-tab').classList.add('inactive-tab');
            document.getElementById('qr-tab').classList.add('inactive-tab');

            // Show selected tab content and activate the tab
            if (tabName === 'details') {
                document.getElementById('details-content').classList.add('active');
                document.getElementById('details-tab').classList.add('active-tab-blue');
                document.getElementById('details-tab').classList.remove('inactive-tab');
            } else if (tabName === 'qr') {
                document.getElementById('qr-content').classList.add('active');
                document.getElementById('qr-tab').classList.add('active-tab-blue');
                document.getElementById('qr-tab').classList.remove('inactive-tab');
            }
        }

        // Check if data exists and show appropriate content
        function checkData() {
            // This is a simplified version. In a real app, you would check for actual data
            const hasData = true; // Set to false to test the "No data found" state

            if (!hasData) {
                document.getElementById('details-content').classList.remove('active');
                document.getElementById('qr-content').classList.remove('active');
                document.getElementById('no-data').classList.remove('hidden');
            }
        }

        // Initialize the page
        window.onload = function() {
            checkData();
        };
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById("page-preloader").classList.add("hidden");
            }, 1000);
        });
    </script>
</body>

</html>
