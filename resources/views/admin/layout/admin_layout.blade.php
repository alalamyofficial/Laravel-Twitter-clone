<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.css')}}">
    
<link rel="stylesheet" href="{{asset('admin/assets/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.svg')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css" integrity="sha512-P9vJUXK+LyvAzj8otTOKzdfF1F3UYVl13+F8Fof8/2QNb8Twd6Vb+VD52I7+87tex9UXxnzPgWA3rH96RExA7A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="{{route('admin.dashboard')}}"><img src="{{asset('admin/assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">            
            <li class="sidebar-item active ">
                <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{(request()->is('admin.tweets')) ? 'active' : '' }}">
                <a href="{{route('admin.tweets')}}" class='sidebar-link'>
                    <i class="fab fa-twitter"></i>
                    <span>Tweets</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.retweets')}}" class='sidebar-link'>
                    <i class="fa fa-retweet"></i>
                    <span>Retweets</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.comments')}}" class='sidebar-link'>
                    <i class="fas fa-comments"></i>
                    <span>Comments</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.bookmarks')}}" class='sidebar-link'>
                    <i class="fa fa-bookmark"></i>
                    <span>Bookmarks</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.users')}}" class='sidebar-link'>
                    <i class="fa fa-users"></i>
                    <span>Users</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.users.messages')}}" class='sidebar-link'>
                    <i class="fa fa-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.lists')}}" class='sidebar-link'>
                    <i class="fa fa-clipboard-list"></i>
                    <span>Lists</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.hashtags')}}" class='sidebar-link'>
                    <i class="fa fa-hashtag"></i>
                    <span>Hashtags</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.friends')}}" class='sidebar-link'>
                    <i class="fa fa-user"></i>
                    <span>Follows & Followings</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.likes')}}" class='sidebar-link'>
                    <i class="fa fa-thumbs-up"></i>
                    <span>Likes</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="{{route('admin.users.visits')}}" class='sidebar-link'>
                    <i class="fa fa-eye"></i>
                    <span>Views</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-patch-check-fill"></i>
                    <span>Verifiy Sign Requests</span>
                </a>
            </li>


            <br><br>
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            @yield('body')

            <footer>

            </footer>
        </div>
    </div>
    <script src="{{asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
    
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('admin/assets/js/main.js')}}"></script>
</body>

</html>
