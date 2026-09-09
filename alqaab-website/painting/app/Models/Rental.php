<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Rental extends DM_BaseModel
{
    use HasFactory;
    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'rentals';
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'rental';
    protected $prefix_path_image = '/upload_file/rental/';
    protected $prefix_path_file = '/upload_file/rental/file/';

    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR;
    }

    public function getData()
    {
        return $this->orderBy('id', 'ASC')->get();
    }

    public function getCategory()
    {
        $data = DB::table('rental_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function getCategoryTitle()
    {
        return $this->belongsTo(RentalCategory::class, 'category_id');
    }

    public function storeData(Request $request, $category_id, $title, $image, $file_title, $files, $status)
    {
        // dd($category_id,$title, $image, $file_title, $files, $status);
        $rental_unique_id = uniqid(Auth::user()->id . '_');
        if ($request->hasFile('image')) {
            $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image', '', '');
        } else {
            $post_thumbnail = '';
        }
        $array_file_title = array_filter($file_title);
        // for  multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }
        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }
        $post[] = [
            'rental_unique_id' => $rental_unique_id,
            'category_id' => $category_id,
            'title' => $title,
            'thumbs' => $post_thumbnail,
            'status' => $status,
            'created_at' => new DateTime(),
        ];
        if (isset($array_file)) {
            foreach ($array_file as $file_row)
                File::create([
                    'rental_unique_id'      => $rental_unique_id,
                    'title'                 => $file_row[0],
                    'file'                  => $file_row[1],
                ]);
        }
        if (Rental::insert($post)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $rental_unique_id, $category_id, $title, $image, $file_title, $files, $status)
    {
        $data = Rental::where('rental_unique_id', '=', $rental_unique_id)->first();
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $data->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $data->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        $array_file_title = array_filter($file_title);
        // for  multiple files
        if ($request->hasFile('files')) {
            $post_files = parent::uploadMultipleFiles($request, $this->folder_path_file, $this->prefix_path_file, 'files');
        } else {
            $post_files = null;
        }
        if (isset($post_files) && isset($array_file_title)) {
            $min = min(count($array_file_title), count($post_files));
            $array_file = array_map(null, array_slice($array_file_title, 0, $min), array_slice($post_files, 0, $min));
        } else {
            $array_file = null;
        }
        $data->title = $title;
        $data->status = $status;
        $data->updated_at = new DateTime();
        $data->save();
        if (isset($array_file)) {
            foreach ($array_file as $file_row)
                File::create([
                    'rental_unique_id' => $rental_unique_id,
                    'title' => $file_row[0],
                    'file' => $file_row[1],
                ]);
        }
        if ($data->save()) {
            return true;
        } else {
            return false;
        }
    }
}
