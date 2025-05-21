<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaiChinhRequestCreate;
use App\Models\KhachHang;
use App\Models\TaiChinh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnValue;

class TaiChinhController extends Controller
{
    public function napTien(TaiChinhRequestCreate $request)
    {
        $user = Auth::guard('sanctum')->user();
        TaiChinh::create([
            'id_khach_hang' => $request->id,
            'id_nhan_vien'  => $user->id,
            'so_tien_nap'   => $request->so_tien_can_nap,
            'kieu_nap'      => \App\Models\TaiChinh::NAP_BANG_TAY,
            'noi_dung_nap'  => $request->ly_do_nap_tien,
        ]);
        $khachhang = KhachHang::where('id', $request->id)->first();
        $khachhang->so_du = $khachhang->so_du + $request->so_tien_can_nap;
        $khachhang->save();

        return response()->json([
            'status'    => 1,
            'message'   => 'Đã nạp tiền ' . number_format($request->so_tien_can_nap) . ' thành công'
        ]);
    }

    public function getdata()
    {
        $data = TaiChinh::select('tai_chinhs.so_tien_nap', 'tai_chinhs.noi_dung_nap', 'tai_chinhs.kieu_nap', 'tai_chinhs.created_at', 'khach_hangs.ho_va_ten as ten_kh', 'nhan_viens.ho_va_ten as ten_nv','khach_hangs.email')
            ->join('khach_hangs', 'khach_hangs.id', 'tai_chinhs.id_khach_hang')
            ->join('nhan_viens', 'nhan_viens.id', 'tai_chinhs.id_nhan_vien')
            ->get();

        return response()->json([
            'data' =>$data
        ]);
    }

    public function getdataone(Request $request)
    {
        $data = TaiChinh::select('tai_chinhs.so_tien_nap', 'tai_chinhs.noi_dung_nap', 'tai_chinhs.kieu_nap', 'tai_chinhs.created_at', 'khach_hangs.ho_va_ten as ten_kh', 'nhan_viens.ho_va_ten as ten_nv','khach_hangs.email')
            ->join('khach_hangs', 'khach_hangs.id', 'tai_chinhs.id_khach_hang')
            ->join('nhan_viens', 'nhan_viens.id', 'tai_chinhs.id_nhan_vien')
            ->where('tai_chinhs.id_khach_hang',$request->id)
            ->get();

        return response()->json([
            'data' =>$data
        ]);
    }
}
