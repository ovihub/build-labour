<nav class="d-none d-md-block sidebar-dark">
    <div class="sidebar-sticky">
        <ul class="sidebar nav flex-column">
            <li class="nav-item">
                <a class="nav-link nav-link-custom active" href="{{ '/user/profile/?token=' . request()->input('token') }}">
                    <span class="fa fa-home"></span>
                        &nbsp;My Profile
                    <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</nav>