@extends('layouts.admin')
@section('content')
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Thêm sản phẩm </h3>
</div>
<form id="add-product-form" action="{{ BASE_URL . 'car/save-add'}}" method="post" enctype="multipart/form-data" style="padding:20px">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm<span class="text-danger">*</span></label>
                        <input type="text" name="model_name" class="form-control" placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục sản phẩm</label>
                        <select name="brand_id" class="form-control">
                            @foreach ($cates as $ca)
                            <option value="{{ $ca->id }}">{{ $ca->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm<span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control" placeholder="Nhập giá sản phẩm" id="nameA">
                    </div>
                    <div class="form-group">
                        <label for="">Giảm Giá</label>
                        <input type="number" name="sale_price" class="form-control" placeholder="Nhập số lượt xem sản phẩm" id="nameB">
                    </div>
                    <p class="demo"></p>
                    <div class="form-group">
                        <label for="">Chi Tiết</label>
                        <textarea name="detail" class="form-control" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <img src="{{ DEFAULT_IMAGE }}" class="img-fluid" id="img-preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Số Lượng</label>
                        <input type="number" step="0.1" name="quantity" class="form-control" >
                    </div>
                    
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Tạo</button>&nbsp;
                    <a href="{{ BASE_URL.'cars'}}" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
</div>
@endsection
@section('js')
<script>
$(document).ready(function(){
    var a = $('#nameA').val();
    var b = $('#nameB').val();
   console.log(a);
  });
</script>
    <script>
        function encodeImageFileAsURL(element) {
            var file = element.files[0];
            if(file === undefined){
                $("#img-preview").attr("src", "{{ DEFAULT_IMAGE }}");
                return false;
            }
            var reader = new FileReader();
            reader.onloadend = function() {
                $("#img-preview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
        $(document).ready(function(){
            $('#add-product-form').validate({
                rules:{
                    model_name: {
                        required: true,
                        minlength: 2,
                        remote: {
                            url: "{{ BASE_URL . 'car/check-name'}}",
                            type: "post",
                            data: {
                                name: function() {
                                    return $( "input[name='model_name']" ).val();
                                }
                            }
                        }
                    },
                    detail: {
                    required: true,
                    minlength: 1,
                    },
                    price: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    sale_price: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    quantity: {
                        required: true,
                        number: true,
                        min: 1
                    },
                    
                    image: {
                        required: true,
                        extension: "jpg|png|jpeg|gif"
                    }
                },
                messages:{
                    model_name: {
                        required: "Nhập tên sản phẩm",
                        minlength: "Tối thiểu 2 ký tự",
                        remote: "Tên sản phẩm đã tồn tại, vui lòng chọn tên khác"
                    },
                    detail: {
                    required: "Yêu cầu nhập chi tiết",
                    minlength: "Tối thiểu 1 ký tự",
                    },
                    price: {
                        required: "Nhập giá sản phẩm",
                        number: "Yêu cầu nhập số",
                        min: "Giá trị nhỏ nhất là 1"
                    },
                    sale_price: {
                        required: "Nhập giảm giá",
                        number: "Yêu cầu nhập số",
                        min: "Giá trị nhỏ nhất là 1"
                    },
                    quantity: {
                        required: "Nhập số lượng",
                        number: "Yêu cầu nhập số",
                        min: "Giá trị nhỏ nhất là 1"
                    },
                    image: {
                        required: "Hãy chọn ảnh sản phẩm",
                        extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
                    }
                }
            });
        });
    </script>
@endsection