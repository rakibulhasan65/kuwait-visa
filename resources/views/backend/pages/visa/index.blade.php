@extends('backend.admin')

@section('title', 'Visa List')

@section('content')
    @push('styles')
        <script src="https://cdn.tailwindcss.com"></script>
    @endpush
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-header bg-info text-white">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title m-0"><i class="fas fa-passport"></i> Visa List</h3>

                    <div class="d-flex">
                        <!-- Search Form -->
                        <form action="{{ route('admin.visas.index') }}" method="get" class="d-flex align-items-center">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by visa number" value="{{ request()->search }}"
                                    aria-label="Search Visa">
                                <button type="submit" class="btn btn-primary input-group-append">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>

                        <!-- Add Visa Button -->
                        <a href="{{ route('admin.visas.create') }}" class="btn btn-success ms-3 ml-3">
                            <i class="fas fa-plus-circle"></i> Add Visa
                        </a>
                    </div>
                </div>
            </div>


            <div class="card-body">
                <table id="visaTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Holder Name</th>
                            <th>Visa Number</th>
                            <th>Passport Number</th>
                            <th>visa Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visas as $key => $visa)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $visa->full_name_en }}</td>
                                <td>{{ $visa->visa_number }}</td>
                                <td>{{ $visa->passport_no }}</td>
                                <td>{{ \Carbon\Carbon::parse($visa->created_at)->format('Y-m-d H:i') }}</td>
                                <td>{{ $visa->expiry_date }}</td>
                                <td>
                                    @php
                                        $status = $visa->visa_status ?? 'Change Visa Status';
                                        $statusMap = [
                                            'approved' => ['bg' => 'success', 'text' => 'white'],
                                            'awaiting approval' => ['bg' => 'warning', 'text' => 'black'],
                                            'pending approved' => ['bg' => 'danger', 'text' => 'white'],
                                        ];

                                        $currentStatus = $statusMap[$visa->visa_status] ?? [
                                            'bg' => 'warning',
                                            'text' => 'black',
                                        ];
                                    @endphp

                                    <!-- Status Change Button -->
                                    <button
                                        class="btn btn-sm my-2 btn-{{ $currentStatus['bg'] }} text-{{ $currentStatus['text'] }} open-status-modal"
                                        data-id="{{ $visa->id }}">
                                        {{ ucfirst($status) }}
                                    </button>
                                </td>
                                <td>

                                    <a href="{{ route('admin.visas.edit', $visa->id) }}"
                                        class="btn btn-primary btn-sm">Edit</a>

                                    <a href="{{ route('admin.visas.show', $visa->id) }}"
                                        class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('admin.evisa-download', $visa->id) }}"
                                        class="btn btn-info btn-sm">Download</a>
                                    <form id="delete-form-{{ $visa->id }}"
                                        action="{{ route('admin.visas.destroy', $visa->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $visa->id }})">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>



            <!-- Status Change Modal -->
            <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="statusModalLabel">Change Visa Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="statusForm">
                                <div class="form-group">
                                    <label for="visaStatus">Select New Status</label>
                                    <select class="form-control" id="visaStatus" name="visaStatus">
                                        <option value="pending approved">Pending approved</option>
                                        <option value="approved">Approved</option>
                                        <option value="awaiting approval">Awaiting approval</option>
                                    </select>
                                </div>
                                <!-- Hidden field to hold the visa id -->
                                <input type="hidden" id="visaId" name="visaId" value="{{ $visa->id }}">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="updateStatusBtn" class="btn btn-primary">OK</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    @push('script')
        <script>
            $(document).ready(function() {
                // Status change button click
                $('.open-status-modal').on('click', function() {
                    var visaId = $(this).data('id');
                    $('#visaId').val(visaId); // Hidden input-এ ID বসিয়ে দিচ্ছি
                    $('#statusModal').modal('show');
                });

                // OK Button Click
                $('#updateStatusBtn').on('click', function() {
                    var newStatus = $('#visaStatus').val();
                    var visaId = $('#visaId').val();

                    $.ajax({
                        url: '{{ route('admin.updateVisaStatus') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            visa_id: visaId,
                            visa_status: newStatus
                        },
                        success: function(response) {
                            if (response.success) {
                                $('#statusModal').modal('hide');
                                toastr.success(response.message, 'Success', {
                                    positionClass: 'toast-top-right',
                                    timeOut: 3000,
                                });
                                window.location.reload();
                            }
                        },
                        error: function() {
                            alert("Error updating status. Please try again.");
                        }
                    });
                });
            });
        </script>

        <script>
            function confirmDelete(visaId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + visaId).submit();
                    }
                });
            }
        </script>
    @endpush



@endsection
