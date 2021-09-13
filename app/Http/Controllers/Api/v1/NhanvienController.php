<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Nhanvien;
use DB;
use App\Http\Resources\NhanvienResource;
use App\Http\Resources\NhanvienCollection;

class NhanvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanviens=Nhanvien::all();
        return response()->json([
            'data'=>$nhanviens,
            'status_code'=>200,
            'messege'=>'ok'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts/nhanvien/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'manhanvien'=>'required',
            'tennhanvien'=>'required',
            'ngaysinh'=>'required',
            'gioitinh'=>'required',
            'sodienthoai'=>'required',
            'diachi'=>'required'
        ]);
        $data=$request->all();
        if($nhanvien=Nhanvien::create($data)){
            return response()->json([
                'data'=>$nhanvien,
                'status_code'=>200,
                    'messege'=>'Thêm mới thành công'
            ]);
        }
        return response([
            'data'=>null,
            'status_code'=>404,
                'messege'=>'Thêm mới không thành công'
        ]);
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nhanvien=Nhanvien::find($id);
        // return response()->json([
        //     'data'=>$nhanvien,
        //     'status_code'=>200,
        //     'messege'=>'Xóa thành công'
        // ]);
        return response()->json([
            'data'=>$nhanvien,
            'status_code'=>200,
                'messege'=>'Thêm mới thành công'
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $nhanvien=Nhanvien::find($id);
    //     // return response()->json([
    //     //     'data'=>$nhanvien,
    //     //     'status_code'=>200,
    //     //     'messege'=>'Xóa thành công'
    //     // ]);
    //     return view('nhanvien.update').redirect([
    //         'data'=>$nhanvien,
    //         'status_code'=>200,
    //         'messege'=>'Xóa thành công'
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Nhanvien $nhanvien)
    {
        $data =$request->all();
        return $nhanvien->update($data);
        // return response()->json([
        //     'data'=>$nhanviens,
        //     'status_code'=>200,
        //         'messege'=>'Thêm mới thành công'
        // ]);
      
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien=Nhanvien::find($id);
        $nhanvien->delete();
        return response()->json([
            'data'=>$nhanvien,
            'status_code'=>200,
            'messege'=>'Xóa thành công'
        ]);
    }
}
