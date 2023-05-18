<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="{{ url('/admin/home') }}"><i></i> <span>Dashboard</span></a>
                </li>
                <li class="menu-title">
                    <span>Pages</span>
                </li>

                <li class="submenu">
                    <a href="#"> <span> Category  </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('category.create') }}">Add Category</a></li>
                        <li><a href="{{ route('category.index') }}"> List Category </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"> <span> Product </span> <span class="ti-angle-down"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('product.create') }}"> Add Product </a></li>
                        <li><a href="{{ route('product.index') }}"> List Product </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
