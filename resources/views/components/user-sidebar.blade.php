<nav id="sidebar">
     <div class="sidebar-header">
        <h3><img src="{{ asset('assets/images/logo.png') }}"  class="img-fluid"/><span class="text-white text-[24px]">CopySnoop</span></h3>
    </div>
    <ul class="list-unstyled components" style="position: relative;">
        <div class="sidebar-header">
            <!-- <h3><img src="img/logo.png" class="img-fluid"/></h3> -->
            <h3 class="img-fluid text-white">Logo</h3>
        </div>
        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none btn-toggle">
            <i class="fas fa-chevron-left"></i>
        </button>
        <li class="mt-5">
            <a href="" class="dashboard"><img src="{{ asset('user/assets/images/Pic.svg') }}" alt="">
                <div class="admin-avatar">
                    <span class="a-admin">{{ Auth::user()->name }}</span>
                    <span class="admin-name"> {{ Auth::user()->wallet_amount }}</span>
                </div>
            </a>

        </li>


        <li class="dropdown">
        </li>
        <li class="dropdown active">
            <h6 class="main-text">MAIN</h6>
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" id="toggleLink">
                <img src="{{ asset('user/assets/images/01.svg') }}" alt="">
                <span>Project Center
                    <i class="fa-solid fa-chevron-right" id="chevronIcon"></i>
                </span>
            </a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
            </ul>
        </li>



        <li class="">
            <a href="#">
                <img src="{{ asset('user/assets/images/02.svg') }}" class="img-3" alt="">
            </a>
        </li>




        <li  class="{{ request()->is('active/packages') ? 'active' : '' }}">
            <a href="{{ route('user.active_packages') }}" class="{{ request()->is('active/packages') ? 'p-3' : '' }}">
                <img src="{{ asset('user/assets/images/Union.svg') }}" class="img-2"  alt="">
                <span class="subscription-margin">Subscription</span>
            </a>
        </li>
        



        <li class="">
            <a href="#">
                <img src="{{ asset('user/assets/images/04.svg') }}" class="img-3" alt="">
            </a>
        </li>


        <li>
            <div class="a-need-help">
                <h6 class="need-header">Need help</h6>
                <p class="need-para">We're here for you. Contact support anytime.</p>
                <button class="btn btn-style">Support</button>
            </div>
        </li>


        <li class="">
            <a href="#">
                <img src="./images/Plus.svg" class="plus-icon-mbl" alt="">
            </a>
        </li>


</nav>