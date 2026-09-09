<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CareerCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CareerCategoryController extends DM_BaseController
{
    protected $panel = 'Career Category';
    protected $base_route = 'admin.careercategory';
    protected $view_path = 'admin.careercategory';
    protected $model;
    protected $table;

    public function __construct(CareerCategory $model)
    {
        $this->model = $model;
    }
    public function index()
    {
        $data['row'] = DB::table('career_categories')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $model = $this->model;
        $model->title     = $request->title;
        $model->status    = $request->status ? 1 : 0;

        $success          = $model->save();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        } else {
            return redirect()->route($this->base_route . '.index');
        }
    }
    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->model->findorFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->model->getRules($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $this->model::findorFail($id);

        $data->title           = $request->title;
        $data->status          = $request->status ? true : false;

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
        $data = $model::findorFail($id);
        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        }
    }
}
