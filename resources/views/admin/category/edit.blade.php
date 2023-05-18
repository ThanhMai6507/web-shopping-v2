@extends("layouts.admin.adminlayout")
@section('content')

    <div class="row">

        <div class="col-12">

            <!-- General -->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Category</h4>
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
                    <form method="post" action="{{ route('category.update', [$editcategory->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label> Name category </label>
                            <input type="text" name="category_name" value="{{ $editcategory->category_name }}"
                                   onkeyup="ChangeToSlug()" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Slug </label>
                            <input type="text" name="slug_category" value="{{ $editcategory->slug_category }}"
                                   id="convert_slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Status </label><br/>
                            <select name="trangthai" class="form-control">
                                <option {{ $editcategory->Trang_Thai == 0 ?  'selected': '' }}  value="0"> Public</option>
                                <option {{ $editcategory->Trang_Thai == 1 ?  'selected': '' }} value="1"> Private</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
