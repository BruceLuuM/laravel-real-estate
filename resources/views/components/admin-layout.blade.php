<!DOCTYPE html>
<html>

<head>
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Bruce Luu">

    <title>Admin Auth</title>
    <link rel="stylesheet" type="text/css" href="/css/admin/admin.css">
    <script src="https://kit.fontawesome.com/9ec7ede347.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>

<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">COOL</h3>
            <div class="dashboard_sidebar_user">
                <img src="/images/admin/cute-chicken.jpg" alt="UserImages" id="userImage" />
                <span class="menuText">
                    <p>Welcome</p>
                    <p>
                        {{auth()->user()->name}}
                    </p>
                </span>
            </div>
            <div class="dashboard_sidebar_menu">
                <ul class="dashboard_menu_lists">
                    <li>
                        <a href="{{Route('adminManageUser')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageCategory')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageInvester')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Investers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageNew')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage News</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageProject')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Projects</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="dashboard_content_container" id="dashboard_content_container">
            <div class="dashboard_topNav">
                <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
                <a href="/"><i class="fa fa-sign"></i>To publish page</a>
                <form action="{{Route('adminLogout')}}" method="post" id="logoutBtn" style="float: right">
                    @csrf
                    <button><a type="submit">GET OUT {{auth()->user()->name}}</a></button>
                    <button><a href=""><i class="fa fa-power-off"></i>Log-out</a></button>
                </form>
            </div>
            <div class="dashboard_content">
                <div class="dashboard_content_main">

                    {{-- content start here --}}
                    {{$slot}}
                    {{-- content end here --}}

                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/search.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin-side-bar.js') }}"></script>

    <script>
        // CK editor scripts
        ClassicEditor
            .create(document.querySelector('#editorAdmin'),{
                ckfinder:{
                openerMethod: 'popup',
                uploadUrl: '{{route('ckeditor.upload.admin').'?_token='.csrf_token()}}'
                }
            })
            .then(editor => {
            console.log(editor);
            })
            .catch( error => {
            console.error(error);
            });
    </script>
</body>

</html>