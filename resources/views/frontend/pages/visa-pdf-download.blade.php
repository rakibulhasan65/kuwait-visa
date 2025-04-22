<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Electronic Visa - State of Kuwait</title>
    <link rel="icon" href="{{ asset('/images/icon/mipmap-xxxhdpi/ic_launcher.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-global.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/visa/visa-style.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        /* Full Screen Loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 1);

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            font-size: 20px;
            z-index: 99999;

        }

        /* Spinner Animation */
        .spinner {
            width: 60px;
            height: 60px;
            border: 6px solid rgba(255, 255, 255, 0.3);
            border-top: 6px solid #ffffff;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 15px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <main class="main-file">
        <div class="paper" id="visa-details">
            <header class="group">
                <div class="overlap-group"
                    style="background-image: url('{{ asset('frontend/assets/visa') }}/img/banner.svg')">
                    <img class="logo-en" src="{{ asset('frontend/assets/visa') }}/img/watermark.png" alt="Logo" />
                    <img class="img" src="{{ asset('frontend/assets/visa') }}/img/watermark.png" alt="Logo" />
                    <img class="logo-en-2" src="{{ asset('frontend/assets/visa') }}/img/emblem.svg" alt="Logo" />
                    <h1 class="text-wrapper">تأشيرة إلكترونية</h1>
                    <img class="group-2" src="{{ asset('frontend/assets/visa') }}/img/Group 24.png"
                        alt="Decorative element" />
                    <!-- <img class="image" src="{{ asset('frontend/assets/visa') }}/img/image 11 (2) 1.png"
                        alt="Decorative image" /> -->
                    <h3 class="image">STATE OF KUWAIT</h3>
                    <!-- <img class="image-2" src="{{ asset('frontend/assets/visa') }}/img/image 11 (2) 2.png"
                        alt="Decorative image" /> -->
                    <h3 class="image-2">Electronic Visa</h3>
                    <img class="ece-cc-ef"
                        src="{{ asset('frontend/assets/visa') }}/img/e11c10e4-9c0c-4ef1-9026-275f3a9c7f1d 3.png"
                        alt="Decorative element" />
                </div>
                <div class="rectangle"></div>
            </header>
            <section class="overlap-wrapper">
                <div class="overlap">
                    <div class="rectangle-2"></div>
                    <div class="group-3">
                        <div class="group-wrapper">
                            <div class="group-4">
                                <div class="overlap-2">
                                    <div class="rectangle-3"></div>
                                    <!-- <div class="rectangle-4"></div> -->
                                    <div class="rectangle-5"></div>
                                    <div class="rectangle-6"></div>
                                    <div class="rectangle-7"></div>
                                    <div class="rectangle-8"></div>
                                    <div class="rectangle-9"></div>
                                    <div class="group-5">
                                        <span class="text-wrapper-2">For Official Use</span>
                                        <span class="text-wrapper-3">للإستعمال الرسمي</span>
                                        <div class="overlap-group-wrapper">
                                            <div class="overlap-group-2">
                                                <h3 class="text-wrapper-4">Instructions</h3>
                                                <h3 class="text-wrapper-5">تعليمات</h3>
                                                <img class="image-3"
                                                    src="{{ asset('frontend/assets/visa') }}/img/image 7.png"
                                                    alt="Instructions icon" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="div-wrapper">
                                        <div class="overlap-group-2">
                                            <h3 class="text-wrapper-6">Exit Stamp</h3>
                                            <h3 class="text-wrapper-7">ختم الخروج</h3>
                                        </div>
                                    </div>
                                    <div class="group-6">
                                        <div class="overlap-3">
                                            <h3 class="text-wrapper-8">Entry Stamp</h3>
                                            <h3 class="text-wrapper-9">ختم الدخول</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="rectangle-10"></div>
                            </div>
                        </div>
                        <footer class="group-7">
                            <p class="ministry-of-interior">
                                Ministry of
                                Interior&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Electronic
                                Visa&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;Edition 2 - Nov. 2024
                            </p>
                            <p class="element">
                                وزارة الداخلية&nbsp;&nbsp;|&nbsp;&nbsp;تأشيرة
                                إلكترونية&nbsp;&nbsp;|&nbsp;&nbsp;الاصدار رقم 2 نوفمبر
                            </p>
                        </footer>
                        <div class="group-8">
                            <p class="p">
                                استخدم تطبيقات وزارة الداخلية للتحقق من محتوى هذه الوثيقة
                            </p>
                            <p class="use-ministry-of">
                                Use Ministry of Interior&#39;s Apps to verify the content in
                                this document
                            </p>
                        </div>
                        <div class="footer_logo">
                            <img class="unnamed-removebg" src="{{ asset('frontend/assets/visa') }}/img/moilogo.png"
                                alt="QR Code" />
                            <img class="element-2" src="{{ asset('frontend/assets/visa') }}/img/logo-3.png"
                                alt="Barcode" />
                            <img class="unnamed" src="{{ asset('frontend/assets/visa') }}/img/kuwait_visa.png"
                                alt="QR Code" />
                        </div>
                    </div>
                </div>
            </section>
            <section class="overlap-4">
                <div class="group-9">
                    <div class="overlap-5">
                        <img class="mask-group" src="{{ asset('frontend/assets/visa') }}/img/Mask group.png"
                            alt="Background pattern" />
                        <div class="group-10">
                            <div class="overlap-group-3">
                                <p class="text-wrapper-10">{{ $visa->nationality_ar }}</p>
                                <p class="text-wrapper-11">الجنسية</p>
                            </div>
                        </div>
                        <img class="STATE-KUWAIT"
                            src="{{ asset('frontend/assets/visa') }}/img/STATE 0F KUWAIT eVISA.png"
                            alt="State of Kuwait" />
                        <h2 class="text-wrapper-12">دولة الكويت</h2>
                        <h2 class="text-wrapper-13">تأشيرة إلكترونية</h2>
                        <div class="group-11">
                            <img class="image-4" src="data:image/png;base64,{{ $qrCode }}" alt="Visa QR Code">
                            <div class="overlap-6">
                                <p class="text-wrapper-14">Passport No.</p>
                                <p class="text-wrapper-15">{{ $visa->passport_no }}</p>
                            </div>
                            <p class="text-wrapper-16">رقم الجواز</p>
                            <p class="text-wrapper-17">{{ $visa->passport_issue_date }}</p>
                            <p class="text-wrapper-18">{{ $visa->passport_expiry_date }}</p>
                            <p class="text-wrapper-19">{{ $visa->passport_type_ar }}</p>
                        </div>
                        <div class="group-12">
                            <p class="text-wrapper-20">Visa Number</p>
                            <p class="text-wrapper-21">رﻗﻢ اﻟﺘﺄﺷﻴﺮة</p>
                            <p class="text-wrapper-22">{{ $visa->visa_number }}</p>
                        </div>
                        <div class="group-13">
                            <div class="overlap-7">
                                <div class="group-14">
                                    <div class="overlap-group-4">

                                        <p class="VBKWTALI-ABDUL-MAZID">
                                            {{ $visa->barcode_text_up }}
                                        </p>
                                    </div>
                                </div>
                                <p class="div-2">
                                    <span class="span-2">{{ $visa->barcode_text_down }}</span>
                                </p>

                            </div>
                        </div>
                        <p class="text-wrapper-25">الكفيل</p>
                        <p class="text-wrapper-26">
                            {{ $visa->company_name_ar }}
                        </p>
                        <div class="group-17">
                            <p class="ABDUL-MAZID-AFSAR">
                                <span class="span">{{ $visa->full_name_en }}</span>
                            </p>
                            <p class="div-3">
                                <span class="span">{{ $visa->full_name_ar }}</span>
                            </p>
                            <p class="text-wrapper-30">Name</p>
                            <p class="text-wrapper-31">الإسم</p>
                        </div>
                        <div class="group-18">
                            <p class="text-wrapper-32">Birth Date</p>
                            <p class="text-wrapper-33">تاريخ الميلاد</p>
                            <p class="text-wrapper-34">{{ $visa->dob }}</p>
                        </div>
                        <div class="group-19">
                            <p class="text-wrapper-35">Reference</p>
                            <p class="div-4">
                                <span class="text-wrapper-36">رقم المر</span>
                                <span class="text-wrapper-37">جع</span>
                            </p>
                            <p class="text-wrapper-38">{{ $visa->moi_reference }}</p>
                        </div>
                        <div class="group-20">
                            <p class="text-wrapper-39">Issue Date</p>
                            <p class="text-wrapper-40">ﺗﺎرﻳﺦ اﻹﺻﺪار</p>
                            <p class="text-wrapper-41">{{ $visa->issue_date }}</p>
                        </div>
                        <div class="group-21">
                            <p class="text-wrapper-42">Visa Type</p>
                            <p class="text-wrapper-43">نوع التأشيرة</p>
                            <p class="text-wrapper-44">Expiry Date</p>
                            <p class="text-wrapper-45">تاريخ الإنتهاء</p>
                            <p class="text-wrapper-46">{{ $visa->expiry_date }}</p>
                            <p class="text-wrapper-47">Nationality</p>
                            <div class="overlap-8">
                                <p class="text-wrapper-48">Sex</p>
                                <p class="text-wrapper-49">{{ $visa->gender }}</p>
                            </div>
                            <div class="overlap-9">
                                <p class="text-wrapper-50">النوع</p>
                                <p class="text-wrapper-51">{{ $visa->gender_ar }}</p>
                            </div>
                            <p class="text-wrapper-52">{{ $visa->nationality_en }}</p>
                            <p class="text-wrapper-53">Occupation</p>
                            <p class="text-wrapper-54">{{ $visa->occupation_en }}</p>
                            <p class="text-wrapper-55"> {{ $visa->occupation_ar }}</p>
                            <p class="text-wrapper-56">المهنة</p>
                            <div class="group-22">
                                <p class="text-wrapper-57">{{ $visa->visa_type_ar }}</p>
                                {{-- <p class="text-wrapper-58">{{ $visa->visa_type_en }}</p> --}}
                                {{-- <div class="group-23"></div> --}}
                            </div>
                        </div>
                        <img class="STATE-f-KUWAIT"
                            src="{{ asset('frontend/assets/visa') }}/img/STATE 0F KUWAIT (1).png"
                            alt="State of Kuwait" />
                    </div>
                </div>
                <div class="rectangle-11"></div>
            </section>
        </div>
    </main>


    <!-- Full Screen Loader -->
    <div id="loader">
        <div class="spinner"></div>
        <p>Please wait, your download is starting...</p>
    </div>

    <!-- Hidden Download Button -->
    <button id="download-pdf" style="display: none" onclick="downloadPDF()">Download PDF</button>

    <script>
        function downloadPDF() {
            let downloadBtn = document.getElementById("download-pdf");
            if (downloadBtn) {
                // Download PDF
                downloadBtn.click();


                setTimeout(function() {
                    window.history.back();
                }, 2000);
            }
        }

        window.onload = function() {
            setTimeout(function() {

                let downloadBtn = document.getElementById("download-pdf");

                if (downloadBtn) {
                    downloadBtn.click();


                    setTimeout(function() {
                        window.history.back();
                    }, 2000);
                }
            }, 3000);
        };
    </script>


    <script>
        document.getElementById('download-pdf').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const element = document.getElementById('visa-details');

            // Set the scale to match A4 dimensions at 300 DPI
            const scale = 300 / 96; // 300 DPI / 96 DPI (default screen resolution)
            const pdfWidth = 210;
            const pdfHeight = 297;

            html2canvas(element, {
                scale: scale,
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#FFFFFF'
            }).then(canvas => {
                const pdf = new jsPDF({
                    orientation: 'portrait',
                    unit: 'mm',
                    format: [pdfWidth, pdfHeight]
                });

                const imgData = canvas.toDataURL('image/jpeg', 1.0);

                // Add image at exact A4 dimensions without any scaling or positioning
                pdf.addImage(imgData, 'JPEG', 0, 0, pdfWidth, pdfHeight);

                pdf.save('{{ $visa->full_name_en }}.pdf');
            });
        });
    </script>

</body>

</html>
