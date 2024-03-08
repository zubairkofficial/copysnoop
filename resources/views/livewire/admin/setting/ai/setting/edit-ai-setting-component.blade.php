<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Edit AI API Setting</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.ai_settings') }}" ><i class="fa-solid fa-hexagon-plus px-2"></i> AI API Settings</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-4">
                
                <div class="relative overflow-x-auto p-5">
                    <div class="flex items-center absolute justify-center opacity-5" wire:loading>
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512"><path fill="#031b63" d="M304 48c0 26.51-21.49 48-48 48s-48-21.49-48-48s21.49-48 48-48s48 21.49 48 48m-48 368c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48s-21.49-48-48-48m208-208c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48s-21.49-48-48-48M96 256c0-26.51-21.49-48-48-48S0 229.49 0 256s21.49 48 48 48s48-21.49 48-48m12.922 99.078c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48c0-26.509-21.491-48-48-48m294.156 0c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48c0-26.509-21.49-48-48-48M108.922 60.922c-26.51 0-48 21.49-48 48s21.49 48 48 48s48-21.49 48-48s-21.491-48-48-48"/></svg>
                    </div>
                    <form enctype="multipart/form-data" wire:submit.prevent='editAi'>
                        <div class="grid grid-cols-3 grid-flow-col gap-3">
                        <div class="mt-4">
                            <x-label for="name" value="{{ __('Name') }}" />
                            <x-input id="name"  placeholder="enter name" type="text" name="name"   wire:model='name' wire:keyup='genSlug' />
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label for="slug" value="{{ __('Slug') }}" />
                            <x-input id="slug"  placeholder="slug auto generate and unique" type="text" name="slug" wire:model='slug'  />
                            @error('slug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <x-label for="api_key" value="{{ __('ApiKey') }}" />
                            <x-input id="api_key"  placeholder="Enter Api Key should be unique" type="text" name="api_key" wire:model='api_key'  />
                            @error('api_key')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        </div>
                        <div class="grid grid-cols-2 grid-flow-col gap-3">

                            <div class="mt-4">
                                <x-label for="status" value="{{ __('Status') }}" />
                                <x-select id="status" name="stattus" wire:model='status' >
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                                </x-select>
                                @error('status')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="mt-4">
                                <x-label for="category_id" value="{{ __('Category') }}" />
                                <x-select id="category_id" name="stattus" wire:model='category_id' >
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                                </x-select>
                                @error('category_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end my-3">
                            <x-button class="ms-4">
                                {{ __('Edit AI Setting') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
   </main>