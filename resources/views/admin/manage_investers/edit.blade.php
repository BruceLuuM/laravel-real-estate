<x-admin-layout>
    <div class="adminCreateInvesterForm">
        <div class="user_post_container">
            <form action="{{Route('adminUpdateInvester',['invester'=>$invester->id]);}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="base">
                    <h3>Update Invester ID: {{$invester->id}}</h3>
                </div>
                <div class="base">
                    <label for="name">Tên nhà đầu tư</label>
                    <input placeholder="..." type="text" name="name" value="{{$invester->name}}">
                    @error('name')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="nums_project">Các dự án đã đăng</label>
                    <input placeholder="..." type="text" name="nums_project" value="{{$invester->nums_project}}">
                    @error('nums_project')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="brief">Sơ lược về nhà đầu tư:</label>
                    <textarea name="brief">{{$invester->brief}}</textarea>
                    @error('brief')
                    <p class="error">{{$message}}</p>
                    @enderror
                </div>

                <div class="base">
                    <label for="description">Thông tin chi tiết về nhà đầu tư:</label>
                    <textarea name="description" id="editorAdmin">{{$invester->description}}</textarea>
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
                <img src="{{$invester->invester_logo ? asset('storage/'. $invester->invester_logo) : asset('/images/no_image.jpg')}}"
                    alt="">
                <div class="post_page">
                    <button name="commit"
                        style="background-color:#285ea6; border: 2px solid #fff; border-radius:7px; height:50px; width:100px; color: #fff; cursor:pointer">Create</button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>