<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends DM_BaseController
{
    protected $panel = 'Album';
    protected $base_route = 'admin.album';
    protected $view_path = 'admin.album';
    protected $model;
    protected $table;

    public function __construct(Album $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['rows'] = $this->model->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['rows'] = $this->model->getPost();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:225',
            'image'           => 'required|mimes:jpeg,jpg,JPG,JPEG,png,gif|max:50000',
        ]);

        if ($this->model->storeData($request, $request->title, $request->image, $request->post_id, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        $data['post'] = $this->model->getPost();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'           => 'required|max:225',
            'image'           => 'sometimes|mimes:jpeg,jpg,JPG,JPEG,png,gif|max:50000',
        ]);

        if ($this->model->updateData($request, $id, $request->title,  $request->image, $request->post_id, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function destroy(Request $request, $id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->image;
        // dd($file_path);
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
}
