<div class="adminBody">
    <button onclick="closeCreateform()">Close</button>
    <form action="{{route('adminStoreUser')}}" method="post">
        @csrf
        <p>Add a new user</p>
        <div class="adminInputContainer">
            <input placeholder="Full name" name="name" type="text" value="{{old('name')}}">
            @error('name')
            <p class="error"> {{$message}} </p>
            @enderror

            <input placeholder="Email" name="email" type="email" value="{{old('email')}}">
            @error('email')
            <p class="error"> {{$message}} </p>
            @enderror

            <input placeholder="Phone number" name="phonenumber" type="tel" value="{{old('phonenumber')}}">
            @error('phonenumber')
            <p class="error"> {{$message}} </p>
            @enderror

            <select name="type">
                <option value="" disabled selected>Phân quyền</option>
                <option value="0" @if (old('type')=='0' ) {{'selected'}} @endif>user</option>
                <option value="1" @if (old('type')=='1' ) {{'selected'}} @endif>admin</option>
            </select>
            @error('type')
            <p class="error"> {{$message}} </p>
            @enderror

            <input placeholder="Password" name="password" type="password" value="{{old('password')}}">
            @error('password')
            <p class="error"> {{$message}} </p>
            @enderror

        </div>
        <div class="adminButtonContainer">
            <button style="background-color: #1877f2" name="commit">Create</button>
        </div>
    </form>
</div>
<script>
    function closeCreateform(){
        document.getElementById("adminAddUser").style.display="none";
    }
</script>