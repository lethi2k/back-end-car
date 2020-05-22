<?php $__env->startSection('content'); ?>
<div class="card card-primary">
<div class="card-header">
    <h3 class="card-title">Tìm thấy <?php echo e(count($Cars)); ?> sản phẩm</h3>
</div>
<?php if($proid): ?>
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
        <?php $__currentLoopData = $Cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($pro->id); ?></td>
                <td><?php echo e($pro->getBrandName()); ?> </td>
                <td><?php echo e($pro->model_name); ?></td>
                <td>
                    <img src="<?php echo e(BASE_URL . $pro->image); ?> " class="img-fluid">
                </td>
                <td><?php echo e(number_format($pro->price, 3)); ?> VNĐ</td>
                <td><?php echo e(number_format($pro->sale_price, 3)); ?> VNĐ</td>
                <td><?php echo e($pro->detail); ?></td>
                <td><?php echo e($pro->quantity); ?></td>
                <td>
                    <a href="<?php echo e(BASE_URL . 'car/edit/' . $pro->id); ?>" class="btn btn-sm btn-primary">Sửa</a> &nbsp;
                    <a href="<?php echo e(BASE_URL . 'car/remove/' . $pro->id); ?>" class="btn btn-sm btn-danger btn-remove">Xóa</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <table class="table table-stripped">
        <thead>
            <th>ID</th>
            <th>band name</th>
            <th width="100">logo</th>
            <th>country</th>
            <th>Chỉnh Sửa</th>
        </thead>
        <tbody>
        <?php $__currentLoopData = $Brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($pro->id); ?></td>
                <td><?php echo e($pro->brand_name); ?></td>
                
                <td>
                    <img src="<?php echo e(BASE_URL . $pro->logo); ?> " class="img-fluid">
                </td>
                <td><?php echo e($pro->country); ?></td>
                <td>
                    <a href="<?php echo e(BASE_URL . 'brand/edit/'. $pro->id); ?>" class="btn btn-sm btn-primary">Sửa</a> &nbsp;
                    <a href="<?php echo e(BASE_URL . 'brand/remove/' . $pro->id); ?>" class="btn btn-sm btn-danger btn-remove">Xóa</a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\php\hoc-tap\php2\pt14314-assigment\views/car/search.blade.php ENDPATH**/ ?>