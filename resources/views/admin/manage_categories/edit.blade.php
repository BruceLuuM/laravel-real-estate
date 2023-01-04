<button onclick="closeUpdateform({{$category->id}})">Close</button>
<form action="{{route('adminUpdateCategory',['category'=>$category->id]);}}" method="post">
    @csrf
    @method('PUT')
    <h2>Updating category ID: {{$category->id}}</h2>
    <div class="adminInputContainer">
        <select name="purpose">
            <option value="" disabled>Phân quyền</option>
            <option value="Bán" @if ($category->purpose=='Bán') {{'selected'}} @endif>Bán
            </option>
            <option value="Cho thuê" @if ($category->purpose=='Cho thuê') {{'selected'}} @endif>Cho thuê
            </option>
        </select>
        @error('purpose')
        <p class="error"> {{$message}} </p>
        @enderror

        <select name="type">
            <option value="" disabled>Phân quyền</option>
            <option value="Nhà" @if ($category->type=='Nhà') {{'selected'}} @endif> Nhà
            </option>
            <option value="Đất" @if ($category->type=='Đất') {{'selected'}} @endif> Đất
            </option>
            <option value="Căn hộ chung cư" @if ($category->type=='Căn hộ chung cư') {{'selected'}} @endif>Căn hộ
                chung cư
            </option>
            <option value="Văn phòng" @if ($category->type=='Văn phòng') {{'selected'}} @endif>Văn phòng
            </option>
            <option value="Biệt thự" @if ($category->type=='Biệt thự ') {{'selected'}} @endif>Biệt thự
            </option>
            <option value="BĐS thương mại" @if ($category->type=='BĐS thương mại') {{'selected'}} @endif> BĐS thương
                mại
            </option>
            <option value="BĐS dịch vụ" @if ($category->type=='BĐS thương mại') {{'selected'}} @endif>BĐS dịch vụ
            </option>
            <option value="BĐS nông nghiệp" @if ($category->type=='BĐS nông nghiệp') {{'selected'}} @endif>BĐS nông
                nghiệp
            </option>
            <option value="BĐS công nghiệp" @if ($category->type=='BĐS công nghiệp ') {{'selected'}} @endif>BĐS
                công nghiệp
            </option>
            <option value="BĐS tâm linh" @if ($category->type=='BĐS tâm linh') {{'selected'}} @endif>BĐS tâm linh
            </option>
            <option value="BĐS khác" @if ($category->type=='BĐS khác') {{'selected'}} @endif>BĐS khác
            </option>
        </select>
        @error('type')
        <p class="error"> {{$message}} </p>
        @enderror

        <input placeholder="Type name" name="type_name" type="tel" value="{{$category->type_name}}">
        @error('type_name')
        <p class=" error"> {{$message}} </p>
        @enderror

    </div>
    <div class="adminButtonContainer">
        <button style="background-color: #1877f2" name="commit">Update</button>
    </div>
</form>
<script>
    function closeUpdateform(categoryid){
        document.getElementById("adminUpdateCategory" + categoryid).style.display="none";
    }
</script>