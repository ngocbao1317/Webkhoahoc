<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chart()
    {
        $data = KhachHang::join('tai_chinhs', 'tai_chinhs.id_khach_hang', 'khach_hangs.id')
            ->select(
                'khach_hangs.id',
                'khach_hangs.ho_va_ten',
                DB::raw(
                    'SUM(tai_chinhs.so_tien_nap) AS tong_tien'
                )
            )
            ->groupBy('khach_hangs.id', 'khach_hangs.ho_va_ten')
            ->get();


        $labels_x = [];
        $data_x   = [];
        foreach ($data as $key => $value) {
            array_push($labels_x, $value->ho_va_ten);
            array_push($data_x,   $value->tong_tien);
        }
        return response()->json([
            'labels_x' => $labels_x,
            'data_x' => $data_x,
        ]);
    }
}
