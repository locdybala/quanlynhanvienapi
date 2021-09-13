@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Sửa nhân viên') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div id="ttnv" class="card-body">






                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('js')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            var tempNhanvien
            load_data();

            function load_data() {

                let id = window.location.pathname.split('/')[window.location.pathname.split('/').length - 1];
                console.log(id)
                let href = 'http://127.0.0.1:8000/api/v1/nhanviens/' + id;

                $.get(href, function(res) {

                    if (res.status_code = 200) {
                        let nhanvien = res.data;

                        tempNhanvien = {
                            manhanvien: nhanvien.manhanvien,
                            tennhanvien: nhanvien.tennhanvien,
                            ngaysinh: nhanvien.ngaysinh,
                            gioitinh: nhanvien.gioitinh,
                            diachi: nhanvien.diachi,
                            sodienthoai: nhanvien.sodienthoai
                        }
                        let tr = '';
                        tr += `<form  id="formSua">
                                @csrf
                                <div class="form-group">
                                    <label for="manhanvien">Mã nhân viên</label>
                                    <input type="text" class="form-control" value="${nhanvien.manhanvien}" name="manhanvien" id="manhanvien">
                                </div>
                                <div class="form-group">
                                    <label for="tennhanvien">Tên nhân viên</label>
                                    <input type="text" class="form-control" value="${nhanvien.tennhanvien}" name="tennhanvien" id="tennhanvien">
                                </div>
                                <div class="form-group">
                                    <label for="ngaysinh">Ngày sinh</label>
                                    <input type="date" class="form-control" value="${nhanvien.ngaysinh}" name="ngaysinh" id="ngaysinh">
                                </div>
                                <div class="form-group">
                                    <label for="gioitinh">Giới tính</label>
                                    <input type="text" class="form-control" value="${nhanvien.gioitinh}" name="gioitinh" id="gioitinh">
                                </div>
                                <div class="form-group">
                                    <label for="sodienthoai">Số điện thoại</label>
                                    <input type="text" class="form-control" value="${nhanvien.sodienthoai}" name="sodienthoai" id="sodienthoai">
                                </div>
                                <div class="form-group">
                                    <label for="diachi"> Địa chỉ</label>
                                    <input type="text" value="${nhanvien.diachi}" class="form-control" name="diachi" id="diachi">
                                </div>
                                <button type="button" name="suanhanvien" onclick="updatenv(${nhanvien.id})" class="btn btn-primary mt-2">
                                                Sửa</button>
                            </form>`;

                        $('#ttnv').html(tr);
                    }

                });
            }


            function updatenv(id) {
                // let formData = $('#formSua').serialize();
                let href = 'http://127.0.0.1:8000/api/v1/nhanviens/' + id;
                // $.put(href, formData, function(res) {
                //     Redirect();
                // });
                const manhanvien = document.getElementById('manhanvien').value
                const tennhanvien = document.getElementById('tennhanvien').value
                const ngaysinh = document.getElementById('ngaysinh').value
                const diachi = document.getElementById('diachi').value
                const gioitinh = document.getElementById('gioitinh').value
                const sodienthoai = document.getElementById('sodienthoai').value


                const body = {
                    manhanvien: manhanvien,
                    tennhanvien: tennhanvien,
                    ngaysinh: ngaysinh,
                    diachi: diachi,
                    gioitinh: gioitinh,
                    sodienthoai: sodienthoai
                }
                const hasChanged = body.manhanvien === tempNhanvien.manhanvien && body.tennhanvien === tempNhanvien
                    .tennhanvien && body
                    .ngaysinh === tempNhanvien.ngaysinh && body.diachi === tempNhanvien.diachi && body.gioitinh === tempNhanvien
                    .gioitinh && body.sodienthoai === tempNhanvien.sodienthoai

                if (hasChanged) {
                    alert("Ban chua chinh sua")
                    return
                } else {

                    $.ajax({
                        type: "PUT",
                        url: href,
                        data: body,
                        success: function(data) {
                            if (data === "1") {
                                alert("Sua thanh cong")
                                Redirect()
                            } else {
                                alert("Hệ THốNG LỗI")
                            }
                        }
                    });

                }
            }

            function Redirect(id) {
                window.location = "http://127.0.0.1:8000/home";

            }
        </script>
    @endsection
