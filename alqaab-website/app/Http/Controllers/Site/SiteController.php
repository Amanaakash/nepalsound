<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Admin\DM_BaseController;
use App\Models\Album;
use App\Models\Eloquent\DM_Post;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Book;
use App\Models\BookCover;
use App\Models\Career;
use App\Models\Clients;
use App\Models\Contact;
use App\Models\DemanCourses;
use App\Models\File;
use App\Models\Gallery;
use App\Models\Industryready;
use App\Models\Menu;
use App\Models\OnlinePayment;
use App\Models\Photos;
use App\Models\Section;
use App\Models\Services;
use App\Models\ServicesCover;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Certificate;
use Illuminate\Http\Request;


class SiteController extends DM_BaseController
{
    protected $panel;
    protected $base_route = 'site';
    protected $view_path = 'site';
    protected $model;
    protected $table;
    protected $contact_email;
    protected $dm_post;
    protected $email;
    protected $document_path;
    protected $folder_path_image;
    protected $folder_path_file;
    protected $folder = 'contact_document';
    protected $prefix_path_image = '/upload_file/contact_document/';

    public function __construct(Request $request, DM_Post $dm_post, Setting $setting)
    {
        $this->dm_post = $dm_post;
        $this->email = $setting::pluck('site_email')->first();
        $this->document_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . $this->folder . DIRECTORY_SEPARATOR;
    }

    //Home Page 
    public function index()
    {
        $data['menu']           = Menu::tree();
        $data['banner']         = Banner::where('status', '=', 1)->where('deleted_at', '=', null)->orderBy('order', 'desc')->get();
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        $data['category']       = $this->dm_post::getCategoryList();
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->title] = $this->dm_post::categoryPost($row->id, '6');
            // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
            $data['cat_' . $row->title] = $row->id;
        }
        $data['video']          = Video::where('status', '=', 1)->orderBy('id', 'desc')->get();
        $data['gallery']        = Gallery::where('status', '=', 1)->orderBy('id', 'desc')->get();
        $data['rows']           = Book::where('status', 1)->where('deleted_at', null)->paginate(5);
        //get Services 
        $data['services']       = Services::where('status', 1)->orderBy('id', 'desc')->get();
        $data['testimonial']    = Testimonial::where('status', 1)->orderBy('id', 'desc')->get();
        $data['album']          = Album::where('status', 1)->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.index'), compact('data'));
    }

    //About Us
    public function aboutUs()
    {
        $data['menu']           = Menu::tree();
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        return view(parent::loadView($this->view_path . '.about'), compact('data'));
    }

    //Show BLog
    public function showPost($post_unique_id)
    {
        $data['menu']                  = Menu::tree();
        $data['single']                = $this->dm_post::getSinglePost($post_unique_id);
        // $data['file']               = $this->dm_post::getFile($post_unique_id);
        // $data['single']             = $this->dm_post::getSinglePost($post_unique_id);
        // $data['featured_pages']     = $this->dm_post::featuredPageList();
        $category_id = $data['single']->category_id;
        $data['related_post']          = $this->dm_post::categoryBasedPostRelated($category_id, $post_unique_id);
        //Most Visited
        $data['most_visited_links'] = $this->dm_post::getMostVisitedLinks(10);
        $data['nextPost'] = Blog::where('category_id', '=', $category_id)->orderBy('created_at', 'asc')->first();
        $data['prevPost'] = Blog::where('category_id', '=', $category_id)->orderBy('created_at', 'desc')->first();
        return view(parent::loadView($this->view_path . '.post-single'), compact('data'));
    }
    //Show Page
    public function showPage($post_unique_id)
    {
        $data['menu']              = Menu::tree();
        $data['featured_pages']    = $this->dm_post::featuredPageList();
        $data['single']            = $this->dm_post::getSinglePage($post_unique_id);
        $data['files']             = $this->dm_post::getFile($post_unique_id);
        return view(parent::loadView($this->view_path . '.page-single'), compact('data'));
    }

    //to show post category with post archive
    public function showCategoryPost($category_id)
    {
        $data['menu']              = Menu::tree();
        $data['rows']              = $this->dm_post::categoryBasedPost($category_id);
        $data['category']          = BlogCategory::where('status', '=', 1)->orderBy('order')->get();
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        $data['category_name']     = BlogCategory::where('id', '=', $category_id)->first();
        return view(parent::loadView($this->view_path . '.category'), compact('data'));
    }

    //Contact Us 
    public function contact()
    {
        $data['menu'] = Menu::tree();
        $data['banner']        = Banner::where('status', '=', 1)->where('deleted_at', '=', null)->orderBy('order', 'desc')->first();
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        return view(parent::loadView($this->view_path . '.contact'), compact('data'));
    }

    //album
    // public function gallery()
    // {
    //     $data['menu']    = Menu::tree();
    //     $data['gallery'] = Gallery::where('status', '=', 1)->orderBy('id', 'desc')->get();
    //     return view(parent::loadView($this->view_path . '.gallery'), compact('data'));
    // }

    public function career()
    {
        $data['menu']    = Menu::tree();
        $data['row'] = Career::where('status', 1)->get();
        return view(parent::loadView($this->view_path . '.career'), compact('data'));
    }
    public function career_details(Request $request, $slug)
    {
        $data['menu']    = Menu::tree();
        $data['row'] = Career::where('slug', $slug)->firstOrFail();
        $data['row']->increment('visitor');
        $data['blog'] = Blog::where('status', 1)->orderBy('id', 'DESC')->get();
        return view(parent::loadView($this->view_path . '.career-details'), compact('data'));
    }

    // ----- Sanitizing Laravel Request Inputs -----
    function rip_tags($string)
    {
        // ----- remove HTML TAGs -----
        $string = preg_replace('/<[^>]*>/', ' ', $string);
        // ----- remove control characters -----
        $string = str_replace("\r", '', $string);    // --- replace with empty space
        $string = str_replace("\n", ' ', $string);   // --- replace with space
        $string = str_replace("\t", ' ', $string);   // --- replace with space
        // ----- remove multiple spaces -----
        $string = trim(preg_replace('/ {2,}/', ' ', $string));
        return $string;
    }
    /** Store Message From Contact Us */

    public function storeMessage(Request $request)
    {
        $row = new Contact();
        $request->validate([
            'name' => 'required|max:255',
            'number' => 'required|max:255',
            'address' => 'required|max:255',
            'message' => 'required|max:255',
            'document'    => 'max:5120',

        ]);
        $row->name         = $this->rip_tags($request->name);
        $row->email        = $this->rip_tags($request->email);
        $row->number       = $this->rip_tags($request->number);
        $row->address      = $this->rip_tags($request->address);
        $row->message      = $this->rip_tags($request->message);
        // FIle Upload
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($this->document_path, $fileName);
            $row->document = $fileName;
        }
        $success           =  $row->save();
        if ($success) {
            session()->flash('success', $this->panel . ' मेसेज सफलतापूर्वक पठाइयो ! धन्यवाद');
        } else {
            session()->flash('danger', $this->panel . ' मेसेज पठाउन असफल भयो ! कृपया पुन प्रयास गर्नुहोस्');
        }
        return redirect()->back();
    }
    // Book List
    public function bookList()
    {
        $data['menu']    = Menu::tree();
        $data['rows']    = Book::where('status', 1)->where('deleted_at', null)->paginate(5);
        $data['cover']   = BookCover::where('status', 1)->first();
        return view(parent::loadView($this->view_path . '.book-list'), compact('data'));
    }
    //Detail Book
    public function showBook($post_unique_id)
    {
        $data['menu']    = Menu::tree();
        $data['single']     = $this->dm_post::getSingleBook($post_unique_id);
        $data['file']       = $this->dm_post::getFile($post_unique_id);
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        return view(parent::loadView($this->view_path . '.book-detail'), compact('data'));
    }

    public function Services()
    {
        $data['menu']    = Menu::tree();
        $data['rows']    = Services::where('status', 1)->orderBy('id', 'desc')->get();  //get all services
        $data['featured_pages'] = $this->dm_post::featuredPageList();
        $data['services_cover'] = ServicesCover::where('status', 1)->get();
        return view(parent::loadView($this->view_path . '.services'), compact('data'));
    }

    public function Rentals()
    {
        $data['menu']    = Menu::tree();
        $data['category']       = $this->dm_post::getRentalCategoryList();
        foreach ($data['category'] as $row) {
            $data['cat_post_' . $row->title] = $this->dm_post::RentalcategoryPost($row->id,);
            // $data['cat_post_new'. $row->name] = $this->dm_post::categoryPostNew($row->id, $this->lang_id);
            $data['cat_' . $row->title] = $row->id;
            // get files
        }
        return view(parent::loadView($this->view_path . '.rentals'), compact('data'));
    }

    // public function search(Request $request)
    // {
    //     $data['menu']    = Menu::tree();
    //     $data['featured_pages'] = $this->dm_post::featuredPageList();
    //     $search = $request->search;
    //     $data['rows'] = Blog::where('title', 'like', '%' . $search . '%')->get();
    //     return view(parent::loadView($this->view_path . '.search'), compact('data'));
    // }
    public function search(Request $request)
    {
        $search = $request->search;

        if ($request->ajax() || $request->has('ajax')) {
            $blogs = Blog::where(function($query) use ($search) {
                            $query->where('title', 'like', '%' . $search . '%')
                                ->orWhere('short_description', 'like', '%' . $search . '%');
                        })
                        ->where('status', 1)
                        ->take(5)
                        ->get(['id', 'title', 'post_unique_id'])
                        ->map(function($item) {
                            return [
                                'id' => $item->id,
                                'title' => $item->title,
                                'post_unique_id' => $item->post_unique_id,
                                'type' => 'blog'
                            ];
                        });

            return response()->json($blogs);
        }
        
        // For non-AJAX requests, handle differently or redirect
        return redirect()->route('site.index');
    }
    public function albums()
    {
        $data['menu']    = Menu::tree();
        $data['album']    = Album::where('status', 1)->get();
        return view(parent::loadView($this->view_path . '.albums'), compact('data'));
    }

    public function gallery($id)
    {
        $data['menu']                  = Menu::tree();
        $data['album_title']            = Album::where('id', $id)->first();
        $data['gallery'] = Photos::where('status', 1)->where('album_id', $id)->orderBy('id', 'desc')->get();
        $data['most_visited_links'] = $this->dm_post::getMostVisitedLinks(10);
        $data['album_list'] = Album::where('status', 1)->orderBy('id', 'desc')->get();
        // Get the next post (the one with a higher id)
        $data['nextPost'] = Album::where('created_at', '>', $data['album_title']->created_at)->orderBy('created_at', 'asc')->first();
        // Get the previous post (the one with a lower id)
        $data['prevPost'] = Album::where('created_at', '<', $data['album_title']->created_at)->orderBy('created_at', 'desc')->first();
        return view(parent::loadView($this->view_path . '.gallery'), compact('data'));
    }

    //All Post Show
    public function allPost()
    {
        $data['menu']    = Menu::tree();
        $data['rows']    = Blog::where('status', 1)->where('type', 'post')->orderBy('id', 'desc')->get();
        return view(parent::loadView($this->view_path . '.all-post'), compact('data'));
    }
    //Online Payment
    public function onlinePayment()
    {
        $data['menu']    = Menu::tree();
        return view(parent::loadView($this->view_path . '.online-payment'), compact('data'));
    }
    //Online Payment Store
    public function onlinePaymentStore(Request $request)
    {
        $data['menu']    = Menu::tree();

        // $request->validate([
        //     'full_name' => 'required|max:255',
        //     'email' => 'required|max:255',
        //     'address' => 'required|max:255',
        //     'phone' => 'required|max:255',
        //     'amount' => 'required|max:255',
        //     'remarks' => 'required|max:255',
        //     'screenshot'    => 'max:5120',
        // ]);
        $row              = new OnlinePayment();
        $row->full_name   = $this->rip_tags($request->full_name);
        $row->email       = $this->rip_tags($request->email);
        $row->address     = $this->rip_tags($request->address);
        $row->phone       = $this->rip_tags($request->phone);
        $row->amount      = $this->rip_tags($request->amount);
        $row->remarks     = $this->rip_tags($request->remarks);
        // FIle Upload
        $document_path = getcwd() . DIRECTORY_SEPARATOR . 'upload_file' . DIRECTORY_SEPARATOR . 'online_payment' . DIRECTORY_SEPARATOR;
        $prefix_path_image = '/upload_file/online_payment/';
        if ($request->hasFile('screenshot')) {
            $file = $request->file('screenshot');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move($document_path, $fileName);
            $row->screenshot = $prefix_path_image . $fileName;
        }
        $success           =  $row->save();
        if ($success) {
            session()->flash('alert-success', $this->panel . ' Message Successfully Sent ! Thank You');
        } else {
            session()->flash('alert-danger', $this->panel . ' Message can not be sent ! Please try again');
        }
        return view(parent::loadView($this->view_path . '.online-payment'), compact('data'));
    }
    // requestQuotee
    public function requestQuote()
    {
        $data['menu']    = Menu::tree();
        return view(parent::loadView($this->view_path . '.request-quote'), compact('data'));
    }
    // Services Detail
    public function servicesPhotos($id)
    {
        $data['menu']    = Menu::tree();
        $data['single']  = Services::where('id', $id)->first();
        // dd($data['single']);
        $data['file']    = File::where('service_id', $id)->get();
        $data['most_visited_links'] = $this->dm_post::getMostVisitedLinks(10);
        return view(parent::loadView($this->view_path . '.services-photos'), compact('data'));
    }
       public function show($id)
    {
        $data['menu'] = Menu::tree();
        $data['certificate'] = Certificate::findOrFail($id);
        $data['relatedCertificates'] = Certificate::where('id', '!=', $id)
                                            ->latest()
                                            ->take(5)
                                            ->get();
 
        
    
        
        return view(parent::loadView($this->view_path . '.certificate-details'), compact('data'));
    }
    // In your controller (SiteController or similar), add:

}
