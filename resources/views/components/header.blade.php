<!-- ======= Header ======= -->
@php
    $tanggal = getIndonesianMonth(date('n')) . ' ' . date('d Y');
@endphp



<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">

            <img src="img/logo.png" alt="" class="d-none d-md-block ">
            <img src="img/logoo.png" alt="" class="d-md-none " style="width: 50px; height: 50px;">
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-flex  pe-3 mt-2">
                <h6 class=" d-none d-md-block  align-items-center hovermerah fw-bold" onclick='copyToClipboard(this)'
                    id="tanggal" value="{{ $tanggal }}">
                    {{ $tanggal }} </h6>
                <h6 class="mx-2 fw d-none d-md-block ">I</h6>
                <h6 id="clock" class="fw-bold d-none d-md-block "> {{ date('H:i') }}</h6>


                <div id="status"
                    style="width: 15px; height: 15px; border-radius: 50%; background-color: green; margin-top: 1px; margin-left: 5px;">
                </div>

            </li>



            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/img/monyet.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->username }}</span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->username }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                    </li>
                    {{-- <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
--}}
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<script src="js/jam.js"></script>
