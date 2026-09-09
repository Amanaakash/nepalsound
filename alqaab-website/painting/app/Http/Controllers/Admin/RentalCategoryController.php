<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentalCategory;
use Illuminate\Http\Request;

class RentalCategoryController extends DM_BaseController
{
    protected $panel = 'Rental Category';
    protected $base_route = 'admin.rental-category';
    protected $view_path = 'admin.rental-category';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'rentalcategory';
    protected $prefix_path_image = '/upload_file/rentalcategory/';


    public function __construct(RentalCategory $model)
    {
        $this->model = $model;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index()
    {
        $data['row'] = $this->model::all();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // $validator = $this->model->getRules($request->all());

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        $model = $this->model;
        $model->title        = $request->title;
        $model->description  = $request->description;
        if ($request->hasFile('thumbs')) {
            $model->thumbs            = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs', '', '');
        }
        $model->status       = $request->status;
        $success             = $model->save();

        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->model->findorFail($id);
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $validator = $this->model->getRules($request->all());

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        $data = $this->model::findorFail($id);
        $data->title           = $request->title;
        $data->description     = $request->description;
        if ($request->hasFile('thumbs')) {
            $file_path = getcwd() . $this->model->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->thumbs            = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs', '', '');
        }
        $data->status          = $request->status;
        $success = $data->save();

        if ($success) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($id)
    {
        $model = $this->model;
        $data = $model::findorFail($id);
        $success = $data->delete();

        if ($success) {
            return redirect()->route($this->base_route . '.index');
        }
    }
}
