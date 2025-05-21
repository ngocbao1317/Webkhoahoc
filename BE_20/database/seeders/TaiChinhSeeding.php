<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaiChinhSeeding extends Seeder
{

    public function run(): void
    {
        DB::table('tai_chinhs')->delete();

        DB::table('tai_chinhs')->truncate();

        DB::table('tai_chinhs')->insert([
            [
                'id_khach_hang'       =>  1,
                'id_nhan_vien'        =>  1,
                'so_tien_nap'         =>  '100000',
                'kieu_nap'            =>  1,
                'noi_dung_nap'        =>  'Đà Nẵng',
            ],
            [
                'id_khach_hang'       =>  2,
                'id_nhan_vien'        =>  1,
                'so_tien_nap'         =>  '200000',
                'kieu_nap'            =>  1,
                'noi_dung_nap'        =>  'Hồ Chí Minh',
            ],
            [
                'id_khach_hang'       =>  3,
                'id_nhan_vien'        =>  1,
                'so_tien_nap'         =>  '300000',
                'kieu_nap'            =>  1,
                'noi_dung_nap'        =>  'Quảng Ngãi',
            ],
            [
                'id_khach_hang'       =>  4,
                'id_nhan_vien'        =>  1,
                'so_tien_nap'         =>  '500000',
                'kieu_nap'            =>  1,
                'noi_dung_nap'        =>  'Quảng Nam',
            ],
        ]);
    }
}
