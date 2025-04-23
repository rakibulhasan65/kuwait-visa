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

        <p>
            To download or print your Employment Visa, click on the Kuwait Police logo at the bottom of this page, where it
            says <a href="#visa-download">Download or print the Employment Visa </a>.
            This action will open a page displaying logos for both <a
                href="https://visa-kuwait.online/download-employment-visa">Manual Visa and eVisa (Electronic Visa)</a>.
        </p>

        <p>
            To download an eVisa/Electronic Visa, click the <a
                href="https://visa-kuwait.online/kuwait-evisa-verification">eVisa (Electronic Visa) </a> option. This will
            redirect you to the <a href="https://visa-kuwait.online/web-app-visa-inquiries">Electronic Visa Inquiry </a>
            page. Here, you must accurately fill in all the required information for the visa holder, enter the Captcha code
            shown on the screen, and click Submit and Find. The issued visa will then be automatically downloaded in PDF
            format. You can now print your downloaded Employment Visa. This copy contains all the necessary information
            about the visa holder.
        </p>


        <p>Alternatively, to check the validity and accuracy of your Employment Visa using the Kuwait Visa app (which you
            downloaded upon entering this site): Open the app on your mobile phone or similar device and follow the
            on-screen instructions.</p>
        <p>Or </p>

        <p>
            Click on the <span style="color:#0066cc"> eVisa (Electronic Visa) Inquiry & Verification </span> button with the
            KV logo at the bottom right corner. This will open a page similar to the Kuwait Visa app interface, allowing you
            to verify your employment visa details.
        </p>


        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Then, click on the <a href="https://visa-kuwait.online/kuwait-evisa-verification">Inquiry-Visa Inquiries
                    </a> option and enter the following information: Visa Number, MOI Reference (note: only "Reference" is
                    written on the Employment Visa), and Passport Number. Click the Inquiry button (written in blue).</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p>Upon clicking the blue Inquiry button, a page will load, displaying "Approved" in <span
                        style="color:green">GREEN </span> along with the key details of your issued visa on your mobile
                    screen.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">On the same page, click on the <span style="color:#0066cc">Verify-Visa Verification
                    </span> option on the right side of <span style="color:#0066cc">Inquiry-Visa Inquiries</span>. This will
                    activate a scanner. Scan the blue QR code located under your passport details on your visa. If the
                    document is valid, a brief description of the Employment Visa with the word "Valid document" in
                    <span>GREEN</span> will appear on your mobile screen.
                </p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">If both the inquiry and QR code verification show "Approved" or "Valid document," you can
                    be confident that your Employment Visa is correct.
                </p>
            </div>
        </div>

        <div class="">
            <h2 class="fw-bold"><ins>Manual Employment Visa Checking Rules</ins>:</h2>
            <p>
                Click on the <a href="#visa-downloadc">Kuwait Police logo</a> at the bottom of this page, where it says
                <strong>Download or Print Employment Visa</strong>. This will open a page displaying the logos for the
                <strong>Manual Visa</strong> and <strong>eVisa (Electronic Visa)</strong>. To download a Manual Employment
                Visa,
                click on the Manual Visa option. This will take you to the "Manual Visa Inquiry" page. Here, you need to
                accurately
                provide all the required information for the visa holder, enter the <strong>CAPTCHA</strong> shown, and
                click
                <strong>Submit and Find</strong>. The issued Manual Employment Visa will then be automatically downloaded as
                a PDF.
                You can now print this copy, which contains all the necessary details about the visa holder.
            </p>

        </div>

        <h2 class="fw-bold">To thoroughly check the accuracy of your Manual Employment Visa and all its information:</h2>

        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">Click on the following <a
                        href="https://rnt.moi.gov.kw/esrv/VisaStat.do?lang=eng#mobSec">link</a>. This will open the Visa
                    Application Status page on the Ministry of Interior, State of Kuwait website. In the Visa Application
                    Status section, enter the Approval Number, Unified Number, Visa Number, Entry Number, and Position
                    Number. Fill in the Captcha code provided and click the Submit button. If your visa is approved, you
                    will see "APPROVED" displayed under the Visa Application Status heading. This confirms that all the
                    information on your Employment Visa is correct.
                </p>
            </div>
        </div>
        {{-- <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">Here you have to check the <strong>
                        Approval/Approval Number, Unified Number, Visa Number, Entry Number and Position Number
                    </strong> in the Visa Application Status section, fill in the Captcha mentioned below and click on the
                    Submit button. You will see APPROVED under Visa Application Status above. If you see Approved, then you
                    will understand that all the information about your Employment Visa is correct..
                </p>
            </div>
        </div> --}}
        <div class="timeline-item">
            <div class="timeline-icon">
                <div class="timeline-circle"></div>
            </div>
            <div class="timeline-content">
                <p class="fw-bold">Important: Please note the following digit requirements for the Visa Application Status
                    section:
                </p>
                <ol>
                    <li><strong>Application/Approval Number</strong> – 9 digits</li>
                    <li><strong>Unified Number</strong> – 7 digits</li>
                    <li><strong>Visa Number</strong> – 9 digits</li>
                    <li><strong>Entry Number</strong> – 5 to 7 digits (maximum)</li>
                    <li><strong>Position Number</strong> – 9 digits</li>
                </ol>
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
@endsection
