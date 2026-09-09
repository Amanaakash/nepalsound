<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Blog extends DM_BaseModel
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at', 'created_at'];

    protected $panel;
    protected $base_route;
    protected $view_path;
    protected $model;
    protected $table = 'blogs';
    protected $folder_path_image;
    protected $folder = 'blog';
    protected $prefix_path_image = '/upload_file/blog/';
    protected $prefix_path_images = '/upload_file/blog/images/';

    protected $fillable = [
        'title',
        'order'
    ];


    public function __construct()
    {
        $this->folder_path_image = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
        $this->folder_path_file = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR . $this->file . DIRECTORY_SEPARATOR;
        $this->folder_path_images = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
    }


    public function postCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    public function postTypes()
    {
        return $this->belongsTo(Types::class, 'types_id');
    }

    public function LocationTypes()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    //POST
    public function getRules()
    {
        $rules = array(
            // 'category_id'            => 'required|max:255',
            'title'                  => 'required|max:225',
            'image'                  => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:50000',
            'status'                 => 'required|boolean'
        );
        return $rules;
    }
    //Page
    public function getRulesPage()
    {
        $rules = array(
            'title'                  => 'required|max:225',
            'image'                  => 'sometimes|mimes:jpeg,jpg,png,gif,webp|max:50000',
            'brochure'               => 'sometimes|max:50000',
            'status'                 => 'required|boolean'
        );
        return $rules;
    }

    public function getData()
    {
        $data = Blog::where('deleted_at', '=', null)
            ->orderBy('id', 'DESC')->get();
        return $data;
    }
    public function getCategory()
    {
        $data = DB::table('blog_categories')->where('status', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return $data;
    }

    public function storeData(Request $request, $category_id, $type, $title, $short_description,  $status, $featured, $image, $publish_date, $thumbs_2, $images, $url)
    {
        // dd($category_id, $type, $title, $short_description,  $status, $featured, $image, $icon);
        $post_unique_id = uniqid(Auth::user()->id . '_');
        if ($request->hasFile('image')) {
            $post_thumbnail = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        } else {
            $post_thumbnail = null;
        }
        // for  thumbs_2
        if ($request->hasFile('thumbs_2')) {
            $post_thumbnail_2 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs_2');
        } else {
            $post_thumbnail_2 = null;
        }

        if ($request->hasFile('images')) {
            $images = parent::uploadMultipleImages($request, $this->folder_path_images, $this->prefix_path_images, 'images', '', '');
            if (isset($images)) {
                foreach ($images as $file_row)
                    File::create([
                        'post_unique_id' => $post_unique_id,
                        'title' => $title,
                        'file' => $file_row,
                    ]);
            }
        }
        $posts[] = [
            'post_unique_id'                     => $post_unique_id,
            'category_id'                        => $category_id,
            'type'                               => $type,
            'title'                              => $title,
            'slug'                               => Str::slug($title),
            'thumbs'                             => $post_thumbnail,
            'short_description'                  => $short_description,
            'publish_date'                       => $publish_date,
            'thumbs_2'                           => $post_thumbnail_2,
            'url'                                => $url,
            'status'                             => $status,
            'featured'                           => $featured,
            'created_at'                         => new DateTime(),
        ];
        if (Blog::insert($posts)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData(Request $request, $post_unique_id, $category_id, $type, $title, $short_description,  $status, $featured, $image, $publish_date, $thumbs_2, $images, $url)
    {
        // dd($url);
        $blog = Blog::where('post_unique_id', '=', $post_unique_id)->first();
        //for thumbnail
        if ($request->hasFile('image')) {
            $file_path = getcwd() . $blog->thumbs;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $blog->thumbs = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'image');
        }
        // for  thumbs_2
        if ($request->hasFile('thumbs_2')) {
            $file_path = getcwd() . $blog->thumbs_2;
            if (is_file($file_path)) {
                unlink($file_path);
            }
            $blog->thumbs_2 = parent::uploadImage($request, $this->folder_path_image, $this->prefix_path_image, 'thumbs_2');
        }
        if ($request->hasFile('images')) {
            $images = parent::uploadMultipleImages($request, $this->folder_path_images, $this->prefix_path_images, 'images', '', '');
            if (isset($images)) {
                foreach ($images as $file_row)
                    File::create([
                        'post_unique_id' => $post_unique_id,
                        'title' => $title,
                        'file' => $file_row,
                    ]);
            }
        }
        $blog->category_id                          =  $category_id;
        $blog->title                                =  $title;
        $blog->slug                                 =  Str::slug($title);
        $blog->type                                 =  $type;
        $blog->short_description                    =  $short_description;
        $blog->publish_date                         =  $publish_date;
        $blog->url                                  =  $url;
        $blog->status                               =  $status;
        $blog->featured                             =  $featured;
        $blog->updated_at                           =  new DateTime();
        $blog->save();
    }
    
public function searchBlogs($query, $limit = 10)
{
    return Blog::where('deleted_at', null)
        ->where('status', 1)
        ->where(function($q) use ($query) {
            $q->where('title', 'LIKE', '%' . $query . '%')
              ->orWhere('short_description', 'LIKE', '%' . $query . '%');
        })
        ->orderBy('created_at', 'DESC')
        ->limit($limit)
        ->get();
}
    
}
// In your Blog.php model, add this method:
