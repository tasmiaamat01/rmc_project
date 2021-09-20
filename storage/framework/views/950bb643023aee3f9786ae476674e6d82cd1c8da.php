<header class="main-header">
    <a href="home.php" class="logo" >
        <img class="main_logo" style="margin-top: 5px; height: 48px;"  src="<?php echo e(asset('public/frontend/img/axes_logo.svg')); ?>" />
        <img class="icon_logo" style="    margin-top: 12px;    margin-left:7px;" src="<?php echo e(asset('public/frontend/img/axes_col.png')); ?>" />
        <p class="axtitle_mobile">
            <span class="span1"><b class="cgold">RMC</b><br>A Comprehensive thought together, for better and individual growth.</span>
            <span class="span2">Today, 05 Jun 2021 || আজ শনিবার, ৫ জ্যৈষ্ঠ ১৪২৮</span>
        </p>
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" onclick="toggle_sidebar_menu_call()">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <a class="axtitle" >
           <span><b class="cgold">RMC</b><br>A Comprehensive thought together, for better and individual growth.</span>
        </a>

        <div class="navbar-custom-menu ">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="welmsg">
                    <li class="welmsg">
                        <div class="col-md-12">Night, Md.Nur-e-Alam Bhuiyan</div>
                        <div class="col-md-12" style="padding-top: 2px;">Today, 05 Jun 2021 || আজ শনিবার, ৫ জ্যৈষ্ঠ ১৪২৮</div>
                        </li>
                        <li class="dropdown notifications-menu"></li>
                        <li class="dropdown user user-menu menu-myaccount">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo e(asset('public/frontend/img/user/DV-Lo_1586579338.jpg')); ?>" class="user-image" alt="User Image">
                            <span class="hidden-xs"></span>
                        </a>
                        <li>
                            <a href="<?php echo e(route('logout')); ?>" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-sign-out" ></i> Sign Out</a>
                        </li>
                        </li>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background-image:url(public/frontend/img/user/DV-Lo_1586579338.jpg)">
                            <p><b>Md.Nur-e-Alam Bhuiyan</b><small>Admin<br></small>
                                <span style="font-size: 10px; color: #ddd;" id="profile_last_active"></span>
                            </p>
                        </li>


                        <li class="submenus">
                            <ul class="text-center">
                                <li><a href="axe_profile.php" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="axe_chpassword.php" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-refresh" ></i> Password</a></li>
                                <li>
                                    <a href="<?php echo e(route('logout')); ?>" class="btn btn-default bg-purple btn-flat btn-sm"><i class="fa fa-sign-out" ></i> Sign Out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" onclick="window.location = window.location" title="Refresh Page" >
                        <i class="fa fa-refresh"></i>
                    </a>

                </li>
            </ul>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\Construction_web\version-8\resources\views/layouts/admin/header.blade.php ENDPATH**/ ?>