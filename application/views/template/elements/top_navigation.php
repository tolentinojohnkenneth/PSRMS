<!--Header-->
<header id="topnav" class="navbar navbar-default navbar-fixed-top navbar-black" role="banner">

    <div class="logo-area">
                <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg">
                    <a href="dashboard" data-placement="right" title="Toggle Sidebar">
                        <span class="icon-bg">
                            <i class="ti ti-home"></i>
                        </span>
                    </a>
                </span>
        <a class="navbar-brand" href="#"></a>
    </div><!-- logo-area -->

    <ul class="nav navbar-nav toolbar pull-right">
        <li class="dropdown toolbar-icon-bg">
            <a href="#" class="dropdown-toggle username" data-toggle="dropdown">
                <img class="img-circle" style="border: 1px solid white;" src="<?php echo $this->session->user_photo; ?>" alt="" />
            </a>
            <ul class="dropdown-menu userinfo arrow">
                <li><a href="#"><i class="ti ti-user"></i><span>Profile</span></a></li>
                <li><a href="login/transaction/logout"><i class="ti ti-shift-right"></i><span>Sign Out</span></a></li>
            </ul>
        </li>

    </ul>

</header><!--Header-->


