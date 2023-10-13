<form action="{{route('search_news')}}" method="GET">
    <h3>
        <span>Tìm kiếm bất động sản</span>
    </h3>
    <div class="search_container">
        <div style="display: flex; width:98%">
            <input type="text" name="news_header" class="search_tools" placeholder="search stm...">
            <button style="background-color: #f7841b; width: 10%; height: 30px; border-radius: 0 5px 5px 0;"> <i
                    class="fa fa-search" aria-hidden="true"></i>
                TÌM KIẾM</button>
        </div>
    </div>
    <div class="searchbar">
        <div style="display: flex; width:98%; justify-content:space-between">
            <div class="fastsearch">
                <select id="#">
                    <option value="" selected>Nhu cầu</option>
                    <option value="Sell">Bán</option>
                    <option value="forHide">Cho Thuê</option>
                </select>
            </div>
            <div class="fastsearch">
                <select name="category_id">
                    <option value="" selected>Phân khúc</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{(old('category')==$category->
                        id)?'selected':''}}>{{$category->type}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="fastsearch">
                <select name="province_id" id="province_id">
                    <option value="" selected>Tỉnh/Thành phố</option>
                    @foreach($provinces as $province)
                    <option value="{{$province->code}}" {{(old('province')==$province->code)?'selected':''}}>
                        {{$province->name}} </option>
                    @endforeach
                </select>
            </div>

            {{-- these below foreach is no need due to LiveSearchController --}}
            <div class="fastsearch">
                <select name="district_id" id="district_id">
                    <option value="" selected>Quận/Huyện</option>
                    {{-- @if (isset($province_id))
                    @foreach($districts as $district)
                    <option value="{{$district->code}}" {{(old('district')==$district->code)?'selected':''}}>
                        {{$district->name}}</option>
                    @endforeach
                    @endif --}}
                </select>
            </div>
            <div class="fastsearch">
                <select name="district_id" id="ward_id">
                    <option value="" selected>Xã/Phường/Thị trấn</option>
                    {{-- @if (isset($district_id))
                    @foreach($wards as $ward)
                    <option value="{{$ward->code}}" {{(old('ward')==$ward->code)?'selected':''}}>{{$ward->name}}
                    </option>
                    @endforeach
                    @endif --}}
                </select>
            </div>
            <div class="fastsearch">
                <select name="area" id="area">
                    <option value="" selected>Diện tích</option>
                </select>
            </div>
            <div class="fastsearch">
                <select name="area" id="area">
                    <option value="" selected>Giá bán</option>
                </select>
            </div>
            <div class="fastsearch">
                <select name="project_id" id="project_id">
                    <option value="" selected>Dự án</option>
                    {{-- @if (isset($province_id))
                    <option value="0"> Dự án</option>
                    @foreach($projects as $project)
                    <option value="{{$project->id}}" {{(old('project_id')==$project->project_id)?'selected':''}}>
                        {{$project->name}}</option>
                    @endforeach
                    @endif --}}
                </select>
            </div>
            {{-- these upper foreach is no need due to LiveSearchController --}}
        </div>
    </div>

</form>