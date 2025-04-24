<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Visa Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background: #f2f6fa;
            color: #003366;
        }

        /* Background behind header */
        .background-banner {
            background-color: #082b65;
            height: 240px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1;
        }


        .header {
            background-color: #003366;
            color: white;
            padding: 1rem;
            text-align: center;
            font-size: 1rem;
            font-weight: bold;
            align-content: center;
        }

        .tabs {
            display: flex;
            justify-content: space-around;
            background: #012447;
            color: white;
            font-size: 0.95rem;
        }

        .tabs div {
            padding: 0.8rem;
            flex: 1;
            text-align: center;
        }

        .tabs .active {
            border-bottom: 3px solid #00ccff;
        }

        .containerr {
            margin: 1rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 1rem;
        }

        .section-title {
            font-weight: bold;
            color: #003366;
            margin-bottom: 0.7rem;
            font-size: 1rem;
            border-bottom: 1px solid #ccc;
            padding-bottom: 0.3rem;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin: 0.5rem 0;
        }

        .row2 {
            display: flex;
            margin: 0.5rem 0;
        }

        .label {
            flex: 0 0 45%;
            color: #003366;
        }

        .label2 {
            flex: 0 0 45%;
            color: #4c617e;
        }

        .value {
            flex: 0 0 50%;
            text-align: right;
            font-weight: bold;
            color: #003366;
            word-break: break-word;
        }

        .value-b {
            font-weight: bold;
            color: #406195;
            word-break: break-word;
        }

        .value2 {
            color: #818189;
            word-break: break-word;
        }

        .approved {
            background-color: #059605;
            color: white;
            font-weight: bold;
            padding: 0.4rem 0.6rem;
            border-radius: 7px;
            font-size: 0.85rem;
            display: inline-block;
        }

        @media screen and (max-width: 480px) {
            .row {
                flex-direction: row;
                align-items: flex-start;
            }

            .label,
            .value {
                font-size: 0.85rem;
            }

            .label2,
            .value2 {
                font-size: 0.85rem;
            }
        }

        .visa-holder-container {
            background-color: #ffffff;
            border: 1px solid #143f69;
            border-radius: 10px;
            margin: 0rem 1rem 0rem 1rem;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .visa-holder-header {
            margin: -16px -16px 12px -16px;
            border-radius: 9px 9px 0px 0px;
            font-size: 0.9rem;
            font-weight: bold;
            align-content: center;
            color: #4668a8;
            background-color: #f0f1f5;
            text-align: center;
            height: 38px;
        }

        .visa-holder-row {
            margin: 0px 0;
            font-size: 0.85rem;
        }

        .visa-justify-between {
            display: flex;
            justify-content: space-between;
        }

        .visa-holder-label {
            color: #4c6286;
        }

        .visa-holder-value {
            font-weight: bolder;
            color: #7f7e87;
            margin-top: 3px;
        }

        .visa-holder-divider {
            height: 1px;
            background-color: #7f7e87;
            margin: 5px 0;
        }

        .visa-holder-rtl {
            direction: rtl;
            font-family: 'Arial', sans-serif;
        }

        .qr-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .qr-title {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .qr-title p {
            font-size: 0.875rem;
            color: #3b82f6;
            font-weight: bold;
        }

        .qr-box {
            width: 15rem;
            height: 15rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        .qr-box img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border: 4px solid #ccc;
            border-radius: 8px;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.6rem;
            border-radius: 7px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Status color variations */
        .status-approved {
            background-color: #059605;
            color: white;
        }

        .status-awaiting-approval {
            background-color: #facc15;
            color: white;
        }

        .status-pending-approved {
            background-color: #dc2626;
            color: white;
        }

        .status-default {
            background-color: #9ca3af;
            color: white;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>


    <!-- Background Banner -->
    <div class="background-banner"></div>


    <div class="header">
        <button class="" style="float: inline-start;" onclick="window.history.back();">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        Visa Details
    </div>

    <div class="flex text-white" style="background: #36456e; font-size: 0.8rem; font-weight: 800; letter-spacing: 0.05rem;">
        <button onclick="showTab('details')" id="tab-details"
            class="flex-1 text-center py-3 px-4 flex items-center justify-center gap-2 border-b-2 border-transparent hover:border-blue-400 focus:outline-none">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <span>Details</span>
        </button>

        <button onclick="showTab('qr')" id="tab-qr"
            class="flex-1 text-center py-3 px-4 flex items-center justify-center gap-2 border-b-2 border-transparent hover:border-blue-400 focus:outline-none">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M3 3h6v6H3V3zm2 2v2h2V5H5zm10-2h6v6h-6V3zm2 2v2h2V5h-2zM3 15h6v6H3v-6zm2 2v2h2v-2H5zm10 0h2v2h-2v-2zm-2-4h2v2h-2v-2zm4 0h2v2h-2v-2zm2 2h2v2h-2v-2zm-6 4h2v2h-2v-2zm2 2h2v2h-2v-2zm2-2h2v2h-2v-2z" />
            </svg>
            <span>QR Code</span>
        </button>
    </div>

    <!-- Tabs content -->
    <div id="content-details" class="mt-4">
        <div class="containerr" style="background: #f0f1f5; width: auto;">
            <div class="row">
                <div class="label">Visa Number</div>
                <div class="label" style="text-align: end;">Visa Status</div>
            </div>
            <div class="row">
                <div class="label"
                    style="
                flex: 0 0 22%; color: #3567b6; font-weight: 800;
            ">
                    {{ $evisaApps->visa_number }}
                </div>
                <div class="value">
                    @php
                        $status = $evisaApps->visa_status ?? 'change visa status';

                        // Convert status to class-safe format
                        $statusClass = match (strtolower($status)) {
                            'approved' => 'status-approved',
                            'awaiting approval' => 'status-awaiting-approval',
                            'pending approved' => 'status-pending-approved',
                            default => 'status-default',
                        };
                    @endphp

                    <div class="status-badge {{ $statusClass }}">
                        {{ ucfirst($status) }}
                    </div>
                </div>
            </div>

            <div class="row2" style="margin-top: 1rem;">
                <div class="label2">Visa Type:</div>
                <div class="value2" style="color: #3567b6; font-weight: bolder;
        margin-left: -80px;">
                    {{ $evisaApps->visa_type_en }}
                </div>
            </div>
            <div class="row2">
                <div class="label2">Visa Purpose:</div>
                <div class="value2 value-b" style="margin-left: -57px;">{{ $evisaApps->visa_purpose }}</div>
            </div>
            <div class="row2">
                <div class="label2">Place of Issue:</div>
                <div class="value2 value-b" style="margin-left: -54px;">{{ $evisaApps->place_of_issue }}</div>
            </div>

            <div class="row" style="margin-top: 24px">
                <div class="label">Date of Issue</div>
                <div class="label" style="text-align: end;">Date of Expiry</div>
            </div>
            <div class="row">
                <div class="value" style="
                flex: 0 0 22%; color: #3567b6; font-weight: bolder;
            ">{{ $evisaApps->issue_date }}</div>
                <div class="value"
                    style="
                flex: 0 0 22%; color: #3567b6; font-weight: bolder;
            ">
                    {{ $evisaApps->expiry_date }}
                </div>
            </div>
        </div>

        <div class="visa-holder-container">
            <h3 class="visa-holder-header"><span style="margin-top: auto; margin-bottom: auto;">Visa Holder
                    Details</span></h3>

            <div class="visa-holder-row">
                <div class="visa-holder-label">Full Name</div>
                <div class="visa-holder-value">{{ $evisaApps->full_name_en }}</div>
            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-holder-row">
                <div class="visa-holder-label">MOI Reference</div>
                <div class="visa-holder-value">{{ $evisaApps->moi_reference }}</div>
            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-holder-row">
                <div class="visa-holder-label">Occupation</div>
                <div class="visa-holder-value">{{ $evisaApps->occupation_en }}</div>
            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-justify-between">

                <div class="visa-holder-row">
                    <div class="visa-holder-label">Nationality</div>
                    <div class="visa-holder-value">{{ $evisaApps->nationality_en }}</div>
                </div>
                <div class="visa-holder-row">
                    <div class="visa-holder-label">Gender</div>
                    <div class="visa-holder-value" style="text-align: end;">{{ $evisaApps->gender }}</div>
                </div>
            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-justify-between">
                <div class="visa-holder-row">
                    <div class="visa-holder-label">Passport No</div>
                    <div class="visa-holder-value">{{ $evisaApps->passport_no }}</div>
                </div>

                <div class="visa-holder-row">
                    <div class="visa-holder-label">Passport Type</div>
                    <div class="visa-holder-value" style="text-align: end;">{{ $evisaApps->passport_type_en }}</div>
                </div>
            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-justify-between">
                <div class="visa-holder-row">
                    <div class="visa-holder-label">Date Of Birth</div>
                    <div class="visa-holder-value">{{ $evisaApps->dob }}</div>
                </div>
                <div class="visa-holder-row">
                    <div class="visa-holder-label">Place of Issue</div>
                    <div class="visa-holder-value visa-holder-rtl">{{ $evisaApps->passport_issue_place }}</div>
                </div>

            </div>
            <div class="visa-holder-divider"></div>

            <div class="visa-holder-row">
                <div class="visa-holder-label">Date of Expiry</div>
                <div class="visa-holder-value">{{ $evisaApps->passport_expiry_date }}</div>
            </div>

        </div>


        <div class="visa-holder-container" style="margin-top: 1rem; margin-bottom: 1rem;">
            <h3 class="visa-holder-header"><span style="margin-top: auto; margin-bottom: auto;">Employer / Family
                    Breadwinner Details</span></h3>

            <div class="visa-holder-row">
                <div class="visa-holder-label">Full Name</div>
                <div class="visa-holder-value">{{ $evisaApps->full_name_en }}</div>
            </div>

            <div class="visa-holder-divider"></div>

            <div class="visa-justify-between">

                <div class="visa-holder-row">
                    <div class="visa-holder-label">MOI Reference</div>
                    <div class="visa-holder-value">{{ $evisaApps->moi_reference }}</div>
                </div>
                <div class="visa-holder-row">
                    <div class="visa-holder-label">Mobile Number</div>
                    <div class="visa-holder-value" style="text-align: end;">{{ $evisaApps->visa_number }}</div>
                </div>
            </div>

        </div>
    </div>
    <div id="content-qr" style="background: #f2f6fa;" class="mt-4 hidden">
        <div class="qr-wrapper">
            <div class="qr-title">
                <p>Visa Verification QR Code</p>
            </div>
            <div class="qr-box">
                <!-- Replace with your dynamic QR base64 image -->
                <img src="data:image/png;base64,{{ $qrCode }}" alt="Visa QR Code">
            </div>
        </div>
        <button onclick="toggleDrawer()"
            style="width: 100%;
    border-top: 2px solid #131359;
    border-radius: 8px;
    font-weight: bold;
    padding-top: 12px;"
            class="fixed bottom-5">
            Note
        </button>

        <!-- Backdrop -->
        <div id="backdrop" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleDrawer()"></div>

        <!-- Bottom Drawer -->
        <div id="bottomDrawer"
            class="fixed bottom-0 inset-x-0 bg-white rounded-t-2xl shadow-lg p-4 z-50 transform translate-y-full h-[35vh] transition-transform duration-300 ease-in-out">
            <h2 class="text-sm font-bold mb-2 text-center text-blue-900">Note</h2>

            <div class="visa-holder-divider"></div>
            <p class="text-gray-700">
                Scanning this QR Code by another party would allow them to retrieve your visa information
            </p>
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
        function toggleDrawer() {
            const drawer = document.getElementById('bottomDrawer');
            const backdrop = document.getElementById('backdrop');
            const isVisible = !drawer.classList.contains('translate-y-full');

            drawer.classList.toggle('translate-y-full');
            backdrop.classList.toggle('hidden');
        }
    </script>
    <script>
        function showTab(tab) {
            document.getElementById("content-details").classList.add("hidden");
            document.getElementById("content-qr").classList.add("hidden");
            document.getElementById("tab-details").classList.remove("border-blue-500");
            document.getElementById("tab-qr").classList.remove("border-blue-500");

            document.getElementById("content-" + tab).classList.remove("hidden");
            document.getElementById("tab-" + tab).classList.add("border-blue-500");
        }

        // Initialize with Details tab active
        showTab('details');
    </script>
</body>

</html>
