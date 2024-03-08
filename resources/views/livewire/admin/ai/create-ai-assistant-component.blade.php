<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div>
            <h2 class="text-white font-extrabold">Create New AI Prompt</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="flex">
            <x-a href="{{ route('admin.ai_assistant') }}"
                ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> AI Assistant Prompts</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-3  ">

                <div class="relative overflow-x-auto p-2 ">
                    <div class="row">
                        <form enctype="multipart/form-data" wire:submit.prevent='createAI' wire:loading.calss='opacity-50'>


                            <div class="grid grid-cols-2 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="name" value="{{ __('Name') }}" />
                                    <x-input id="name" placeholder='Enter name' type="text" name="name"
                                        wire:model='name' />
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="ai_id" value="{{ __('API Used') }}" />
                                    <x-select id="ai_id" name="stattus" wire:model.live='ai_id'>
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
                            @if($p_out_puts->count() > 0)
                            <div class="grid grid-cols-1 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="out_put"
                                        value="{{ __('Select File that Prompt Runs On') }}" />
                                    <x-select id="out_put" name="out_put" wire:model.live='out_put'>
                                        <option value="">Select file</option>
                                        @foreach($p_out_puts as $output)
                                        <option value="{{$output->id}}">{{ $output->file_name }}</option>
                                        @endforeach


                                    </x-select>
                                    @error('out_put')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            @endif
                            <div class="grid grid-cols-1 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="file_name"
                                        value="{{ __('Save Results from this prompt as:') }}" />
                                    <x-input id="file_name" class="block mt-1 w-full border-none bg-gray-100"
                                        placeholder="Enter file name save as result" type="text" name="file_name"
                                        wire:model='file_name' />
                                    @error('file_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="prompt" value="{{ __('Prompt') }}" />
                                    <x-textarea id="prompt" name="prompt" wire:model='prompt' rows="3"
                                        placeholder="Enter prompt working description..."
                                        ></x-textarea>
                                    @error('prompt')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="status" value="{{ __('Prompt Status') }}" />
                                    <x-select id="status" name="status" wire:model='status'>
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </x-select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-2 p-2">
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="category_id" value="{{ __('Category') }}" />
                                    <x-select id="category_id" name="category_id" wire:model.live='category_id'
                                        >
                                        <option value="">Select Catgeory</option>

                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </x-select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4 mx-4">
                                    <x-label class="py-2" for="category" value="{{ __('Create New Category') }}" />
                                    <x-input id="category" class="block mt-1 w-full border-none bg-gray-100 px-2"
                                        placeholder='or create new category' type="text" name="category"
                                        wire:model.live='category' />
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="flex items-center justify-end my-3">
                                <button type="button"
                                    class="ms-4 inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    wire:click='openModal'>
                                    {{ __('Preview Prompt result') }}
                                </button>
                                <x-button class="ms-4">
                                    {{ __('Save Prompt') }}
                                </x-button>
                            </div>

                        </form>
                       
                    </div>
                </div>
            </div>
        </section>
    </div>
    @if($isOpen)
    <x-preview-modal :data="$data" :loaderMessage="$loaderMessage" :file="$out_put" />
    @endif

</main>