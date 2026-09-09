 <!-- START SIDEBAR-->
 <nav class="page-sidebar" id="sidebar">
     <div id="sidebar-collapse">
         <div class="admin-block d-flex">
             <div>
                 @if(Auth::user()->avatar)
                 <img src="{{ asset(Auth::user()->avatar) }}" width="45px" class="img img-responsive rounded" />
                 @else
                 <img src="{{ asset('assets/cms/img/admin-avatar.png')}}" width="45px" />
                 @endif
             </div>
             <div class="admin-info">
                 <div class="font-strong">{{auth()->user()->name}}</div><small>{{ ucfirst(auth()->user()->role)}}</small>
             </div>
         </div>
         <ul class="side-menu metismenu">
             <li class="{{ ($_panel == 'Dashboard') ? 'active' : '' }}">
                 <a class="active" href="{{ route('admin.index') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                     <span class="nav-label">Dasboard</span>
                 </a>
             </li>
             <li class="heading">FEATURES</li>
             <li class="{{ ($_panel == 'Banner' || $_panel == 'Popup' || $_panel == 'Carrers' || $_panel == 'Types' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-briefcase"></i>
                     <span class="nav-label">Banner</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Banner') ? 'active' : '' }}" href="{{ route('admin.banner.index')}}"><i class="sidebar-item-icon fa fa-slideshare"></i>Banner</a>
                     </li>

                 </ul>
             </li>
             <li class="{{ ($_panel == 'Category' || $_panel == 'Blog' || $_panel == 'Section' || $_panel == 'Posts' || $_panel == 'Pages' ||  $_panel == 'Book' ||  $_panel == 'Programs' ||  $_panel == 'Counter') ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Content Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Category') ? 'active' : '' }}" href="{{ route('admin.blogcategory.index')}}"><i class="sidebar-item-icon fa fa-briefcase"></i> Category</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Posts') ? 'active' : '' }}" href="{{ route('admin.blog.index')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Posts</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Book') ? 'active' : '' }}" href="{{ route('admin.book.index')}}"> <i class="sidebar-item-icon fa fa-file-pdf-o"></i>Books</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Pages') ? 'active' : '' }}" href="{{ route('admin.page.index')}}"> <i class="sidebar-item-icon fa fa-file-o"></i>Pages</a>
                     </li>
                 </ul>
             </li>

             <li class="{{ ($_panel == 'Career Category' || $_panel == 'Career') ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Career Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Career Category') ? 'active' : '' }}" href="{{ route('admin.careercategory.index')}}"><i class="sidebar-item-icon fa fa-briefcase"></i>Career Category</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Career') ? 'active' : '' }}" href="{{ route('admin.career.index')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Career</a>
                     </li>
                 </ul>
             </li>
             <li class="{{ ($_panel == 'Rental Category' || $_panel == 'Rental') ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Rental Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">

                     <li>
                         <a class="{{ ($_panel == 'Rental Category') ? 'active' : '' }}" href="{{ route('admin.rental-category.index')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Rental Category</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Rental') ? 'active' : '' }}" href="{{ route('admin.rental.index')}}"><i class="sidebar-item-icon fa fa-clipboard"></i>Rental List</a>
                     </li>
                 </ul>
             </li>

             <li class="{{ ($_panel == 'Menus') ? 'active' : '' }}">
                 <a class="" href="{{ route('admin.menu.index')}}"><i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Menus</span>
                 </a>
             </li>
             <li class="{{ ($_panel == 'Interview Types' || $_panel == 'Interview Question' || $_panel == 'Testimonial' || $_panel == 'Clients'||  $_panel == 'Services' ||  $_panel == 'Services Cover' || $_panel == 'Quiz Practice'|| $_panel == 'Gallery' || $_panel == 'Video' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                     <span class="nav-label">Accessories</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">

                     <li>
                         <a class="{{ ($_panel == 'Clients') ? 'active' : '' }}" href="{{ route('admin.clients.index')}}"><i class="sidebar-item-icon fa fa-id-card" aria-hidden="true"></i>Partners List</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Testimonial') ? 'active' : '' }}" href="{{ route('admin.testimonial.index')}}"><i class="sidebar-item-icon fa fa-male"></i>Testimonials</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Video') ? 'active' : '' }}" href="{{ route('admin.video.index')}}"><i class="sidebar-item-icon fa fa-youtube-play"></i>Video</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Services') ? 'active' : '' }}" href="{{ route('admin.services.index')}}"><i class="sidebar-item-icon fa fa-info-circle"></i>Services</a>
                     </li>
                          <li class="{{ request()->routeIs('admin.our-team.*') ? 'active' : '' }}">
                         <a href="{{ route('admin.our-team.index') }}">
                             <i class="sidebar-item-icon fa fa-users"></i>
                             <span class="nav-label">Our Team</span>
                         </a>
                     </li>

                     <li class="{{ ($_panel == 'Gallery' || $_panel == 'Video' ) ? 'active' : '' }}">
                         <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                             <span class="nav-label">Media</span><i class="fa fa-angle-left arrow"></i></a>
                         <ul class="nav-3-level collapse">
                             <li>
                                 <a class="{{ ($_panel == 'Gallery') ? 'active' : '' }}" href="{{ route('admin.gallery.index')}}"><i class="sidebar-item-icon fa fa-picture-o"></i>Gallery</a>
                             </li>

                         </ul>
                     </li>
                        <li class="{{ $_panel == 'Brand' ? 'active' : '' }}">
                         <a href="{{ route('brand.index') }}">
                             <i class="sidebar-item-icon fa fa-tag"></i>
                             <span class="nav-label">Brand</span>
                         </a>
                          <li class="{{ $_panel == 'Certificate' ? 'active' : '' }}">
                         <a href="{{ route('certificate.index') }}">
                             <i class="sidebar-item-icon fa fa-tag"></i>
                             <span class="nav-label">Certificate</span>
                         </a>
                     </li>
                     </li>
                 </ul>
             </li>
             <!-- <li class="{{ ($_panel == 'Staff') ? 'active' : '' }}">
                 <a class="" href="{{ route('admin.staff.index')}}"><i class="sidebar-item-icon fa fa-users"></i>
                     <span class="nav-label">Staff</span>
                 </a>
             </li> -->
             <li class="{{ ($_panel == 'Album' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-picture-o"></i>
                     <span class="nav-label">Gallery Management</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Album') ? 'active' : '' }}" href="{{ route('admin.album.index')}}"><i class="sidebar-item-icon fa fa-id-card" aria-hidden="true"></i>Albums List</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Clients') ? 'active' : '' }}" href="{{ route('admin.clients.index')}}"><i class="sidebar-item-icon fa fa-id-card" aria-hidden="true"></i>Gallery List</a>
                     </li>
                 </ul>
             </li>
             <li class="{{ ($_panel == 'Setting' || $_panel == 'Social Profile' || $_panel == 'User Profile'  || $_panel == 'Language' || $_panel == 'Industry Ready' ) ? 'active' : '' }}">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-cogs"></i>
                     <span class="nav-label">Setting</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="{{ ($_panel == 'Setting') ? 'active' : '' }}" href="{{ route('admin.setting.index')}}"><i class="sidebar-item-icon fa fa-cog"></i>Setting</a>
                     </li>
                     <li>
                         <a class="{{ ($_panel == 'Social Profile') ? 'active' : '' }}" href="{{ URL::route('admin.setting.social.index') }}"><i class="sidebar-item-icon fa fa-heart"></i>Social Link</a>
                     </li>
                     <!-- <li>
                         <a class="{{ ($_panel == 'Language') ? 'active' : '' }}" href="{{ URL::route('admin.language.index') }}"><i class="sidebar-item-icon fa fa-globe"></i>Language</a>
                     </li> -->
                     <li>
                         <a class="{{ ($_panel == 'User Profile') ? 'active' : '' }}" href="{{ route('admin.user_profile.show')}}"><i class="sidebar-item-icon fa fa-user"></i>Profile & Security</a>
                     </li>
                     <!-- <li>
                         <a class="{{ ($_panel == 'Industry Ready') ? 'active' : '' }}" href="{{ route('admin.setting.industryready.index')}}"><i class="sidebar-item-icon fa fa-bars"></i>Industry Ready</a>
                     </li> -->
                 </ul>
             </li>
             <li class="">
                 <a href=" javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                     <span class="nav-label">User & Roles</span><i class="fa fa-angle-left arrow"></i></a>
                 <ul class="nav-2-level collapse">
                     <li>
                         <a class="" href="{{ route('admin.users.index')}}">Users</a>
                     </li>
                     <li>
                         <a class="" href="{{ route('admin.roles.index')}}">Roles</a>
                     </li>
                 </ul>
             </li>
                <li class="{{ $_panel == 'event' ? 'active' : '' }}">
                 <a href="{{ route('users.event') }}">
                     <i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Event Request</span>
                 </a>
             </li>
             
             <li class="{{ $_panel == 'contactus' ? 'active' : '' }}">
                 <a href="{{ route('contactus.index') }}">
                     <i class="sidebar-item-icon fa fa-bars"></i>
                     <span class="nav-label">Contact Request</span>
                 </a>
             </li>
         </ul>
     </div>
 </nav>
 <!-- END SIDEBAR-->