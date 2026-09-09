@extends('site.layouts.app')
@section('title', 'Career')
@section('css')
@endsection

@section('content')

<div class="blog-area style-four pt-90 pb-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dreamit-blog-single-box">
                            <div class="dreamit-single-thumb">
                                <img src="{{asset('/upload_file/career/' . $data['row']->image)}}" alt="{{$data['row']->title}}">
                            </div>
                            <div class=" dreamit-blog-content">
                                <div class="blog-meta-box">
                                    <span><i class="fa fa-bars"></i><span>{{$data['row']->category->title}}</span></span>
                                    <span><i class="fa fa-calendar"></i><span>{{$data['row']->created_at->format('M d, Y')}}</span></span>
                                    <span><i class="far fa-eye"></i><span>{{$data['row']->visitor}} Views</span></span>
                                </div>
                                <div class="blog-title">
                                    <h2>{{$data['row']->title}}</h2>
                                </div>
                                <div class="blog-content-text" style="text-align: justify;">
                                    {!! html_entity_decode($data['row']->description) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="sidebar-box">
                    <div class="row">
                        <div class="resent-post-iteam">
                            <div class="col-lg-12">
                                <div class="sidebar-title">
                                    <h2>Recent Blogs</h2>
                                </div>
                                <div class="dreamit-section-bar mb-20"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if(isset($data['blog']))
                        @foreach($data['blog'] as $row)
                        @if($loop->index < 5) <div class="resent-iteam d-flex">
                            <div class="col-lg-4 col-md-6">
                                <div class="sidebar-thumb pt-3">
                                    <a href="{{ route('site.post.show', ['slug' => $row->slug]) }}">
                                        <img src="{{asset($row->thumbs)}}" alt="{{$row->title}}" style="width: 100px;" class="img img-responsive">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="sidebar-thumb-content">
                                    <div class="sidebar-thumb-title">
                                        <a href="{{ route('site.post.show', ['slug' => $row->slug]) }}">
                                            <h2>{{$row->title}}</h2>
                                        </a>
                                        <span>{{$row->created_at->format('M d, Y')}}</span>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <marquee behavior="" direction="left">No Blogs</marquee>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
@endsection