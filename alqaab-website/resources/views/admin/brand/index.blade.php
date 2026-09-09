@extends('layouts.admin')

@section('title')
    Admin Brand List | SCMS
@endsection

@section('styles')
    <link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <style>
        .url-cell {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Breadcrumb -->
    <div class="row mb-2">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Brand</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <div class="col-lg-12">
            <div class="row justify-content-between">
                <a href="{{ route('brand.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fa fa-plus fa-sm text-white-50"></i> Add Brand
                </a>&nbsp;
                <a href="{{ route('brand.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                    <i class="fa fa-refresh"></i> Refresh
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Table -->
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Brand List</div>
        </div>
        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th width="5%">S.N</th>
                        <th width="20%">Title</th>
                        <th width="25%">URL</th>
                        <th width="15%">Image</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brands as $key => $brand)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $brand->title }}</td>
                        <td class="url-cell">
                            @if($brand->url)
                                <a href="{{ $brand->url }}" target="_blank" title="{{ $brand->url }}">
                                    {{ Str::limit($brand->url, 30) }}
                                </a>
                            @else
                                <span class="text-muted">No URL</span>
                            @endif
                        </td>
                        <td>
                            @if($brand->image)
                                <img src="{{ asset($brand->image) }}" width="50" height="50" class="img img-responsive rounded" alt="{{ $brand->title }}">
                            @else
                                <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('brand.destroy', $brand->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this brand?')" class="btn btn-sm btn-danger" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/cms/vendors/DataTables/datatables.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                responsive: true,
                order: [[0, 'asc']],
                columnDefs: [
                    { orderable: false, targets: [3, 4] }
                ]
            });
            
            // Auto-dismiss alerts after 5 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
@endsection