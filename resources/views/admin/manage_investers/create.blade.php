<x-admin-layout>
    <div class="adminCreateInvesterForm">
        <div class="user_post_container">
            <form action="{{Route('adminStoreInvester')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="base">
                    <h3>Create a new Invester</h3>
                </div>
                <div class="base">
                    <label for="name">Tên nhà đầu tư</label>
                    <input placeholder="..." type="text" name="name" value="{{old('name');}}">
                    @error('name')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="nums_project">Các dự án đã đăng</label>
                    <input placeholder="..." type="text" name="nums_project" value="0">
                    @error('nums_project')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="brief">Sơ lược về nhà đầu tư:</label>
                    <textarea name="brief">{{old('brief')}}</textarea>
                    @error('brief')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="description">Thông tin chi tiết về nhà đầu tư:</label>
                    <textarea name="description" id="editorAdmin">{{old('description')}}</textarea>
                    @error('description')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="base">
                    <label for="invester_logo">Logo: </label>
                    <input name="invester_logo" type="file" id='img'>
                    @error('invester_logo')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>
                <div class="post_page">
                    <button name="commit"
                        style="background-color:#285ea6; border: 2px solid #fff; border-radius:7px; height:50px; width:100px; color: #fff; cursor:pointer">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>