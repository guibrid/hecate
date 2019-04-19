        <!-- top navigation -->
        <div class="top_nav">
                <div class="nav_menu">
                  <nav>
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
      
                    <ul class="nav navbar-nav navbar-right">
                      <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('bower_components/gentelella/production/images/img.jpg') }}" alt="">John Doe
                          <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <li><a> Profile</a></li>
                          <li><a>Help</a></li>
                          <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fa fa-sign-out pull-right"></i> Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                          </li>
                        </ul>
                      </li>
      
                      <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge bg-green">3</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                          <li>
                            <a>
                              <span>
                                <span>Order notification</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Your order #T657Y has been updated
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span>
                                <span>Order notification</span>
                                <span class="time">20 mins ago</span>
                              </span>
                              <span class="message">
                                Documents available for your order #T657Y
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span>
                                <span>Shipment notification</span>
                                <span class="time">2 days ago</span>
                              </span>
                              <span class="message">
                                Shipment registered for your order #T657Y
                              </span>
                            </a>
                          </li>
                          <li>
                            <div class="text-center">
                              <a>
                                <strong>See All Notifications</strong>
                                <i class="fa fa-angle-right"></i>
                              </a>
                            </div>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!-- /top navigation -->