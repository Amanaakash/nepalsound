<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends DM_BaseController
{
    protected $panel = 'Video';
    protected $base_route = 'admin.video';
    protected $view_path = 'admin.video';
    protected $model;
    protected $table;

    public function __construct(Video $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] = $this->model->paginate(10);
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $video_unique_id = uniqid(Auth::user()->id . '_');

        $video_url = $request->video_url;
        function getYoutubeIdFromUrl($video_url)
        {
            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
            if ($matches) {
                return $matches[2];
            }
        }
        $model                        = $this->model;
        $model->video_unique_id       = $video_unique_id;
        $model->video_title           = $request->video_title;
        $model->video_url             = $video_url;
        $model->video_id              = getYoutubeIdFromUrl($request->video_url);
        $model->status                = $request->status;
        $success                      = $model->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model                               = $this->model::where('id', '=', $id)->first();
        $video_unique_id = uniqid(Auth::user()->id . '_');

        $video_url = $request->video_url;
        function getYoutubeIdFromUrll($video_url)
        {
            preg_match("#([\/|\?|&]vi?[\/|=]|youtu\.be\/|embed\/)([a-zA-Z0-9_-]+)#", $video_url, $matches);
            if ($matches) {
                return $matches[2];
            }
        }
        $model->video_unique_id                = $video_unique_id;
        $model->video_title                    = $request->video_title;
        $model->video_url                      = $video_url;
        $model->video_id                       = getYoutubeIdFromUrll($request->video_url);
        $model->status                         = $request->status;
        $success                             = $model->update();
        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function status(Request $request)
    {
        $row                                    = $this->model;
        $user                                   = $row->findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status added SuccessFully']);
    }

    public function destroy(Request $request, $id)
    {
        $data = $this->model->findOrFail($id);
        if (!$data) {
            $request->session()->flash('success_message', $this->panel . 'does not exists.');
            return redirect()->route($this->base_route);
        }
        $data->destroy($id);
    }

    public function permanentDelete($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->thumbs;
        $file_path_icon = getcwd() . $row->icon;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        if (is_file($file_path_icon)) {
            unlink($file_path_icon);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
}
