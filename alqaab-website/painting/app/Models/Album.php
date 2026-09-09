<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Album extends DM_BaseModel
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'albums';

    protected $folder_path_image;
    protected $folder_path_images;
    protected $folder_path_file;
    protected $folder = 'albums';
    protected $images = 'albums';
    protected $prefix_path_image = '/upload_file/albums/';
    protected $prefix_path_images = '/upload_file/albums/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_images = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->images . DIRECTORY_SEPARATOR;
    }

    public function getPost()
    {
        return Blog::where('status', 1)->get();
    }

    public function postCategory()
    {
        return $this->hasMany('App\Models\Blog', 'id', 'post_id');
    }


    public function storeData(Request $request, $title, $images, $post_id,  $status)
    {
        $model =                              new Album;
        $model->title                         = $title;
        $model->post_id                       = $post_id;
        $model->status                        = $status;
        if ($request->hasFile('image')) {
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $model->save();
        return true;
    }

    public function updateData(Request $request, $id, $title, $images, $post_id, $status)
    {
        // dd($title ,$description, $image, $status);
        $model                                = Album::findOrFail($id);
        $model->title                         = $title;
        $model->post_id                       = $post_id;
        $model->status                        = $status;
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $model->image;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $model->save();
        return true;
    }
}
