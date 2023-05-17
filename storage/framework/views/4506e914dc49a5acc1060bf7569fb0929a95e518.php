<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
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
                    <form action="<?php echo e(route('product.store')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label> Tên Sản Phẩm </label>
                            <input type="text" name="name_product" value="<?php echo e(old('name_product')); ?>" onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Sản Phẩm </label>
                            <input type="text" name="slug_product" value="<?php echo e(old('slug_product')); ?>" id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Img</label>
                            <input type="file" name="img_product" value="<?php echo e(old('img_product')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Từ Khóa Sản Phẩm </label>
                            <input type="text" name="product_keywords" value="<?php echo e(old('product_keywords')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> code </label>
                            <input type="text" name="code" value="<?php echo e(old('code')); ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Tóm Tắt </label>
                            <textarea name="description" value="<?php echo e(old('description')); ?>" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Giá </label>
                            <input type="number" name="price" value="<?php echo e(old('price')); ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Chi tiết </label>
                            <textarea name="detail" id="noidung" value="<?php echo e(old('detail')); ?>" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label> Danh Mục </label><br />
                            <select name="category_product_id" class="form-control">

                                <?php $__currentLoopData = $category_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hàng vừa về </label><br />
                            <select name="hot" class="form-control">
                                <option value="0">Hiện</option>
                                <option value="1">Ẩn</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Trang Thái</label><br />
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

<?php echo $__env->make("layouts.admin.adminlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/admin/product/create.blade.php ENDPATH**/ ?>