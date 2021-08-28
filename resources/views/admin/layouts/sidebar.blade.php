<ul class="nav">
          <li class="nav-item {{ request()->is('admin/home') ? 'active' : '' }}  ">
            <a class="nav-link" href="{{route('admin.home')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {{ request()->is('admin/product') ? 'active' : '' }}">
            <a class="nav-link" href="{{route('product.index')}}">
              <i class="material-icons">person</i>
              <p>Products</p>
            </a>
          </li>
         
        </ul>