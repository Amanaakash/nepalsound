@extends('layouts.admin')

@section('styles')
    <link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="h4 text-primary">Event Requests</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="eventsTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Company / Client</th>
                                <th>Contact Info</th>
                                <th>Subject / Description</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Venue</th>
                                <th>Attendance</th>
                                <th>Needs</th>
                                <th>File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $key => $event)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <strong>{{ $event->company_name }}</strong><br>
                                        <small>{{ $event->full_name }}</small>
                                    </td>
                                    <td>
                                        <strong>Email:</strong> {{ $event->email }}<br>
                                        <strong>Phone:</strong> {{ $event->phone_number }}
                                    </td>
                                    <td>
                                        <strong>{{ $event->subject }}</strong><br>
                                        {{ $event->event_description }}
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_start_date)->format('Y-m-d') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($event->event_end_date)->format('Y-m-d') }}</td>
                                    <td>{{ $event->event_venue }}</td>
                                    <td>{{ $event->estimated_attendance }}</td>
                                    <td>{{ Str::limit($event->needs, 50) }}</td>
                                    <td>
                                        @if ($event->rider_path)
                                            @php
                                                $fileExtension = strtolower(
                                                    pathinfo($event->rider_path, PATHINFO_EXTENSION),
                                                );
                                            @endphp

                                            @if (in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                                                <!-- For images - show thumbnail with download option -->
                                                <a href="{{ asset($event->rider_path) }}" target="_blank"
                                                    data-toggle="lightbox" data-title="{{ $event->company_name }}">
                                                    <img src="{{ asset($event->rider_path) }}" width="50"
                                                        class="img-thumbnail">
                                                </a>
                                                <a href="{{ asset($event->rider_path) }}"
                                                    class="btn btn-sm btn-primary mt-1" download>
                                                    <i class="fas fa-download"></i> Download
                                                </a>
                                            @else
                                                <!-- For documents - show download button with file type indicator -->
                                                <div class="d-flex align-items-center">
                                                    <i
                                                        class="fas fa-file-{{ $fileExtension === 'pdf' ? 'pdf' : 'word' }} fa-2x text-danger mr-2"></i>
                                                    <a href="{{ asset($event->rider_path) }}"
                                                        class="btn btn-sm btn-primary" download>
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            @endif
                                        @else
                                            <span class="text-muted">No file</span>
                                        @endif
                                    </td>
                                    <td>

                                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this event?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#eventsTable').DataTable();
        });
    </script>
@endsection
