@extends('layouts.admin')
@section('title')
Admin {{ $_panel }} | SCMS
@endsection
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.index')}}"><i class="fa fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $_panel }}</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">{{ $_panel }} Members</h6>
        <a href="{{ route($_base_route.'.create') }}" class="btn btn-primary btn-sm">
            <i class="fa fa-plus"></i> Add New
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="5%">Order</th>
                        <th width="15%">Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th width="10%">Status</th>
                        <th width="15%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->display_order }}</td>
                        <td>
                            @if($team->image)
                            <img src="{{ asset($team->image) }}" alt="{{ $team->title }}" class="img-thumbnail" width="80">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ $team->title }}</td>
                        <td>{{ $team->designation ?? '-' }}</td>
                        <td>
                            <span class="badge badge-{{ $team->status ? 'success' : 'danger' }}">
                                {{ $team->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.our-team.edit', $team->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.our-team.destroy', $team->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
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
@endsection