<form action="">
    <h3>
        <span>Tìm kiếm bất động sản</span>
    </h3>
    <div class="search_container">
        <input type="text" name="search" class="search_tools" placeholder="search stm...">
        <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <i class="fa fa-search"
                aria-hidden="true"></i>
            TÌM KIẾM</button>
    </div>
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
                <option value="{{$category->id}}">{{$category->type}}</option>
                @endforeach
            </select>
        </div>
        <div class="fastsearch">
            <select name="province_id" id="province_id">
                <option value="" disabled selected>Tỉnh/Thành phố</option>
                @foreach($provinces as $province)
                <option value="{{$province->code}}">{{$province->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="fastsearch">
            <select name="district_id" id="district_id">
                <option value="" disabled selected>Quận/Huyện</option>
                @if (isset($districts))
                @foreach($districts as $district)
                <option value="{{$district->code}}">{{$district->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
        <div class="fastsearch">
            <select name="ward_id" id="ward_id">
                <option value="" disabled selected>Xã/Phường/Thị trấn</option>
                @if (isset($wards))
                @foreach($wards as $ward)
                <option value="{{$ward->code}}">{{$ward->name}}</option>
                @endforeach
                @endif
            </select>
        </div>
    </div>

</form>