<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Preview {{ $package->name }} Package</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.packages') }}" ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> All Packages</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-3  ">
                
                <div class="relative overflow-x-auto p-5">
                    <section class="bg-white dark:bg-gray-900">
                        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                            <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Designed for business teams like yours</h2>
                                <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">Here at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term value and drive economic growth.</p>
                            </div>
                            <div class="space-y-8 lg:grid lg:grid-cols-1 sm:gap-6 xl:gap-10 lg:space-y-0 flex justify-center">
                                
                                <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow-sm dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                                    <div class="flex justify-center p-2">
                                        <img src="{{ asset('assets/images/packages') }}/{{ $package->package_image }}" class="rounded-full w-20  p-1" alt="">
                                        <h3 class="mb-4 text-2xl font-semibold mx-2 mt-3">{{ $package->name }}</h3>
                                    </div>
                                    <p class="font-light text-gray-500 sm:text-lg dark:text-gray-400">${{ $package->price }}</p>
                                    <div class="flex justify-center items-baseline my-8">
                                        <span class="mr-2 text-5xl font-extrabold">{{ $package->duration }}</span>
                                        <span class="text-gray-900 dark:text-gray-400">/ days</span>
                                    </div>
                                    <!-- List -->
                                    <ul role="list" class="mb-8 space-y-4 text-left">
                                        <li class="flex items-center space-x-3">
                                            
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            <span>Platform <span class="font-semibold uppercase">{{ $package->platform }}</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            <span>PDF Download <span class="font-semibold">{{ $package->files }}</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            <span>Reviews Get <span class="font-semibold">{{ $package->reviews_requested }}</span></span>
                                        </li>
                                        <li class="flex items-center space-x-3">
                                            
                                            <svg class="flex-shrink-0 w-5 h-5 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                            {!! $package->description !!}
                                        </li>
                                        
                                    </ul>
                                    <a href="#" class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-primary-900">Get started</a>
                                </div>
                             
                            </div>
                        </div>
                      </section>
                </div>
        </section>
    </div>


</main>