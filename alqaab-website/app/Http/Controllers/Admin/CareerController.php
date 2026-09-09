<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\CareerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CareerController extends DM_BaseController
{
    protected $panel = 'Career';
    protected $base_route = 'admin.career';
    protected $view_path = 'admin.career';
    protected $model;
    protected $table;

    public function __construct(Career $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['row'] = Career::with('category')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        $data['row'] = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model                  = $this->model;
        $model->title           = $request->title;
        $model->category_id     = $request->category_id;
        $model->description     = $request->description;
        $model->status          = $request->status ? 1 : 0;
        $model->visitor         = 0;
        $model->slug            = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('public_path'('upload_file/career'), $imageName);
        } else {
            $imageName = null;
        }
        $model->image = $imageName;
        $success = $model->save();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        } else {
            return redirect()->route($this->base_route . '.index');
        }
    }
    public function edit($id)
    {
        $data = [];
        $data['category'] = $this->model->getCategory();
        $data['row'] = $this->model->findOrFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data                    = $this->model::findOrFail($id);
        $data->category_id       = $request->category_id;
        $data->title             = $request->title;
        $data->description       = $request->description;
        $data->status            = $request->status ? true : false;
        $data->visitor           = 0;

        if ($request->hasFile('image')) {
            if ($data->image) {
                $image_path = public_path("upload_file/career/{$data->image}");
                if (file_exists($image_path)) {
                    unlink($image_path);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_file/career'), $imageName);
            $data->image = $imageName;
        }

        $success = $data->save();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        } else {
            return redirect()->route($this->base_route . '.index');
        }
    }
    public function delete($id)
    {
        $model = $this->model;
        $data = $model::findOrFail($id);

        if ($data->image) {
            $image_path = public_path("upload_file/career/{$data->image}");
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        }
    }
}
