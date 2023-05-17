<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Menu</h4>
                    <?php if(session('message')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('menu-type.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Tên Menu </label>
                            <input type="text" value="<?php echo e(old('menutype')); ?>" name="menutype" onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Menu </label>
                            <input type="text" value="<?php echo e(old('slug_menu_type')); ?>" name="slug_menu_type" id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Default Select</label><br />
                            <select name="trangthai" class="form-control">
                                <option value="0">Hiện</option>
                                <option value="1">Ẩn</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>

            <!-- /General -->

        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.adminlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/admin/menu/create.blade.php ENDPATH**/ ?>