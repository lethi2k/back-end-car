<?php $__env->startSection('content'); ?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Sửa sản phẩm</h3>
</div>
<form id="edit-product-form" action="<?php echo e(BASE_URL . 'car/save-edit'); ?>" method="post" enctype="multipart/form-data" style="padding:20px">
            <input type="hidden" name="id" value="<?php echo e($Car->id); ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm<span class="text-danger">*</span></label>
                        <input type="text" name="model_name" class="form-control"
                               value="<?php echo e($Car->model_name); ?>"
                               placeholder="Nhập tên sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục sản phẩm</label>
                        <select name="brand_id" class="form-control">
                            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option
                                    <?php if($ca->id == $Car->id): ?>
                                        selected
                                    <?php endif; ?>
                                    value="<?php echo e($ca->id); ?>"><?php echo e($ca->brand_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm<span class="text-danger">*</span></label>
                        <input type="number" name="price" class="form-control"
                               value="<?php echo e($Car->price); ?>"
                               placeholder="Nhập giá sản phẩm">
                    </div>
                    
                    <!-- // if ($Car->price > $Car->sale_price) {
                        
                    // } -->
                    
                    <div class="form-group">
                        <label for="">Giảm giá</label>
                        <input type="number" name="sale_price" class="form-control"
                               value="<?php echo e($Car->sale_price); ?>"
                               placeholder="Nhập số lượt xem sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="">Chi tiết</label>
                        <textarea name="detail" class="form-control" rows="5"><?php echo e($Car->detail); ?></textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                    <div class="col-md-6 offset-md-3">
                            <img src="<?php echo e(BASE_URL . $Car->image); ?>" class="img-fluid" id="img-preview">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh sản phẩm<span class="text-danger">*</span></label>
                        <input type="file" onchange="encodeImageFileAsURL(this)"  name="image" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="number" name="quantity"
                               value="<?php echo e($Car->quantity); ?>"
                               class="form-control" >
                    </div>
                    
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary">Cập nhật</button>&nbsp;
                    <a href="<?php echo e(BASE_URL .'cars'); ?>" class="btn btn-sm btn-danger">Hủy</a>
                </div>
            </div>
        </form>
        </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    function encodeImageFileAsURL(element) {
        var file = element.files[0];
        if(file === undefined){
            $("#img-preview").attr("src", "<?php echo e(BASE_URL . $Car->image); ?>");
            return false;
        }
        var reader = new FileReader();
        reader.onloadend = function() {
            $("#img-preview").attr("src", reader.result);
        }
        reader.readAsDataURL(file);
    }
    $(document).ready(function(){

        // tên: bắt buộc nhập, tối thiểu 2 ký tự
        // giá: bắt buộc nhập, phải là số, không âm
        // views: ko bắt buộc nhập, phải là số, không âm
        // star: ko bắt buộc nhập, phải là số, không âm, nằm trong khoảng 0-5
        // ảnh sản phẩm: bắt buộc nhập, chỉ chấp nhận định dạng ảnh
        $('#edit-product-form').validate({
            rules:{
                model_name: {
                    required: true,
                    minlength: 2,
                    remote: {
                        url: "<?php echo e(BASE_URL . 'car/check-name'); ?>",
                        type: "post",
                        data: {
                            name: function() {
                                return $( "input[name='model_name']" ).val();
                            },
                            id: function(){
                                return $( "input[name='id']" ).val();
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
                    extension: "Hãy chọn file định dạng ảnh (jpg|png|jpeg|gif)"
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\hoc-tap\php2\pt14314-assigment\views/car/edit.blade.php ENDPATH**/ ?>