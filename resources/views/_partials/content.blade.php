<!DOCTYPE html>
<html class="loading" lang="en" 
data-textdirection="ltr">
@include('_partials/head')

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
@include('_partials/navbar')

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="#">
                 <h2 class="brand-text">Aniwall</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x">
                </i>
            <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
            data-feather="disc" data-ticon="disc"></i></a>
        </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item {{ request()->segment(1)=='dashboard'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/dashboard"><i data-feather="home">
            </i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='categories'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/categories"><i data-feather="tag">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Categories</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='wallpaper'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/wallpaper"><i data-feather="image">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Wallpaper</span></a>
            </li>

            <li class=" nav-item {{ request()->segment(1)=='review'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/review"><i data-feather="check-square">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Review</span></a>
            </li>

            <li class=" nav-item {{ request()->segment(1)=='slide'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                 href="/slide"><i data-feather="sliders">
             </i><span class="menu-title text-truncate" data-i18n="appsetting">Slide</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='tags'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/tags"><i data-feather="hash">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Tags</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='notification'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/notification"><i data-feather="bell">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Notification</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='adsmanager'? 'active' : '' }}">
                <a class="d-flex align-items-center"
                href="/adsmanager"><i data-feather="dollar-sign">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Ads Manager</span></a>
            </li>
            <li class=" nav-item {{ request()->segment(1)=='setting'? 'active' : '' }}">
                <a class="d-flex align-items-center"
             href="/setting"><i data-feather="settings">
            </i><span class="menu-title text-truncate" data-i18n="appsetting">Setting</span></a>
            </li>

            <li class=" nav-item {{ request()->segment(1)=='appsetting'? 'active' : '' }}">
            <a class="d-flex align-items-center"
            href="/appsetting"><i data-feather="smartphone">
           </i><span class="menu-title text-truncate" data-i18n="appsetting">App Setting</span></a>
           </li>


        </ul>
    </div>
</div>

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper container-xxl p-0">
        <div class="content-body">
            @yield('content')
        </div>
    </div>
</div>


@include('_partials/modal')


<!-- END: Content-->


@include('_partials.footer')

@yield('script')
</body>
</html>