<aside class="col-span-3 border-r border-bgray-200 dark:border-darkblack-400">
          

    <div class="px-4 py-6">
        <div class="tab active flex gap-x-4 p-4 rounded-lg transition-all" data-tab="tab1">
            <div class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100 dark:bg-darkblack-500">

                <i class="fa-duotone fa-browser text-[24px]"></i>
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    General Information
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    System Basic Information
                </p>
            </div>
        </div>
        <div class="tab flex gap-x-4 p-4 rounded-lg transition-all" data-tab="tab2">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100">
                <i class="fa-brands fa-amazon text-[24px]"></i>
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    API Tokens Setting
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    Add Amazon oxylab Api Tokens
                </p>
            </div>
        </div>
        <div data-tab="tab3" class="tab flex gap-x-4 p-4 group  rounded-lg transition-all">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100">
                <i class="fa-brands fa-goodreads text-[24px]"></i>
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    API Tokens Setting
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5 ">
                    Add GoodReads Apify Api Tokens
                </p>
            </div>
        </div>
        {{-- <div data-tab="tab4" class="tab flex gap-x-4 p-4 group rounded-lg transition-all">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100">
                <img src="{{ asset('assets/images/B&N.svg') }}" class="w-[24px]" alt="">
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    Apify Api Tokens
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    Add B&N Apify Api Tokens
                </p>
            </div>
        </div> --}}
        {{-- <div data-tab="tab5" class="tab flex gap-x-4 p-4 rounded-lg transition-all">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor"
                        d="M13.6831 10.0808L14.3138 10.4866L13.6831 10.0808ZM9.25 9C9.25 9.41421 9.58579 9.75 10 9.75C10.4142 9.75 10.75 9.41421 10.75 9H9.25ZM11.25 13.5C11.25 13.9142 11.5858 14.25 12 14.25C12.4142 14.25 12.75 13.9142 12.75 13.5H11.25ZM12.75 16C12.75 15.5858 12.4142 15.25 12 15.25C11.5858 15.25 11.25 15.5858 11.25 16H12.75ZM11.25 17C11.25 17.4142 11.5858 17.75 12 17.75C12.4142 17.75 12.75 17.4142 12.75 17H11.25ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM12 2.75C17.1086 2.75 21.25 6.89137 21.25 12H22.75C22.75 6.06294 17.9371 1.25 12 1.25V2.75ZM13.25 9C13.25 9.24996 13.1774 9.48068 13.0524 9.67495L14.3138 10.4866C14.5899 10.0576 14.75 9.54634 14.75 9H13.25ZM10.75 9C10.75 8.30964 11.3096 7.75 12 7.75V6.25C10.4812 6.25 9.25 7.48122 9.25 9H10.75ZM12 7.75C12.6904 7.75 13.25 8.30964 13.25 9H14.75C14.75 7.48122 13.5188 6.25 12 6.25V7.75ZM11.25 13V13.5H12.75V13H11.25ZM13.0524 9.67495C12.9265 9.87065 12.7688 10.0731 12.5836 10.3033C12.4063 10.5237 12.1979 10.7764 12.011 11.0333C11.6424 11.5398 11.25 12.2007 11.25 13H12.75C12.75 12.6947 12.9003 12.3605 13.2239 11.9158C13.383 11.697 13.558 11.4851 13.7523 11.2436C13.9387 11.0119 14.1409 10.7554 14.3138 10.4866L13.0524 9.67495ZM11.25 16V17H12.75V16H11.25Z" />
                </svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">FAQ</h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    Est arcu pharetra proin pellentesque
                </p>
            </div>
        </div>
        <div data-tab="tab6" class="tab flex gap-x-4 p-4 group rounded-lg transition-all">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center ">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 8H8M16 8C18.2091 8 20 9.79086 20 12V18C20 20.2091 18.2091 22 16 22H8C5.79086 22 4 20.2091 4 18V12C4 9.79086 5.79086 8 8 8M16 8V6C16 3.79086 14.2091 2 12 2C9.79086 2 8 3.79086 8 6V8M14 15C14 16.1046 13.1046 17 12 17C10.8954 17 10 16.1046 10 15C10 13.8954 10.8954 13 12 13C13.1046 13 14 13.8954 14 15Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    Security
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    Est arcu pharetra proin pellentesque
                </p>
            </div>
        </div>
        <div data-tab="tab7" class="tab flex gap-x-4 p-4 rounded-lg transition-all">
            <div
                class="w-12 tab-icon transition-all h-12 shrink-0 rounded-full inline-flex items-center justify-center bg-bgray-100">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9 14L10.7528 15.4023C11.1707 15.7366 11.7777 15.6826 12.1301 15.2799L15 12M16 4H17C19.2091 4 21 5.79086 21 8V18C21 20.2091 19.2091 22 17 22H7C4.79086 22 3 20.2091 3 18V8C3 5.79086 4.79086 4 7 4H8M16 4C16 5.10457 15.1046 6 14 6H10C8.89543 6 8 5.10457 8 4M16 4C16 2.89543 15.1046 2 14 2H10C8.89543 2 8 2.89543 8 4"
                        stroke-width="1.5" stroke="currentColor" stroke-linecap="round" />
                </svg>
            </div>

            <div>
                <h4 class="text-base font-bold text-bgray-900 dark:text-white">
                    Terms & Conditions
                </h4>
                <p class="text-sm font-medium text-bgray-700 dark:text-darkblack-300 mt-0.5">
                    Est arcu pharetra proin pellentesque
                </p>
            </div>
        </div> --}}
    </div>
  
    {{-- <div class="px-8">
        <div class="bg-bgray-200 dark:bg-darkblack-500 p-7 rounded-xl">
            <div
                class="flex-row space-x-6 2xl:flex-row 2xl:space-x-6 flex md:flex-col md:space-x-0 items-center">
                <div class="progess-bar flex justify-center md:mb-[13px] xl:mb-0 mb-0">
                    <div class="bonus-per relative">
                        <div class="bonus-outer">
                            <div class="bonus-inner">
                                <div class="number">
                                    <span class="text-sm font-medium text-bgray-900">64%</span>
                                </div>
                            </div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px">
                            <circle style="
                        stroke-dashoffset: calc(215 - 215 * (64 / 100));
                      " cx="40" cy="40" r="35" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="flex flex-col md:items-center xl:items-start items-start">
                    <h4 class="text-bgray-900 dark:text-white text-base font-bold">
                        Complete profile
                    </h4>
                    <span class="text-xs font-medium text-bgray-700 dark:text-darkblack-300">Complete your
                        profile to unlock all features</span>
                </div>
            </div>
            <button
                class="w-full mt-4 bg-success-300 hover:bg-success-400 text-white font-bold text-xs py-3 rounded-lg transition-all">
                Verify identify
            </button>
        </div>
    </div> --}}
</aside>