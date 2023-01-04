<x-admin-layout>

    <form action="">
        <h3>Tìm kiếm user</h3>
        <div class=" search_container">
            <input type="text" name="search" class="" placeholder="search stm...">
            <button style="background-color: #f7841b; width:10%; border-radius: 0 5px 5px 0;"> <img
                    src="/images/icon/search-12-16.png" alt=""> TÌM KIẾM</button>
            {{-- <input type='hidden' name='state' value={{$_GET["state"]}} /> --}}
        </div>
    </form>
    <div id="adminBody">
        <div class="box">
            <button onclick="adminAddUser()">add an user</button>
        </div>
        <div id="adminAddUser" style="display: none">
            @include('admin.manage_users.create');
        </div>

        <table>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>email</th>
                <th>phonenumber</th>
                <th>type</th>
                <th>email_verified_at</th>
                <th>password</th>
                <th>remember_token</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->phonenumber}}
                </td>
                <td>
                    {{$user->type}}
                </td>
                <td>
                    {{$user->email_verified_at}}
                </td>
                <td>
                    <p class="customword">
                        {{$user->password}}
                    </p>
                </td>
                <td>
                    <p class="customword">
                        {{$user->remember_token}}
                    </p>
                </td>
                <td>
                    {{$user->created_at}}
                </td>
                <td>
                    {{$user->updated_at}}
                </td>
                <td style="display: flex">
                    <div>
                        <form action="{{route('adminDeleteUser',['user'=>$user->id]);}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return ComfirmDelete();" style="border: none;cursor: pointer;"><a>🗑️DELETE
                                    |</a></button>
                        </form>
                    </div>
                    <a class="button" onclick="adminUpdateUser({{$user->id}})">UPDATE</a>
                </td>
            </tr>
            <tr>
                <div id="adminUpdateUser{{$user->id}}" style="display:none">
                    @include('admin.manage_users.edit',['user'=>$user]);
                </div>
            </tr>
            @endforeach
        </table>
        <table>
            {{$users->links('vendor.pagination.tailwind')}}
        </table>
    </div>
</x-admin-layout>
<script>
    function ComfirmDelete() {
        return confirm('Bạn có chắc chắn muốn xóa tin này không?');
    }

    function adminAddUser() {
        var adminAddUser = document.getElementById('adminAddUser');
        if(adminAddUser.style.display == 'none'){
            adminAddUser.style.display = 'block';
        } else {
            adminAddUser.style.display = 'none';

        }
    }

    function adminUpdateUser(userid) {
        var adminUpdateUser = document.getElementById('adminUpdateUser'+ userid);
        if(adminUpdateUser.style.display == 'none'){
            adminUpdateUser.style.display = 'block';
        } else {
            adminUpdateUser.style.display = 'none';
        }
    }
</script>