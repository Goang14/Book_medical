<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department')->insert([
            [
                'id' => 1,
                'department_name' => 'Khoa tim mạch',
                'description' => 'Khám và chữa bệnh nội trú và ngoại trú các bệnh thuộc chuyên khoa Tim mạch như: Tăng huyết áp, nhồi máu cơ tim, bệnh tim thiếu máu cục bộ, suy tim, các loại rối loạn nhịp tim, bệnh mạch máu ngoại biên…',
                'image' => '',
            ],
            [
                'id' => 2,
                'department_name' => 'Chăm sóc nha khoa',
                'description' => 'Chăm sóc và bảo vệ răng đúng cách là một trong những việc làm quan trọng để duy trì một hàm răng chắc khỏe.',
                'image' => '',
            ],
            [
                'id' => 3,
                'department_name' => 'Chăm sóc trẻ em',
                'description' => 'Bên cạnh niềm hạnh phúc khi chào đón bé, mẹ có thể cần đến sự trợ giúp của người thân, bạn bè và nắm vững những điều cần làm khi chăm sóc trẻ sơ sinh để mang đến cho bé những thứ tốt đẹp nhất, hoàn hảo nhất. ',
                'image' => '',
            ],
            [
                'id' => 4,
                'department_name' => 'Phụ khoa',
                'description' => 'Khám bệnh, chữa bệnh về chuyên ngành phụ khoa, sản khoa và nhi khoa ',
                'image' => '',
            ],
            [
                'id' => 5,
                'department_name' => 'Khoa Hô hấp',
                'description' => 'Chuyên tiếp nhận khám và điều trị các bệnh về đường hô hấp, tim mạch, hồi sức ở người lớn',
                'image' => '',
            ],

            [
                'id' => 6,
                'department_name' => 'Khoa Mắt',
                'description' => 'Khám và điều trị các bệnh về mắt',
                'image' => '',
            ],

            [
                'id' => 7,
                'department_name' => 'Khoa Xét nghiệm',
                'description' => 'à một trong các khoa cận lâm sàng chịu trách nhiệm thực hiện các kĩ thuật xét nghiệm về huyết học, hoá sinh, vi sinh, góp phần nâng cao chất lượng chẩn đoán bệnh và theo dõi kết quả điều trị',
                'image' => '',
            ],
            [
                'id' => 8,
                'department_name' => 'Khoa Ngoại tổng hợp',
                'description' => 'điều trị nội và ngoại trú các bệnh lý ngoại khoa thuộc chuyên ngành NGOẠI TỔNG QUÁT, đặc biệt là PHẪU THUẬT NỘI SOI như ung thư đường tiêu hóa, ruột thừa, bệnh lý gan-mật-tụy, bệnh lý hậu môn-trực tràng, chấn thương-vết thương bụng, bướu cổ, thoát vị bẹn-bụng…',
                'image' => '',
            ],

            [
                'id' => 9,
                'department_name' => 'Khoa Tiêu hóa',
                'description' => 'Chẩn đoán điều trị các bệnh lý đường tiêu hóa, gan, mật và một số bệnh lý nội Tổng hợp trong nội trú.',
                'image' => '',
            ],
            [
                'id' => 10,
                'department_name' => 'Khoa Da liễu',
                'description' => 'là tổ chức chuyên môn kỹ thuật của chuyên nghành Da Liễu, hoạt động trong Bệnh viện.',
                'image' => '',
            ],
        ]);
    }
}
