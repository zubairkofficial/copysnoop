<header class="md:hidden block mobile-wrapper w-full fixed z-20">
    <div class="w-full h-[80px] bg-white dark:bg-darkblack-600 flex justify-between items-center">
      <div class="w-full h-full flex items-center space-x-5">
        <button type="button" class="drawer-btn transform rotate-180">
          <span>
            <svg width="16" height="40" viewBox="0 0 16 40" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 10C0 4.47715 4.47715 0 10 0H16V40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#2F438D" />
              <path d="M10 15L6 20.0049L10 25.0098" stroke="#A0AEC0" stroke-width="3.2" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </span>
        </button>
        <div>
          <a href="/">
            <img src="{{ asset('assets/images/logo.png') }}" style="height:55px;" class="block dark:hidden" alt="logo" />
            <img src="{{ asset('assets/images/logo.png') }}" style="height:55px;" class="hidden dark:block " alt="logo" />
          </a>
        </div>
      </div>
      <div class="mr-2">
        <div onclick="profileAction()" class="flex lg:space-x-3 space-x-0 cursor-pointer">
          <div class="w-[52px] h-[52px] rounded-xl border border-bgray-300 overflow-hidden">
            <img class="object-cover" src="{{ asset('/'.Auth::user()->profile_photo_path) }}" alt="avater" />
          </div>
          <div class="2xl:block hidden">
            <div class="flex space-x-2.5 items-center">
              <h3 class="text-base text-gray-200 font-bold leading-[28px]">
                {{ Auth::user()->name }}
              </h3>
              <span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7 10L12 14L17 10" stroke="#28303F" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                </svg>
              </span>
            </div>
            <p class="text-sm font-medium leading-[20px] text-bgray-600 uppercase">
              {{ Auth::user()->utype }}
            </p>
          </div>
        </div>
  
        <div class="profile-wrapper">
          <div onclick="profileAction()" class="profile-outside w-full h-full fixed -left-[43px] top-0 hidden">
            
          </div>
          <div
            
            class="profile-box w-[300px] overflow-hidden bg-gradient-to-r from-blue-400 to-blue-600 absolute right-0 top-[81px] rounded-lg hidden">
            <div class="w-full px-3 py-2 relative">
              <div>
                <ul>
                  <li class="w-full">
                    <a href="{{ route('profile.show') }}">
                      <div
                        class="flex space-x-[18px] items-center p-[14px] hover:bg-bgray-100 hover:bg-[#554f80] rounded-lg text-gray-100 hover:text-gray-200">
                        <div class="w-[20px]">
                          <span>
                            <i class="fa-light fa-address-card text-gray-100 hover:text-white text[32px]"></i>
                          </span>
                        </div>
                        <div class="flex-1">
                          <span class="text-sm font-semibold">My Profile</span>
                        </div>
                      </div>
                    </a>
                  </li>
  
                  <li class="w-full">
                    <form method="POST" action="{{ route('logout') }}" x-data>
                      @csrf
                      <a href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <div class="flex space-x-[18px] items-center p-[14px]  hover:bg-[#554f80] rounded-lg text-gray-100 hover:text-gray-200">
                          <div class="w-[20px]">
                            <span>
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                  d="M15 10L13.7071 11.2929C13.3166 11.6834 13.3166 12.3166 13.7071 12.7071L15 14M14 12L22 12M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                  stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" />
                              </svg>
                            </span>
                          </div>
                          <div class="flex-1">
                            <span class="text-sm font-semibold">Log Out</span>
                          </div>
                        </div>
                      </a>
                    </form>
                  </li>
                </ul>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>