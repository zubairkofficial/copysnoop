<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Edit {{ $name }} Package</h2>
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
                    <form enctype="multipart/form-data" wire:submit.prevent='updatePackage'>
                        <div class="grid grid-cols-2 p-2">
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="name" value="{{ __('Name') }}" />
                                <x-input id="name" 
                                    placeholder='Enter name' type="text" name="name" wire:model='name'
                                    wire:keyup='genSlug' />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="slug" value="{{ __('Slug') }}" />
                                <x-input id="slug" 
                                    placeholder="slug should be unique and auto generated" type="text" name="slug"
                                    wire:model='slug' />
                                @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-4 p-2">
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="status" value="{{ __('Status') }}" />
                                <x-select id="status" name="status" wire:model='status'>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">InActive</option>
                                </x-select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="platform" value="{{ __('Valid Platform') }}" />
                                <x-select id="platform" name="platform" wire:model='platform'>
                                    <option value="">Select platform</option>
                                    <option value="all">All</option>
                                    <option value="amazon">Amazon</option>
                                    <option value="goodreads">GoodReads</option>
                                    <option value="b&n">B&N</option>
                                </x-select>
                                @error('platform')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="duration" value="{{ __('Duration') }}" />
                                <x-input id="duration" 
                                    placeholder="Package Valid for number of days.." type="text" name="duration"
                                    wire:model='duration' />
                                @error('duration')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="price" value="{{ __('Pacakge Price') }}" />
                                <x-input id="price" 
                                    placeholder="Package price..." type="text" name="price"
                                    wire:model='price' />
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                        <div class="grid grid-cols-2 p-2">
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="files" value="{{ __('Pdf Download') }}" />
                                <x-input id="files" 
                                    placeholder="Number of padf download..." type="text" name="files"
                                    wire:model='files' />
                                @error('files')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="reviews_request" value="{{ __('Number Of Analysis or Reviews Generate') }}" />
                                <x-input id="reviews_request" 
                                    placeholder="Number of pdf download..." type="text" name="reviews_request"
                                    wire:model='reviews_request' />
                                @error('reviews_request')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 p-2">
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="description" value="{{ __('Package Description') }}" />
                                <x-textarea id="description" name="description" wire:model='description' rows="3"
                                        placeholder="Enter description ..."
                                        ></x-textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 p-2">
                            <div class="mt-4 mx-4">
                                <x-file-label class="py-3"
                                for="new_package_image"
                                value="{{ __('Upload Image File') }}"
                               />
                              <x-file
                               
                                type="file"
                                id="new_package_image"
                                wire:model="new_package_image"
                                 />
                                @error('new_package_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 p-2">
                            <div class="mt-4 mx-4">
                                <div class="col-span-full">
                                    <x-file-label value="{{ __('Upload File') }}" />
                                    <div
                                        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                        <div class="text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <div class="mt-4 flex text-sm leading-6 text-gray-600 w-[400px]">
                                                <x-file-label for="file-upload"
                                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500" />

                                                    @if($new_package_image)
                                                    <img src="{{ $new_package_image->temporaryurl() }}" alt="">
                                                    @else
                                                    <img src="{{ asset('assets/images/packages')}}/{{ $package_image }}" alt="">
                                                    @endif
                                                </label>

                                            </div>
                                            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-2">
                            <x-button class="ms-4">
                                {{ __('Update Package') }}
                            </x-button>
                        </div>
                    </form>
                </div>
        </section>
    </div>


</main>