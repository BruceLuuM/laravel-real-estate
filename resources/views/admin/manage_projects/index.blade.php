<x-admin-layout>
    <form action="" style="padding: 10px">
        <h3>Tìm kiếm project</h3>
        <div class="search_container">
            <input type="text" name="search" class="" placeholder="search stm...">
            <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <img
                    src="/images/icon/search-12-16.png" alt="">TÌM KIẾM</button>
        </div>
    </form>

    <div id="adminBody" style="padding: 10px">
        <div class="box">
            <button><a href="{{route('adminCreateProject')}}">add an project</a></button>
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>Images</th>
                <th>Invester</th>
                <th>Category</th>
                <th>Brief</th>
                <th>Description</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            @foreach($projects as $project)

            <tr>
                <td style="width:50px;">{{$project->id}}</td>
                <td>
                    <img src="{{$project->images ? asset('storage/'. $project->images) : asset('/images/no_image.jpg')}}"
                        alt="" style="height: 100px; width: 100px">
                </td>

                <td>{{$project->invester->name}}</td>

                <td>{{$project->category->type}}</td>

                <td>
                    <div class="projects_des" style="padding:0; width: 200px">
                        <p style="font-weight:bold; ">{{$project->name}}</p>
                        <div class="core_info">
                            <p>Area: <strong style="color:red">{{$project->area.' '.$project->area_unit}}</strong>
                            </p>
                            <p>Address: {{$project->province->full_name}}, {{$project->district->full_name}},
                                {{$project->ward->full_name}}</p>
                        </div>

                    </div>
                </td>

                <td>
                    <div style="width: 200px">
                        <p class="tdDescriptionStyle">{{$project->description}}</p>
                    </div>
                </td>

                <td>
                    {{$project->created_at}}
                </td>

                <td>
                    {{$project->updated_at}}
                </td>
                <td>
                    <div style="display: flex; width: 150px">
                        <div>
                            <form action="{{Route('adminDeleteProject',['project'=>$project->id]);}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return ComfirmDelete();"
                                    style="border: none;cursor: pointer;"><a>🗑️DELETE
                                    </a></button>
                            </form>
                        </div>
                        <p>|</p>
                        <a href="{{Route('adminEditProject',['project'=>$project->id])}}">UPDATE</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </table>
        <table>
            {{$projects->links('vendor.pagination.tailwind')}}
        </table>
    </div>

    <script>
        function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tin này không?');
    }
    </script>
</x-admin-layout>