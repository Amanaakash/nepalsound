<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\File;
use Illuminate\Http\Request;

class BookController extends DM_BaseController
{
    protected $panel = 'Book';
    protected $base_route = 'admin.book';
    protected $view_path = 'admin.book';
    protected $model;
    protected $file_model;
    protected $table;

    public function __construct(Book $model, File $file)
    {
        $this->model = $model;
        $this->file_model = $file;
    }
    public function index()
    {
        $data['rows'] =  $this->model->getData();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $rules = $this->model->getRules();
        $request->validate($rules);
        if ($this->model->storeData($request, $request->title, $request->short_description, $request->file_title, $request->status, $request->image, $request->files)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function edit($post_unique_id)
    {
        $data['rows'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['file'] = $this->file_model::where('post_unique_id', '=', $post_unique_id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $post_unique_id)
    {
        $rules = $this->model->editRules();
        $request->validate($rules);
        if ($this->model->updateData($request, $post_unique_id, $request->title, $request->short_description, $request->file_title, $request->status, $request->image, $request->files)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
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

    public function deletedPost()
    {
        $data['rows'] = $this->model->where('deleted_at', '!=', null)->get();
        return view(parent::loadView($this->view_path . '.deleted'), compact('data'));
    }


    public function restore($id)
    {
        $data = $this->model::where('id', '=', $id)->get();
        foreach ($data as $row) {
            $row->deleted_at = null;
            $row->save();
        }
    }

    public function permanentDelete($id)
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
