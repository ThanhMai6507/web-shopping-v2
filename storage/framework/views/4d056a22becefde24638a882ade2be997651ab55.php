<?php $__env->startPush('search'); ?>
    <form autocomplete="off" action="<?php echo e(url('/')); ?>" method="get" style="width: 600px">
        <div style="display: flex">
            <div style="width: 200px; padding: 0; margin-right: 10px;">
                <select class="selectpicker form-control" data-live-search="true" name="category">
                    <option value=""></option>
                    <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"
                                <?php echo e(request()->category_id == $category->id ? 'selected' : ''); ?> data-tokens="mustard"><?php echo e($category->category_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="search"
                 style="height: 34px;display: flex;justify-content: center;font-palette: dark;align-items: center;">
                <input type="text" placeholder="Search" id="keywords" name="keywords" class="textbox">
                <input type="submit" value="Subscribe" id="submit" name="">
                <div id="search_ajax"></div>
            </div>
        </div>
    </form>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content_top">
        <div class="content_bottom">
            <h3 class="m_1"> Product </h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section group">
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sanpham): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col_1_of_3 simpleCart_shelfItem">
                                    <form>
                                        <?php echo csrf_field(); ?>
                                        <div class="shop-holder">
                                            <div class="product-img">
                                                <a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>">
                                                    <img width="225" height="265"
                                                         style="min-height: 265px"
                                                         src="<?php echo e(asset('public/uploads/product/' . $sanpham->img_product)); ?>"
                                                         class="img-responsive" alt="item4"></a>
                                                <input type="button" class="button item_add add-to-cart"
                                                       data-id_product="<?php echo e($sanpham->id); ?>" name="add-to-cart">
                                            </div>
                                        </div>

                                        <input type="hidden" value="<?php echo e($sanpham->id); ?>"
                                               class="cart_product_id_<?php echo e($sanpham->id); ?>">
                                        <input type="hidden" value="<?php echo e($sanpham->name_product); ?>"
                                               class="cart_product_name_<?php echo e($sanpham->id); ?>">
                                        <input type="hidden" value="<?php echo e($sanpham->img_product); ?>"
                                               class="cart_product_image_<?php echo e($sanpham->id); ?>">
                                        <input type="hidden" value="<?php echo e($sanpham->price); ?>"
                                               class="cart_product_price_<?php echo e($sanpham->id); ?>">
                                        <input type="hidden" value="1" class="cart_product_qty_<?php echo e($sanpham->id); ?>">

                                    </form>
                                    
                                    <div class="shop-content" style="height: 80px; ">
                                        <a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>"
                                           style="text-align: center; font-size: 14px;"><?php echo substr($sanpham->name_product, 0, 18); ?></a>
                                        <div><a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>" rel="tag"
                                                style="font-size: 12px;"></a></div>
                                        <span
                                            class="amount item_price"><?php echo e(number_format($sanpham->price) . ' ' . 'VND'); ?></span>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <?php echo e($product->links('pagination::bootstrap-4')); ?>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/home.blade.php ENDPATH**/ ?>