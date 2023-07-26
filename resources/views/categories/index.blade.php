@extends('layouts.admin')
@section('title', 'category')
@section('content')
    <div class="content container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex">
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title float-start">Danh sách category</h4>
                        <div class="table-search float-end">
                            <input type="text" class="form-control" placeholder="Search">
                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="table-search float-end">
                            <a class="btn btn-info">add</a>
                        </div>
                    </div>
                    <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>Hành Động</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Nguyễn Lượng</td>
                            <td>nguyenluong@gmail.com</td>
                            <td>0866711741</td>
                            <td>Vĩnh Phúc</td>
                            <td>Nam</td>
                            <td>
                                <a class="btn btn-info">Edit</a>
                                <a class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection