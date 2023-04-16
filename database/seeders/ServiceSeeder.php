<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service')->insert([
            [
                'id' => 1,
                'name' => 'Khám bệnh chuyên sâu',
                'department_id' => 8,
                'description' => 'Đây là dịch vụ khám bệnh chuyên môn bởi bác sĩ chuyên khoa nhằm đánh giá tình trạng sức khỏe của bệnh nhân và đưa ra các phương pháp điều trị phù hợp.',
            ],
            [
                'id' => 2,
                'name' => 'Xét nghiệm',
                'department_id' => 7,
                'description' => 'Đây là dịch vụ y tế nhằm đánh giá các chỉ số sinh hóa, nhu cầu dinh dưỡng, các bệnh lý nội khoa hay nhiễm trùng cơ bản của bệnh nhân.',
            ],
            [
                'id' => 3,
                'name' => 'Chụp X-quang và siêu âm',
                'department_id' => 5,
                'description' => 'Dịch vụ này cung cấp hình ảnh chụp X-quang hay siêu âm của các cơ quan bên trong cơ thể để đánh giá tình trạng sức khỏe của bệnh nhân và phát hiện các bệnh lý tiềm ẩn.',
            ],
            [
                'id' => 4,
                'name' => 'Điều trị bệnh lý',
                'department_id' => 8,
                'description' => 'Đây là dịch vụ cung cấp các phương pháp điều trị bệnh lý như dùng thuốc, phẫu thuật, điều trị bằng tia X hay hóa trị...',
            ],
            [
                'id' => 5,
                'name' => 'Tư vấn sức khỏe',
                'department_id' => 2,
                'description' => 'Cung cấp tư vấn về chế độ dinh dưỡng, vận động hợp lý, các vấn đề liên quan đến tình trạng sức khỏe của bệnh nhân.',
            ],

            [
                'id' => 6,
                'name' => 'Dịch vụ hỗ trợ tâm lý',
                'department_id' => 3,
                'description' => 'Đây là dịch vụ cung cấp các phương pháp hỗ trợ tâm lý cho bệnh nhân như tư vấn tâm lý, thảo luận và hướng dẫn giải quyết các vấn đề tâm lý trong quá trình điều trị.',
            ],
        ]);
    }
}
