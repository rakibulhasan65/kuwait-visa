@extends('frontend.app')

@section('content')
    @push('styles')
        <style>
            .table-modern {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                border: 1px solid #e0e0e0;
                margin-bottom: 20px;
            }

            .table-modern thead th {
                background-color: #f9f9f9;
                border: 1px solid #e0e0e0;
                padding: 10px;
                text-align: center;
            }

            .table-modern tbody td {
                border: 1px solid #e0e0e0;
                padding: 10px;
            }
        </style>
    @endpush
    <div class="" style="overflow: auto">
        <div class="py-3">
            <h3 class="text-center">Ministries and Government Bodies</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    @if ($contact->type == 'Ministries and Government')
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->fax }}</td>
                            <td><a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="" style="overflow: auto">
        <div class="py-3">
            <h3 class="text-center">State Organization and Authorities</h3>
        </div>
        <table class="table-modern">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Telephone</th>
                    <th>Fax</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    @if ($contact->type == 'State Organization')
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->fax }}</td>
                            <td><a href="mailto:{{ $contact->email }}"
                                    class="text-decoration-none">{{ $contact->email }}</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
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
