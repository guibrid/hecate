          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">   
                  <h3>&nbsp;</h3>
                  <ul class="nav side-menu">
                    <li><a><i class="fa fa-clone"></i> Orders <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('admin/orders') }}">View all</a></li>
                        <li><a href="{{ url('admin/orders/create') }}">Create new order</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-ship"></i> Shipments <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('admin/shipments') }}">View all</a></li>
                        <li><a href="{{ url('admin/shipments/create') }}">Create new shipment</a></li>
                      </ul>
                    </li>
                    <li><a><i class="fa fa-user"></i> Customers <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('admin/customers') }}">View all</a></li>
                        <li><a href="{{ url('admin/customers/create') }}">Create new customer</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
    
              </div>
              <!-- /sidebar menu -->