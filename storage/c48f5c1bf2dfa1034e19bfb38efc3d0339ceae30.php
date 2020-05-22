<?php $__env->startSection('content'); ?>
<div class="card card-success">
<div class="card-header">
    <h3 class="card-title">Sửa danh mục</h3>
</div>
<form id="edit-product-form" action="<?php echo e(BASE_URL . 'brand/save-edit'); ?>" method="post" enctype="multipart/form-data" style="padding:20px">
            <input type="hidden" name="id" value="<?php echo e($brand->id); ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên Danh Mục<span class="text-danger">*</span></label>
                        <input type="text" name="brand_name" class="form-control"
                               value="<?php echo e($brand->brand_name); ?>"
                               placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="">Quốc Gia</label>
                        <input type="text" name="country" class="form-control" value="<?php echo e($brand->country); ?>">
                    </div>
                    
                </div>
                <div class="col-6">
                    <div class="row">
                    <div class="col-md-6 offset-md-3">
                            <img src="<?php echo e(BASE_URL . $brand->logo); ?>" class="img-fluid" id="img-preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Logo danh mục<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="logo" class="form-control" >
                    </div>
                    
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-success">Cập nhật</button>&nbsp;
                    <a href="<?php echo e(BASE_URL .'brand'); ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file == undefined){
            $("#img-preview").attr("src", "<?php echo e(BASE_URL . $brand->logo); ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    $(document).ready(function(){
        $('#edit-product-form').validate({
            rules:{
                brand_name: {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: "<?php echo e(BASE_URL . 'brand/check-name'); ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $( "input[name='brand_name']" ).val();
                            },
                            id: function(){
                                return $( "input[name='id']" ).val();
                            }
                        }
                    }
                },
                country: {
                    required: true,
                    minlength: 2,
                },
                logo: {
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
                    extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\hoc-tap\php2\pt14314-assigment\views/brand/edit.blade.php ENDPATH**/ ?>