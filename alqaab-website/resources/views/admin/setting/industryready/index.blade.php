@extends('layouts.admin')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4  text-primary">{{ $_panel }}</h1>
    <hr>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{ route('admin.setting.industryready.update',  $data['row']->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Personal career guidance</label> <br>
                        <textarea name="personal_career_guidance" cols="30" rows="5" class="form-control rounded" value="">{{ $data['row']->personal_career_guidance }}</textarea>
                        @if($errors->has('personal_career_guidance'))
                        <p id="name-error" class="help-block" for="personal_career_guidance"><span>{{ $errors->first('personal_career_guidance') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Interview training</label> <br>
                        <textarea name="interview_training" cols="30" rows="5" class="form-control rounded" value="">{{ $data['row']->interview_training }}</textarea>
                        @if($errors->has('interview_training'))
                        <p id="name-error" class="help-block" for="interview_training"><span>{{ $errors->first('interview_training') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Compulsory Internship</label> <br>
                        <textarea name="compulsory_internship" cols="30" rows="5" class="form-control rounded" value="">{{ $data['row']->compulsory_internship }}</textarea>
                        @if($errors->has('personal_career_guidance'))
                        <p id="name-error" class="help-block" for="compulsory_internship"><span>{{ $errors->first('compulsory_internship') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Capstone project</label> <br>
                        <textarea name="capstore_project" cols="30" rows="5" class="form-control rounded" value="">{{ $data['row']->capstore_project }}</textarea>
                        @if($errors->has('personal_career_guidance'))
                        <p id="name-error" class="help-block" for="capstore_project"><span>{{ $errors->first('capstore_project') }}</span></p>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="image">Logo</label>
                        <input class="form-control rounded" type="file" name="image" id="image" value="" accept="image/png, image/gif, image/jpeg">
                    </div>
                </div>

                <div class="col-md-3">
                    @if($data['row']->image)
                    <div class="form-group">
                        <label for=""></label><br>
                        <img src="{{ asset($data['row']->image) }}" class="img  img-responsive" width="=100px" height="100px" alt="">
                    </div>
                    @endif
                </div>
            </div>
            <!-- Begin Progress Bar Buttons-->
            <button type="reset" class="btn btn-warning btn-sm" style="cursor: pointer;"><i class="fa fa-ban"></i> Reset</button>
            <button class="btn btn-success btn-sm" type="submit" style="cursor: pointer;"> <i class="fa fa-paper-plane"></i> Submit </button>
            <!-- End Progress Bar Buttons-->
        </form>
    </div>
</div>
@endsection