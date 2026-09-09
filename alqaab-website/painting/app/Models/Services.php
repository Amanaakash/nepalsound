<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Services extends DM_BaseModel
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'services';

    protected $folder_path_image;
    protected $folder_path_images;
    protected $folder_path_file;
    protected $folder = 'services';
    protected $images = 'services/images';
    protected $prefix_path_image = '/upload_file/services/';
    protected $prefix_path_images = '/upload_file/services/images/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_images = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->images . DIRECTORY_SEPARATOR;
    }


    public function storeData(Request $request, $title, $description, $image, $images,  $status)
    {
        // dd($clients_types ,$name, $url, $image, $status);
        $model =                              new Services;
        $model->title                         = $title;
        $model->description                   = $description;
        $model->status                        = $status;
        if ($request->hasFile('image')) {
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $model->save();
        if ($request->hasFile('images')) {
            $images = parent::uploadMultipleImages($request, $this->folder_path_images, $this->prefix_path_images, 'images', '', '');
            if (isset($images)) {
                foreach ($images as $file_row)
                    File::create([
                        'service_id' => $model->id,
                        'title' => $model->title,
                        'file' => $file_row,
                    ]);
            }
        }

        return true;
    }

    public function updateData(Request $request, $id, $title, $description, $image, $images, $status)
    {
        // dd($title ,$description, $image, $status);
        $model                                = Services::findOrFail($id);
        $model->title                         = $title;
        $model->description                   = $description;
        $model->status                        = $status;
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $model->image;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $success = $model->save();
        if ($request->hasFile('images')) {
            $images = parent::uploadMultipleImages($request, $this->folder_path_images, $this->prefix_path_images, 'images', '', '');
            if (isset($images)) {
                foreach ($images as $file_row)
                    File::create([
                        'service_id' => $model->id,
                        'title' => $model->title,
                        'file' => $file_row,
                    ]);
            }
        }
        return true;
    }
}
