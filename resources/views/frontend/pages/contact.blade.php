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
@endsection
