<?php

namespace Database\Seeders;

use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RegistrationSeeder extends Seeder
{
    public function run(): void
    {
        $registrations = [
            [
                'academic_year' => '2020/2021',
                'name' => 'Gelombang I',
                'start_date' => Carbon::create(2020, 1, 1),
                'end_date' => Carbon::create(2020, 1, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2020/2021',
                'name' => 'Gelombang II',
                'start_date' => Carbon::create(2020, 1, 1),
                'end_date' => Carbon::create(2020, 1, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2020/2021',
                'name' => 'Gelombang III',
                'start_date' => Carbon::create(2020, 1, 1),
                'end_date' => Carbon::create(2020, 1, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2021/2022',
                'name' => 'Gelombang I',
                'start_date' => Carbon::create(2021, 1, 1),
                'end_date' => Carbon::create(2021, 1, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2021/2022',
                'name' => 'Gelombang II',
                'start_date' => Carbon::create(2021, 2, 1),
                'end_date' => Carbon::create(2021, 2, 28),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2021/2022',
                'name' => 'Gelombang III',
                'start_date' => Carbon::create(2021, 3, 1),
                'end_date' => Carbon::create(2021, 3, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2022/2023',
                'name' => 'Gelombang I',
                'start_date' => Carbon::create(2022, 1, 1),
                'end_date' => Carbon::create(2022, 1, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2022/2023',
                'name' => 'Gelombang II',
                'start_date' => Carbon::create(2022, 2, 1),
                'end_date' => Carbon::create(2022, 2, 28),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2022/2023',
                'name' => 'Gelombang III',
                'start_date' => Carbon::create(2022, 3, 1),
                'end_date' => Carbon::create(2022, 3, 30),
                'is_open' => false,
                'is_archived' => false
            ],
            [
                'academic_year' => '2023/2024',
                'name' => 'Gelombang I',
                'start_date' => Carbon::create(2023, 1, 1),
                'end_date' => Carbon::create(2023, 1, 30),
                'is_open' => true,
                'is_archived' => false
            ],
            [
                'academic_year' => '2023/2024',
                'name' => 'Gelombang II',
                'start_date' => Carbon::create(2023, 2, 1),
                'end_date' => Carbon::create(2023, 2, 28),
                'is_open' => true,
                'is_archived' => false
            ],
            [
                'academic_year' => '2023/2024',
                'name' => 'Gelombang III',
                'start_date' => Carbon::create(2023, 3, 1),
                'end_date' => Carbon::create(2023, 3, 30),
                'is_open' => true,
                'is_archived' => false
            ]
        ];

        foreach ($registrations as $registration) {
            Registration::create($registration);
        }
    }
}
