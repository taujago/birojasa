      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="<?php echo site_url('user'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
            </li>
		  <li class="treeview">
              <a href="<?php echo site_url('daftar'); ?>">
                <i class="fa fa-pencil-square-o"></i> <span>Daftar BBN</span></i>
              </a>
            </li>
        <li class="treeview">
              <a href="<?php echo site_url('daftar/listdata'); ?>">
                <i class="fa fa-list"></i> <span>Lihat Data BBN</span></i>
              </a>
            </li>     

            <li class="treeview">
				<a href="#">
					<i class="fa fa-user"></i>
					<span>Users</span><i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo site_url('profil'); ?>"><i class="fa fa-circle-o"></i>Detail</a></li>
				</ul>
</li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

	<?php echo $content ?>