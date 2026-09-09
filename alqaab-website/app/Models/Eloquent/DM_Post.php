<?php

namespace App\Models\Eloquent;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Book;
use App\Models\File;
use App\Models\InterviewQuestion;
use App\Models\Language;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Rental;
use App\Models\Section;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DM_Post extends Model
{
    use HasFactory;
    /**
     * get all the multiple language names
     */
    public static function getLanguage()
    {
        return Language::where('status', '=', 1)->where('deleted_at', '=', null)->get();
    }

    //get all the post 
    public static function getAllPosts()
    {
        return Blog::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'post')->get();
    }

    //get all the page 
    public static function getAllPages()
    {
        return Blog::where('deleted_at', '=', null)->where('status', '=', 1)->where('type', '=', 'page')->get();
    }

    /** Category List */
    public static function getCategoryList()
    {
        $data = DB::table('blog_categories')
            //      ->join('categories_name', 'blog_categories.id', '=', 'categories_name.category_id')
            //      //->where('categories_name.lang_id', '=', $lang_id)
            //      ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')
            ->orderBy('order')
            ->get();
        return $data;
    }
    public static function getRentalCategoryList()
    {
        $data = DB::table('rental_categories')
            //      ->join('categories_name', 'blog_categories.id', '=', 'categories_name.category_id')
            //      //->where('categories_name.lang_id', '=', $lang_id)
            //      ->select('categories.*', 'categories_name.lang_id', 'categories_name.name as category_name')
            // ->orderBy('id', 'asc')
            ->get();
        return $data;
    }

    public static function getCategory($category_id)
    {
        $data = DB::table('blog_categories')->orderBy('order')
            ->where('blog_categories.id', '=', $category_id)
            ->orderBy('order')
            ->first();
        return $data;
    }
    

    /** featured list page */
    public static function featuredPageList()
    {
        return Blog::where('deleted_at', '=', NULL)->where('status', '=', 1)->where('featured', '=', 1)->where('type', '=', 'page')->where('order', '!=', NULL)->orderBy('order')->get();
    }

    //get Popular Post
    public static function getPopularPost($category_id, $number = '3')
    {
        $current_news = DB::table('blogs')->where('type', '=', 'post')->where('status', '=', 1)->where('category_id', '=', $category_id)->where('deleted_at', '=', null)->orderBy('created_at', 'desc')->take($number)->get();
        return $current_news;
    }

    //get category base post
    public static function categoryBasedPost($category_id)
    {
        return Blog::where('deleted_at', '=', null)->where('category_id', '=', $category_id)->where('status', '=', 1)->paginate(6);
    }

    //get category base post
    public static function categoryPost($category_id, $number = '3')
    {
        return Blog::latest('id')->where('deleted_at', '=', null)->where('category_id', '=', $category_id)->orderBy('id', 'desc')->where('status', '=', 1)->take($number)->get();
    }
    public static function RentalcategoryPost($category_id)
    {
        return Rental::where('category_id', '=', $category_id)->orderBy('id', 'asc')->where('status', '=', 1)->get();
    }

    //get categories
    public static function getCategories()
    {
        return BlogCategory::get();
    }

    //get all the menu with public status
    public static function getMenu()
    {
        return Menu::where('status', '=', 1)->get();
    }

    // get the single post of particular language
    public static function getSinglePost($post_unique_id)
    {
        $post = Blog::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->where('type', '=', 'post')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    //get category base related posr
    public static function categoryBasedPostRelated($category_id,  $post_unique_id)
    {
        return Blog::where('deleted_at', '=', null)
            ->where('category_id', '=', $category_id)
            ->where('post_unique_id', '!=', $post_unique_id)
            ->orderBy('id', 'desc')
            ->where('status', '=', 1)->take(3)->get();
    }
    //get category base Latest
    public static function categoryBasedPostLatest()
    {
        return Blog::where('deleted_at', '=', null)
            ->orderBy('created_at', 'desc')
            ->where('status', '=', 1)->take(3)->get();
    }

     // most visited post
     public static function getMostVisitedLinks($number = '10')
     {
         return Blog::where('deleted_at', '=', null)
             ->where('type', '=', 'post')
             ->orderBy('visit_no', 'desc')
             ->take($number)
             ->get();
     }
 


    // get the single post of particular language
    public static function getSingleBook($post_unique_id)
    {
        $post = Book::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }


    // get the single post of particular language
    public static function getSinglePage($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Blog::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->where('type', '=', 'page')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    // get interview wise POST
    public static function getSingleInterviewQuestion($id)
    {
        $post = InterviewQuestion::where('category_id', '=', $id)
            ->get();
        return $post;
    }

    // get the single post of staff
    public static function getStaffDetail($id)
    {
        $post = Staff::where('id', '=', $id)
            ->first();
        return $post;
    }

    // get the file
    public static function getFile($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->get();
    }
    public static function getRentalFile($rental_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->get();
    }
    public static function getTools($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->where('title', '=', 'tools')->get();
    }
    public static function getBrochure($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->where('title', '=', 'brochure')->first();
    }
    public static function getAdvantage($post_unique_id)
    {
        return File::where('post_unique_id', '=', $post_unique_id)->where('title', '=', 'advantage')->get();
    }

    // get the single post of particular language
    public static function getSingleBlog($post_unique_id)
    {
        // $post = Post::where('deleted_at', '=', null)->where('type', '=', 'post')->where('post_unique_id', '=', $post_unique_id)->where('lang_id', '=', $lang_id)->first();
        $post = Blog::where('deleted_at', '=', null)
            ->where('post_unique_id', '=', $post_unique_id)
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPost()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'about-us')
            ->orderBy('order', 'desc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }


    public static function getSectionPostIndex()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'about-us')
            ->orderBy('order', 'asc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPostIndexCurriculum()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'curriculam')
            ->orderBy('order', 'asc')
            ->first();
        if (isset($post)) {
            $post->increment('visit_no');
        }
        return $post;
    }

    public static function getSectionPostIndexFacilities()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'facilities')
            ->orderBy('order', 'asc')
            ->take(2)
            ->get();
        return $post;
    }

    public static function getSectionPostIndexFacilitiesSecond()
    {
        $post = Section::where('status', '=', 1)
            ->where('position', '=', 'facilities')
            ->orderBy('order', 'desc')
            ->take(2)
            ->get();
        return $post;
    }
}
