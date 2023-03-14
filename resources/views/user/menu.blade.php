<li class="menu-title text-center">
    Usuário Comum<br>
    <i class="mdi mdi-star font-20"></i>
    <i class="mdi mdi-star font-20"></i>
    <i class="mdi mdi-star font-20"></i>
</li>
<li class="menu-title">Navigation</li>
<li>
    <a href="{{ route('user.dashboard') }}">
        <i class="mdi mdi-view-dashboard-outline"></i>
        <span class="badge bg-success rounded-pill float-end">9+</span>
        <span> Dashboard </span>
    </a>
</li>

<li class="menu-title mt-2">Custom</li>

<li>
    <a href="#sidebarAuth" data-bs-toggle="collapse">
        <i class="mdi mdi-account-multiple-plus-outline"></i>
        <span> Auth Pages </span>
        <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarAuth">
        <ul class="nav-second-level">
            <li>
                <a href="auth-login.html">Log In</a>
            </li>
            <li>
                <a href="auth-register.html">Register</a>
            </li>
            <li>
                <a href="auth-recoverpw.html">Recover Password</a>
            </li>
            <li>
                <a href="auth-confirm-mail.html">Confirm Mail</a>
            </li>
            <li>
                <a href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</li>