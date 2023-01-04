<div class="header">
    <div class="topnav">
        <div>
            <x-header.header-list-info :categories="$categories" />
        </div>

        @auth
        @if(auth()->user()->type == 'admin')
        <div class="login">
            <button>
                <a href="{{Route('adminPage')}}">To admin page: {{auth()->user()->name}} </a>
                <a>|</a>
            </button>
            <form action="{{Route('adminLogout')}}" method="post">
                @csrf
                <button type="submit"><a>Logout</a></button>
            </form>
        </div>
        @else
        <div class="login">
            <button>
                <a href="{{Route('userManageNews')}}">Welcome {{auth()->user()->name}} </a>
                <a>|</a>
            </button>
            <form action="{{Route('userLogout')}}" method="post">
                @csrf
                <button type="submit"><a>Logout</a></button>
            </form>
        </div>
        @endif
        @else
        <div class="login">
            <button>
                <a href="{{route('register')}}">ĐĂNG KÝ </a>
                <a>|</a>
                <a href="{{route('login')}}"> ĐĂNG NHẬP</a>
            </button>
        </div>
        @endauth
    </div>
    <div class="logo-container">
        <div class="extension">
            <div class="logobar">
                <a class="openSidepanel" onclick="openNav()"> <i class="fa fa-bars" aria-hidden="true"></i> </a>
                <a href="/"><img src="https://cdn.batdongsan.vn/upload/thumb/file/2022/10/0001/logo.png" alt=""
                        height=" 30px"></a>
            </div>

            <div id="mySidepanel" class="sidepanel">
                <div class="side-info">
                    <div class="side-info-wrapper">
                        <a href="{{route('userCreateNews')}}"
                            style="background-color: #01b0f1; color:#fff; text-align:center; padding: 0; border-radius: 7px; padding: 8px 0 8px 0; margin: 8px 0;">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                            ĐĂNG TIN
                        </a>
                        @auth
                        <div class="login">
                            <a href="{{route('userManageNews')}}">Welcome {{auth()->user()->name}} </a>
                            <form action="{{Route('userLogout')}}" method="post" class="sidepanelLogout">
                                @csrf
                                <button><a type="submit">Logout</a></button>
                            </form>
                        </div>
                        @else
                        <div class="login">
                            <a href="{{route('register')}}">ĐĂNG KÝ </a>
                            <a href="{{route('login')}}"> ĐĂNG NHẬP</a>
                        </div>
                        @endauth
                        <div class="sidepanel-dropdown-container">
                            <x-header.header-list-info :categories="$categories" />
                        </div>
                    </div>
                </div>
                <a href="javascript:void(0)" class="closeSidepanel" onclick="closeNav()"></a>
            </div>
            <div class="toggle_searchbar">
                <form action="" id="default_search">
                    <div class="searchbar">
                        <div class="fastsearch">
                            <select id="#">
                                <option value="" disabled selected>Nhu cầu</option>
                                <option value="Sell">Bán</option>
                                <option value="forHide">Cho Thuê</option>
                            </select>
                        </div>
                        <div class="fastsearch">
                            <select name="category">
                                <option value="" disabled selected>Phân khúc</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fastsearch">
                            <select name="province_id">
                                <option value="" disabled selected>Khu vực</option>
                                @foreach($provinces as $province)
                                <option value="{{$province->code}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search_function disable-select">
                            <button style="background-color: #f7841b"> <i class="fa fa-search"
                                    aria-hidden="true"></i>TÌM KIẾM</button>
                        </div>
                    </div>
                </form>
                <div class="search_function disable-select">
                    <a onclick="openSearchBar()"
                        style="text-decoration:none; color:black; cursor: pointer; padding: 10px">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>Nâng cao</a>
                    <button style="background-color: #01b0f1"> <a href="{{route('userCreateNews')}}"
                            style="text-decoration: none; color:#fff"> <i class="fa fa-paper-plane-o"
                                aria-hidden="true"></i> ĐĂNG TIN</a></button>
                </div>
            </div>
            <div class="searchbar_mobile">
                <a href="/"><i class="fa fa-search" aria-hidden="true"></i> </a>
                <a href="/"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="search_toggle" style="display: none">
    <div class="container search_bar">
        @include('index_elements._search')
    </div>
</div>


<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }

    function openSearchBar() {
        var default_search_bar = document.getElementById("default_search");
        var advance_search_bar = document.getElementById("search_toggle");
        if (advance_search_bar.style.display == "none") {
            advance_search_bar.style.display = "block";
        } else {
            default_search_bar.style.display == "block";
            advance_search_bar.style.display = "none";
        }
    }
</script>