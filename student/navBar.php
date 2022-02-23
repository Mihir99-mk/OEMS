<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="../home.php" class="logo d-flex align-items-center">
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <div style="padding-right: 8px;">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 0 172 172" style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="#cccccc"></path>
                        <g id="original-icon" fill="#9b59b6">
                            <path d="M50.224,22.704c-7.5895,0 -13.76,6.1705 -13.76,13.76c0,7.5895 6.1705,13.76 13.76,13.76c7.5895,0 13.76,-6.1705 13.76,-13.76c0,-7.5895 -6.1705,-13.76 -13.76,-13.76zM97.008,22.704v5.504h-29.412c1.19325,2.50475 1.892,5.29975 1.892,8.256c0,4.09575 -1.25775,7.87975 -3.44,11.008h29.584c6.82625,0 12.384,5.55775 12.384,12.384c0,6.82625 -5.55775,12.384 -12.384,12.384h-23.392v38.528h74.304c1.5265,0 2.752,-1.2255 2.752,-2.752v-77.056c0,-1.51575 -1.2255,-2.752 -2.752,-2.752h-44.032v-5.504zM37.84,52.976c-8.342,0 -15.136,6.794 -15.136,15.136v37.152c0,3.04225 2.4725,5.504 5.504,5.504c3.0315,0 5.504,-2.46175 5.504,-5.504v-31.476c0,-0.74175 0.63425,-1.376 1.376,-1.376c0.74175,0 1.376,0.63425 1.376,1.376v68.112c0,4.3 2.31125,7.396 6.622,7.396c4.07425,0 7.138,-3.1605 7.138,-7.396v-31.992c0,-0.76325 0.61275,-1.376 1.376,-1.376c0.76325,0 1.376,0.61275 1.376,1.376v32.766c0.01075,0.0215 0.07525,-0.0215 0.086,0c0.37625,3.8055 3.2465,6.622 7.052,6.622c4.3,0 6.622,-3.096 6.622,-7.396v-75.164h28.896c3.8055,0 6.88,-3.0745 6.88,-6.88c0,-3.8055 -3.0745,-6.88 -6.88,-6.88h-35.69l-9.718,19.264l-9.546,-19.264zM92.88,116.272l-12.384,24.768h5.504l12.384,-24.768zM101.136,116.272l12.384,24.768h5.504l-12.384,-24.768z"></path>
                        </g>
                        <path d="" fill="none"></path>
                        <path d="" fill="none"></path>
                        <path d="M86,172c-47.49649,0 -86,-38.50351 -86,-86v0c0,-47.49649 38.50351,-86 86,-86v0c47.49649,0 86,38.50351 86,86v0c0,47.49649 -38.50351,86 -86,86z" fill="none"></path>
                        <path d="M86,168.56c-45.59663,0 -82.56,-36.96337 -82.56,-82.56v0c0,-45.59663 36.96337,-82.56 82.56,-82.56v0c45.59663,0 82.56,36.96337 82.56,82.56v0c0,45.59663 -36.96337,82.56 -82.56,82.56z" fill="none"></path>
                    </g>
                </svg>
            </div>
            <span class="d-none d-lg-block"> OEMS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div> -->
    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->





            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="users-profile.php">
                    <img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/50/000000/external-user-interface-kiranshastry-solid-kiranshastry-1.png" alt="Profile" class="rounded-circle"/>
                    <span class="d-none d-md-block  ps-2"><?php echo $_SESSION['firstName']; ?></span>
                    <!-- <h5 class="card-title"></h5> -->
                </a><!-- End Profile Iamge Icon -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>