<div class="about_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title text_left mb-30">
                    <div class="section_main_title">
                        <h4>Tools You’ll Master</h4>
                    </div>
                    <div class="em_bar">
                        <div class="em_bar_bg"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="pb-80">
                    <p>Since technology plays an important role in the marketing industry, this program ensures that
                        you are well-versed with all tools that a digital marketer uses daily.</p>
                    <!-- <p>HTML, CSS ,JS ,Bootstrap,Hook ,Redux</p>  -->
                    <div class="row">
                        @if($data['tools'])
                        @foreach($data['tools'] as $row)
                        <div class="col-lg-2 col-sm-6 col-xs-6">
                            <div class="technology">
                                <img src="{{asset($row->image)}}" alt="{{ $row->title}}" />
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>Data not found !</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>