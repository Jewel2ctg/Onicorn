<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('products.index')}}">
            <i class="fa fa-dashboard"></i> <span>Products</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('category.index')}}">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('brands.index')}}">
            <i class="fa fa-dashboard"></i> <span>Brands</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('tags.index')}}">
            <i class="fa fa-dashboard"></i> <span>Tags</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('types.index')}}">
            <i class="fa fa-dashboard"></i> <span>Types</span>
          </a>
          </li>
          
          <li class="">
          <a href="{{route('attributes.index')}}">
            <i class="fa fa-dashboard"></i> <span>Atributes</span>
          </a>
          </li>
        <li class="">
          <a href="{{route('category.index')}}">
            <i class="fa fa-dashboard"></i> <span>Orders</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('countries.index')}}">
            <i class="fa fa-dashboard"></i> <span>Country</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('divisions.index')}}">
            <i class="fa fa-dashboard"></i> <span>Division</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('districts.index')}}">
            <i class="fa fa-dashboard"></i> <span>Districts</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('category.index')}}">
            <i class="fa fa-dashboard"></i> <span>Slider</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('category.index')}}">
            <i class="fa fa-dashboard"></i> <span>Users</span>
          </a>
          </li>
          <li class="">
          <a href="{{route('coupons.index')}}">
            <i class="fa fa-dashboard"></i> <span>Coupons</span>
          </a>
          </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>