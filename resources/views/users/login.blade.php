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
                    <span>THÔNG TIN ĐĂNG NHẬP</span>
                    <form action="{{Route('authenticate')}}" method="post">
                        @csrf
                        <div class="InputContainer">
                            <input placeholder="Số điện thoại(*)" name="phonenumber" type="tel">
                            @error('phonenumber')
                            <p class="error"> {{$message}} </p>
                            @enderror
                            <input placeholder="Mật khẩu(*)" name="password" type="password">
                            @error('password')
                            <p class="error"> {{$message}} </p>
                            @enderror

                        </div>
                        <p>Bằng cách nhấp vào Đăng nhập, bạn đồng ý với Điều khoản, Chính sách dữ liệu và Chính sách
                            cookie của chúng tôi.</p>
                        <button name="commit">Đăng nhập</button>
                    </form>
                    <p><a href="{{route('register');}}">Đăng ký tài khoản</a>\<a href="">Quên mật khẩu</a></p>
                </div>
            </div>
        </div>

</x-layout>
</x-card>