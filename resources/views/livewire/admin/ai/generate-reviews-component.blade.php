<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">AI Prompt</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.ai_assistant') }}"><i
                    class="fa-solid fa-hexagon-plus px-2"></i> AI Assistant Prompts</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto p-5">
                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 p-5">
                        <form wire:submit.prevent='getReviews' wire:loading.class="opacity-50">
                            <div class="flex flex-row p-2 justify-center">
                                <div class="mt-3 mx-4 flex-1 w-64">
                                    <x-label class="py-2" for="platform" value="{{ __('Platform') }}" />
                                    <select id="platform" name="platform" wire:model='platform'
                                        class="mt-2 w-full bg-gray-100 h-12 px-3  border-none rounded-lg">
                                        <option value="">Select Platform</option>
                                        <option value="amazon">Amazon</option>
                                        <option value="goodreads">GoodReads</option>
                                        <option value="b&n">B&N</option>
                                    </select>
                                    @error('platform')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-3 mx-4 flex-1 w-64">
                                    <x-label class="py-2" for="product" value="{{ __('Product Url Or Product Id') }}" />
                                    <input id="product" class="mt-2 w-full border-none bg-gray-200 px-3 h-12 rounded-md"
                                        placeholder="enter product id or url..." type="text" name="product"
                                        wire:model='product' />
                                    @error('product')
                                    <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-[55px] mx-5 flex-initial">
                                    <x-button class="ms-4 py-3.5">
                                        {{ __('Generate Reviews') }}
                                    </x-button>
                                </div>
                            </div>

                        </form>
                        <div wire:loading wire:target="getReviews" class="py-5">
                            <div class="flex justify-center">
                                <img src="{{ asset('assets/images/8.svg') }}" alt="">
                            </div>
                            <p class='text-center'>{{ $loaderMessage }}</p>
                        </div>
                        
                    
                        @if($data)
                            <div class="my-5">
                                {!! $data !!}
                            </div>
                        @else
                           <div class="my-5">
                            <div class="flex justify-center ">
                                <img src="{{ asset('assets/images/sorry.svg') }}" style="width:150px;height:150px;" alt="">
                            </div>
                            <p class="text-center">Start Product Reviews Analysis by adding url / product id and selecting platform</p>
                           </div>
                        @endif

                    </div>

                </div>
            </div>
        </section>
    </div>
</main>
@script
<script>
    $wire.dispatch('loader');
</script>
@endscript