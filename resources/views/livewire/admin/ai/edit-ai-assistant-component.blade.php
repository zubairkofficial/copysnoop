<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Edit {{ $name }} AI Prompt</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.ai_assistant') }}"  ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> AI Assistant Prompts</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-3">
               
                <div class="relative overflow-x-auto p-5">
                    <form enctype="multipart/form-data" wire:submit.prevent='updateAi'>
                        <div class="grid grid-cols-2 p-2">
                            <div class="mt-4 mx-1">
                                <x-label class="py-2" for="name" value="{{ __('Name') }}" />
                                <x-input id="name" 
                                    placeholder='enter name' type="text" name="name" wire:model='name'
                                    wire:keyup='genSlug' />
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-1">
                                <x-label class="py-2" for="ai_id" value="{{ __('AI Used') }}" />
                                <x-select id="ai_id" name="stattus" wire:model='ai_id'
                                    >
                                    <option value="">Select Open AI</option>
                                    @foreach ($ais as $ai)
                                    <option value="{{ $ai->id }}">{{ $ai->name }}</option>
                                    @endforeach
                                </x-select>
                                @error('ai_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 p-2">
                            <div class="mt-4">
                                <x-label class="py-2" for="prompt" value="{{ __('Prompt') }}" />
                                <x-textarea id="prompt" name="prompt" wire:model='prompt' rows="3"
                                    placeholder="enter prompt working description..."></x-textarea>
                                @error('prompt')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 p-2">
                            <div class="mt-4 mx-1">
                                <x-label class="py-2" for="status" value="{{ __('Status') }}" />
                                <x-select id="status" name="status" wire:model='status'>
                                    <option value="">Select Status</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">InActive</option>
                                </x-select>
                                @error('status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4 mx-1">
                                <x-label class="py-2" for="category_id" value="{{ __('Category') }}" />
                                <x-select id="category_id" name="category_id" wire:model='category_id'>
                                    <option value="">Select Catgeory</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </x-select>
                                @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                        </div>
                      
                       
                </div>
                <div class="flex items-center justify-end mt-2">
                    <x-button class="ms-4">
                        {{ __('Update Prompt') }}
                    </x-button>
                </div>
            </div>
            </form>
    </div>
    </div>
    </section>
    </div>
</main>