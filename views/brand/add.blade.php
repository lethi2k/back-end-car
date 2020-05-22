@extends('layouts.admin')
@section('content')
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Thêm danh mục </h3>
</div>
<form id="add-category-form" action="{{ BASE_URL . 'brand/save-add'}}" method="post" enctype="multipart/form-data" style="padding:20px">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên danh mục<span class="text-danger">*</span></label>
                        <input type="text" name="brand_name" class="form-control" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="">Quốc tịch</label>
                    <input type="text" name="country" class="form-control" placeholder="Nhập quốc gia">
                    </div>
                    
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <img src="{{ DEFAULT_IMAGE }}" class="img-fluid" id="img-preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Logo danh mục<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="logo" class="form-control" >
                    </div>
                   
                    
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Tạo</button>&nbsp;
                    <a href="{{ BASE_URL .'brand' }}" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
        </div>
@endsection
@section('js')
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
        $('#add-category-form').validate({
            rules:{
                brand_name: {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: "{{ BASE_URL . 'brand/check-name'}}",
                        type: "post",
                        data: {
                            name: function() {
                                return $( "input[name='brand_name']" ).val();
                            }
                        }
                    }
                },
                country: {
                    required: true,
                    minlength: 2,
                },
                logo: {
                    required: true,
                    extension: "jpg|png|jpeg|gif"
                }
            },
            messages:{
                brand_name: {
                    required: "Nhập tên sản phẩm",
                    minlength: "Tối thiểu 2 ký tự",
                    remote: "Tên sản phẩm đã tồn tại, vui lòng chọn tên khác"
                },
                country: {
                    required: "Nhập quốc tịch",
                    minlength: "Tối thiểu 2 ký tự",
                },
                logo: {
                    required: "Hãy chọn ảnh sản phẩm",
                    extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
                }
            }
        });
    });
</script>
@endsection