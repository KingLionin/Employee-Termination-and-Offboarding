<!-- Header -->
<header class="header" id="header">

    <!--- Side-Navigation Toggle button --->
    <div class="header_toggle">
        <i class='bi bi-list nav-icon' id="header-toggle" active></i>
    </div><!--- Closing of header_toggle --->

    <div class="dropdown">
        <div class="header_image_container">
            <button type="button" class="profile-image-dropdown"data-bs-toggle="dropdown" aria-expanded="false">
                <img src="#" alt="Profile Image" />
            </button>
            <ul class="dropdown-menu mt-2">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person-vcard-fill"></i>Profile</a></li>
                <li><a class="dropdown-item" href="{{ url('Mainpage/signout') }}"><i class="bi bi-box-arrow-left"></i>Sign-out</a></li>
            </ul>
        </div><!--- Closing of header_img --->
    </div>

</header>