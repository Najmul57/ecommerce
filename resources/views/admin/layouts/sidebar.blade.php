 <aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
         <!-- Sidebar user panel -->
         <div class="user-panel">
             <div class="pull-left image">
                 <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
             </div>
             <div class="pull-left info">
                 <p>{{ ucfirst(auth()->user()->name) }}</p>
                 <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
             </div>
         </div>
         <!-- search form -->
         <form action="#" method="get" class="sidebar-form">
             <div class="input-group">
                 <input type="text" name="q" class="form-control" placeholder="Search...">
                 <span class="input-group-btn">
                     <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                             class="fa fa-search"></i></button>
                 </span>
             </div>
         </form>
         <!-- /.search form -->
         <!-- sidebar menu: : style can be found in sidebar.less -->
         <ul class="sidebar-menu">
             <li class="active treeview">
                 <a href="#">
                     <i class="fa fa-dashboard"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
                 </a>
                 <ul class="treeview-menu">
                     <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i> Category
                             List</a>
                     </li>
                 </ul>
             </li>

             <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
         </ul>
     </section>
     <!-- /.sidebar -->
 </aside>
