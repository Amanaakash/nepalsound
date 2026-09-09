@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="mb-0">{{ $_panel }} Management</h3>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('certificate.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Title</th>
                            <th width="15%">Image</th>
                            <th width="15%">Thumbnail</th>
                            <th width="30%">Short Description</th>
                            <th width="15%" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($certificates as $certificate)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $certificate->title }}</td>
                            <td>
                                @if($certificate->image)
                                <img src="{{ asset($certificate->image) }}" alt="Certificate Image" class="img-thumbnail" width="80">
                                @else
                                <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                @if($certificate->imagth)
                                <img src="{{ asset($certificate->imagth) }}" alt="Thumbnail" class="img-thumbnail" width="80">
                                @else
                                <span class="text-muted">No Thumbnail</span>
                                @endif
                            </td>
                            <td>
                                {!! Str::limit(strip_tags($certificate->short_description), 100) !!}
                            </td>
                            <td class="text-center">
                                <a href="{{ route('certificate.edit', $certificate->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('certificate.destroy', $certificate->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No certificates found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        
        </div>
    </div>
</div>
@endsection