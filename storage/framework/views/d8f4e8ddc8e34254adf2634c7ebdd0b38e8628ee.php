<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-12">


            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hiển Thị Menu </h4>
                    <!-- Mesage -->
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
                    <!--End Mesage -->
                </div>
                <!-- /General -->
                <!-- Table -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table
                                                    class="datatable table table-hover table-center mb-0 dataTable no-footer"
                                                    id="DataTables_Table_0" role="grid"
                                                    aria-describedby="DataTables_Table_0_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="#: activate to sort column descending"
                                                                style="width: 86px;">
                                                                Tên Sản Phẩm
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Giá Sản Phẩm
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Danh Muc
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                                Hình Ảnh Sản Phẩm
                                                            </th>


                                                            <th class="text-right sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Actions: activate to sort column ascending"
                                                                style="width: 221px;">
                                                                #</th>
                                                        </tr>
                                                    </thead>
                                                    <tr role="row" class="odd">
                                                        <?php $__currentLoopData = $list_product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"> <?php echo e($value->name_product); ?></td>

                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> <?php echo e($value->price); ?> </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> <?php echo e($value->product_category->category_name); ?> </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <img src="<?php echo e(asset('public/uploads/product/' . $value->img_product)); ?>"
                                                                    height="100" width="100">
                                                            </h2>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a href="<?php echo e(route('product.edit', [$value->id])); ?>"
                                                                    class="btn btn-primary"> Sửa </a>
                                                                <a class="btn btn-sm">
                                                                    <form
                                                                        action="<?php echo e(route('product.destroy', [$value->id])); ?>"
                                                                        method="post">
                                                                        <?php echo method_field('Delete'); ?>
                                                                        <?php echo csrf_field(); ?>
                                                                        <button
                                                                            onclick="return confirm('Bạn Muốn Xóa Menu Này?')"
                                                                            class="btn btn-danger">Xóa</button>

                                                                    </form>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <?php echo e($list_product->links('pagination::bootstrap-4')); ?>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-5">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Table -->

            </div>
        </div>


    <?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.admin.adminlayout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/web-ban-hang-larave/resources/views/admin/product/index.blade.php ENDPATH**/ ?>