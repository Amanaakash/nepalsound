@extends('layouts.admin')
@section('styles')
<link href="{{ asset('assets/cms/vendors/DataTables/datatables.min.css')}}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="{{route( $_base_route.'.create' )}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-plus fa-sm text-white-50"></i> New {{ $_panel }} </a>
    </div>
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">{{ $_panel }}</div>
        </div>
        <div class="ibox-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="newrequest">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($data['row']))
                            @foreach( $data['row'] as $key=> $row)
                            <tr>
                                <td>{{ $key+1}}.</td>
                                <td>{!! strip_tags(mb_strimwidth($row->title, 0, 100, "...")) !!}</td>
                                <td>
                                    @if($row->getCategoryTitle)
                                    {{ $row->getCategoryTitle->title }}
                                    @endif
                                </td>
                                <td>
                                    @if($row->thumbs)
                                    <img src="{{ asset($row->thumbs) }}" alt="" class="img-responsive" style="max-height: 50px;">
                                    @endif
                                <td><span class="badge badge-{{ ($row->status == 1) ? 'success' : 'warning'}} badge-pill m-r-5 m-b-5">{{ ($row->status == 1) ? 'Published' : 'Unpublished'}}</span></td>
                                <td>
                                    @if(Route::has($_base_route.'.edit'))
                                    <a href="{{ URL::route($_base_route.'.edit', ['rental_unique_id' => $row->rental_unique_id]) }}">
                                        <button class="btn btn-default btn-xs m-r-5" data-toggle="tooltip" data-original-title="Edit" style="cursor: pointer;"><i class="fa fa-pencil font-14"></i></button></a>
                                    @endif
                                    @if(Route::has($_base_route.'.destroy'))
                                    <button id="delete" data-id="{{ $row->id }}" class="btn btn-default btn-xs" data-toggle="tooltip" data-original-title="Delete" data-url="{{ URL::route($_base_route.'.destroy', ['id' => $row->id]) }}" style="cursor:pointer;"><i class="fa fa-trash font-14"></i></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
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
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                responsive: true
            });
        })
    });
</script>
@endsection