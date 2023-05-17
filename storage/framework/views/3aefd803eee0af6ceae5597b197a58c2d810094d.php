<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">
                <?php if(Cart::count() > 0): ?>
                    <h1>Giỏ Hàng Của Bạn </h1>
                <?php else: ?>
                    <h1>Giỏ Hàng Của Bạn Hiện Đang Trống </h1>
                <?php endif; ?>

                <?php
                $content = Cart::content();
                $items = Cart::count();
                // dd($content);
                ?>
                <script>
                    $(document).ready(function(c) {
                        $('.close').on('click', function(c) {
                            $('.cart-header').fadeOut('slow', function(c) {
                                $('.cart-header').remove();
                            });
                        });
                    });
                </script>
                <?php if(session('message')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('message')); ?>

                    </div>
                <?php endif; ?>
                
                <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="cart-header">
                        <a href="<?php echo e(url('delete-cart/' . $cart->rowId)); ?>" class="close1"></a>
                        <div class="cart-sec simpleCart_shelfItem">
                            <div class="cart-item cyc">
                                <img src="<?php echo e(asset('public/uploads/product/' . $cart->options->image)); ?>"
                                    class="img-responsive" alt="">
                            </div>
                            <div class="cart-item-info">
                                <h3><a href="#"><?php echo e($cart->name); ?></a><span> </span></h3>
                                <ul class="qty">
                                    
                                    <form method="post" action="<?php echo e(url('/update-cart-quantity')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <li>
                                            <p>Qty :<input name="cart_quantity" value="<?php echo e($cart->qty); ?> "
                                                    style="width: 25px;"></p><br />
                                            <input type="hidden" value="<?php echo e($cart->rowId); ?>" name="rowId_cart"
                                                class="form-control">
                                            <input type="submit" value="Cập Nhập" name="update_qty" class="btn btn-checked">
                                        </li>
                                    </form>
                                </ul>
                                <div class="delivery">
                                    <?php
                                        $subtotal = $cart->price * $cart->qty;
                                    ?>
                                    <p>Giá : <?php echo e(number_format($cart->price, 0, ',', '.') . ' ' . 'VND'); ?></p>
                                    
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="<?php echo e(url('/')); ?>">Tiếp Tục Mua Sắm</a>
                <div class="price-details">
                    <h3>Chi tiết giá cả</h3>
                    <span>Toàn bộ</span>

                    <?php if(Cart::count() > 0): ?>
                        <span class="total1"> <?php echo e(Cart::priceTotal(0, ',', '.')); ?> VND </span>
                    <?php endif; ?>

                    <span>Chiết khấu</span>
                    <span class="total1">---</span>
                    <span>Phí vận chuyển</span>
                    <span class="total1">---</span>
                   
                  

                    <div class="clearfix"></div>


                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Tổng Tiền </h4>
                    </li>
                    <li class="last_price">
                        <?php if(Cart::count() > 0): ?>
                            <span>
                                <?php echo e(Cart::priceTotal(0, ',', '.')); ?> VND
                            </span>
                        <?php endif; ?>

                    </li>
                    <div class="clearfix"> </div>
                </ul>


                <div class="clearfix"></div>
                <?php if(Cart::count() > 0): ?>
                    <a class="order" href="<?php echo e(url('/check-out')); ?>">Thanh Toán </a>
                <?php endif; ?>
              
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/page/cart.blade.php ENDPATH**/ ?>