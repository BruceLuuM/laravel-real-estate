<x-layout>
    <x-card>
        <div class="user-container">
            <div class="main">
                <div class="some-info ">
                    <h3>
                        <span>CHÀO MỪNG ĐẾN VỚI BATDONGSAN.VN</span>
                    </h3>
                    <p>Được thành lập từ năm 2015, BATDONGSAN.VN là nền tảng Đăng tin quảng cáo Bất Động Sản hàng đầu
                        Việt Nam, được hơn 200.000 thành viên tin dùng để tiếp cận hàng ngàn khách hàng và nhà đầu tư
                        tiềm năng trên môi trường internet.</p>
                    <p>BATDONGSAN.VN đã được nâng cấp Phiên bản mới, với nhiều tính năng vượt trội và nhiều dịch vụ hữu
                        ích nhằm mục tiêu phục vụ mọi khách hàng được tốt hơn. Trở thành Thương hiệu internet được cộng
                        đồng yêu thích, tin tưởng và sử dụng nhiều nhất trong lĩnh vực quảng cáo bất động sản tại Việt
                        Nam và Khu vực</p>
                    <h4>CÁC SẢN PHẨM VÀ DỊCH VỤ TIÊU BIỂU</h4>
                    <p>Đăng ký mở Tài khoản miễn phí và trải nghiệm các dịch vụ hữu ích được cung cấp bởi BATDONGSAN.VN
                        và nhiều đối tác Uy tín:</p>
                    <h4>CHĂM SÓC KHÁCH HÀNG</h4>
                    <p>BATDONGSAN.VN rất hân hạnh được phục vụ mọi khách hàng.</p>
                    <p>Để được hỗ trợ và tư vấn cụ thể, mời Bạn liên hệ:</p>
                    <p>Hotline: 091-5555-189</p>
                </div>

                <div class="user-form">
                    <h3>
                        <span>THÔNG TIN ĐĂNG KÝ TÀI KHOẢN</span>
                    </h3>
                    <form action="{{route('storeUser');}}" method="post">
                        @csrf
                        <div class=" InputContainer">
                            <input placeholder="Tên đầy đủ(*)" name="name" type="text" value="{{old('name')}}">
                            @error('name')
                            <p class="error"> {{$message}} </p>
                            @enderror

                            <input placeholder="Số điện thoại(*)" name="phonenumber" type="tel"
                                value="{{old('phonenumber')}}" id="phonenumber">
                            <span style="color:red" id='phonenumber_check'>
                                @error('phonenumber')
                                <p class="error"> {{$message}} </p>
                                @enderror
                            </span>

                            <input placeholder="Địa chỉ Email(*)" name="email" type="email" value="{{old('email')}}">
                            @error('email')
                            <p class="error"> {{$message}} </p>
                            @enderror

                            <input placeholder="Mật khẩu(*)" name="password" type="password"
                                value="{{old('password')}}">
                            @error('password')
                            <p class="error"> {{$message}} </p>
                            @enderror

                            <input placeholder="Nhập lại mật khẩu(*)" name="password_confirmation" type="password"
                                value="{{old('password_confirmation')}}">
                            @error('password_confirmation')
                            <p class="error"> {{$message}} </p>
                            @enderror
                        </div>
                        <p>Bằng cách nhấp vào Đăng ký, bạn đồng ý với Điều khoản, Chính sách dữ liệu và Chính sách
                            cookie của chúng tôi.</p>
                        <button name="commit">Đăng ký tài khoản</button>

                    </form>
                    <p><a href="{{route('login');}}">Đăng nhập</a>\<a href="">Quên mật khẩu</a></p>
                </div>
            </div>
        </div>
        </div>

        {{-- <script>
            function validatePhoneNumber(input_str) {
                var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    
                return re.test(input_str);
            }
    
            function validateForm() {
                var fname = document.getElementById('fname');
                if (fname.value == '') {
                    fname.setCustomValidity('Hãy nhập tên trước !');
                } else {
                    fname.setCustomValidity('');
                }
    
                var email = document.getElementById('email');
                if (email.value == '') {
                    email.setCustomValidity('Hãy nhập email trước !');
                } else if (email.validity.typeMismatch) {
                    email.setCustomValidity('Định dạng email sai ! (Mẫu: abc@abc.com)');
                } else {
                    email.setCustomValidity('');
                }
    
                var phone = document.getElementById('pnum');
                if (phone.value == '') {
                    phone.setCustomValidity('Hãy nhập số điện thoại !');
                } else if (!validatePhoneNumber(phone.value)) {
                    phone.setCustomValidity('Định dạng số điện thoại sai ! (Mẫu: 1234567890)');
                } else {
                    phone.setCustomValidity('');
                }
    
                var pass = document.getElementById('pass');
                var repass = document.getElementById('repass');
    
                if (pass.value == '') {
                    pass.setCustomValidity('Hãy nhập mật khẩu !');
                } else {
                    pass.setCustomValidity('');
                }
                pass.value != repass.value ? repass.setCustomValidity('Nhập lại sai mật khẩu !') : repass.setCustomValidity('');
    
                return true;
            }
    
            document.getElementsByName('commit')[0].onclick = validateForm;
        </script> --}}


    </x-card>
</x-layout>