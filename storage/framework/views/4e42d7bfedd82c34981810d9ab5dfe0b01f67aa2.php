<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="check">
            <div class="col-md-9 cart-items">

                <h1>Trang Thanh Toán </h1>

              
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

                <?php
                    $total = 0 ;
                    $cart_ajax = Session::get('cart');
                   // dd(count($cart_ajax));
                ?>
                    
                    <?php $__currentLoopData = $cart_ajax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $subtotal = $cart['product_price']* $cart['product_qty'];
                        $total += $subtotal;
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                

                <?php if(Session::get('coupon')): ?>
                   
                    <?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($cou['coupon_condition'] == 1): ?>
                                <?php 
                                $total_coupon = ($total  * $cou['coupon_number']) /100;
                                ?>
                        <?php elseif($cou['coupon_condition'] == 2): ?>
                            
                                <?php 
                                $total_coupon = ( $total - $cou['coupon_number']) ;
                                ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                <?php endif; ?> 


                    
                

                <form method="POST" action="<?php echo e(url('/save-order-ajax')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Tên người nhận </label>

                        <div class="col-md-6">
                            <input name="order_name" type="text" class="form-control" value="<?php echo e(old('order_name')); ?>" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Số điện thoại </label>

                        <div class="col-md-6">
                            <input name="order_phone" type="text" class="form-control"
                                value="<?php echo e(old('order_phone')); ?>" />

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right"> Địa Chỉ </label>

                        <div class="col-md-6">
                            <input name="order_adds" type="text" class="form-control" value="<?php echo e(old('order_adds')); ?>" />

                        </div>
                    </div>
                    <h5>Phương Thức Thanh Tooán</h5>
                    <div class="form-check">
                        <input class="form-check-input" value="1" type="radio" name="bankdef" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Thanh Toán Khi Nhận Hàng
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" value="2" type="radio" name="bankdef" id="flexRadioDefault2"
                            checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            Chuyển Khoảng
                        </label>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            
                            <?php $__currentLoopData = $cart_ajax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <input name="product_qty" type="hidden" value="<?php echo e($cart['product_qty']); ?>" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                            <?php if(Session::get('coupon')): ?>
                             <input name="coupon_price" type="hidden" value=" <?php echo e($total_coupon); ?> " /> 
                            <?php else: ?>
                             <input name="coupon_price" type="hidden" value=" <?php echo e($total); ?> " /> 
                            <?php endif; ?>
                           
                           
                            
                            <button type="submit" class="btn btn-primary">
                                Đặt Hàng
                            </button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo e(url('/update-cart-ajax')); ?>" method="POST">    
                    
                    <?php echo csrf_field(); ?>   
                        <?php $__currentLoopData = $cart_ajax; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php
                                $subtotal = $cart['product_price']* $cart['product_qty'];
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
                                                    <p>Qty <input class="cart_quantity" type="number" min="1" name="cart_qty[<?php echo e($cart['session_id']); ?>]" value="<?php echo e($cart['product_qty']); ?>"   style="width: 55px;"></p><br />
                                                           
                                                   
                                                </li>
                                           
                                        </ul>
                                        <div class="delivery">
                                        
                                            <p>Giá : <?php echo e(number_format($subtotal, 0, ',', '.') . ' ' . 'VND'); ?></p>
                                            
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        <input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
                </form>     

            </div>
            <div class="col-md-3 cart-total">
                <a class="continue" href="#">Tiếp Tục Mua Sắm</a>
                <div class="price-details">
                    <h3>Chi tiết giá cả</h3>
                    <span>Toàn bộ</span>
                    
                        <span>
                            <?php echo e(number_format($total,0,',','.')); ?> VND 
                        </span>

                    <span>Mã Giảm Giá </span>
                    <span class="total1">
                        <?php if(Session::get('coupon')): ?>
                            <?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cou['coupon_condition'] == 1): ?>
                                    <?php echo e($cou['coupon_number']); ?> % 
                                <?php elseif($cou['coupon_condition'] == 2): ?>
                                    <?php echo e(number_format($cou['coupon_number'],0,',','.')); ?> VND 
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?> 
                    </span>
                    <span>Tiền Giảm</span>
                    <span class="total1">

                        <?php if(Session::get('coupon')): ?>
                            <?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cou['coupon_condition'] == 1): ?>
                                    <?php echo e(number_format($total_coupon,0,',','.')); ?> VND
                                <?php elseif($cou['coupon_condition'] == 2): ?>
                                    <?php echo e(number_format($total_coupon,0,',','.')); ?> VND
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?> 

                    </span>
                    <div class="clearfix"></div>
                </div>
                <ul class="total_price">
                    <li class="last_price">
                        <h4>Tổng Tiền </h4>
                    </li>
                    <li class="last_price">
                     
                        <?php if(Session::get('coupon')): ?>
                            <?php $__currentLoopData = Session::get('coupon'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($cou['coupon_condition'] == 1): ?>
                                <?php echo e(number_format( $total_coupon),0,',','.'); ?> VND
                                <?php elseif($cou['coupon_condition'] == 2): ?>
                                <?php echo e(number_format($total_coupon,0,',','.')); ?> VND
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?> 

                    </li>
                    <div class="clearfix"></div>

                    <form action="<?php echo e(url('check-coupon')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="total-item">
                            <h3>Mã Giảm Giá</h3>
                            <input type="text" name="coupon" value="<?php echo e(old('coupon')); ?>" class="form-control">
                            <br />
                            <button type="submit" class="cpns">Áp Dụng Mã Giảm</button>
                        </div>
                    </form>

                    <div class="clearfix"> </div>
                </ul>



                <div class="clearfix"></div>
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/page/checkoutajax.blade.php ENDPATH**/ ?>