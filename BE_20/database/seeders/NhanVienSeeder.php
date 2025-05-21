<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nhan_viens')->delete();

        DB::table('nhan_viens')->truncate();

        DB::table('nhan_viens')->insert([
            [
                'email'             =>  'duongngocbao1710@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Duong Ngoc Bao',
                'so_dien_thoai'     =>  '0979123528',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
            ],
            [
                'email'             =>  'kyla@gmail.com',
                'password'          =>  '123456',
                'ho_va_ten'         =>  'Ky La',
                'so_dien_thoai'     =>  '0979123528',
                'dia_chi'           =>  'Đà Nẵng',
                'tinh_trang'        =>  1,
            ],
        ]);
    }
}
