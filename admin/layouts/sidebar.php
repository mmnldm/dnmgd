    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <?php


        $uri = $_SERVER['REQUEST_URI'];
        $uriAr = explode("/", $uri);
        $page = end($uriAr);

        ?>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item ">
              <a href="./index.php" class="nav-link <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link ">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Settings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="update_password.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Password</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./update_admin_details.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Update Admin Details</p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item ">
              <a href="./customers.php" class="nav-link <?php echo ($page == 'customers.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Customers
                </p>
              </a>
            </li>
            <li class="nav-item ">
              <a href="./customer_orders.php" class="nav-link <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-building "></i>
                <p>
                  Orders
                </p>
              </a>
            </li>

            <li class="nav-item has-treeview menu-open">
              <a href="#" class="nav-link <?php echo ($page == 'categories.php') || ($page == '' || $page == 'products.php') ? 'active' : ''; ?>">
                <i class="fas fa-th nav-icon"></i>
                <p>
                  Catalogue
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">


                <li class="nav-item">
                  <a href="./categories.php" class="nav-link" <?php echo ($page == 'categories.php') ? 'active' : ''; ?>>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Categories</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="./products.php" class="nav-link" <?php echo ($page == 'products.php') ? 'active' : ''; ?>>
                    <i class="far fa-circle nav-icon"></i>
                    <p>Products</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          </li>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
