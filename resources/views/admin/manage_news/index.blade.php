<x-admin-layout>
    <style>
        .newtdStyle {
            width: 100px;
        }
    </style>


    <form action="" style="padding: 10px">
        <h3>Tìm kiếm new</h3>
        <div class="search_container">
            <input type="text" name="search" class="" placeholder="search stm...">
            <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <img
                    src="/images/icon/search-12-16.png" alt="">TÌM KIẾM</button>
        </div>
    </form>

    <div id="adminBody" style="padding: 10px">
        <div class="box">
            <button><a href="{{route('adminCreateNew')}}">add an new</a></button>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Images</th>
                <th>User</th>
                <th>Category</th>
                <th>Brief</th>
                <th>Description</th>
                <th>Bed rooms</th>
                <th>WC rooms</th>
                <th>Laws</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            @foreach($news as $index=>$new)

            <tr>
                <td style="width:50px;">{{$index+1}}</td>
                <td style="width:200px; height: 105px;"><img
                        src="{{$new->images ? asset('storage/'. $new->images) : asset('/images/no_image.jpg')}}" alt=""
                        style="width:100px; height:100px;">
                </td>

                <td class="newtdStyle">{{$new->user->type}}: {{$new->user->name}}</td>

                <td class="newtdStyle">{{$new->category->type}}</td>

                <td style="width: 550px">
                    <div class="news_des" style="padding:0;">
                        <p class="tdDescriptionStyle" style="font-weight:bold; ">{{$new->news_header}}</p>
                        <div class="core_info">
                            <p>Price: <strong style="color:red">{{$new->price.' '.$new->price_unit}}</strong> </p>
                            <p>Area: {{$new->area . ' '. $new->area_unit }} </p>
                            <p>Address: {{$new->province->full_name}}, {{$new->district->full_name}},
                                {{$new->ward->full_name}}</p>

                            {{-- {{now()->diff($new->updated_at)}} --}}
                        </div>

                    </div>
                </td>

                <td>
                    <div class="newtdDescriptionStyle">
                        <p style="width: 300px">{{$new->description}}</p>
                    </div>
                </td>

                <td>
                    {{$new->num_bed_rooms}}
                    {{-- {{now()->diffInDays($new->updated_at); }} --}}
                </td>

                <td>
                    {{$new->num_wc_rooms}}
                </td>

                <td>
                    {{$new->law_realated_info}}
                </td>

                <td>
                    {{$new->created_at}}
                </td>
                <td>
                    {{$new->updated_at}}
                </td>
                <td class="newtdFunctionStyle">
                    <div style="display: flex">
                        <div>
                            <form action="{{Route('adminDeleteNew',['new'=>$new->id]);}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return ComfirmDelete();"
                                    style="border: none;cursor: pointer;"><a>🗑️DELETE
                                    </a></button>
                            </form>
                        </div>
                        <p>|</p>
                        <a href="{{Route('adminEditNew',['new'=>$new->id])}}">UPDATE</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <table>
            {{$news->links('vendor.pagination.tailwind')}}
        </table>
    </div>

    <script>
        function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tin này không?');
    }
    </script>
</x-admin-layout>