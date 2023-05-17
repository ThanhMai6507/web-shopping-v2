@extends("layouts.admin.adminlayout")
@section('content')


    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product</h4>
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
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Tên Sản Phẩm </label>
                            <input type="text" name="name_product" value="{{old('name_product')}}" onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug Sản Phẩm </label>
                            <input type="text" name="slug_product" value="{{old('slug_product')}}" id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Img</label>
                            <input type="file" name="img_product" value="{{old('img_product')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Từ Khóa Sản Phẩm </label>
                            <input type="text" name="product_keywords" value="{{old('product_keywords')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> code </label>
                            <input type="text" name="code" value="{{old('code')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Tóm Tắt </label>
                            <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Giá </label>
                            <input type="number" name="price" value="{{old('price')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Chi tiết </label>
                            <textarea name="detail" id="noidung" value="{{old('detail')}}" class="form-control"></textarea>
                        </div>


                        <div class="form-group">
                            <label> Danh Mục </label><br />
                            <select name="category_product_id" class="form-control">

                                @foreach ($category_product as $key => $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                @endforeach
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


@endsection
