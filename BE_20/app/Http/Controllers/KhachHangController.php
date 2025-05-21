<?php

namespace App\Http\Controllers;

use App\Http\Requests\KhachHangDangKyRequest;
use App\Http\Requests\upDateKhachHangRequest;
use App\Http\Requests\XoaKhachHangRequest;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class KhachHangController extends Controller
{
    public function store(KhachHangDangKyRequest $request)
    {
        KhachHang::create([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'password'      => $request->password,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh'     => $request->ngay_sinh,
        ]);
        return response()->json([
            'status'  => 1,
            'message' => 'Bạn Đăng Ký Tài Khoản  ' . $request->email . '  Thành Công'
        ]);
    }
    public function getData()
    {
        $data = KhachHang::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy(XoaKhachHangRequest $request)
    {
        KhachHang::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã xóa khách hàng ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }
    public function update(upDateKhachHangRequest $request)
    {
        KhachHang::where('id', $request->id)->update([
            'ho_va_ten'     => $request->ho_va_ten,
            'email'         => $request->email,
            'password'      => $request->password,
            'so_dien_thoai' => $request->so_dien_thoai,
            'ngay_sinh'     => $request->ngay_sinh,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật khách hàng ' . $request->ten_khoa_hoc . ' thành công'
        ]);
    }
    public function changeStatus(Request $request)
    {
        $khachHang = KhachHang::where('id', $request->id)->first();

        if ($khachHang->is_block == 1) {
            $khachHang->is_block = 0;
            $khachHang->save();
        } else {
            $khachHang->is_block = 1;
            $khachHang->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật khách hàng ' . $request->ho_va_ten . ' thành công'
        ]);
    }
    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = KhachHang::where('ho_va_ten', 'like', $noi_dung)
                        ->orwhere('email', 'like', $noi_dung)
                        ->orwhere('so_dien_thoai', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function login(Request $request)
    {
        $res = Http::get("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => '6Ldv5UArAAAAAO_NkTQIzRJ4rYWKRonsZ1B2nuGr',
            'response' => $request->code
        ]);
        if($res->json()["success"] == true){
            //Dựa $request->email và $request->password
            $user = KhachHang::where('email', $request->email)
                              ->where('password', $request->password)
                              ->first();
            if($user){
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đăng nhập thành công',
                    'key'       => $user->createToKen('key_khach_hang')->plainTextToken,
                    'user'     => $user->ho_va_ten,
                ]);
            }
            else{
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản hoặc mật khẩu không đúng'
                ]);
            }
        }else
        {
            return response()->json([
                'status'    => 0,
                'message'   => 'Mã recaptcha không đúng'
            ]);
        };
    }

    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if($user && $user instanceof \App\Models\KhachHang )  {
            return response()->json([
                'status' => 1,
            ]);
        }
    }

}
