@extends("layouts.admin.adminlayout")
@section('content')


    <div class="row">

        <div class="col-12">


            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thông Tin Đơn Hàng </h4>
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
                                                                Tên Khách Hàng
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Số Điện Thoại
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Số lượng
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Mã Giảm
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 209px;">
                                                                Trạng Thái
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Chuyên môn: activate to sort column ascending"
                                                                style="width: 109px;">
                                                                #
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tr role="row" class="odd">
                                                        @foreach ($order as $key => $value)
                                                    <tr role="row" class="odd">
                                                        {{-- <td class="sorting_1"> {{ $value-> id}}</td> --}}
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $value->order_name }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $value->order_phone }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                <a> {{ $value->order_qty }} </a>
                                                            </h2>
                                                        </td>
                                                        <td>
                                                            <h2 class="table-avatar">
                                                                @if ($value->coupon_status == 0)
                                                                    <a> Không </a>
                                                                @elseif ($value-> coupon_status == 1)
                                                                    <a> Có </a>
                                                                @endif
                                                            </h2>
                                                        </td>
                                                      
                                                        <td>
                                                           
                                                           
                                                                <span class="text text-success"> Đơn Hàng Bị Hủy </span>

                                                        </td>
                                                        <td class="text-right">
                                                            <div class="actions">
                                                                <a href="{{ url('admin/order-detail/' . $value->id) }}"
                                                                    class="btn btn-primary"> Chi tiết</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>


            @endsection
