<!--- Side-navigation --->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">

        <!--- For the side-navigation links --->
        <div class="side-nav">
            <a href="#" class="nav_logo">
                <img src="{{ asset('assets/images/WIF.ico') }}" class="nav_icon" style="width:28px; height:28px" />
                <span class="nav_logo-name">WHR</span>
            </a>

            <!--- For the dashboard link --->
            <div class="nav_list side_nav-list nav-dashboard">
                <a href="{{ url('Mainpage/dashboard') }}" class="nav_link">
                    <i class='bi bi-grid-1x2-fill nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
            </div><!--- Closing of nav_list side_nav-list nav-dashboard --->

            <!--- For the Users link --->
            <div class="nav_list side_nav-list nav-users">
                <a href="{{ url('Mainpage/messages')}}" class="nav_link">
                    <i class='bi bi-envelope-fill nav_icon'></i>
                    <span class="nav_name">Messages</span>
                </a>
            </div><!--- Closing of nav_list side_nav-list nav-users --->

            <!--- For the Offboard Page --->
            <div class="nav_list side_nav-list nav-offboarding">
                <a href="{{ url('Mainpage/offboarding')}}" class="nav_link">
                    <i class='bi bi-person-fill-dash nav_icon'></i>
                    <span class="nav_name">Offboarding</span>
                </a>
            </div><!--- Closing of nav_list side_nav-list nav-offboard  --->

            
            <!--- For the Offboard Page --->
            <div class="nav_list side_nav-list nav-offboarding">
                <a href="{{ url('Mainpage/termination')}}" class="nav_link">
                    <i class='bi bi-person-fill-x nav_icon'></i>
                    <span class="nav_name">Termination</span>
                </a>
            </div><!--- Closing of nav_list side_nav-list nav-offboard  --->
        </div><!--- Closing of side-nav --->
    </nav>
</div><!--- Closing of l-navbar --->