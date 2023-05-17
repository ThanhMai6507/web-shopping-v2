<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="women_main">
            <div class="col-md-9 w_content">
                <div class="women">
                    <a href="#">
                        <h4>Enthecwear - <span>4449 itemms</span> </h4>
                    </a>
                    <ul class="w_nav">
                        <li>Sort : </li>
                        <li><a class="active" href="#">popular</a></li> |
                        <li><a href="#">new </a></li> |
                        <li><a href="#">discount</a></li> |
                        <li><a href="#">price: Low High </a></li>
                        <div class="clear"></div>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- grids_of_4 -->
                <div class="row">
                    <?php $__currentLoopData = $product_search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $sanpham): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="grids_of_4">
                            <div class="grid1_of_4 simpleCart_shelfItem">
                                <div class="content_box">
                                    <a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>"></a>
                                    <div class="view view-fifth"><a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>">
                                            <img src="<?php echo e(asset('public/uploads/product/' . $sanpham->img_product)); ?>"
                                                width="188" height="183" class="img-responsive" alt="">
                                            <div class="mask1">
                                                <div class="info"> </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="<?php echo e(url('san-pham/' . $sanpham->slug_product)); ?>" style="font-size: 15px;">
                                        <?php echo e($sanpham->name_product); ?></a>
                                    <div class="size_1">
                                        <span class="item_price"><?php echo e(number_format($sanpham->price) . ' ' . 'VND'); ?></span>
                                        <select class="item_Size">
                                            <option value="Small">L</option>
                                            <option value="Medium">S</option>
                                            <option value="Large">M</option>
                                            <option value="Large">XL</option>
                                        </select>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="size_2">
                                        <div class="size_2-left">
                                            
                                        </div>
                                        <div class="size_2-right">
                                            <form action="<?php echo e(url('/save-cart')); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" class="item_add add3"></button>

                                                <input name="qty" type="hidden" value="1" />
                                                <input name="productId" type="hidden" value="<?php echo e($sanpham->id); ?>" />
                                            </form>
                                        </div>
                                        <div class="clearfix"> </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- end grids_of_4 -->
            </div>
            <!-- start sidebar -->
            <div class="col-md-3">
                <div class="w_sidebar">
                    <div class="w_nav1">
                        <h4>All</h4>
                        <ul>
                            <li><a href="women.html">women</a></li>
                            <li><a href="#">new arrivals</a></li>
                            <li><a href="#">trends</a></li>
                            <li><a href="#">boys</a></li>
                            <li><a href="#">girls</a></li>
                            <li><a href="#">sale</a></li>
                        </ul>
                    </div>
                    <h3>filter by</h3>
                    <section class="sky-form">
                        <h4>catogories</h4>
                        <div class="row1 scroll-pane jspScrollable" tabindex="0"
                            style="overflow: hidden; padding: 0px; width: 203px;">


                            <div class="jspContainer" style="width: 203px; height: 200px;">
                                <div class="jspPane" style="padding: 0px; width: 234px; top: 0px;">
                                    <div class="col col-4">
                                        <label class="checkbox"><input type="checkbox" name="checkbox"
                                                checked=""><i></i>kurtas</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>kutis</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>churidar
                                            kurta</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>salwar</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>printed
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>shree</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>Anouk</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>biba</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>fashion
                                            sari</label>
                                    </div>
                                </div>
                                <div class="jspVerticalBar">
                                    <div class="jspCap jspCapTop"></div>
                                    <div class="jspTrack" style="height: 200px;">
                                        <div class="jspDrag" style="height: 76px;">
                                            <div class="jspDragTop"></div>
                                            <div class="jspDragBottom"></div>
                                        </div>
                                    </div>
                                    <div class="jspCap jspCapBottom"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>brand</h4>
                        <div class="row1 scroll-pane jspScrollable" tabindex="0"
                            style="overflow: hidden; padding: 0px; width: 203px;">


                            <div class="jspContainer" style="width: 203px; height: 200px;">
                                <div class="jspPane" style="padding: 0px; width: 234px; top: 0px;">
                                    <div class="col col-4">
                                        <label class="checkbox"><input type="checkbox" name="checkbox"
                                                checked=""><i></i>shree</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>Anouk</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>biba</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>vishud</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>amari</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>shree</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>Anouk</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>biba</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>shree</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>Anouk</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>biba</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>shree</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>Anouk</label>
                                        <label class="checkbox"><input type="checkbox"
                                                name="checkbox"><i></i>biba</label>
                                    </div>
                                </div>
                                <div class="jspVerticalBar">
                                    <div class="jspCap jspCapTop"></div>
                                    <div class="jspTrack" style="height: 200px;">
                                        <div class="jspDrag" style="height: 86px;">
                                            <div class="jspDragTop"></div>
                                            <div class="jspDragBottom"></div>
                                        </div>
                                    </div>
                                    <div class="jspCap jspCapBottom"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>colour</h4>
                        <ul class="w_nav2">
                            <li><a class="color1" href="#"></a></li>
                            <li><a class="color2" href="#"></a></li>
                            <li><a class="color3" href="#"></a></li>
                            <li><a class="color4" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                            <li><a class="color12" href="#"></a></li>
                            <li><a class="color13" href="#"></a></li>
                            <li><a class="color14" href="#"></a></li>
                            <li><a class="color15" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                        </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 scroll-pane jspScrollable" tabindex="0"
                            style="overflow: hidden; padding: 0px; width: 203px;">


                            <div class="jspContainer" style="width: 203px; height: 200px;">
                                <div class="jspPane" style="padding: 0px; width: 234px; top: 0px;">
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio" checked=""><i></i>60
                                            % and above</label>
                                        <label class="radio"><input type="radio" name="radio"><i></i>50 % and
                                            above</label>
                                        <label class="radio"><input type="radio" name="radio"><i></i>40 % and
                                            above</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="radio"><input type="radio" name="radio"><i></i>30 % and
                                            above</label>
                                        <label class="radio"><input type="radio" name="radio"><i></i>20 % and
                                            above</label>
                                        <label class="radio"><input type="radio" name="radio"><i></i>10 % and
                                            above</label>
                                    </div>
                                </div>
                                <div class="jspVerticalBar">
                                    <div class="jspCap jspCapTop"></div>
                                    <div class="jspTrack" style="height: 200px;">
                                        <div class="jspDrag" style="height: 184px;">
                                            <div class="jspDragTop"></div>
                                            <div class="jspDragBottom"></div>
                                        </div>
                                    </div>
                                    <div class="jspCap jspCapBottom"></div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- start content -->
            <div class="clearfix"></div>
            <!-- end content -->
        </div>
    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.user.userlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/user/page/search.blade.php ENDPATH**/ ?>