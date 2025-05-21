<?php

use App\Http\Controllers\BaiHocController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChiTietKhoaHocController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiKhoaHocController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\TaiChinhController;
use App\Http\Controllers\TracNghiemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/admin/nhan-vien/data', [NhanVienController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/tim-kiem', [NhanVienController::class, 'timKiemNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/create', [NhanVienController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/change-status', [NhanVienController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/update', [NhanVienController::class, 'updateNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/nhan-vien/delete', [NhanVienController::class, 'deleteNhanVien'])->middleware("nhanVienMiddle");
Route::post('/admin/dang-nhap', [NhanVienController::class, 'login']);
Route::get('/admin/nhan-vien/check-login', [NhanVienController::class, 'checkLogin']);

Route::post('/admin/nap-tien/create',[TaiChinhController::class,'napTien']);
Route::get('/admin/nap-tien/data',[TaiChinhController::class,'getdata']);
Route::post('/admin/nap-tien/data-one',[TaiChinhController::class,'getdataone']);

Route::post('/admin/loai-khoa-hoc/create', [LoaiKhoaHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/delete', [LoaiKhoaHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/update', [LoaiKhoaHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::get('/admin/loai-khoa-hoc/data', [LoaiKhoaHocController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/change-status', [LoaiKhoaHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/loai-khoa-hoc/tim-kiem', [LoaiKhoaHocController::class, 'search'])->middleware("nhanVienMiddle");


Route::get('/admin/khach-hang/data', [KhachHangController::class, 'getData'])->middleware("nhanVienMiddle");
Route::post('/khach-hang/dang-ky', [KhachHangController::class, 'store']);
Route::post('/khach-hang/dang-nhap', [KhachHangController::class, 'login']);
Route::get('/khach-hang/check-login', [KhachHangController::class, 'checkLogin']);


Route::post('/admin/khach-hang/delete', [KhachHangController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/update', [KhachHangController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/change-status', [KhachHangController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/khach-hang/tim-kiem', [KhachHangController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/bai-hoc/create', [BaiHocController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-hoc/data', [BaiHocController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/delete', [BaiHocController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/update', [BaiHocController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/change-status', [BaiHocController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-hoc/tim-kiem', [BaiHocController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/bai-viet/create', [BaiVietController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/bai-viet/data', [BaiVietController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::get('/bai-viet/data-open', [BaiVietController::class, 'getdataOpen']);
Route::post('/admin/bai-viet/delete', [BaiVietController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/update', [BaivietController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/change-status', [BaivietController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/bai-viet/tim-kiem', [BaivietController::class, 'search'])->middleware("nhanVienMiddle");

Route::post('/admin/trac-nghiem/create', [TracNghiemController::class, 'store'])->middleware("nhanVienMiddle");
Route::get('/admin/trac-nghiem/data', [TracNghiemController::class, 'getdata'])->middleware("nhanVienMiddle");
Route::get('/trac-nghiem/data-open', [TracNghiemController::class, 'getdataOpen'])->middleware("khachHangMiddle");

Route::post('/trac-nghiem/nop-bai', [TracNghiemController::class, 'nopBai'])->middleware("khachHangMiddle");

Route::post('/admin/trac-nghiem/delete', [TracNghiemController::class, 'destroy'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/update', [TracNghiemController::class, 'update'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/change-status', [TracNghiemController::class, 'changeStatus'])->middleware("nhanVienMiddle");
Route::post('/admin/trac-nghiem/tim-kiem', [TracNghiemController::class, 'search'])->middleware("nhanVienMiddle");


Route::get('/admin/chart/chart-tai-chinh', [ChartController::class, 'chart'])->middleware("nhanVienMiddle");

Route::get('/home-page/loai-khoa-hoc/data',[LoaiKhoaHocController::class, 'getDataOpen']);
Route::get('/home-page/loai-khoa-hoc/chi-tiet/{id}',[LoaiKhoaHocController::class, 'chiTietKhoaHoc']);

Route::post('/home-page/mua-khoa-hoc/create',[ChiTietKhoaHocController::class, 'store'])->middleware("khachHangMiddle");

