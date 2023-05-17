<?php $__env->startSection('content'); ?>


    <div class="single_top">
        <div class="container">
            <div class="single_grid">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <img class="etalage_thumb_image"
                                src="<?php echo e(asset('public/uploads/product/' . $product->img_product)); ?>"
                                class="img-responsive" />
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h1><?php echo e($product->name_product); ?></h1>
                    <p><?php echo e($product->description); ?></p>
                    
                    <div class="simpleCart_shelfItem">
                        <div class="price_single">
                            <div class="head">
                                <h3><span
                                        class="amount item_price"><?php echo e(number_format($product->price) . ' ' . 'VND'); ?></span>
                                </h3>
                            </div>
                            <div class="head_desc"><a href="#"></a><img src="images/review.png" alt="" /></li>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <form>
                            <?php echo csrf_field(); ?>
                            <div >
                                <div class="product-img">
                                    <input type="button" value="Thêm vào giỏ hàng" class="btn btn-primary add-to-cart" data-id_product="<?php echo e($product->id); ?>" name="add-to-cart">
                                </div>
                            </div>
                               <input type="hidden" value="<?php echo e($product->id); ?>" class="cart_product_id_<?php echo e($product->id); ?>">
                               <input type="hidden" value="<?php echo e($product->name_product); ?>" class="cart_product_name_<?php echo e($product->id); ?>">
                               <input type="hidden" value="<?php echo e($product->img_product); ?>" class="cart_product_image_<?php echo e($product->id); ?>">
                               <input type="hidden" value="<?php echo e($product->price); ?>" class="cart_product_price_<?php echo e($product->id); ?>">
                               <input type="hidden" value="1" class="cart_product_qty_<?php echo e($product->id); ?>">
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <div class="single_social_top">
        <ul class="single_social">
            <li><a href="#"> <i class="s_fb"> </i>
                    <div class="social_desc">Share<br> on facebook</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li><a href="#"> <i class="s_twt"> </i>
                    <div class="social_desc">Tweet<br> this product</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li><a href="#"> <i class="s_google"> </i>
                    <div class="social_desc">Google+<br> this product</div>
                    <div class="clearfix"> </div>
                </a></li>
            <li class="last"><a href="#"> <i class="s_email"> </i>
                    <div class="social_desc">Email<br> a Friend</div>
                    <div class="clearfix"> </div>
                </a></li>
        </ul>
    </div>
    <h3 class="m_2">Chi Tiết Sản Phẩm </h3>
    <div class="container">
        <div class="box_3">
            <p> <?php echo $product->detail; ?> </p>
        </div>
    </div>
    <h3 class="m_2">Sản Phẩm Liên Quan </h3>
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <a href=" <?php echo e(url('san-pham/' . $item->slug_product)); ?>">
                        <div class="card mb-4 box-shadow">
                            <img src="<?php echo e(asset('public/uploads/product/' . $item->img_product)); ?>" class="card-img-top"
                                data-holder-rendered="true" style="height: 314px; width: 218px%; display: block;">
                    </a>
                    <div class="card-body">
                        <a href="<?php echo e(url('san-pham/' . $item->slug_product)); ?>">
                            <p class="card-text">
                                <h4><?php echo e($item->name_product); ?></h4>
                            </p>
                        </a>
                    </div>
                </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/page/detailProduct.blade.php ENDPATH**/ ?>