<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">AI API Setting</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.create_ai_setting') }}"><i class="fa-solid fa-hexagon-plus px-2"></i> Create AI API</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">

                <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-1">
                    <div class="grid grid-cols-1 xl:grid-cols-12 bg-[#FAF9F6] dark:bg-darkblack-600 rounded-xl">
        
                        <x-setting-sidebar />
                         
                         <div class="py-8 px-10 col-span-9 tab-content">
                             
                             <div id="tab1" class="tab-pane active">
                                 <div class="xl:grid grid-cols-12 gap-12 flex 2xl:flex-row flex-col-reverse">
                                     <div class="2xl:col-span-8 xl:col-span-7">
                                         <h3
                                             class="text-2xl font-bold pb-5 text-bgray-900 dark:text-white dark:border-darkblack-400 border-b border-bgray-200">
                                             General Information's
                                         </h3>
                                         <div class="mt-8">
                                             <form  enctype="multipart/form-data" wire:submit.prevent='saveData'>
                                                 <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                                     <div class="flex flex-col gap-2">
                                                         <label for="fname"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Website
                                                             Name</label>
                                                         <x-input type="text" 
                                                             name="name" placeholder="Enter website name..." wire:model='name' />
                                                             @error('name')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="lname"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Tag line</label>
                                                         <x-input type="text"
                                                             
                                                             name="tag_line" wire:model='tag_line' />
                                                             @error('tag_line')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="email"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Email</label>
                                                         <x-input type="text"
                                                             
                                                             name="email" wire:model='email' />
                                                             @error('email')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="phone"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Phone
                                                             Number </label>
                                                         <x-input type="text"
                                                             
                                                             name="phone" wire:model='phone' />
                                                             @error('phone')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="copy_right"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Copy Rights </label>
                                                         <x-input type="text"
                                                             
                                                             name="copy_right" wire:model='copy_right' />
                                                             @error('copy_right')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="logo"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Logo </label>
                                                         <x-file type="file"
                                                             
                                                             name="logo" wire:model='new_logo' />
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="favicon"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Favicon </label>
                                                         <x-file type="file"
                                                             
                                                             name="favicon" wire:model='new_favicon' />
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="footer_logo"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Footor logo </label>
                                                         <x-file type="file"
                                                             
                                                             name="footer_logo
                                                             footer_logo" wire:model='new_footer_logo' />
                                                     </div>
                                                 </div>
                                                 <h4 class="pt-8 pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                                                     Office Address
                                                 </h4>
                                                 <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                                     <div class="flex flex-col gap-2">
                                                         <label for="address"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Country Address</label>
                                                         <x-input type="text"
                                                             
                                                             name="address" wire:model='address' />
                                                             @error('address')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     
                                                     <div class="flex flex-col gap-2">
                                                         <label for="url"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Url</label>
                                                         <x-input type="text"
                                                             
                                                             name="url" wire:model='url' />
                                                             @error('url')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                    
                                                     
                                                 </div>
                                                 <div class="grid 2xl:grid-cols-1 grid-cols-1 gap-4 pt-8 pb-6">
                                                     <label for="map"
                                                         class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Map</label>
                                                     <x-input type="text" placeholder="Washington"
                                                         
                                                         name="map" wire:model='map' />
                                                         @error('map')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                 </div>
                                                 <h4 class="pt-8 pb-6 text-xl font-bold text-bgray-900 dark:text-white">
                                                     Social Information
                                                 </h4>
                                                 <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                                                     <div class="flex flex-col gap-2">
                                                         <label for="facebook"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Facebook</label>
                                                         <x-input type="text"
                                                             
                                                             name="facebook" wire:model='facebook' />
                                                             @error('facebook')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="twitter"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Twitter</label>
                                                         <x-input type="text"
                                                             
                                                             name="twitter" wire:model='twitter' />
                                                             @error('twitter')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="linkedin"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Linkedin</label>
                                                         <x-input type="text"
                                                             
                                                             name="linkedin" wire:model='linkedin' />
                                                             @error('linkedin')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="instagram"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Instagram</label>
                                                         <x-input type="text"
                                                             
                                                             name="instagram" wire:model='instagram' />
                                                             @error('instagram')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="youtube"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Youtube</label>
                                                         <x-input type="text"
                                                             
                                                             name="youtube" wire:model='youtube' />
                                                             @error('youtube')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="telegram"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Telegarm</label>
                                                         <x-input type="text"
                                                             
                                                             name="telegram" wire:model='telegram' />
                                                             @error('telegram')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="pinterest"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Pinterest</label>
                                                         <x-input type="text"
                                                             
                                                             name="pinterest" wire:model='pinterest' />
                                                             @error('pinterest')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                     <div class="flex flex-col gap-2">
                                                         <label for="whatsapp"
                                                             class="text-base text-bgray-600 dark:text-bgray-50  font-medium ">Whatsapp</label>
                                                         <x-input type="text"
                                                             
                                                             name="whatsapp" wire:model='whatsapp' />
                                                             @error('whatsapp')
                                                                 <span class="text-red-500">{{ $message }}</span>
                                                             @enderror
                                                     </div>
                                                 </div>
                                                 <div class="flex justify-end my-3">
                                                     <x-button type="submit"
                                                         class=" bg-green-500">
                                                         Save setting
                                                     </x-button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                     <div class="2xl:col-span-4 xl:col-span-5 2xl:mt-24">
                                         <header class="mb-8">
                                             <h4 class="font-bold text-lg text-bgray-800 dark:text-white mb-2">
                                                 Logo
                                             </h4>
                                             <p class="mb-4 text-bgray-500">
                                                 logo of at least Size
                                                 <span class="text-bgray-900 dark:text-darkblack-300">300x300.</span> Gifs work
                                                 too.
                                                 <span class="text-bgray-900">Max 5mb.</span>
                                             </p>
                                             <div class="text-center m-auto w-40 h-40 relative">
                                                 @if($new_logo)
                                                 <img src="{{ $new_logo->temporaryurl() }}" alt="" />
                                                 @elseif($logo)
                                                 <img src="{{ asset('assets/images/logos') }}/{{ $logo }}" alt="" />
                                                 @else
                                                 <img src="{{ asset('assets/images/B&N.png') }}" alt="" />
                                                 @endif
                                                 
                                             </div>
                                         </header>
                                         <div>
                                             <h4 class="font-bold text-lg text-bgray-800 dark:text-white mb-2">
                                                 Update Favicon
                                             </h4>
                                             <p class="mb-4 text-bgray-500 dark:text-bgray-50">
                                                 Favicon of at least Size
                                                 <span class="text-bgray-900">100x100 </span>
                                             </p>
                                             <div class="relative w-full">
                                                 @if($new_favicon)
                                                 <img src="{{ $new_favicon->temporaryurl() }}" class="w-full" alt="" />
                                                 @elseif($favicon)
                                                 <img src="{{ asset('assets/images/logos') }}/{{ $favicon }}" class="w-full" alt="" />
                                                 @else
                                                 <img src="{{ asset('assets/images/comming-soon.webp') }}" class="w-full" alt="" />
                                                 @endif
                                                
                                             </div>
                                         </div>
                                         <div>
                                             <h4 class="font-bold text-lg text-bgray-800 dark:text-white mb-2">
                                                 Update Footer Logo
                                             </h4>
                                             <p class="mb-4 text-bgray-500 dark:text-bgray-50">
                                                 Footer Logo of at least Size
                                                 <span class="text-bgray-900">200x200 </span>
                                             </p>
                                             <div class="relative w-full">
                                                 @if($new_footer_logo)
                                                 <img src="{{ $new_footer_logo->temporaryurl() }}" class="w-full" alt="" />
                                                 @elseif($footer_logo)
                                                 <img src="{{ asset('assets/images/logos') }}/{{ $footer_logo }}" class="w-full" alt="" />
                                                 @else
                                                 <img src="{{ asset('assets/images/comming-soon.webp') }}" class="w-full" alt="" />
                                                 @endif                                                 
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                             <x-amazon-setting />
                            
                             <x-goodreads-setting />
                             
                             
                             
                             {{-- <div id="tab5" class="tab-pane">
                                 <div>
                                     <h3 class="text-2xl font-bold text-bgray-900 dark:text-white">FAQ</h3>
                                     <div>
                                         <!-- Faq 1 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-minus text-success-300 text-xl"></i>
                                                 <h2
                                                     class="title transition-all text-bgray-900 dark:text-white md:text-lg text-sm font-bold ">
                                                     What is the most important part of a dashboard?
                                                 </h2>
                                             </div>
                                             <div style="max-height: 164px"
                                                 class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Faq 2 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-plus text-success-300 text-xl"></i>
                                                 <h2 class="title transition-all text-bgray-900 md:text-lg text-sm dark:text-white">
                                                     What are the three types of dashboard?
                                                 </h2>
                                             </div>
                                             <div class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Faq 3 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-plus text-success-300 text-xl"></i>
                                                 <h2 class="title transition-all text-bgray-900 dark:text-white md:text-lg text-sm">
                                                     What are examples of admin?
                                                 </h2>
                                             </div>
                                             <div class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Faq 4 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-plus text-success-300 text-xl"></i>
                                                 <h2 class="title transition-all text-bgray-900 dark:text-white md:text-lg text-sm">
                                                     What are 5 benefits of dashboards?
                                                 </h2>
                                             </div>
                                             <div class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Faq 5 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-plus text-success-300 text-xl"></i>
                                                 <h2 class="title transition-all text-bgray-900 dark:text-white md:text-lg text-sm">
                                                     What makes a good dashboard?
                                                 </h2>
                                             </div>
                                             <div class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- Faq 6 -->
                                         <div class="transition">
                                             <div
                                                 class="accordion-header border-b border-bgray-300 dark:border-darkblack-400 cursor-pointer transition flex space-x-5 items-center h-16">
                                                 <i class="fas fa-plus text-success-300 text-xl"></i>
                                                 <h2 class="title transition-all text-bgray-900 dark:text-white md:text-lg text-sm">
                                                     What are the 3 basic skills of administrator?
                                                 </h2>
                                             </div>
                                             <div class="accordion-content lg:pl-8 pl-4 pt-0 overflow-hidden max-h-0 space-y-4">
                                                 <div class="flex flex-row py-6">
                                                     <div class="flex h-[93] w-1 bg-success-300 rounded-lg"></div>
                                                     <div class="flex-1">
                                                         <p class="text-[#9AA2B1] pl-4 lg:text-base text-xs lg:leading-7">
                                                             In reality, the most important aspect of a great
                                                             dashboard is the part that gets the least amount
                                                             of attention: The underlying data. More than any
                                                             other aspect, the data will make or break a
                                                             dashboard.Within this definition, successful
                                                             administration appears to rest on three basic
                                                             skills, which we will call technical, human, and
                                                             conceptual.Dashboards are business intelligence.
                                                         </p>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                             <div id="tab6" class="tab-pane">
                                 <div class="flex flex-col gap-10 xl:flex-row xl:items-center">
                                     <div class="grow max-w-[614px]">
                                         <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-3">
                                             Password
                                         </h3>
                                         <p class="text-sm fotn-medium text-bgray-500 dark:text-bgray-50">
                                             Change or view your password.
                                         </p>
                                         <form action="" class="mt-6">
                                             <div class="relative flex flex-col mb-6">
                                                 <label for="old"
                                                     class="text-sm block mb-3 font-medium text-bgray-500 dark:text-darkblack-300">Old
                                                     password</label>
                                                 <x-input type="text"
                                                     class="bg-bgray-50 dark:bg-darkblack-500 dark:text-white rounded-lg w-full h-14 px-4 py-5 border-0 focus:border focus:border-success-300 focus:ring-0" />
                                                 <button class="absolute right-4 top-12">
                                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M3 3L21 21" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                         <path
                                                             d="M10.584 10.5869C10.2087 10.9619 9.99775 11.4707 9.99756 12.0012C9.99737 12.5317 10.2079 13.0406 10.583 13.4159C10.958 13.7912 11.4667 14.0021 11.9973 14.0023C12.5278 14.0025 13.0367 13.7919 13.412 13.4169"
                                                             stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                         <path
                                                             d="M9.363 5.36506C10.2204 5.11978 11.1082 4.9969 12 5.00006C16 5.00006 19.333 7.33306 22 12.0001C21.222 13.3611 20.388 14.5241 19.497 15.4881M17.357 17.3491C15.726 18.4491 13.942 19.0001 12 19.0001C8 19.0001 4.667 16.6671 2 12.0001C3.369 9.60506 4.913 7.82506 6.632 6.65906"
                                                             stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                     </svg>
                                                 </button>
                                             </div>
                                             <div class="relative flex flex-col mb-6">
                                                 <label for="old"
                                                     class="text-sm block mb-3 font-medium text-bgray-500 dark:text-darkblack-300">New
                                                     password</label>
                                                 <x-input type="text"
                                                     class="bg-bgray-50 dark:bg-darkblack-500 rounded-lg w-full h-14 px-4 py-5 border-0 focus:border focus:border-success-300 focus:ring-0" />
                                                 <button class="absolute right-4 top-12">
                                                     <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                         xmlns="http://www.w3.org/2000/svg">
                                                         <path d="M3 3L21 21" stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                         <path
                                                             d="M10.584 10.5869C10.2087 10.9619 9.99775 11.4707 9.99756 12.0012C9.99737 12.5317 10.2079 13.0406 10.583 13.4159C10.958 13.7912 11.4667 14.0021 11.9973 14.0023C12.5278 14.0025 13.0367 13.7919 13.412 13.4169"
                                                             stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                         <path
                                                             d="M9.363 5.36506C10.2204 5.11978 11.1082 4.9969 12 5.00006C16 5.00006 19.333 7.33306 22 12.0001C21.222 13.3611 20.388 14.5241 19.497 15.4881M17.357 17.3491C15.726 18.4491 13.942 19.0001 12 19.0001C8 19.0001 4.667 16.6671 2 12.0001C3.369 9.60506 4.913 7.82506 6.632 6.65906"
                                                             stroke="#718096" stroke-width="1.5" stroke-linecap="round"
                                                             stroke-linejoin="round" />
                                                     </svg>
                                                 </button>
                                                 <small class="text-xs text-bgray-500 dark:text-darkblack-300 block mt-1">Minimum 6
                                                     characters</small>
                                             </div>
                                             <div class="flex justify-end">
                                                 <button
                                                     class="text-sm bg-success-300 hover:bg-success-400 transition-all py-3 px-4 text-white font-semibold rounded-lg hover:bg-opacity-100">
                                                     Save Changes
                                                 </button>
                                             </div>
                                         </form>
                                     </div>
                                     <div class="mx-auto pt-10 hidden xl:block">
                                         <img src="assets/images/illustration/reset-password.svg" alt="" />
                                     </div>
                                 </div>
                             </div>
                             
                             <div id="tab7" class="tab-pane">
                                 <div>
                                     <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-3">
                                         Terms and Conditions
                                     </h3>
                                     <article class="mb-8">
                                         <h4 class="text-bgray-800 dark:text-white text-lg font-bold mb-2">
                                             1. Definitions
                                         </h4>
                                         <p class="text-[#9AA2B1] dark:text-white text-base">
                                             What you do own when you buy an are the keys to a
                                             non-fungible – perhaps unique – token. That token is
                                             yours to trade or hold or display in Decentraland. But
                                             the digital file associated with an NFT is just as easy
                                             to copy and paste and download as any other – the
                                             Finally, players lose their NFTs sometimes according to
                                             the rules and regulations of the NFT game.
                                         </p>
                                     </article>
                                     <article class="mb-8">
                                         <h4 class="text-bgray-800 dark:text-white text-lg font-bold mb-2">
                                             2. Acceptance
                                         </h4>
                                         <p class="text-[#9AA2B1] dark:text-white text-base">
                                             Amet minim mollit non deserunt ullamco est sit aliqua
                                             dolor do amet sint. Velit officia consequat duis enim
                                             velit mollit. Exercitation veniam consequat sunt nostrud
                                             amet.Capacity. You confirm that you have the legal
                                             capacity to receive and hold and make use of the NFT
                                             under French jurisdiction and any other relevant
                                             jurisdiction.Acceptance. By participating in the Sale,
                                             You accept and agree to these Terms and Conditions
                                             without any condition or restriction. If You do not
                                             agree to this Contract, You shall not participate in the
                                             Sale made by the Company Exercitation veniam consequat
                                             sunt nostrud amet.Capacity. You confirm that you have
                                             the legal capacity to receive and hold find to
                                             end.Contract, You shall not participate in the Sale made
                                             by the Company Exercitation venia
                                         </p>
                                     </article>
                                     <blockquote
                                         class="px-7 py-5 bg-bgray-100 dark:bg-darkblack-500 rounded-lg mb-8 text-lg text-bgray-800 dark:text-white">
                                         In reality, the most important aspect of a great dashboard
                                         is the part that gets the least amount of attention: The
                                         underlying data. More than any other aspect, the data will
                                         make or break a dashboard.Within this definition,
                                         successful administration appears to rest on three basic
                                         skills, which we will call technical, and conceptual.
                                     </blockquote>
                                     <article class="mb-8">
                                         <h4 class="text-bgray-800 dark:text-white text-lg font-bold mb-2">
                                             3. The Sale
                                         </h4>
                                         <p class="text-base text-[#9AA2B1] dark:text-white mb-6">
                                             The Company offers featuring the Betonyou universe. The
                                             holders of one or more NFTs will be able to win cryptos
                                             while playing video games. In the future, the Company
                                             plans to develop its own games and Metaverse around the
                                             Betonyou universe (“Project”).
                                         </p>
                                         <p class="text-base text-[#9AA2B1] dark:text-white">
                                             To release the NFTs and fund the project, the Company
                                             offers NFTs from a dedicated website("Sale"). The web
                                             address of this website will be given at the time of the
                                             mint. The NFT acquisition does not confer any rights on
                                             the Company or in the future development.
                                         </p>
                                     </article>
                                     <article>
                                         <h4 class="text-bgray-800 dark:text-white text-lg font-bold mb-2">
                                             4. Purchaser’s obligations
                                         </h4>
                                         <p class="text-base text-[#9AA2B1] dark:text-white mb-6">
                                             To the fullest extent permitted by applicable law, You
                                             undertake to indemnify, defend and hold harmless the
                                             Company from and against all claims, demands, actions,
                                             damages, losses, costs and expenses (including
                                             attorneys’ fees) that arise from or relate to (i) your
                                             Subscription or use of the NFTs; (ii) your
                                             responsibilities or obligations under this Contract; and
                                             (iii) your breach of this Contract.
                                         </p>
                                         <p class="text-base text-[#9AA2B1] dark:text-white">
                                             Company undertakes to act with the care normally
                                             expected from a professional in his field and to comply
                                             with the best practice in force. The best endeavor
                                             obligation only binds the Company.
                                         </p>
                                     </article>
                                 </div>
                             </div> --}}
                         </div>
                     </div>
                </div>
        </section>
        </div>

    </main>
