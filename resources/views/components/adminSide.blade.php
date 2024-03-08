<div class="flex top-0  h-full z-30">
    <div class="icons-position  m-0 pl-0">
        <div class="navigation">
            <span class="logo">LOGO</span>
            <a href="#" class="admin-a">
                <div style="width: 90%; margin: 0 auto ;">
                    <div class="admin-avatar">
                        <span class="icon">
                            <img src="{{ asset('assets/images/Pic.svg') }}" alt="">
                            <h5 class="tittle-bottom" style="color: #fff;">{{ Auth::user()->name }}</h5>
                        </span>
                        <div>
                            <span class="title" style="color: #FFFFFF52;text-transform:capitalize;">{{ Auth::user()->utype }}</span>
                            <h5 class="title" style="color: #fff;">{{ Auth::user()->name }}</h5>
                           
                        </div>
                    </div>
            </a>
            <div class="main-start mb-5">
                <span style="color: #FFFFFF52;">MAIN</span>
            </div>
            <div class="mt-[20px]">
                <ul>
                    <li class="nav-link {{ request()->is('admin/dashboard') ? 'bg-[#5e66ac] font-bold rounded-lg py-1.5' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" >
                            <div class="ul-link-styles">
                                <div class="icon">
                                    <i class="fa-sharp fa-regular fa-gauge text-white text-[22px]"></i>
                                </div>
                                <div>
                                    <h5>Dashboard</h5>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li class="nav-link">
                        <a href="#" id="projectCenterLink">
                            <div class="ul-link-style">
                                <div class="icon">
                                    <img class="img-app" src="{{ asset('assets/images/01.svg') }}" alt="">
                                </div>
                                <div
                                    style="display: flex; justify-content: center; align-items: center; text-align: center; gap:15px;">
                                    <h5>Ai Assistant Chat</h5>
                                    <span style="font-size: 11px; margin-right: 12px;"><i
                                            class="fa-solid fa-chevron-right" id="chevronIcon"></i></span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="sub-menu">
                    <ul class="submenu">
                        <li><a href="{{ route('admin.create_ai') }}">Create AI</a></li>
                        <li><a href="{{ route('admin.ai_assistant') }}">AI Chat Assistants</a></li>
                    </ul>
                </div>
            </div>


            <div class="mbl-icon-toggle">
                {{-- <div class="paper-icon-mbl">
                    <div>
                        <img src="{{ asset('assets/images/01.svg') }}" alt="">
                    </div>
                </div> --}}
                <div>
                    <ul>
                        <li class="nav-link">
                            <a href="#" id="projectCenterLink">
                                <div class="ul-link-styles">
                                    <div class="icon">
                                        <img class="img-app" src="{{ asset('assets/images/01.svg') }}" alt="">

                                    </div>
                                    <div>
                                        <h5>Subscription</h5>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                {{-- <div class="bell-icon-mbl">
                    <div>
                        <img src="{{ asset('assets/images/01.svg') }}" alt="">
                    </div>
                </div> --}}
            </div>


            <!-- need help section  -->
            <div class="bg-need">
                <div class="need-1">
                    <p class="need-help">need help</p>
                    <p class="need-para">We're here for you. Contact support anytime.</p>
                    <button class="btn-style">Support</button>
                </div>
            </div>

            <div class="plus-icon-mbl">
                <div>
                    <img src="{{ asset('assets/images/01.svg') }}" alt="">
                </div>
            </div>



            <!-- end need -->
        </div>
    </div>
    <div class="toggle" style="color: #fff;">
        <i class="fas fa-chevron-left"></i>
    </div>
</div>