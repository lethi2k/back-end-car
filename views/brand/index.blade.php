@extends('layouts.admin')
@section('content')
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Tổng có {{count($Brand)}} hãng xe  </h3>
</div>
<table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>band name</th>
            <th width="100">logo</th>
            <th>country</th>
            <th>Chỉnh Sửa</th>
        </thead>
        <tbody>
       @foreach($Brand as $pro)
            <tr>
                <td>{{ $pro->id }}</td>
                <td>{{ $pro->brand_name }}</td>
                
                <td>
                    <img src="{{ BASE_URL . $pro->logo}} " class="img-fluid">
                </td>
                <td>{{ $pro->country }}</td>
                <td>
                    <a href="{{ BASE_URL . 'brand/edit/' . $pro->id}}" class="btn btn-sm btn-success">Sửa</a> &nbsp;
                    <a href="{{ BASE_URL . 'brand/remove/' . $pro->id}}" class="btn btn-sm btn-danger btn-remove">Xóa</a>
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