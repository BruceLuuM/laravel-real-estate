<x-admin-layout>

    <form action="">
        <h3>Search for category:</h3>
        <div class=" search_container">
            <input type="text" name="search" class="" placeholder="search stm...">
            <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <img
                    src="/images/icon/search-12-16.png" alt=""> Search</button>
            {{-- <input type='hidden' name='state' value={{$_GET["state"]}} /> --}}
        </div>
    </form>

    <div id="adminBody">
        <div class="box">
            <button onclick="adminAddCategory()">add an category</button>
        </div>
        <div id="adminAddCategory" style="display: none">
            @include('admin.manage_categories.create');
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Purpose</th>
                <th>Type</th>
                <th>Type name</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            @foreach($categories as $category)
            <tr>
                <td>
                    {{$category->id}}
                </td>
                <td>
                    {{$category->purpose}}
                </td>
                <td>
                    {{$category->type}}
                </td>
                <td>
                    {{$category->type_name}}
                </td>
                <td>
                    {{$category->created_at}}
                </td>
                <td>
                    {{$category->updated_at}}
                </td>
                <td style="display: flex">
                    <div>
                        <form action="{{route('adminDeleteCategory',['category'=>$category->id]);}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return ComfirmDelete();" style="border: none;cursor: pointer;"><a>🗑️DELETE
                                </a></button>
                        </form>
                    </div>
                    <p>|</p>
                    <a class="button" onclick="adminUpdateCategory({{$category->id}})">UPDATE</a>
                </td>
            </tr>
            <tr>
                <div id="adminUpdateCategory{{$category->id}}" style="display:none">
                    @include('admin.manage_categories.edit',['category'=>$category]);
                </div>
            </tr>
            @endforeach
        </table>
        <table>
            {{$categories->links('vendor.pagination.tailwind')}}
        </table>
    </div>

    <script>
        function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa danh mục này không?');
    }

    function adminAddCategory() {
        var adminAddCategory = document.getElementById('adminAddCategory');
        if(adminAddCategory.style.display == 'none'){
            adminAddCategory.style.display = 'block';
        } else {
            adminAddCategory.style.display = 'none';
        }
    }

    function adminUpdateCategory(categoryid) {
        var adminUpdateCategory = document.getElementById('adminUpdateCategory'+ categoryid);
        if(adminUpdateCategory.style.display == 'none'){
            adminUpdateCategory.style.display = 'block';
        } else {
            adminUpdateCategory.style.display = 'none';
        }
    }
    </script>
</x-admin-layout>