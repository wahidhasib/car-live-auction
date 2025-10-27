<header class="main-header navbar">
    <div class="col-search">

    </div>
    <div class="col-nav">
        <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i
                class="material-icons md-apps"></i></button>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
            </li>
            <li class="nav-item">
                <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
            </li>
            <li class="dropdown nav-item">
                <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount"
                    aria-expanded="false"> <img class="img-xs rounded-circle"
                        src="{{ asset('backend/imgs/people/avatar-2.png') }}" alt="User" /></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                    <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit
                        Profile</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account
                        Settings</a>
                    <a class="dropdown-item" href="#"><i
                            class="material-icons md-account_balance_wallet"></i>Wallet</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                    <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help
                        center</a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger" href="#"><i
                                class="material-icons md-exit_to_app"></i>Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</header>
