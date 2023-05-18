@extends("layouts.admin.adminlayout")
@section('content')
    <div class="row">
        <div class="col-12">
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
                            <label> Name product </label>
                            <input type="text" name="name_product" value="{{old('name_product')}}"
                                   onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Slug </label>
                            <input type="text" name="slug_product" value="{{old('slug_product')}}" id="convert_slug"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Img</label>
                            <input type="file" name="img_product" value="{{old('img_product')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Product Keywords </label>
                            <input type="text" name="product_keywords" value="{{old('product_keywords')}}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Summary </label>
                            <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label> Price </label>
                            <input type="number" name="price" value="{{old('price')}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Detail </label>
                            <textarea name="detail" id="noidung" value="{{old('detail')}}"
                                      class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label> Category </label><br/>
                            <select name="category_product_id" class="form-control">
                                @foreach ($category_product as $key => $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Status </label><br/>
                            <select name="trangthai" class="form-control">
                                <option value="0"> Public</option>
                                <option value="1"> Private</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary"> Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
