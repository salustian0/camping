  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{site_url('assets/adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{TITLE}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{site_url('assets/adminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$user.name}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          {{if $menu && count($menu)}}

          {{foreach item=v from=$menu}}
            <li class="nav-item">
              <a href="{{site_url($v.route)}}" class="nav-link" id="{{$v.controller}}">
                <i class="nav-icon fas {{$v.icon}}"></i>
                <p>
                  {{$v.title}}
                </p>
                {{if $v.childs && count($v.childs)}}
                <i class="fas fa-angle-left right"></i>
                {{/if}}
              </a>
              {{if $v.childs && count($v.childs)}}
                <ul class="nav nav-treeview">

                {{foreach from=$v.childs item=$c}}
                    <li class="nav-item" id="item-{$c.id}">
                        <a href="{{site_url($c.route)}}" class="nav-link" id="{{$c.controller}}">
                          <i class="fas {{$c.icon}} nav-icon"></i>
                          <p>{{$c.title}}</p>
                        </a>
                    </li>
                {{/foreach}}
                </ul>

              {{/if}}
            </li>
            {{/foreach}}
        
          {{/if}}
          <li class="nav-item">
          <a href="{{site_url('logout')}}" class="nav-link"> 
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sair
            </p>
          </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
