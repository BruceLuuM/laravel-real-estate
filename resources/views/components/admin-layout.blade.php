<!DOCTYPE html>
<html>

<head>
    <title>Admin Auth</title>
    <link rel="stylesheet" type="text/css" href="/css/admin/admin.css">
    <script src="https://kit.fontawesome.com/9ec7ede347.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
</head>

<body>
    <div id="dashboardMainContainer">
        <div class="dashboard_sidebar" id="dashboard_sidebar">
            <h3 class="dashboard_logo" id="dashboard_logo">COOL</h3>
            <div class="dashboard_sidebar_user">
                <img src="/images/admin/cute-chicken.jpg" alt="UserImages." id="userImage" />
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
                        <a href="{{Route('adminManageUsers')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageCategories')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageInvesters')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage Investers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageNews')}}"><i class="fa fa-dashboard"></i>
                            <span class="menuText">Manage News</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{Route('adminManageProjects')}}"><i class="fa fa-dashboard"></i>
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

    <script>
        window.onresize = onWindowSize;

        var sidebarIsOpen = true;

        toggleBtn.addEventListener('click', (event) => {
            event.preventDefault();
            if (sidebarIsOpen) {
                dashboard_sidebar.style.width = '10%';
                dashboard_sidebar.style.transition = '0.3s all';
                dashboard_content_container.style.width = '90%';
                dashboard_logo.style.fontSize = '60px';
                userImage.style.width = '60px';

                menuIcons = document.getElementsByClassName('menuText');
                for (var i = 0; i < menuIcons.length; i++) {
                    menuIcons[i].style.display = 'none';
                }

                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
                sidebarIsOpen = false;
            } else {
                dashboard_sidebar.style.width = '20%';
                dashboard_content_container.style.width = '80%';
                dashboard_logo.style.fontSize = '80px';
                userImage.style.width = '80px';

                menuIcons = document.getElementsByClassName('menuText');
                for (var i = 0; i < menuIcons.length; i++) {
                    menuIcons[i].style.display = 'inline-block';
                }

                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
                sidebarIsOpen = true;
            }
        });

        function onWindowSize() {
            if(window.innerWidth<1920) {
                dashboard_sidebar.style.width = '10%';
                dashboard_sidebar.style.transition = '0.3s all';
                dashboard_content_container.style.width = '90%';
                dashboard_logo.style.fontSize = '60px';
                userImage.style.width = '60px';

                menuIcons = document.getElementsByClassName('menuText');
                for (var i = 0; i < menuIcons.length; i++) {
                    menuIcons[i].style.display = 'none';
                }

                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'center';
                sidebarIsOpen = false;
            }else {
                dashboard_sidebar.style.width = '20%';
                dashboard_content_container.style.width = '80%';
                dashboard_logo.style.fontSize = '80px';
                userImage.style.width = '80px';

                menuIcons = document.getElementsByClassName('menuText');
                for (var i = 0; i < menuIcons.length; i++) {
                    menuIcons[i].style.display = 'inline-block';
                }

                document.getElementsByClassName('dashboard_menu_lists')[0].style.textAlign = 'left';
                sidebarIsOpen = true;
            }
        }

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