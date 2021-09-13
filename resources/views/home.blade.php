@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Thêm nhân viên
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Thêm nhân viên</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="" id="formAdd">
                                            @csrf
                                            <div class="form-group">
                                                <label for="manhanvien">Mã nhân viên</label>
                                                <input type="text" class="form-control" name="manhanvien" id="manhanvien">
                                            </div>
                                            <div class="form-group">
                                                <label for="tennhanvien">Tên nhân viên</label>
                                                <input type="text" class="form-control" name="tennhanvien"
                                                    id="tennhanvien">
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
                                                <input type="text" class="form-control" name="sodienthoai"
                                                    id="sodienthoai">
                                            </div>
                                            <div class="form-group">
                                                <label for="diachi"> Địa chỉ</label>
                                                <input type="text" class="form-control" name="diachi" id="diachi">
                                            </div>
                                            <button type="button" class="btn btn-secondary mt-2"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="themnhanvien" class="btn btn-primary mt-2">
                                                Thêm</button>
                                        </form>
                                    </div>
                                    {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" name="themnhanvien" class="btn btn-primary">Thêm</button>
        </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>

                                <th scope="col">Mã nhân viên</th>
                                <th scope="col">Tên nhân viên</th>
                                <th scope="col">Ngày sinh</th>
                                <th scope="col">Giới tính</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Action</th>

                            </tr>
                        </thead>
                        <tbody id="list-nv">

                            {{-- @foreach ($nhanviens as $nhanvien)
                                <tr>
                                    <th >1</th>
                                    <td>{{$nhanvien->manhanvien}}</td>
                                    <td>{{$nhanvien->tennhanvien}}</td>
                                    <td>{{$nhanvien->ngaysinh}}</td>
                                    <td>{{$nhanvien->gioitinh}}</td>
                                    <td>{{$nhanvien->sodienthoai}}</td>
                                    <td>{{$nhanvien->diachi}}</td>
    
                                    <td>
                                        <a href="{{route('nhanviens.edit',[$nhanvien->id])}}">Sửa</a>
                                        <a href="{{route('nhanviens.destroy',[$nhanvien->id])}}">Xóa</a>
    
                                    </td>
                                  </tr>
                                @endforeach --}}

                        </tbody>
                    </table>
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
        load_data();

        function load_data() {

            $.get('http://127.0.0.1:8000/api/v1/nhanviens', function(res) {
                //console.log(res);
                if (res.status_code = 200) {
                    let nhanviens = res.data;
                    let tr = '';
                    nhanviens.forEach(function(item) {
                        console.log(item.id);
                        tr += `<tr> <td>${item.manhanvien}</td>
                                <td>${item.tennhanvien}</td>
                                <td>${item.ngaysinh}</td>
                                <td>${item.gioitinh}</td>
                                <td>${item.sodienthoai}</td>
                                <td>${item.diachi}</td>
                                <td>

                                    <button class="btn btn-primary mr-2" onclick="updatenv(${item.id})">Sửa</button>
                                    <button class="btn btn-primary mr-2" onclick="deletenv(${item.id})">Xóa</button>
                                </td>
                            </tr>`;
                    });
                    $('#list-nv').html(tr);
                }

            });
        }

        function updatenv(id) {
            // let href = 'http://127.0.0.1:8000/api/v1/nhanviens/' + id;
           
            
            Redirect(id);
            
        }

        function deletenv(id) {
            let formData = $('#formAdd').serialize();
            let href = 'http://127.0.0.1:8000/api/v1/nhanviens/' + id;
            let data = {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
            }
            // alert(href);

            if (confirm('Bạn có chắc chắn xóa không')) {

                $.post(href, data, function(res) {
                    if (res.status_code == 200) {
                        load_data();
                        swal({
                            title: "Succesfully",
                            text: res.messege,
                            icon: "success",
                            button: "OK",
                        });
                    } else {
                        swal({
                            title: "Error",
                            text: res.messege,
                            icon: "error",
                            button: "OK",
                        });
                    }
                })
            }
        }

        function Redirect(id) {
            window.location = "http://127.0.0.1:8000/nhanvien/update/"+id;
            
        }



        $(document).ready(function() {
            $('#formAdd').on('submit', function(e) {
                e.preventDefault();
                let formData = $('#formAdd').serialize();
                // alert('123213');
                $.post('http://127.0.0.1:8000/api/v1/nhanviens', formData, function(res) {

                    load_data();
                    swal({
                        title: "Succesfully",
                        text: res.messege,
                        icon: "success",
                        button: "OK",
                    });
                });

            });
        });
    </script>
@endsection
