<aside class="block xl:block sm:hidden sidebar-wrapper w-[300px] fixed top-0  h-full z-30"
  style="background:linear-gradient(#2F438D, #596DB7, #2F438D);">
  <div class="sidebar-header relative  w-full h-[108px] flex items-center pl-[40px] z-30">
    <a href="{{ route('admin.dashboard') }}">
      <img src="{{ asset('assets/images/logo.png') }}" style="width: 120px; " class="block dark:hidden" alt="logo" />
      <img src="{{ asset('assets/images/logo.png') }}" style="width: 120px; " class="hidden dark:block " alt="logo" />
    </a>
    <button type="button" class="drawer-btn absolute right-0 top-auto rounded-lg" title="Ctrl+b">
      <span>
        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 10C0 4.47715 4.47715 0 10 0H16V40H10C4.47715 40 0 35.5228 0 30V10Z" fill="#2F438D" />
          <path d="M10 15L6 20.0049L10 25.0098" stroke="#ffffff" stroke-width="3.2" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </span>
    </button>
  </div>
  <div
    class="sidebar-body pl-[48px] pt-[14px] w-full relative z-30 h-screen overflow-style-none overflow-y-scroll pb-[200px]">
    <div class="nav-wrapper pr-[50px] mb-[36px]">
      <div class="item-wrapper mb-5">
        
        <ul class="mt-2.5">
          <li class="item py-[11px] text-bgray-900 dark:text-white my-3">
            <a href="javascript:void(0);">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    @if(Auth::user()->profile_photo_path)
                    <img src="{{ asset('/'.Auth::user()->profile_photo_path) }}"  class="rounded-full w-12 h-12 " alt="">
                    @else
                    <img src="{{ asset('assets/images/user-1.png') }}"  class="rounded-full w-12 h-12 " alt="">
                    @endif
                  </span>
                  <span class="item-text text-md font-medium text-white" style="text-transform:capitalize;">{{ Auth::user()->utype }}</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li>
                <a href="{{ route('profile.show') }}"
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">
                  Profile Setting</a>
              </li>
            
              <li>
                <form method="POST" action="{{ route('logout') }}" x-data>
                  @csrf
                <a href="{{ route('logout') }}" @click.prevent="$root.submit();"
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Signout</a>
                  </form>
              </li>
            </ul>
          </li>
          <li class="item py-[11px] text-white {{ request()->is('admin/dashboard') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="{{ route('admin.dashboard') }}"  >
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/dashboard.png') }}" class="width:24px;" alt="">

                  </span>
                  <span class="item-text text-md font-medium text-white">Dashboard</span>
                </div>
               
              </div>
            </a>
            
          </li>
          <li class="item py-[11px] text-bgray-900 dark:text-white {{ request()->is('admin/category*') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="javascript:void();">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/menu.png') }}" alt="">
                  </span>
                  <span class="item-text text-md font-medium text-white">Categories</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li class="{{ request()->is('admin/category/all') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.categories') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Categories</a>
              </li>
              <li  class="{{ request()->is('admin/category/create') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.create_category') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Create Category</a>
              </li>
              
            </ul>
          </li>
          <li class="item py-[11px] text-bgray-900 dark:text-white {{ request()->is('admin/ai*') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="javascript:void();">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/setting.png') }}" alt="">
                  </span>
                  <span class="item-text text-md font-medium text-white">AI Setting</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li class="{{ request()->is('admin/ai/setting') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.ai_settings') }}"  
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">AI API Settings</a>
              </li>
              <li  class="{{ request()->is('admin/create/setting') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.create_ai_setting') }}"  
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Create AI Setting</a>
              </li>
              
            </ul>
          </li>
          <li class="item py-[11px] text-white {{ request()->is('admin/prompt*') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="javascript:void();">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/ai.png') }}" alt="">
                  </span>
                  <span class="item-text text-md font-medium text-white">AI Prompt</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li class="{{ request()->is('admin/ai/assistants') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.ai_assistant') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">AI
                  Asistant Prompts</a>
              </li>
              <li  class="{{ request()->is('admin/ai/creaet/assistant') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.create_ai') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Creaet AI Prompt</a>
              </li>
              
            </ul>
          </li>
         
          <li class="item py-[11px] text-bgray-900 dark:text-white {{ request()->is('admin/chaining*') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="javascript:void();">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/chaining.png') }}" alt="">
                  </span>
                  <span class="item-text text-md font-medium text-white">AI Chaining</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li class="{{ request()->is('admin/chaining/new/ai-chats') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.create_chain') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Create
                  New Chain</a>
              </li>
              <li class="{{ request()->is('admin/chaining/available') ? 'active text-white' : '' }}">
                <a href="{{ route('admin.chains') }}" 
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Available Chains</a>
              </li>
            </ul>
          </li>
          <li class="item py-[11px] text-bgray-900 dark:text-white {{ request()->is('admin/packages*') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="javascript:void();">
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/subscription.png') }}" alt="">
                  </span>
                  <span class="item-text text-md font-medium text-white">Packages</span>
                </div>
                <span>
                  <i class="fa-solid fa-circle-chevron-right text-white"></i>
                </span>
              </div>
            </a>
            <ul class="sub-menu mt-[22px] ml-2.5 pl-5 border-l border-success-100">
              <li class="{{ request()->is('admin/packages/all') ? 'text-gray-950' : '' }}">
                <a href="{{ route('admin.packages') }}"
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">All Packages</a>
              </li>
              <li class="{{ request()->is('admin/packages/create') ? 'text-gray-950' : '' }}">
                <a href="{{ route('admin.create_package') }}"
                  class="text-md font-medium text-gray-100  transition-all py-1.5 inline-block hover:text-bgray-800">Create Package</a>
              </li>
            </ul>
          </li>
          <li class="item py-[11px] text-white {{ request()->is('admin/web/settings') ? 'bg-[#554f80] rounded-lg py-2 px-4' : '' }}">
            <a href="{{ route('admin.settings') }}"  >
              <div class="flex items-center justify-between">
                <div class="flex space-x-2.5 items-center">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/settings.png') }}" alt="">

                  </span>
                  <span class="item-text text-md font-medium text-white">System Settings</span>
                </div>
               
              </div>
            </a>
            
          </li>
        </ul>
      </div>
   
     
    </div>
    
 
  </div>
</aside>
<x-mobile-aside />