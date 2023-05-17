<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category</h4>
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
                    <form action="<?php echo e(route('category.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Tên Danh Muc </label>
                            <input type="text" name="category_name" value="<?php echo e(old('category_name')); ?>" onkeyup="ChangeToSlug()" id="slug"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Danh Muc </label>
                            <input type="text" name="slug_category" value="<?php echo e(old('slug_category')); ?>" id="convert_slug" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Mô Tả Danh Muc </label>
                            <input type="text" name="category_desc" value="<?php echo e(old('category_desc')); ?>" />
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Từ Khóa Danh Muc </label>
                            <input type="text" name="category_keywords" value="<?php echo e(old('category_keywords')); ?>" />
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Thuộc Menu </label><br />
                            <select name="category_menu" value="<?php echo e(old('category_menu')); ?>" class="form-control">
                                <option value="0">Không Thuộc Menu Nào</option>
                                <?php $__currentLoopData = $menuid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menuid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($menuid->id); ?>"><?php echo e($menuid->menu_type); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trang Thai</label><br />
                            <select name="trangthai" value="<?php echo e(old('trangthai')); ?>" class="form-control">
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

<?php echo $__env->make("layouts.admin.adminlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/admin/category/create.blade.php ENDPATH**/ ?>