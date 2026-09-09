<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends DM_BaseController
{
    protected $panel = 'Services';
    protected $base_route = 'admin.services';
    protected $view_path = 'admin.services';
    protected $model;
    protected $table;
    protected $file;


    public function __construct(Services $model, File $file)
    {
        $this->model = $model;
        $this->file = $file;

    }
    public function index()
    {
        $data['rows'] = $this->model->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title'           => 'required|max:225',
            'description'     => 'required',
            'image'           => 'required|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        if ($this->model->storeData($request, $request->title, $request->description, $request->image, $request->images, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($id)
    {
        $data['rows'] = $this->model::where('id', '=', $id)->first();
        $data['file'] = File::where('service_id', '=', $id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'           => 'required|max:225',
            'description'     => 'required',
            'image'           => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        ]);

        if ($this->model->updateData($request, $id, $request->title, $request->description, $request->image, $request->images, $request->status)) {
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

    public function destroyFile($service_id)
    {
        $row = $this->file::findOrFail($service_id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file::destroy($service_id);
    }
}
