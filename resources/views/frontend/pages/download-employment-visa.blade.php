@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            a.text-decoration-none {
                margin-bottom: 44px;
            }
        </style>
    @endpush

    <div class="container text-center my-5">
        <div class="row justify-content-center">
            <!-- First Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: space-between;">
                    <a href="{{ route('manual-visa') }}" class="text-decoration-none">
                        <img src="{{ asset('images/Kuwait-Police-logo.png') }}" alt="Kuwait Police Logo" class="img-fluid mb-3"
                            style="max-width: 150px;">
                        <h5 class="text-primary text-center">Manual Visa</h5>
                    </a>
                </div>
            </div>
            <!-- Second Card -->
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-3 mb-2 d-flex flex-column align-items-center gap-3">
                <div class="card p-4 shadow-sm rounded border-0 d-flex flex-column align-items-center"
                    style="height: 300px; width: 100%; display: flex; justify-content: end;">
                    <a href="{{ route('user-electronic-visa-download') }}" class="text-decoration-none">
                        <img src="{{ asset('images/kuwaitappslogo-r.png') }}" alt="Kuwait Police Logo"
                            class="img-fluid mb-3" style="max-width: 150px;">
                        <h5 class="text-primary text-center">eVisa (Electronic Visa)</h5>
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
