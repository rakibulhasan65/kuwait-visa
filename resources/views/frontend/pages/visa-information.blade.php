@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            a.text-decoration-none {
                padding-bottom: 28px;
            }
        </style>
    @endpush
    <div class="timeline">
        <h2 class="fw-bold"><ins>eVisa (Electronic Visa) checking rules</ins>:</h2>

        <p class="">
            Click on the  <strong>Kuwait Police</strong> at the bottom of this page, where it says <a class="fst-italic" style="color:#0066cc" href="#visa-download">Download or print
                the Employment Visa</a>. Clicking here will automatically open a page with logos for the<span class="fst-italic" style="color:#0066cc">Manual Visa and the eVisa (Electronic Visa)</span> and <span class="fst-italic"
                style="color:#0066cc">eVisa (Electronic Visa)
            </span>. Since you want to download an eVisa/Electronic Visa, click the <span class="fst-italic" style="color:#0066cc">eVisa (Electronic Visa)</span> option. Clicking here will automatically open a new page where it says <span class="fst-italic" style="color:#0066cc">Electronic Visa Inquiry</span>. You must fill in all the correct information required by the visa holder below that text and enter the Captcha displayed on the screen, and click on* Submit and Find*. In that case, the issued visa will automatically be downloaded in PDF format.  Now print your downloaded Employment Visa page. The Visa copy includes all the necessary information about the Visa holder.
        </p>
        <p><strong>Note</strong> that when you entered this site, you downloaded the Kuwait Visa app. Now, if you click on the Kuwait Visa app from your mobile phone or any similar device, it will show pages and options in turn. If you follow the instructions given/required there, you will immediately know the validity and accuracy of the Employment Visa.</p>
<p>Or </p>
        <p>
        On this page, click on the <a> <span class="fst-italic"
        style="color:#0066cc">eVisa (Electronic Visa) Inquiry & Verification</span></a> with the <strong>KV logo</strong> at the bottom right corner. The page that opens will allow you to verify the accuracy of the employment visa by providing all the information similar to the Kuwait Visa app.
        </p>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Then click on the <a href="{{ route('kuwait-evisa-verification') }}">Inquiry-Visa Inquiries</a>
                    option and enter all the information of Visa Number, MOI
                    Reference (Only Reference is written on the Employment Visa) and Passport Number and click on the
                    Inquiry option written in blue. <br> <br>
                    If you click on the Inquiry option written in blue, a page will open in a short time where the Approved
                    text will be shown in <span style="color: green;">GREEN</span> and the short details of the Visa issued
                    will be shown on your mobile
                    screen. </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>On this page, if you click on the <strong>Verify - Visa Verification</strong> option on the right side of
                    Inquiry-Visa
                    Inquiries, a scanner will automatically open, when you scan the blue QR code under the passport details
                    on your visa with that scanner, a brief description of the Employment Visa with the word Valid document
                    written in GREEN colour will appear on your mobile screen as soon as possible.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">If the above 2 are correct, then you will understand that the Employment Visa is correct.
                </p>
            </div>
        </div>

        <div class="">
            <h2 class="fw-bold"><ins>Manual Employment Visa Checking Rules:</ins>:</h2>
            <p>
            Click on the<a href="#visa-downloadc"> Kuwait Police logo</a> at the bottom of this page, where it says <strong>Download or Print Employment Visa</strong>. Clicking here will automatically open a page with the logos of the <strong>Manual Visa</strong> and the <strong>eVisa (Electronic Visa)</strong>. Since you want to download a Manual Employment Visa, click on the Manual Visa option. Clicking here will automatically open a new page where it says "Manual Visa Inquiry". You have to fill in all the correct information required by the visa holder below that text and enter the <strong>CAPTCHA</strong> displayed on the screen, and click on <strong>Submit and Find</strong>. In that case, the issued Manual Employment Visa will automatically be downloaded in PDF format. Now print your downloaded Employment Visa page. The copy of the visa includes all the necessary information about the visa holder.
            </p>
        </div>

        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">To check the accuracy of the Manual Employment visa and all the information thoroughly, click on the link https://rnt.moi.gov.kw/esrv/VisaStat.do?lang=eng#mobSec, a page of the Ministry of Interior, State of Kuwait will open there, where you will enter Approval Number, Unified Number, Visa Number, Entry Number and Position Number in the Visa Application Status section, fill in the Captcha mentioned below and click on the Submit button. You will see APPROVED under Visa Application Status above. If you see Approved, then you will understand that all the information about your Employment Visa is correct.
                </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">Here you have to check the <strong>
                Approval/Approval Number, Unified Number, Visa Number, Entry Number and Position Number
                </strong> in the Visa Application Status section, fill in the Captcha mentioned below and click on the Submit button. You will see APPROVED under Visa Application Status above. If you see Approved, then you will understand that all the information about your Employment Visa is correct..
                </p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">Remember: Application/Approval Number is 9 digits, Unified Number is 7 digits, Visa Number is 9 digits, Entry Number can be 5 to a maximum of 7 digits, but Position Number is 9 digits.
                </p>
            </div>
        </div>
    </div>
    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <!-- First Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: space-between;">
                    <a href="{{ route('download-employment-visa') }}" class="text-decoration-none">
                        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo"
                            class="img-fluid mb-3" style="max-width: 150px;">
                        <h5 class="text-primary text-center" id="visa-download">Download or print <br> the Employment Visa
                        </h5>
                    </a>

                </div>
            </div>
            <!-- Second Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: end;">
                    <a href="{{ route('kuwait-evisa-verification') }}" class="text-decoration-none">
                        <img src="{{ asset('images/unnamed__1_.png') }}" alt="Kuwait Police Logo" class="img-fluid mb-3"
                            style="max-width: 150px;">
                        <h5 class="text-primary text-center">eVisa (Electronic Visa) <br> Inquiry & Verification</h5>
                    </a>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
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
      @endpush
@endsection
