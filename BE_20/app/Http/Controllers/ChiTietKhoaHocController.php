<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChiTietKhoaHoc;
use Illuminate\Http\Request;
use App\Models\ChiTietKhoaHoc;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Auth;

class ChiTietKhoaHocController extends Controller
{
    public function store(CreateChiTietKhoaHoc $request)
    {
        $user = Auth::guard('sanctum')->user();
        $check = ChiTietKhoaHoc::where('id_khoa_hoc', $request->id_khoa_hoc)->where('id_khach_hang', $user->id)->first();
        if ($check) {
            return response()->json([
                'status' => 0,
                'message' => 'Bạn đã đăng ký khóa học này rồi'
            ]);
        } else {
            if($user -> so_du >= $request->so_tien_mua){
                $khachHang =KhachHang::where('id', $user->id)->first();
                $khachHang->so_du = $khachHang->so_du - $request->so_tien_mua;
                $khachHang->save();
                ChiTietKhoaHoc::create([
                    'id_khoa_hoc' => $request->id_khoa_hoc,
                    'id_khach_hang' => $user->id,
                    'so_tien_mua' => $request->so_tien_mua,
                ]);
            return response()->json([
                'status' => 1,
                'message' => 'Mua khóa học thành công'
            ]);
        } else {
            return response()->json([
                'status' => 2,
                'message' => 'Số dư không đủ để mua khóa học này'
            ]);
        }
        }

    }

}
