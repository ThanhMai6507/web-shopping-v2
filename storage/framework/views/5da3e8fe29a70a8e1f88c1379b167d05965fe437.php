<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                <?php
                    $total = 0 ;
                    $cart_ajax = Session::get('cart');
                ?>
                <?php if($cart_ajax == true): ?>
                    <h1>Your cart</h1>
                <?php else: ?>
                    <h1>GYour shopping cart is currently Empty </h1>
                <?php endif; ?>

                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(url('/update-cart-ajax')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php $__currentLoopData = $cart_ajax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $subtotal = 0;
                            if(isset($cart)){
                                $subtotal = $cart['product_price']* $cart['product_qty'];
                            }
                            $total += $subtotal;
                        ?>

                        <div class="cart-header">
                            <a href="<?php echo e(url('/delete-cart-ajax/'. $cart['session_id'])); ?>" class="close1"></a>
                            <div class="cart-sec simpleCart_shelfItem">
                                <div class="cart-item cyc">
                                    <img src="<?php echo e(asset('public/uploads/product/' . $cart['product_image'])); ?>"
                                         class="img-responsive" alt="">
                                </div>
                                <div class="cart-item-info">
                                    <h3><p href="#"><?php echo e($cart['product_name']); ?></p><span> </span></h3>
                                    <ul class="qty">
                                        <?php echo csrf_field(); ?>
                                        <li>
                                            <p>Qty <input class="cart_quantity" type="number" min="1"
                                                          name="cart_qty[<?php echo e($cart['session_id']); ?>]"
                                                          value="<?php echo e($cart['product_qty']); ?>" style="width: 55px;"></p>
                                            <br/>
                                        </li>

                                    </ul>
                                    <div class="delivery">
                                        <p>Price : <?php echo e(number_format($subtotal, 0, ',', '.') . ' ' . 'VND'); ?></p>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <input type="submit" value="Update cart" name="update_qty"
                           class="check_out btn btn-default btn-sm">
                </form>
            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="<?php echo e(url('/')); ?>">Continue Shopping</a>
                <div class="price-details">
                    <h3>Cprice details</h3>
                    <span>Total</span>
                    <span class="total1">  VND </span>
                    <span>Discount</span>
                    <span class="total1">---</span>
                    <span>Pshipping lice</span>
                    <span class="total1">---</span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Total Money </h4>
                    </li>
                    <li class="last_price">
                            <span>
                                <?php echo e(number_format($total, 0, ',', '.') . ' ' . 'VND'); ?>

                            </span>
                    </li>
                    <div class="clearfix"></div>
                </ul>
                <div class="clearfix"></div>
                <a class="order" href="<?php echo e(url('/check-out-ajax')); ?>">Pay </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/page/cart_ajax.blade.php ENDPATH**/ ?>