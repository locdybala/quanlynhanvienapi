@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thêm nhân viên') }}
                <a href="{{url('/home')}}">Back</a>
                </div>


                <div class="card-body">
                   
                    <form  method="POST" action="" id="formAdd">
                        @csrf
                        <div class="form-group">
                            <label for="manhanvien">Mã nhân viên</label>
                            <input type="text" class="form-control" name="manhanvien" id="manhanvien">
                        </div>
                        <div class="form-group">
                            <label for="tennhanvien">Tên nhân viên</label>
                            <input type="text" class="form-control" name="tennhanvien" id="tennhanvien">
                        </div>
                        <div class="form-group">
                            <label for="ngaysinh">Ngày sinh</label>
                            <input type="date" class="form-control" name="ngaysinh" id="ngaysinh">
                        </div>
                        <div class="form-group">
                            <label for="gioitinh">Giới tính</label>
                            <input type="text" class="form-control" name="gioitinh" id="gioitinh">
                        </div>
                        <div class="form-group">
                            <label for="sodienthoai">Số điện thoại</label>
                            <input type="text" class="form-control" name="sodienthoai" id="sodienthoai">
                        </div>
                        <div class="form-group">
                            <label for="diachi"> Địa chỉ</label>
                            <input type="text" class="form-control" name="diachi" id="diachi">
                        </div>
                        <button type="submit" name="themnhanvien" class="btn btn-primary mt-2" > Thêm</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#formAdd').on('submit',function(e){
            e.preventDefault();
            let formData=$('#formAdd').serialize();
            $.post('http://127.0.0.1:8000/api/v1/nhanviens',formData,function(res){
              
            }
           
        });
    });
});
</script>
@endsection

