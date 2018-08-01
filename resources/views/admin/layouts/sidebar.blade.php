<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('public/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Michaël Opdebeeck</p>
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
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Blog</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('blogpost.index' )}}"><i class="fa fa-circle-o"></i>Blogposts</a></li>
                    <li class="active"><a href="{{ route('categorie.index' )}}"><i class="fa fa-circle-o"></i>Categorieën</a></li>
                    <li class="active"><a href="{{ route('tag.index' )}}"><i class="fa fa-circle-o"></i>Tags</a></li>
                    <li class="active"><a href="{{ route('admin.index' )}}"><i class="fa fa-circle-o"></i>Users</a></li>
                    <li class="active"><a href="{{ route('role.index' )}}"><i class="fa fa-circle-o"></i>Rechten</a></li>
                    <li class="active"><a href="{{ route('permission.index' )}}"><i class="fa fa-circle-o"></i>Toestemmingen</a></li>
                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>