@extends("layouts.admin.adminlayout")
@section('content')

    <div class="row">

        <div class="col-12">


            <!-- General -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> List category </h4>
                    <!-- Mesage -->
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!--End Mesage -->
                </div>
                <!-- /General -->
                <!-- Table -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="DataTables_Table_0_wrapper"
                                         class="dataTables_wrapper dt-bootstrap4 no-footer">
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
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Chuyên môn: activate to sort column ascending"
                                                            style="width: 209px;">
                                                            Name category
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tr role="row" class="odd">
                                                    @foreach ($listcategory as $key => $values)
                                                        <tr role="row" class="odd">
                                                            <td>
                                                                <h2 class="table-avatar">
                                                                    <a> {{ $values->category_name }} </a>
                                                                </h2>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="actions">
                                                                    <a href="{{ route('category.edit', [$values->id]) }}"
                                                                       class="btn btn-primary"> Edit </a>
                                                                    <a class="btn btn-sm">
                                                                        <form
                                                                            action="{{ route('category.destroy', [$values->id]) }}"
                                                                            method="post">
                                                                            @method('Delete')
                                                                            @csrf
                                                                            <button
                                                                                onclick="return confirm('Want To Remove This Menu?')"
                                                                                class="btn btn-danger">Delete
                                                                            </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
