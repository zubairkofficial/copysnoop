<aside class="sm:block hidden relative w-[96px]  dark:bg-black"
  style="background:linear-gradient(#2F438D, #596DB7, #2F438D);">
  <div class="w-full sidebar-wrapper-collapse relative top-0 z-30 h-100">
    <div
      class="sidebar-header  dark:bg-darkblack-600 dark:border-darkblack-500 sticky top-0  w-full h-[108px] flex items-center justify-center z-20">
      <a href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('assets/images/logo-short.svg') }}" class="dark:hidden block" alt="logo" />
        <img src="{{ asset('assets/images/logo-short-white.svg') }}" class="hidden dark:block" alt="logo" />
      </a>
    </div>
    <div class="sidebar-body pt-[14px] w-full">
      <div class="flex flex-col items-center">
        <div class="nav-wrapper mb-[36px]">
          <div class="item-wrapper mb-5">
            <ul class="mt-2.5 flex justify-center items-center flex-col">
              <li
                class="item py-[11px] px-[23px] {{ request()->is('admin/dashboard') ? 'bg-[#554f80] rounded-lg ' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/dashboard.png') }}" alt="">

                  </span>
                </a>

              </li>
              <li
                class="item py-[11px] px-[23px] {{ request()->is('admin/category*') ? 'bg-[#554f80] rounded-lg' : '' }}">
                <a href="javascript:void();">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/menu.png') }}" alt="">
                  </span>
                </a>
                <ul
                  class="sub-menu border-l border-[#2f438d] bg-[#2f438d] px-3 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="{{ request()->is('admin/category/all') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.categories') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Categories</a>
                  </li>
                  <li class="{{ request()->is('admin/category/create') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.create_category') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Create Category</a>
                  </li>

                </ul>
              </li>
              <li class="item py-[11px] px-[23px] {{  request()->is('admin/ai*') ? 'bg-[#554f80] rounded-lg' : '' }}">
                <a href="javascript:void();">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/setting.png') }}" alt="">
                  </span>
                </a>
                <ul
                  class="sub-menu border-l border-[#2f438d] bg-[#2f438d] px-3 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="{{ request()->is('admin/ai/setting') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.ai_settings') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">AI API Settings</a>
                  </li>
                  <li class="{{ request()->is('admin/create/setting') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.create_ai_setting') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Create AI API
                      Setting</a>
                  </li>

                </ul>
              </li>
              <li
                class="item py-[11px] px-[23px] {{ request()->is('admin/prompt*') ? 'bg-[#554f80] rounded-lg' : '' }}">
                <a href="transaction.html">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/ai.png') }}" alt="">
                  </span>
                </a>
                <ul
                  class="sub-menu border-l border-[#2f438d] bg-[#2f438d] px-3 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="{{ request()->is('admin/ai/assistants') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.ai_assistant') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">AI Assistant
                      Prompts</a>
                  </li>
                  <li class="{{ request()->is('admin/ai/creaet/assistant') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.create_ai') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Create AI
                      Prompt</a>
                  </li>

                </ul>
              </li>
              <li
                class="item py-[11px] px-[23px] {{  request()->is('admin/chaining*') ? 'bg-[#554f80] rounded-lg' : '' }}">
                <a href="javascript:void();">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/chaining.png') }}" alt="">
                  </span>
                </a>
                <ul
                  class="sub-menu border-l border-[#2f438d] bg-[#2f438d] px-3 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="{{ request()->is('admin/chaining/new/ai-chats') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.create_chain') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Create New Chain
                    </a>
                  </li>
                  <li class="{{ request()->is('admin/chaining/available') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.chains') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Available
                      Chains</a>
                  </li>

                </ul>
              </li>
              <li
                class="item py-[11px] px-[23px] {{  request()->is('admin/packages*') ? 'bg-[#554f80] rounded-lg' : '' }}">
                <a href="javascript:void();">
                  <span class="item-ico">
                    <img src="{{ asset('assets/icons/subscription.png') }}" alt="">
                  </span>
                </a>
                <ul
                  class="sub-menu border-l border-[#2f438d] bg-[#2f438d] px-3 py-2 rounded-lg shadow-lg min-w-[200px]">
                  <li class="{{ request()->is('admin/packages/create') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.create_package') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Create Package
                    </a>
                  </li>
                  <li class="{{ request()->is('admin/packages/all') ? 'active text-white' : '' }}">
                    <a href="{{ route('admin.packages') }}"
                      class="text-md font-medium text-white py-1.5 inline-block hover:text-gray-300">Available Packages</a>
                  </li>

                </ul>
              </li>

            </ul>
          </div>
        </div>
        <div class="upgrade-wrapper">
          <div class="w-10 flex justify-center items-center h-10 rounded-full {{ request()->is('admin/web/settings') ? 'bg-[#554f80]' : 'border-[#2f438d] bg-[#2f438d]' }}">
           <a href="{{ route('admin.settings') }}">
            <span>
              <img src="{{ asset('assets/icons/settings.png') }}" alt="">
            </span>
          </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</aside>