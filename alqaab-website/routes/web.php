<?php

use App\Http\Controllers\Site\SiteController;
use App\Models\CareerCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Site\EventController;
use App\Http\Controllers\Admin\AdminEventController;
use App\Http\Controllers\Admin\OurTeamController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * / Password Reset Routes...
 */

// Add this route in routes/web.php


Route::get('password/resetform',                        [Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.resetform');
Route::post('password/email',                           [Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/request/{token}',                  [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.request.token');
Route::post('password/update',                          [Auth\ResetPasswordController::class, 'reset'])->name('password.update');
/**
 * Authentication route
 */
Auth::routes();
Route::get('login',                                      function () {
    return view('admin.error.404');
})->name('login');
Route::get('admin/login',                                function () {
    return redirect()->route("login");
});
Route::get('login',                                    [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
/**
 * All Ajax Routes
 */
Route::post('/getDistrict',                              [App\Http\Controllers\DropdownController::class, 'getDistrict'])->name('getDistrict'); // for get district list
Route::post('/getPalika',                                [App\Http\Controllers\DropdownController::class, 'getPalika'])->name('getPalika'); // for get palika list
Route::post('/getAccount',                               [App\Http\Controllers\DropdownController::class, 'getAccount'])->name('getAccount'); // for get account list

/**
 * Admin Dashboard Route
 */
Route::group(['prefix' => '/admin',                       'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard',                              [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
    /**
     * Users Routes
     */
    Route::group(['prefix' => 'users',                        'as' => 'users.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('create',                               [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                         [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('delete');
    });

    /**
     * Roles Routes
     */
    Route::group(['prefix' => 'roles',                   'as' => 'roles.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\RoleController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\RoleController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\RoleController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\RoleController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('delete');
    });

    /**
     * Messages Routes
     */
    Route::group(['prefix' => 'message',                 'as' => 'message.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\MessageController::class, 'index'])->name('index');
        Route::get('create',                             [App\Http\Controllers\Admin\MessageController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\MessageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\MessageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\MessageController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                       [App\Http\Controllers\Admin\MessageController::class, 'delete'])->name('delete');
    });
    /**
     * Settings Routes
     */
    Route::group(['prefix' => 'setting',                   'as' => 'setting.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('index');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('update');

        Route::group(['prefix' => 'social',               'as' => 'social.'], function () {
            Route::get('',                                 [App\Http\Controllers\Admin\SettingsController::class, 'getSocialProfiles'])->name('index');
            Route::post('{social}',                        [App\Http\Controllers\Admin\SettingsController::class, 'updateSocialProfiles'])->name('store');
        });

        Route::group(['prefix' => 'footer',               'as' => 'footer.'], function () {
            Route::get('',                                [App\Http\Controllers\Admin\CommonController::class, 'getFooterSetting'])->name('index');
            Route::post('/update/{id}',                   [App\Http\Controllers\Admin\CommonController::class, 'updateFooterSetting'])->name('update');
        });

        Route::group(['prefix' => 'industry',               'as' => 'industryready.'], function () {
            Route::get('',                                [App\Http\Controllers\Admin\IndustryreadyController::class, 'index'])->name('index');
            Route::post('/update/{id}',                   [App\Http\Controllers\Admin\IndustryreadyController::class, 'update'])->name('update');
        });
    });
    /**
     * User Profile Routes
     */
    Route::group(['prefix' => 'user_profile',           'as' => 'user_profile.'], function () {
        Route::get('/',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'index'])->name('index');
        Route::get('/create',                            [App\Http\Controllers\Admin\UsersProfileController::class, 'create'])->name('create');
        Route::post('',                                  [App\Http\Controllers\Admin\UsersProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                         [App\Http\Controllers\Admin\UsersProfileController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                      [App\Http\Controllers\Admin\UsersProfileController::class, 'update'])->name('update');
        Route::delete('/{id}',                           [App\Http\Controllers\Admin\UsersProfileController::class, 'destroy'])->name('destroy');
        Route::get('/show}',                             [App\Http\Controllers\Admin\UsersProfileController::class, 'show'])->name('show');
        Route::post('/}',                                [App\Http\Controllers\Admin\UsersProfileController::class, 'passwordChange'])->name('passwordChange');
    });
    /**
     * Banner Routes ////
     */
    Route::group(['prefix' => 'banner',                   'as' => 'banner.'], function () {
        Route::get('/',                                    [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('index');
        Route::get('/create',                              [App\Http\Controllers\Admin\BannerController::class, 'create'])->name('create');
        Route::post('',                                    [App\Http\Controllers\Admin\BannerController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                           [App\Http\Controllers\Admin\BannerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                        [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('update');
        Route::delete('/{id}',                             [App\Http\Controllers\Admin\BannerController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                          [App\Http\Controllers\Admin\BannerController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                         [App\Http\Controllers\Admin\BannerController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',             [App\Http\Controllers\Admin\BannerController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * Clients Routes ////
     */
    Route::group(['prefix' => 'clients',                      'as' => 'clients.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\ClientsController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\ClientsController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\ClientsController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\ClientsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\ClientsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\ClientsController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                              [App\Http\Controllers\Admin\ClientsController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                             [App\Http\Controllers\Admin\ClientsController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                 [App\Http\Controllers\Admin\ClientsController::class, 'permanentDelete'])->name('delete');
    });

    /**
     * Blog Category Routes ////
     */
    Route::group(['prefix' => 'blogcategory',                     'as' => 'blogcategory.'], function () {
        Route::get('/',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                    [App\Http\Controllers\Admin\BlogCategoryController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\BlogCategoryController::class, 'store'])->name('store');
        Route::get('{blogcategory}/edit/',                       [App\Http\Controllers\Admin\BlogCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                              [App\Http\Controllers\Admin\BlogCategoryController::class, 'update'])->name('update');
        Route::delete('/{category}',                             [App\Http\Controllers\Admin\BlogCategoryController::class, 'destroy'])->name('destroy');
        /** Category Nestable Order */
        Route::post('order',                                     [App\Http\Controllers\Admin\BlogCategoryController::class, 'storeOrder'])->name('order');
    });

    /**
     * Blog POST Routes ////
     */
    Route::group(['prefix' => 'post',                           'as' => 'blog.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPost'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPost'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Blog Pages Routes ////
     */
    Route::group(['prefix' => 'page',                           'as' => 'page.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BlogController::class, 'indexPage'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BlogController::class, 'createPage'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BlogController::class, 'storePage'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BlogController::class, 'editPage'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BlogController::class, 'updatePage'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BlogController::class, 'destroy'])->name('destroy');

        Route::get('delete_item',                               [App\Http\Controllers\Admin\BlogController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BlogController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\BlogController::class, 'destroyFile'])->name('destroyFile');

        Route::post('/sortabledatatable',                       [App\Http\Controllers\Admin\BlogController::class, 'updateOrder'])->name('ShortData');
    });
    /**
     * Book List Routes ////
     */
    Route::group(['prefix' => 'book',                          'as' => 'book.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BookController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BookController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BookController::class, 'store'])->name('store');
        Route::get('/edit/{post_unique_id}',                    [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('edit');
        Route::post('/update/{post_unique_id}',                 [App\Http\Controllers\Admin\BookController::class, 'update'])->name('update');

        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('destroy');
        Route::get('delete_item',                               [App\Http\Controllers\Admin\BookController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\BookController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\BookController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{id}',                            [App\Http\Controllers\Admin\BookController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Book Cover List Routes ////
     */
    Route::group(['prefix' => 'bookcover',                          'as' => 'bookcover.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\BookCoverController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\BookCoverController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\BookCoverController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\BookCoverController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\BookCoverController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\BookCoverController::class, 'destroy'])->name('destroy');
    });


    // CareerCategory routes 
    Route::group(['prefix' => 'careercategory',                  'as' => 'careercategory.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\CareerCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\CareerCategoryController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\CareerCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\CareerCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\CareerCategoryController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                              [App\Http\Controllers\Admin\CareerCategoryController::class, 'delete'])->name('delete');
    });

    // career routes
    Route::group(['prefix' => 'career',                         'as' => 'career.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\CareerController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\CareerController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\CareerController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\CareerController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\CareerController::class, 'update'])->name('update');
        Route::get('/delete/{id}',                              [App\Http\Controllers\Admin\CareerController::class, 'delete'])->name('delete');
    });

    /**
     * Language Routes ////
     */
    Route::group(['prefix' => 'language',                       'as' => 'language.'], function () {
        Route::get('/',                                         [App\Http\Controllers\Admin\LanguageController::class, 'index'])->name('index');
        Route::get('/create',                                   [App\Http\Controllers\Admin\LanguageController::class, 'create'])->name('create');
        Route::post('',                                         [App\Http\Controllers\Admin\LanguageController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                [App\Http\Controllers\Admin\LanguageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                             [App\Http\Controllers\Admin\LanguageController::class, 'update'])->name('update');
        Route::delete('/{id}',                                  [App\Http\Controllers\Admin\LanguageController::class, 'destroy'])->name('destroy');
        /**Soft Delete Url */
        Route::get('delete_item',                               [App\Http\Controllers\Admin\LanguageController::class, 'deletedPost'])->name('deleted_item');
        Route::put('restore/{id}',                              [App\Http\Controllers\Admin\LanguageController::class, 'restore'])->name('restore');
        Route::delete('permanent_delete/{id}',                  [App\Http\Controllers\Admin\LanguageController::class, 'permanentDelete'])->name('delete');
    });


    /**
     * Program Packages  Routes ////
     */
    Route::group(['prefix' => 'menu',                             'as' => 'menu.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\MenusController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\MenusController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\MenusController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\MenusController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\MenusController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\MenusController::class, 'permanentDelete'])->name('destroy');
        /** Menu Nestable Order */
        Route::post('order',                                      [App\Http\Controllers\Admin\MenusController::class, 'storeOrder'])->name('order');
    });


    /**
     * Testimonials Routes ////
     */
    Route::group(['prefix' => 'testimonial',                       'as' => 'testimonial.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\TestimonialController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\TestimonialController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\TestimonialController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\TestimonialController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('destroy');
        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\TestimonialController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\TestimonialController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * Testimonials Routes ////
     */
    Route::group(['prefix' => 'video',                          'as' => 'video.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\VideoController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\VideoController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\VideoController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\VideoController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\VideoController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\VideoController::class, 'permanentDelete'])->name('destroy');
        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\VideoController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\VideoController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * Staff Routes ////
     */
    Route::group(['prefix' => 'staff',                            'as' => 'staff.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\StaffController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\StaffController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\StaffController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\StaffController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\StaffController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\StaffController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\StaffController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Gallery Routes ////
     */
    Route::group(['prefix' => 'gallery',                           'as' => 'gallery.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\GalleryController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\GalleryController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\GalleryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\GalleryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\GalleryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\GalleryController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\GalleryController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * User Messages
     *
     */
    Route::group(['prefix' => 'message',                           'as' => 'message.'], function () {
        Route::get('/',                                            [App\Http\Controllers\Admin\ContactsController::class, 'index'])->name('index');
        Route::get('/create',                                      [App\Http\Controllers\Admin\ContactsController::class, 'create'])->name('create');
        Route::post('',                                            [App\Http\Controllers\Admin\ContactsController::class, 'store'])->name('store');
        Route::get('/show/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'show'])->name('show');
        Route::get('/edit/{id}',                                   [App\Http\Controllers\Admin\ContactsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                                [App\Http\Controllers\Admin\ContactsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('destroy');

        Route::delete('permanent_delete/{id}',                     [App\Http\Controllers\Admin\ContactsController::class, 'permanentDelete'])->name('delete');
        Route::delete('file/{post}',                               [App\Http\Controllers\Admin\ContactsController::class, 'destroyFile'])->name('destroyFile');
    });

    /**
     * Services Routes ////
     */
    Route::group(['prefix' => 'services',                      'as' => 'services.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\ServicesController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\ServicesController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\ServicesController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\ServicesController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\ServicesController::class, 'destroy'])->name('destroy');
        Route::delete('file/{id}',                             [App\Http\Controllers\Admin\ServicesController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * ALbums Routes ////
     */
    Route::group(['prefix' => 'album',                      'as' => 'album.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\AlbumsController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\AlbumsController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\AlbumsController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\AlbumsController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\AlbumsController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\AlbumsController::class, 'destroy'])->name('destroy');
        Route::delete('file/{id}',                             [App\Http\Controllers\Admin\AlbumsController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * Photos Routes ////
     */
    Route::group(['prefix' => 'photos',                      'as' => 'photos.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\PhotosController::class, 'index'])->name('index');
        Route::get('/create/{id}',                                [App\Http\Controllers\Admin\PhotosController::class, 'create'])->name('create');
        Route::post('',                                          [App\Http\Controllers\Admin\PhotosController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\PhotosController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\PhotosController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\PhotosController::class, 'destroy'])->name('destroy');
        Route::delete('file/{id}',                             [App\Http\Controllers\Admin\PhotosController::class, 'destroyFile'])->name('destroyFile');
    });
    /**
     * Services Cover Routes ////
     */
    Route::group(['prefix' => 'servicescover',                 'as' => 'servicescover.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\ServicesCoverController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\ServicesCoverController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\ServicesCoverController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\ServicesCoverController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\ServicesCoverController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\ServicesCoverController::class, 'destroy'])->name('destroy');
    });
    /**
     * Rental Category Routes ////
     */
    Route::group(['prefix' => 'rental-category',               'as' => 'rental-category.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\RentalCategoryController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\RentalCategoryController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\RentalCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}',                               [App\Http\Controllers\Admin\RentalCategoryController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',                            [App\Http\Controllers\Admin\RentalCategoryController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\RentalCategoryController::class, 'destroy'])->name('destroy');
    });
    /**
     * Rental Routes ////
     */
    Route::group(['prefix' => 'rental',                       'as' => 'rental.'], function () {
        Route::get('/',                                        [App\Http\Controllers\Admin\RentalController::class, 'index'])->name('index');
        Route::get('/create',                                  [App\Http\Controllers\Admin\RentalController::class, 'create'])->name('create');
        Route::post('',                                        [App\Http\Controllers\Admin\RentalController::class, 'store'])->name('store');
        Route::get('/edit/{rental_unique_id}',                 [App\Http\Controllers\Admin\RentalController::class, 'edit'])->name('edit');
        Route::post('/update/{rental_unique_id}',              [App\Http\Controllers\Admin\RentalController::class, 'update'])->name('update');
        Route::delete('/{id}',                                 [App\Http\Controllers\Admin\RentalController::class, 'destroy'])->name('destroy');
        Route::delete('file/{id}',                              [App\Http\Controllers\Admin\RentalController::class, 'destroyFile'])->name('destroyFile');
    });
       Route::resource('our-team', '\App\Http\Controllers\Admin\OurTeamController', ['parameters' => [
        'our-team' => 'team'
    ]]);
});

/**
 * Front End route
 */

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    /**
     * Route for home page
     */

    Route::get('/',                                               [App\Http\Controllers\Site\SiteController::class, 'index'])->name('index');
    Route::get('/gallery',                                        [App\Http\Controllers\Site\SiteController::class, 'gallery'])->name('gallery');
    Route::get('/career',                                         [App\Http\Controllers\Site\SiteController::class, 'career'])->name('career');
    Route::get('/career/{slug}',                                  [App\Http\Controllers\Site\SiteController::class, 'career_details'])->name('career_details');
    Route::get('/product-list',                                   [App\Http\Controllers\Site\SiteController::class, 'product'])->name('product');
    Route::get('/blog',                                           [App\Http\Controllers\Site\SiteController::class, 'blog'])->name('blog');
    Route::get('/contact',                                        [App\Http\Controllers\Site\SiteController::class, 'contact'])->name('contact');

    Route::get('/about-us',                                          [App\Http\Controllers\Site\SiteController::class, 'aboutUs'])->name('about');
    Route::get('/staff',                                          [App\Http\Controllers\Site\SiteController::class, 'staff'])->name('staff');
    Route::get('/ourvalues',                                      [App\Http\Controllers\Site\SiteController::class, 'ourvalues'])->name('ourvalues');
    Route::get('/principles',                                     [App\Http\Controllers\Site\SiteController::class, 'principles'])->name('principles');
    Route::get('/all-post',                                      [App\Http\Controllers\Site\SiteController::class, 'allPost'])->name('all-post');
    Route::get('/online-payment',                                 [App\Http\Controllers\Site\SiteController::class, 'onlinePayment'])->name('online-payment');
    Route::post('/online-payment',                                [App\Http\Controllers\Site\SiteController::class, 'onlinePaymentStore'])->name('onlinePaymentStore');


    Route::get('/category/{id}',                                  [App\Http\Controllers\Site\SiteController::class, 'showCategoryPost'])->name('category.show');


    /**
     * Route To show Post
     */
    Route::get('/book/{post_unique_id}',                     [App\Http\Controllers\Site\SiteController::class, 'showBook'])->name('book.show');
    /**
     * Route To show Blog
     */
    Route::get('/post/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPost'])->name('post.show');
    /**
     * Route To show Member detail 
     */
    Route::get('/staff/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showStaff'])->name('staff.show');
    /**
     * Route To show Page
     */
    Route::get('/page/{id}',                                          [App\Http\Controllers\Site\SiteController::class, 'showPage'])->name('page.show');

    /**
     * Route for contact Page
     */
    Route::post('/message',                                         [App\Http\Controllers\Site\SiteController::class, 'storeMessage'])->name('message');
    /**
     * Route for Books Page
     */
    Route::get('/books',                                           [App\Http\Controllers\Site\SiteController::class, 'bookList'])->name('book');
    /**
     * Route for services Page
     */
    Route::get('/services',                                           [App\Http\Controllers\Site\SiteController::class, 'Services'])->name('services');
    /**
     * Route for Video Page
     */
    Route::get('/rentals',                                             [App\Http\Controllers\Site\SiteController::class, 'Rentals'])->name('rentals');

    // Route for Search Page
    Route::get('/search',                                              [App\Http\Controllers\Site\SiteController::class, 'search'])->name('search');

    // Route for ALbums Page
    Route::get('/albums',                                              [App\Http\Controllers\Site\SiteController::class, 'albums'])->name('albums');

    // Route for Photos Page
    Route::get('/gallery/{id}',                                        [App\Http\Controllers\Site\SiteController::class, 'gallery'])->name('photos.show');

    //Route  for request-quote
    Route::get('/request-quote',                                      [App\Http\Controllers\Site\SiteController::class, 'requestQuote'])->name('request-quote');
    // Route for servics-details
    Route::get('/services-photos/{id}',                              [App\Http\Controllers\Site\SiteController::class, 'servicesPhotos'])->name('services.show');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('brand', BrandController::class);
     Route::get('event-book', [AdminEventController::class, 'EventBook'])->name('users.event');
      Route::resource('certificate', \App\Http\Controllers\Admin\CertificateController::class);
     Route::delete('/admin/events/{id}', [AdminEventController::class, 'destroyEvent'])->name('admin.events.destroy');
     Route::get('/admin/contact-messages', [AdminEventController::class, 'contactIndex'])->name('contactus.index');
     Route::delete('/admin/contacts/{contact}', [AdminEventController::class, 'destroyContact'])
    ->name('admin.contacts.destroy');
});

Route::post('/contact', [EventController::class, 'storeContact'])->name('contactus.store');
Route::post('/events', [EventController::class, 'storeEvent'])->name('events.store');
// Certificate show route
Route::get('/certificates/{id}', [SiteController::class, 'show'])
    ->name('site.certificate.show');

// Redirect /register to login
Route::get('/register', function () {
    return redirect()->route('login');
});

// Existing files are served by the web server. Missing legacy uploads reach
// Laravel and are recovered from their bundled frontend counterparts.
Route::get('/upload_file/{path}', App\Http\Controllers\Site\MissingUploadController::class)
    ->where('path', '.*\.(?i:jpg|jpeg|png|gif|webp|bmp|svg)');

