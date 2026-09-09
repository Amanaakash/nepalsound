@extends('site.layouts.app')
@section('title', 'Career')
@section('css')
@endsection

@section('content')
<div class="blog-area style-three pt-90 pb-100">
    <div class="container">
        <div class="row">
            @if(isset($data['row']))
            @foreach($data['row'] as $row)
            <div class="col-lg-4">
                <div class="dreamit-blog-single-box">
                    <div class="dreamit-single-thumb">
                        <img src="{{asset('/upload_file/career/' . $row->image)}}" alt="{{$row->title}}">
                        <div class="post-catagoris">
                            <a href="{{route('site.career_details', $row->slug)}}">{{$row->category->title}}</a>
                        </div>
                    </div>
                    <div class="dreamit-blog-content">
                        <div class="blog-meta-box">
                            <span><i class="fa fa-calendar"></i><span>{{$row->created_at->format('M d, Y')}}</span></span>
                        </div>
                        <div class="blog-title">
                            <h2><a href="{{route('site.career_details', $row->slug)}}">{{$row->title}}</a></h2>
                        </div>
                        <div class="blog-content-text">
                            <p>{{ Illuminate\Support\Str::limit(strip_tags($row->description) , 55) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p>No Data</p>
            @endif
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
@endsection