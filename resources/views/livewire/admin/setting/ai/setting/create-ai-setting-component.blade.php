<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Create AI API Setting</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.ai_settings') }}" ><i class="fa-solid fa-hexagon-plus px-2"></i> AI Settings</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-3">
                
                <form enctype="multipart/form-data" wire:submit.prevent='createAi'>
                    <div class="grid grid-cols-3 grid-flow-col gap-3">
                        <div>
                            <x-label class="py-3" for="name" value="{{ __('Name') }}" />
                            <x-input id="name"  placeholder="enter name" type="text" name="name"   wire:model='name' wire:keyup='genSlug' />
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label class="py-3" for="slug" value="{{ __('Slug') }}" />
                            <x-input id="slug"  placeholder="slug auto generate and unique" type="text" name="slug" wire:model='slug'  />
                            @error('slug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-label class="py-3" for="api_key" value="{{ __('ApiKey') }}" />
                            <x-input id="api_key"  placeholder="Enter Api Key should be unique" type="text" name="api_key" wire:model='api_key'  />
                            @error('api_key')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-2 grid-flow-col gap-3">
                  
                     <div >
                         <x-label class="py-3" for="status" value="{{ __('Status') }}" />
                         <x-select id="status" name="stattus" wire:model='status' >
                           <option value="">Select Status</option>
                           <option value="active">Active</option>
                           <option value="inactive">InActive</option>
                         </x-select>
                         @error('status')
                         <span class="text-red-500">{{ $message }}</span>
                        @enderror
                     </div>
                     <div >
                         <x-label class="py-3" for="category_id" value="{{ __('Category') }}" />
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
                             {{ __('Create AI Setting') }}
                         </x-button>
                     </div>
                 </form>
            </div>
        </section>
    </div>
</main>
