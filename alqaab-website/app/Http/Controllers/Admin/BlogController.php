<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\File;
use App\Models\Location;
use App\Models\Types;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends DM_BaseController
{
    protected $panel = 'POST';
    protected $base_route = 'admin.blog';
    protected $view_path = 'admin.blog';
    protected $model;
    protected $table;

    public function __construct(Blog $model, File $file)
    {
        $this->model = $model;
        $this->file_model = $file;
    }
    /** ===================================PAGE================================================== */
    public function indexPage()
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        $data['rows'] = $this->model::where('type', '=', 'page')->where('deleted_at', '=', null)->orderBy('order', 'ASC')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    public function createPage()
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        return view(parent::loadView($this->view_path . '.create'));
    }

    public function storePage(Request $request)
    {
        $rules = $this->model->getRulesPage();
        $request->validate($rules);
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        if ($this->model->storeData($request, $request->category_id, $request->type,  $request->title, $request->short_description, $request->status, $request->featured, $request->image, $request->publish_date, $request->thumbs_2, $request->images, $request->url)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function editPage(Request $request, $post_unique_id)
    {
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        $data['rows'] = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        $data['file'] = File::where('post_unique_id', '=', $post_unique_id)->get();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function updatePage(Request $request, $post_unique_id)
    {

        $rules = $this->model->getRulesPage();
        $request->validate($rules);
        $this->panel = 'Pages';
        $this->base_route = 'admin.page';
        $this->view_path = 'admin.page';
        if ($this->model->updateData($request,  $post_unique_id, $request->category_id, $request->type,  $request->title, $request->short_description, $request->status, $request->featured, $request->image, $request->publish_date, $request->thumbs_2, $request->images, $request->url)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function indexPost()
    {
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        $data['rows'] = $this->model::where('type', '=', 'post')->where('deleted_at', '=', null)->orderBy('id','DESC')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }
    public function create()
    {
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        $data['rows'] = $this->model->getCategory();
        return view(parent::loadView($this->view_path . '.create'), compact('data'));
    }

    public function store(Request $request)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        if ($this->model->storeData($request, $request->category_id, $request->type,  $request->title, $request->short_description, $request->status, $request->featured, $request->image, $request->publish_date, $request->thumbs_2,$request->images, $request->url)) {
            session()->flash('alert-success', $this->panel . '  Successfully Added !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Added');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function editPost(Request $request, $post_unique_id)
    {
        $this->panel      = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path  = 'admin.blog';
        $data['category'] = $this->model->getCategory();
        $data['rows']     = $this->model::where('post_unique_id', '=', $post_unique_id)->first();
        return view(parent::loadView($this->view_path . '.edit'), compact('data'));
    }

    public function update(Request $request, $post_unique_id)
    {
        $rules = $this->model->getRules();
        $request->validate($rules);
        $this->panel = 'Posts';
        $this->base_route = 'admin.blog';
        $this->view_path = 'admin.blog';
        if ($this->model->updateData($request,  $post_unique_id, $request->category_id, $request->type,  $request->title, $request->short_description, $request->status, $request->featured, $request->image, $request->publish_date, $request->thumbs_2, $request->images, $request->url)) {
            session()->flash('alert-success', $this->panel . '  Successfully Updated !');
        } else {
            session()->flash('alert-danger', $this->panel . '  can not be Updated');
        }
        return redirect()->route($this->base_route . '.index');
    }

    public function status(Request $request)
    {
        $row                                    = $this->fiscalYear;
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

    public function destroyFile($id)
    {
        $row = $this->file_model::findOrFail($id);
        $file_path = getcwd() . $row->file;
        if (is_file($file_path)) {
            unlink($file_path);
        }
        $data = $this->file_model::destroy($id);
    }

    public function updateOrder(Request $request)
    {
        // dd($request->order);
        $posts = $this->model::where('type', '=', 'page')->where('deleted_at', '=', NULL)->get();
        //  dd($posts);
        foreach ($posts as $post) {
            foreach ($request->order as $order) {
                if ($order['id'] == $post->id) {
                    $post->update(['order' => $order['position']]);
                }
            }
        }
        return response('Update Successfully.', 200);
    }
}
