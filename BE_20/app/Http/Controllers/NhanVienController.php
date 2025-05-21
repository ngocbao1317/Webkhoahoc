<?php

namespace App\Http\Controllers;

use App\Http\Requests\NhanVienCreateRequest;
use App\Http\Requests\NhanVienDeleteRequest;
use App\Http\Requests\NhanVienUpdateRequest;
use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class NhanVienController extends Controller
{
    public function getData()
    {
        $data = NhanVien::get();

        return response()->json([
            'data' => $data
        ]);
    }
    public function store(NhanVienCreateRequest $request)
    {
        NhanVien::create([
            'ho_va_ten' => $request->ho_va_ten,
            'email' => $request->email,
            'so_dien_thoai' => $request->so_dien_thoai,
            'password' => $request->password,
            'dia_chi' => $request->dia_chi,
            'id_quyen' => $request->id_quyen,
            'tinh_trang' => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Đã tạo mới nhân viên ' . $request->ho_va_ten . ' thành công.',
        ]);
    }
    public function changeStatus(Request $request)
    {
        $nhan_vien = NhanVien::find($request->id);
        if ($nhan_vien) {
            $nhan_vien->tinh_trang = !$nhan_vien->tinh_trang;
        }
        $nhan_vien->save();
        return response()->json([
            'status' => true,
            'message' => 'Admin đã đổi trạng thái ' . $nhan_vien->ho_va_ten . ' thành công ',
        ]);
    }
    public function updateNhanVien(NhanVienUpdateRequest $request)
    {
        NhanVien::where('id', $request->id)->update([
            'ho_va_ten'      => $request->ho_va_ten,
            'email'          => $request->email,
            'so_dien_thoai'  => $request->so_dien_thoai,
            'dia_chi'        => $request->dia_chi,
            'id_quyen'       => $request->id_quyen,
            'tinh_trang'     => $request->tinh_trang,

        ]);
        return response()->json([
            'status' => true,
            'message' => 'Đã cập nhật thành công'
        ]);
    }
    public function deleteNhanVien(NhanVienDeleteRequest $request)
    {
        NhanVien::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Đã xoá thành công'
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
            $user = NhanVien::where('email', $request->email)
                              ->where('password', $request->password)
                              ->first();
            if($user){
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đăng nhập thành công',
                    'key'       => $user->createToKen('key_admin')->plainTextToken,
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

    public function timKiemNhanVien(Request $request)
    {
        $data = NhanVien::where('ho_va_ten', 'like', '%' . $request->noi_dung . '%')->get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function checkLogin(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if($user && $user instanceof \App\Models\NhanVien )  {
            return response()->json([
                'status' => 1,
            ]);
        }
    }


}
