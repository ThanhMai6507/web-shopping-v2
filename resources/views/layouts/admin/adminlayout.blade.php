<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title> Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}  ">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}  ">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('css/feathericon.min.css') }}  ">

    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}  ">

    <!-- Main CSS -->
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}  ">

    <link rel="stylesheet" href="{{ asset('icon/themify-icons/themify-icons.css') }}  ">


</head>

<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">
        <div class="header-left">
        </div>
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="ti-align-justify "></i>
        </a>
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Search here">
                <button class="btn" type="submit"><i class="ti-search"></i></button>
            </form>
        </div>

        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>

    </div>
    @include('layouts.admin.sidebar')
    <div class="page-wrapper">
        @yield('content')
    </div>
    <!-- /Page Wrapper -->
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
<script src="{{ asset('js/jquery-3.2.1.min.js') }} "></script>

<!-- Bootstrap Core JS -->
<script src=" {{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Slimscroll JS -->
<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }} "></script>

<script src="{{ asset('plugins/raphael/raphael.min.js') }} "></script>
<script src=" {{ asset('plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('js/chart.morris.js') }} "></script>

<!-- Custom JS -->
<script src="{{ asset('js/script.js') }} "></script>

<script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('noidung');
</script>

<script type="text/javascript">
    function ChangeToSlug() {
        var slug;
        slug = document.getElementById("slug").value;
        slug = slug.toLowerCase();
        slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        slug = slug.replace(/đ/gi, 'd');
        slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        slug = slug.replace(/ /gi, "-");
        slug = slug.replace(/\-\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-\-/gi, '-');
        slug = slug.replace(/\-\-\-/gi, '-');
        slug = slug.replace(/\-\-/gi, '-');
        slug = '@' + slug + '@';
        slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        document.getElementById('convert_slug').value = slug;
    }
</script>
</body>
</html>
