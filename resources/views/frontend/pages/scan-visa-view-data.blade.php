<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuwait Visa Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Noto Sans Arabic', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .document-container {
            width: 595px;
            height: 842px;
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .ministry-header {
            background-color: #ffffff;
            text-align: center;
            padding: 15px;
        }

        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 10px;
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
        <!-- Ministry Header -->
        <div class="header-blue bg-green-800 text-white px-4 py-3 flex justify-start">
            <button class="mr-2" onclick="window.history.back();">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
        </div>
        <div class="ministry-header flex flex-row justify-between items-center">
            <h3 class="text-dark text-sm font-bold">دولة الكويت <br> وزارة الداخلية </h3>
            <div class="flex justify-center items-center my-2">
                <img src="{{ asset('images/scanercode.png') }}" alt="Ministry Logo" class="w-16 h-16">
            </div>
            <h3 class="text-dark text-sm font-bold">State of Kuwait <br>
                Ministry of Interior </h3>
        </div>


        <div class="text-center bg-gray-200 p-3">
            <h3 class="text-blue-500 text-xs font-bold">الموقع الرسمي للتحقق من الوثائق والشهادات الصادرة من وزارة
                الداخلية</h3>
            <h3 class="text-blue-500 text-xs font-bold">The official website to verify documents and certificates issued
                by Ministry of Interior</h3>

        </div>

        <!-- Document Content -->
        <div class="p-6 flex-grow">
            @if ($visa->visa_status == 'approved')
                <div class="text-center mb-6 pb-4 text-green-700">
                    {{-- verify icon border circle  --}}
                    <div class="flex justify-center items-center my-2">
                        <img src="{{ asset('images/verify-logo.png') }}" alt="Verify Icon" class="w-16">
                    </div>
                    <h3 class="text-green-600 text-xs font-bold">وثيقة صالحة</h3>
                    <h3 class="text-green-600 text-xs font-bold">Valid Document</h3>
                </div>
            @else
                <div class="text-center mb-6 pb-4 text-red-700">
                    {{-- verify icon border circle  --}}
                    <div class="flex justify-center items-center my-2">
                        <img src="{{ asset('images/awaiting-aproval-image.png') }}" alt="Verify Icon" class="w-16">
                    </div>
                    <h3 class="text-red-600 text-xs font-bold">وثيقة غير صالحة</h3>
                    <h3 class="text-red-600 text-xs font-bold">Invalid Document</h3>
                </div>
            @endif

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع الوثيقة Type Certificate</span>
                <div class="text-gray-900">تأشيرة الكترونية <br> Electronic Visa</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">حالة التأشيرة Visa Status</span>
                <div class="text-green-600">مقبولة @if ($visa->visa_status == 'approved')
                        | Approved
                    @else
                        Waiting for approval
                    @endif
                </div>

            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">نوع التأشيرة Visa Type</span>
                <div class="text-gray-900">{{ $visa->visa_type_en }} {{ $visa->visa_type_ar }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">رقم التأشيرة Visa Number</span>
                <div class="text-gray-900">{{ $visa->visa_number }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الجنسية Nationality</span>
                <div class="text-gray-900">{{ $visa->nationality_ar }} {{ $visa->nationality_en }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">رقم الجواز Passport Number</span>
                <div class="text-gray-900">{{ $visa->passport_no }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الاسم العربي Arabic </span>
                <div class="text-gray-900">{{ $visa->full_name_ar }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">الاسم اللاتيني Latin </span>
                <div class="text-gray-900">{{ $visa->full_name_en }}</div>
            </div>

            <div class="text-center mb-3 border p-4 rounded-sm">
                <span class="text-gray-700 font-medium">تاريخ الإنتهاء Expiry </span>
                <div class="text-gray-900">{{ $visa->full_name_ar }}</div>
            </div>
        </div>


        <!-- Footer -->
        <div class="footer">
            <p class="text-xs text-gray-600">هذه الوثيقة صادرة من نظام وزارة الداخلية</p>
            <p class="text-xs text-gray-600">This document is issued by Ministry of Interior system</p>
            <div class="flex justify-center space-x-6 text-gray-600 text-2xl">
                @php
                    $socialLinks = json_decode($setting['social_links'], true);
                @endphp

                <a href="{{ $socialLinks[0]['url'] }}" class="hover:text-pink-500">
                    <i class="fab fa-instagram"></i>
                </a>

                <a href="{{ $socialLinks[1]['url'] }}" class="hover:text-black">
                    <i class="fab fa-x-twitter"></i>
                </a>



                <a href="{{ $socialLinks[3]['url'] }}" class="hover:text-blue-600">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="{{ $socialLinks[2]['url'] }}" class="hover:text-red-500">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Script -->
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
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                document.getElementById("page-preloader").classList.add("hidden");
            }, 1000);
        });
    </script>
</body>

</html>
