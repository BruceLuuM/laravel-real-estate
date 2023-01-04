<button onclick="closeUpdateform({{$user->id}})">Close</button>
<form action="{{route('adminUpdateUser',['user'=>$user->id]);}}" method="post">
    @csrf
    @method('PUT')
    <h2>Updating user ID: {{$user->id}}</h2>
    <div class="adminInputContainer">
        <input placeholder="Full name" name="name" type="text" value="{{$user->name}}">
        @error('name')
        <p class="error"> {{$message}} </p>
        @enderror

        <input placeholder="Email" name="email" type="email" value="{{$user->email}}">
        @error('email')
        <p class="error"> {{$message}} </p>
        @enderror

        <input placeholder="Phone number" name="phonenumber" type="tel" value="{{$user->phonenumber}}">
        @error('phonenumber')
        <p class=" error"> {{$message}} </p>
        @enderror

        <select name="type">
            <option value="" disabled>Phân quyền</option>
            <option value="0" @if ($user->type=='0') {{'selected'}} @endif>user
            </option>
            <option value="1" @if ($user->type=='1') {{'selected'}} @endif>admin
            </option>
        </select>
        @error('type')
        <p class="error"> {{$message}} </p>
        @enderror

        <input placeholder="Password" name="password" type="text" value="{{$user->password}}">
        @error('password')
        <p class="error"> {{$message}} </p>
        @enderror

    </div>
    <div class="adminButtonContainer">
        <button style="background-color: #1877f2" name="commit">Update</button>
    </div>
</form>
<script>
    function closeUpdateform(userid){
        document.getElementById("adminUpdateUser" + userid).style.display="none";
    }
</script>