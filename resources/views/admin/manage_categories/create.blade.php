<div class="adminBody">
    <button onclick="closeCreateform()">Close</button>
    <form action="{{route('adminStoreCategory')}}" method="post">
        @csrf
        <p>Add a new category</p>
        <div class="adminInputContainer">
            <select name="purpose">
                <option value="" disabled>Phân quyền</option>
                <option value="Bán" @if (old('purpose')=='Bán' ) {{'selected'}} @endif>Bán
                </option>
                <option value="Cho thuê" @if (old('purpose')=='Cho thuê' ) {{'selected'}} @endif>Cho thuê
                </option>
            </select>
            @error('purpose')
            <p class="error"> {{$message}} </p>
            @enderror

            <select name="type">
                <option value="" disabled>Phân quyền</option>
                <option value="Nhà" @if (old('type')=='Nhà' ) {{'selected'}} @endif> Nhà
                </option>
                <option value="Đất" @if (old('type')=='Đất' ) {{'selected'}} @endif> Đất
                </option>
                <option value="Căn hộ chung cư" @if (old('type')=='Căn hộ chung cư' ) {{'selected'}} @endif>Căn hộ
                    chung cư
                </option>
                <option value="Văn phòng" @if (old('type')=='Văn phòng' ) {{'selected'}} @endif>Văn phòng
                </option>
                <option value="Biệt thự" @if (old('type')=='Biệt thự' ) {{'selected'}} @endif>Biệt thự
                </option>
                <option value="BĐS thương mại" @if (old('type')=='BĐS thương mại' ) {{'selected'}} @endif> BĐS thương
                    mại
                </option>
                <option value="BĐS dịch vụ" @if (old('type')=='BĐS thương mại' ) {{'selected'}} @endif>BĐS dịch vụ
                </option>
                <option value="BĐS nông nghiệp" @if (old('type')=='BĐS nông nghiệp' ) {{'selected'}} @endif>BĐS nông
                    nghiệp
                </option>
                <option value="BĐS công nghiệp" @if (old('type')=='BĐS công nghiệp' ) {{'selected'}} @endif>BĐS
                    công nghiệp
                </option>
                <option value="BĐS tâm linh" @if (old('type')=='BĐS tâm linh' ) {{'selected'}} @endif>BĐS tâm linh
                </option>
                <option value="BĐS khác" @if (old('type')=='BĐS khác' ) {{'selected'}} @endif>BĐS khác
                </option>
            </select>
            @error('type')
            <p class="error"> {{$message}} </p>
            @enderror

            <input placeholder="Type name" name="type_name" type="text" value="{{old('type_name')}}">
            @error('type_name')
            <p class=" error"> {{$message}} </p>
            @enderror
        </div>
        <div class="adminButtonContainer">
            <button style="background-color: #1877f2" name="commit">Create</button>
        </div>
    </form>
</div>
<script>
    function closeCreateform(){
        document.getElementById("adminAddCategory").style.display="none";
    }
</script>