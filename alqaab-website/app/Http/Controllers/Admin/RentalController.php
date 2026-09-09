<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends DM_BaseController
{
    protected $panel = 'Rental';
    protected $base_route = 'admin.rental';
    protected $view_path = 'admin.rental';
    protected $model;
    protected $table;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'rental';
    protected $prefix_path_image = '/upload_file/rental/';
    protected $file_model;

    public function __construct(Rental $model, File $file)
    {
        $this->model             = $model;
        $this->file_model        = $file;
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }
    public function index()
    {
        $data['row']              = $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $data['rows']             = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        // $rules = $this->model->getRules();
        // $request->validate($rules);
        if ($this->model->storeData($request, $request->category_id, $request->title, $request->image, $request->file_title, $request->files, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function edit($rental_unique_id)
    {
        $data = [];
        $data['rows']              = $this->model::where('rental_unique_id', '=', $rental_unique_id)->first();
        $data['file']              = $this->file_model::where('rental_unique_id', '=', $rental_unique_id)->get();
        $data['category']          = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $rental_unique_id)
    {
        // $rules = $this->model->editRules();
        // $request->validate($rules);
        if ($this->model->updateData($request, $rental_unique_id, $request->category_id, $request->title, $request->image, $request->file_title, $request->files, $request->status)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }
    public function destroy($id)
    {
        $row = $this->model::findOrFail($id);
        $file_path = getcwd() . $row->thumbs;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        foreach ($row as $row) {
            $this->model::where('id', '=', $id)->delete();
        }
    }
    public function destroyFile($id)
    {
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }
}
