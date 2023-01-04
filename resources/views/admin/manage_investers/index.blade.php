<x-admin-layout>

    <form action="">
        <h3>Tìm kiếm invester</h3>
        <div class="search_container">
            <input type="text" name="search" class="" placeholder="search stm...">
            <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <img
                    src="/images/icon/search-12-16.png" alt="">TÌM KIẾM</button>
        </div>
    </form>

    <div id="adminBody">
        <div class="box">
            <button><a href="{{route('adminCreateInvester')}}">add an invester</a></button>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Logo</th>
                <th>brief</th>
                <th>description</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            @foreach($investers as $index=>$invester)

            <tr>
                <td style="width:50px;">{{$index+1}}</td>
                <td style="width:130px; height: 130px;"><img
                        src="{{$invester->invester_logo ? asset('storage/'. $invester->invester_logo) : asset('/images/no_image.jpg')}}"
                        alt="" style="width:100px; height:100px;"></td>
                <td>
                    <div class="news_des" style="padding:0;">
                        <p style="font-weight:bold; ">{{$invester->name}}</p>
                        <div class="core_info">
                            <p>Number of project: <strong style="color:red">{{$invester->nums_project}}</strong> </p>
                        </div>
                        <div class="text"
                            style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical; width: 165px">
                            <p>{{$invester->brief}}</p>
                        </div>
                        <div class="user">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="text"
                        style="overflow: hidden; text-overflow: ellipsis;  display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2;-webkit-box-orient: vertical; width: 300px">
                        <p>{{$invester->description}}</p>
                    </div>
                </td>
                <td>
                    {{$invester->created_at}}
                </td>
                <td>
                    {{$invester->updated_at}}
                </td>
                <td>
                    <div style="display: flex">
                        <form action="{{Route('adminDeleteInvester',['invester'=>$invester->id]);}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return ComfirmDelete();"
                                style="border: none;cursor: pointer;"><a>🗑️DELETE</a></button>
                        </form>
                        <p>|</p>
                        <a href="{{Route('adminEditInvester',['invester'=>$invester->id])}}">UPDATE</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <table>
            {{$investers->links('vendor.pagination.tailwind')}}
        </table>
    </div>

    <script>
        function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tin này không?');
    }
    </script>
</x-admin-layout>