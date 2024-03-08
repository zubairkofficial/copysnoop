<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Create New AI Chain</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.chains') }}" ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> Available AI Chains</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">

            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-4  ">
                <form enctype="multipart/form-data" wire:submit.prevent='createChain'>
                    <div class="relative overflow-x-auto">

                        <div class="grid grid-cols-3 p-2">
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="name" value="{{ __('Name') }}" />
                                <x-input id="name" 
                                    placeholder='enter name' type="text" name="name" wire:model='name'
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
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="type" value="{{ __('Platform Type') }}" />
                                <x-select id="type" name="type" wire:model='type'
                                    >
                                    <option value="">Select Platform Type</option>
                                    <option value="amazon">Amazon</option>
                                    <option value="goodreads">GoodReads</option>
                                    <option value="b&n">B&N</option>
                                </x-select>
                                @error('type')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        @for ($i = 1; $i <= $assistantSections; $i++) 
                          <div class="grid grid-cols-1">

                           
                            <div class="mt-4 mx-4">
                                <x-label class="py-3" for="ai_assistant_id" value="{{ __('AI Assistant') }}" />
                                <x-select id="ai_assistant_id" name="ai_assistant_ids.{{ $i }}"
                                    wire:model="ai_assistant_ids.{{ $i }}"
                                    >
                                    <option value="">Select Assistant</option>
                                    @foreach($ais as $ai)
                                    <option value="{{$ai->id}}">{{$ai->name}}</option>
                                    @endforeach
                                </x-select>
                                @error("ai_assistant_ids.$i")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                         </div>
                        @endfor

                            <div class="flex justify-end p-2 my-3">
                                <button type="button" class='bg-orange-600 px-5 py-3 text-white rounded-lg'
                                    wire:click="addAssistantSection"><i class="fa-solid fa-hexagon-plus"></i> Add One More Assistant</button>
                            </div>


                    <div class="flex items-center justify-end mt-2">
                        <x-button class="ms-4">
                            {{ __('Create Chain') }}
                        </x-button>
                    </div>
            </div>
            </form>
        </section>
    </div>

</main>