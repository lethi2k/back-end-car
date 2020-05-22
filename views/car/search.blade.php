@extends('layouts.admin')
@section('content')
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Tìm thấy {{count($Cars)}} sản phẩm</h3>
</div>
<table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>band id</th>
            <th>model name</th>
            <th width="100">Image</th>
            <th>Price</th>
            <th>sale pirce</th>
            <th>detail</th>
            <th>quantity</th>
            <th>
                Chỉnh Sửa
            </th>
        </thead>
        <tbody>
        @foreach($Cars as $pro)
            <tr>
                <td>{{ $pro->id }}</td>
                <td>{{ $pro->getBrandName() }} </td>
                <td>{{ $pro->model_name }}</td>
                <td>
                    <img src="{{ BASE_URL . $pro->image}} " class="img-fluid">
                </td>
                <td>{{ number_format($pro->price, 3) }} VNĐ</td>
                <td>{{ number_format($pro->sale_price, 3) }} VNĐ</td>
                <td>{{ $pro->detail }}</td>
                <td>{{ $pro->quantity }}</td>
                <td>
                    <a href="{{ BASE_URL . 'car/edit/' . $pro->id}}" class="btn btn-sm btn-primary">Sửa</a> &nbsp;
                    <a href="{{ BASE_URL . 'car/remove/' . $pro->id}}" class="btn btn-sm btn-danger btn-remove">Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $('.btn-remove').on('click', function(){
                Swal.fire({
                    title: 'Cảnh báo!',
                    text: "Bạn chắc chắn muốn xóa sản phẩm này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý!'
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).attr('href');
                        window.location.href = url;
                    }
                })
                return false;
            });
        });
    </script>
@endsection