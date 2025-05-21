<?php

namespace App\Http\Controllers;

use App\Http\Requests\BaiVietRequest;
use App\Http\Requests\DeleteBaiVietRequest;
use App\Http\Requests\UpDateBaiVietRequest;
use App\Models\BaiHoc;
use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function store(BaiVietRequest $request)
    {
        BaiViet::create([
            'tieu_de'           =>$request->tieu_de,
            'slug_tieu_de'      =>$request->slug_tieu_de,
            'hinh_anh'          =>$request->hinh_anh,
            'mo_ta_ngan'        =>$request->mo_ta_ngan,
            'noi_dung'          =>$request->noi_dung,
            'tinh_trang'        =>$request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Tạo mới bài viết ' . $request->tieu_de . ' thành công!'
        ]);
    }
    public function getdata()
    {
        $data = BaiViet::get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function getdataOpen()
    {
        $data = BaiViet::where('tinh_trang', 1)->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }

    public function destroy(DeleteBaiVietRequest $request)
    {
        BaiViet::where('id',$request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa bài viết ' . $request->tieu_de . ' thành công!'
        ]);
    }
    public function update(UpDateBaiVietRequest $request)
    {
        BaiViet::where('id',$request->id)->update([
            'tieu_de'               =>$request->tieu_de,
            'slug_tieu_de'          =>$request->slug_tieu_de,
            'hinh_anh'              =>$request->hinh_anh,
            'mo_ta_ngan'            =>$request->mo_ta_ngan,
            'noi_dung'              =>$request->noi_dung,
            'tinh_trang'            =>$request->tinh_trang
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật bài viết ' . $request->tieu_de . ' thành công!'
        ]);
    }

    public function changeStatus(Request $request)
    {
        $baiViet = BaiViet::where('id', $request->id)->first();

        if ($baiViet->tinh_trang == 1) {
            $baiViet->tinh_trang = 0;
            $baiViet->save();
        } else {
            $baiViet->tinh_trang = 1;
            $baiViet->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã cập nhật bài viết ' . $request->tieu_de . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = BaiViet::where('tieu_de', 'like', $noi_dung)
                        ->orwhere('mo_ta_ngan', 'like', $noi_dung)
                        ->orwhere('noi_dung', 'like', $noi_dung)
                        ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
