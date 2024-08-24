<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{route('admin.home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{route('admin.home.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house-user"></i></div>
                    Home
                </a>
                <a class="nav-link" href="{{route('admin.portofolio')}}">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-id-card"></i></div>
                    Portofolio
                </a>
                <a class="nav-link" href="{{route('admin.about.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                    About
                </a>
                <a class="nav-link" href="{{route('admin.contact.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-info"></i></div>
                    Contact
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
