<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookCover extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'book_covers';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'book_covers';
    protected $prefix_path_image = '/upload_file/book_covers/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    public function getRules()
    {
        $rules = array(
            'title'             => 'required|string|max:225|min:2',
            'image'            => 'required|mimes:jpeg,jpg,png,gif|max:50000',
        );
        return $rules;
    }
    public function editRules()
    {
        $rules = array(
            'title'             => 'required|string|max:225|min:2',
            'image'             => 'sometimes|mimes:jpeg,jpg,png,gif|max:50000',
        );
        return $rules;
    }

    public function storeData(Request $request, $title, $status, $image)
    {
        // dd($title, $status, $image);
        if ($request->hasFile('image')) {
            $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        } else {
            $post_thumbnail = '';
        }
       
        $post[] = [
            'title' => $title,
            'thumbs' => $post_thumbnail,
            'status' => $status,
            'created_at' => new DateTime(),
        ];
        if (BookCover::insert($post)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $id, $title, $status, $image)
    {
        $data = BookCover::where('id', '=', $id)->first();
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $data->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        
        $data->title = $title;
        $data->status = $status;
        $data->updated_at = new DateTime();
        $data->save();
        if ($data->save()) {
            return true;
        } else {
            return false;
        }
    }
}
