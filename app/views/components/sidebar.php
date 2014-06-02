                <li><a href="<?php echo url('dashboard'); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
				<li><a href="<?php echo url('vendor/overview'); ?>"><i class="fa fa-th"></i> <span>Vendors</span> </a>
                <li><a href="javascript:;"><i class="fa fa-th"></i> <span>Products</span> </a>
                    <ul class="acc-menu">
                        <li><a href="<?php echo url('product/overview'); ?>"><span>Overview</span></a>
                        <li><a href="<?php echo url('product/import'); ?>"><span>Import</span></a>
                        <li><a href="<?php echo url('product/add'); ?>"><span>Add New</span></a>
                    </ul>
                </li>
                <li><a href="<?php echo url('categories'); ?>"><i class="fa fa-th"></i> <span>Categories</span> </a></li>
				<li><a href="<?php echo url('orders'); ?>"><i class="fa fa-th"></i> <span>Orders</span> </a></li>
                <li><a href="javascript:;"><i class="fa fa-cogs"></i> <span>Settings</span> <span class="badge badge-info">12</span></a>
                    <ul class="acc-menu">
                        <li><a href="<?php echo url('settings/currency'); ?>">Currency</a></li>
                    </ul>
                </li>
                <li class="divider"></li>
                <li><a href="javascript:;"><i class="fa fa-briefcase"></i> <span>Extras</span> <span class="badge badge-danger">1</span></a>
                    <ul class="acc-menu">
                        <li><a href="extras-search.htm">Search Page</a></li>
                        <li><a href="extras-404.htm">404 Page</a></li>
                        <li><a href="extras-500.htm">500 Page</a></li>
                        <li><a href="extras-login.htm">Login 1</a></li>
                        <li><a href="extras-login2.htm">Login 2</a></li>
                        <li><a href="extras-blank.htm">Blank Page</a></li>
                    </ul>
                </li>
                <li><a href="javascript:;"><i class="fa fa-sitemap"></i> <span>Unlimited Level Menu</span></a>
                    <ul class="acc-menu">
                        <li><a href="javascript:;">Menu Item 1</a></li>
                        <li><a href="javascript:;">Menu Item 2</a>
                            <ul class="acc-menu">
                                <li><a href="javascript:;">Menu Item 2.1</a></li>
                                <li><a href="javascript:;">Menu Item 2.2</a>
                                    <ul class="acc-menu">
                                        <li><a href="javascript:;">Menu Item 2.2.1</a></li>
                                        <li><a href="javascript:;">Menu Item 2.2.2</a>
                                            <ul class="acc-menu">
                                                <li><a href="javascript:;">And deeper yet!</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>