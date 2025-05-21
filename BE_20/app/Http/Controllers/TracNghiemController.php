<?php

namespace App\Http\Controllers;

use App\Http\Requests\TracNghiemCreateRequest;
use App\Http\Requests\TracNghiemDeleteRequest;
use App\Http\Requests\TracNghiemUpdateRequest;
use App\Models\TracNghiem;
use Illuminate\Http\Request;

class TracNghiemController extends Controller
{
    public function store(TracNghiemCreateRequest $request)
    {
        TracNghiem::create([
            'cau_hoi'           =>  $request->cau_hoi,
            'dap_an_1'          =>  $request->dap_an_1,
            'dap_an_2'          =>  $request->dap_an_2,
            'dap_an_3'          =>  $request->dap_an_3,
            'dap_an_4'          =>  $request->dap_an_4,
            'dap_an_dung'       =>  $request->dap_an_dung,
            'tinh_trang'        =>  $request->tinh_trang,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Tạo mới trắc nghiệm ' . $request->cau_hoi . ' thành công!'
        ]);
    }
    public function getdata()
    {
        $data = TracNghiem::get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }
    public function getdataOpen()
    {
        $data = TracNghiem::where('tinh_trang', 1)
                          ->select(
                                'id',
                                'cau_hoi',
                                'dap_an_1',
                                'dap_an_2',
                                'dap_an_3',
                                'dap_an_4',
                          )
                          ->inRandomOrder()
                          ->get();
        return response()->json([
            'data'    =>  $data,
        ]);
    }
    public function nopBai(Request $request)
    {
        $so_cau_dung = 0;
        foreach ($request->list as $key => $value) {
            $trac_nghiem = TracNghiem::where('id', $value['id'])->first();
            if (isset($value['dap_an']) && $trac_nghiem->dap_an_dung == $value['dap_an']) {
                $so_cau_dung++;
            }
        }
        return response()->json([
            'status' =>true,
            'message' => 'Bạn đã hoàn thành bài thi!',
            'so_cau_dung'    =>  $so_cau_dung,
        ]);
    }
    public function destroy(TracNghiemDeleteRequest $request)
    {
        TracNghiem::where('id', $request->id)->delete();
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn đã xóa trắc nghiệm ' . $request->cau_hoi . ' thành công!'
        ]);
    }
    public function update(TracNghiemUpdateRequest $request)
    {
        TracNghiem::where('id', $request->id)->update([
            'cau_hoi'           =>  $request->cau_hoi,
            'dap_an_1'          =>  $request->dap_an_1,
            'dap_an_2'          =>  $request->dap_an_2,
            'dap_an_3'          =>  $request->dap_an_3,
            'dap_an_4'          =>  $request->dap_an_4,
            'dap_an_dung'       =>  $request->dap_an_dung,
            'tinh_trang'        =>  $request->tinh_trang,
        ]);
        return response()->json([
            'status'    =>  1,
            'message'   =>  'Đã cập nhật trắc nghiệm ' . $request->cau_hoi . ' thành công!'
        ]);
    }
    public function changeStatus(Request $request)
    {
        $trac_nghiem = TracNghiem::where('id', $request->id)->first();

        if ($trac_nghiem->tinh_trang == 1) {
            $trac_nghiem->tinh_trang = 0;
            $trac_nghiem->save();
        } else {
            $trac_nghiem->tinh_trang = 1;
            $trac_nghiem->save();
        }
        return response()->json([
            'status'    =>  true,
            'message'   =>  'Bạn đã đổi trạng thái trắc nghiệm ' . $request->cau_hoi . ' thành công'
        ]);
    }

    public function search(Request $request)
    {
        $noi_dung = '%' . $request->noi_dung . '%';

        $data = TracNghiem::where('cau_hoi', 'like', $noi_dung)->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
