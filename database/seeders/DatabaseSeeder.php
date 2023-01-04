<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use App\Models\Invester;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Minh',
            'email' => 'minh@email.com',
            'type' => 0,
            'phonenumber' => '0123456789'
        ]);

        $user = User::factory()->create([
            'name' => 'Minh2',
            'email' => 'minhadmin@email.com',
            'type' => 1,
            'phonenumber' => '0936481861',
        ]);

        News::factory(12)->create([
            'user_id' => $user->id,
        ]);

        $invester = Invester::factory()->create([
            'name' => 'Minh',
            'brief' => 'minh@email.com',
            'nums_project' => '2',
        ]);

        Invester::factory()->create([
            'name' => 'Minh2',
            'brief' => 'minh@email.com',
            'nums_project' => '2',
        ]);
        Invester::factory()->create([
            'name' => 'Minh3',
            'brief' => 'minh@email.com',
            'nums_project' => '2',
        ]);
        Project::factory(10)->create([
            'invester_id' => $invester->id,
        ]);

        Category::create(
            [
                'purpose' => 'Bán',
                'type' => 'Nhà',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'Đất',
                'type_name' => 'Đất nền thổ cư'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'Căn hộ chung cư',
                'type_name' => 'Căn hộ giá rẻ'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'Văn phòng',
                'type_name' => 'Văn phòng truyền thống'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'Biệt thự',
                'type_name' => 'Biệt thự phố'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS thương mại',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS dịch vụ',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS nông nghiệp',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS công nghiệp',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS tâm linh',
                'type_name' => 'Nhà riêng'
            ],
            [
                'purpose' => 'Bán',
                'type' => 'BĐS khác',
                'type_name' => 'Nhà riêng'
            ]

        );

        News::create(
            [
                "user_id" => 1,
                "category_id" => 2,
                "ward_id" => 6,
                "district_id" => 1,
                "province_id" => 2,
                "address" => "not have address yet",
                "area" => "50000",
                "area_unit" => "m2",
                "price" => "Thỏa thuận",
                "price_unit" => "tỉ",
                "news_header" => "Bán đất nền Mộc Châu ,5ha xã chiềng sơn sổ đỏ rõ ràng",
                "slug" => "ban-dat-nen-moc-chau-5ha-xa-chieng-son-so-do-ro-rang",
                "description" => "<p>- Cần bán gấp lô đất khu vực chiềng sơn ,huyện Mộc Châu ,tỉnh Sơn La<br>- Lô đất có diện tích 5ha ,trong đó có 2800m2 đất thổ cư<br>- Pháp lý:sổ đỏ rõ ràng<br>- Lô đất cách thác dải yếm 5km cách trường quân sự ,1km<br>- Cách cáp treo pha luông dự kiến là 8km ,cách quốc lộ 43 là 300m, mặt đường bê tông 4m<br>- Sổ 3,5ha còn lại đang làm cấp mới<br>- Anh ,chị quan tâm liên hệ Nguyễn Thanh để nhận báo giá của mảnh đất<br>- SDT:0344560156</p>",
                "attribute" => "0",
                "num_bed_rooms" => "0",
                "num_wc_rooms" => "0",
                "law_related_info" => "0",
                "images" => "news_images/user-1672308377.jpg",
                "created_at" => "2022-12-29 17:06:17",
                "updated_at" => "2022-12-29 17:22:08",
            ],
            [
                "user_id" => 2,
                "category_id" => 1,
                "ward_id" => 16,
                "district_id" => 9,
                "province_id" => 1,
                "address" => "not have address yet",
                "area" => "158",
                "area_unit" => "m2",
                "price" => "6.5",
                "price_unit" => "tỉ",
                "news_header" => "3 Lô Đất Liền Kề (có Bán Lẽ) Tại 1/Đường 30/4 - Phú Hoà, Sát Bên TTTM Becamex",
                "slug" => "3-lo-dat-lien-ke-co-ban-le-tai-1duong-304-phu-hoa-sat-ben-tttm-becamex",
                "description" => "<p>Bán 3 lô đất liền kề (có bán lẽ) Tại Phường Phú Hoà - Tp.Thủ Dầu 1, BD<br>- Vị trí đất rất trung tâm, cách Đường 30/4 chỉ 70m, Đối diện nhà thờ Vinh Sơn vào  ▶",
                "attribute" => "1",
                "num_bed_rooms" => "1",
                "num_wc_rooms" => "1",
                "law_related_info" => "1",
                "images" => "news_images/admin-user-1672299067.jpg",
            ],
            [
                "user_id" => 2,
                "category_id" => 1,
                "ward_id" => 10,
                "district_id" => 4,
                "province_id" => 11,
                "address" => "not have address yet",
                "area" => "26",
                "area_unit" => "m2",
                "price" => "Thỏa Thuận",
                "price_unit" => "tỉ",
                "news_header" => "⚠️ Cho thuê mặt bằng Nguyễn Ái Quốc Biên Hòa",
                "slug" => "cho-thue-mat-bang-nguyen-ai-quoc-bien-hoa",
                "description" => "<p>⚠️ Cho thuê mặt bằng Nguyễn Ái Quốc Biên Hòa<br>???? Vị trí: Mặt tiền đường, xung quanh kinh doanh sầm uất, nhiều ngành nghề<br>???? Diện tích: (3,3x 8m)<br> ▶",
                "attribute" => "0",
                "num_bed_rooms" => "0",
                "num_wc_rooms" => "0",
                "law_related_info" => "0",
                "images" => "news_images/admin-user-1672299694.jpg",
            ],
            [
                "user_id" => 2,
                "category_id" => 2,
                "ward_id" => 10,
                "district_id" => 9,
                "province_id" => 10,
                "address" => "not have address yet",
                "area" => "60",
                "area_unit" => "m2",
                "price" => "1.43",
                "price_unit" => "tỉ",
                "news_header" => "KQH HƯƠNG SƠ - VIEW CÔNG VIÊN LỚN- BÃI ĐỔ XE LỚN - CHỈ 1 TỶ 4X",
                "slug" => "kqh-huong-so-view-cong-vien-lon-bai-do-xe-lon-chi-1-ty-4x",
                "description" => "<p>???? KQH HƯƠNG SƠ - VIEW CÔNG VIÊN LỚN- BÃI ĐỔ XE LỚN - CHỈ 1 TỶ 4X<br><br>➖ Diện tích: 60m2<br>➖ Đường Nhựa 13,5m , Điện Âm<br>➖ Đầy đủ tiện ích, an sinh xu ▶",
                "attribute" => "0",
                "num_bed_rooms" => "0",
                "num_wc_rooms" => "0",
                "law_related_info" => "0",
                "images" => "news_images/admin-user-1672299583.jpg",
            ],
            [
                "category_id" => 2,
                "ward_id" => 10,
                "district_id" => 9,
                "province_id" => 10,
                "address" => "not have address yet",
                "area" => "60",
                "area_unit" => "m2",
                "price" => "1.43",
                "price_unit" => "tỉ",
                "news_header" => "KQH HƯƠNG SƠ - VIEW CÔNG VIÊN LỚN- BÃI ĐỔ XE LỚN - CHỈ 1 TỶ 4X",
                "slug" => "kqh-huong-so-view-cong-vien-lon-bai-do-xe-lon-chi-1-ty-4x",
                "description" => "<p>???? KQH HƯƠNG SƠ - VIEW CÔNG VIÊN LỚN- BÃI ĐỔ XE LỚN - CHỈ 1 TỶ 4X<br><br>➖ Diện tích: 60m2<br>➖ Đường Nhựa 13,5m , Điện Âm<br>➖ Đầy đủ tiện ích, an sinh xu ▶",
                "attribute" => "0",
                "num_bed_rooms" => "0",
                "num_wc_rooms" => "0",
                "law_related_info" => "0",
                "images" => "news_images/admin-user-1672299583.jpg",
            ],
            [
                "user_id" => 2,
                "category_id" => 1,
                "ward_id" => 8,
                "district_id" => 4,
                "province_id" => 79,
                "address" => "not have address yet",
                "area" => "85",
                "area_unit" => "m2",
                "price" => "6",
                "price_unit" => "tỉ",
                "news_header" => "Hàng hiếm mặt đường lớn Bình Tân, TP. Hồ Chí Minh chỉ 6 tỷ, 80m2",
                "slug" => "hang-hiem-mat-duong-lon-binh-tan-tp-ho-chi-minh-chi-6-ty-80m2",
                "description" => "<p>• BÁN NHÀ ĐƯỜNG QL1A BÌNH TÂN GIÁ 6 TỶ<br>• Nhà đẹp 2 tầng diện tích 80m2 kết cấu 1 trệt 2 lầu<br>• Có thể mua ở hoặc đầu tư kinh doanh ,đang cho thuê có dòn ▶",
                "attribute" => "1",
                "num_bed_rooms" => "3",
                "num_wc_rooms" => "4",
                "law_related_info" => "1",
                "images" => "news_images/admin-user-1672299348.jpg",
            ],
            [
                "user_id" => 2,
                "category_id" => 5,
                "ward_id" => 13,
                "district_id" => 17,
                "province_id" => 8,
                "address" => "not have address yet",
                "area" => "216",
                "area_unit" => "m2",
                "price" => "25",
                "price_unit" => "tỉ",
                "news_header" => "Biệt Thự Bicosi Tại Phố Đi Bộ Bạch Đằng, Phú Cường, View Sông Sài Gòn Tuyệt Đẹp",
                "slug" => "biet-thu-bicosi-tai-pho-di-bo-bach-dang-phu-cuong-view-song-sai-gon-tuyet-dep",
                "description" => "<p>BIỆT THỰ MINI 1 TRỆT 2 LẦU NGAY PHỐ ĐI BỘ BẠCH ĐẰNG. PHƯỜNG PHÚ CƯỜNG, TP. THỦ DẦU MỘT, BD<br><br>- DT: 12x18 (216m) Thổ cư: 100%. ĐƯỜNG LÔ NHỰA 10M. KINH DO ▶",
                "attribute" => "1",
                "num_bed_rooms" => "1",
                "num_wc_rooms" => "1",
                "law_related_info" => "1",
                "images" => "news_images/admin-user-1672299285.jpg",
            ]

        );
    }
}
