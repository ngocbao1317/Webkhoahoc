<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaiHocCreateRequest;
use App\Http\Requests\BaiHocDeleteRequest;
use App\Http\Requests\BaiHocUpDateRequest;
use App\Models\BaiHoc;
use Illuminate\Http\Request;

class BaiHocController extends Controller
{
    public function store(BaiHocCreateRequest $request)
    {
        BaiHoc::create([
            'id_khoa_hoc'   =>$request->id_khoa_hoc,
            'tieu_de'       =>$request->tieu_de,
            'bai_hoc_so'    =>$request->bai_hoc_so,
            'link_bai_hoc'  =>$request->link_bai_hoc,
            'is_thu_phi'    =>$request->is_thu_phi,
            'tinh_trang'    =>$request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Tạo mới bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so. ' thành công!'
        ]);
    }
    public function getdata()
    {
        $data = BaiHoc::get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }
    public function destroy(BaiHocDeleteRequest $request)
    {
        BaiHoc::where('id',$request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so. ' thành công!'
        ]);
    }
    public function update(BaiHocUpDateRequest $request)
    {
        BaiHoc::where('id',$request->id)->update([
            'id_khoa_hoc'   =>$request->id_khoa_hoc,
            'tieu_de'       =>$request->tieu_de,
            'bai_hoc_so'    =>$request->bai_hoc_so,
            'link_bai_hoc'  =>$request->link_bai_hoc,
            'is_thu_phi'    =>$request->is_thu_phi,
            'tinh_trang'    =>$request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật bài học ' . $request->tieu_de . ' bài ' . $request->bai_hoc_so. ' thành công!'
        ]);
    }
    public function changeStatus(Request $request)
    {
        $baiHoc = BaiHoc::where('id', $request->id)->first();

        if ($baiHoc->tinh_trang == 1) {
            $baiHoc->tinh_trang = 0;
            $baiHoc->save();
        } else {
            $baiHoc->tinh_trang = 1;
            $baiHoc->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật bài viết ' . $request->tieu_de . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = BaiHoc::where('tieu_de', 'like', $noi_dung)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
