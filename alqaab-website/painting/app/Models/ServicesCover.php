<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class ServicesCover extends DM_BaseModel
{
    use HasFactory;

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'services_covers';

    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'servicescover';
    protected $prefix_path_image = '/upload_file/servicescover/';
    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }


    public function storeData(Request $request, $title, $image,  $status)
    {
        // dd($clients_types ,$name, $url, $image, $status);
        $model =                              new ServicesCover;
        $model->title                         = $title;
        $model->status                        = $status;
        if ($request->hasFile('image')) {
            $model->image = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        }
        $model->save();
        return true;
    }

    public function updateData(Request $request, $id, $title, $image, $status)
    {
        // dd($title ,$description, $image, $status);
        $model                                = ServicesCover::findOrFail($id);
        $model->title                         = $title;
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
