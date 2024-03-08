<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">{{ $ai->name }} Prompt Detail Info</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.ai_assistant') }}"   ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> AI Assistant Prompts</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto p-3">
                    <div class="grid lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 p-2">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group shadow-sm border-none p-3 my-4 rounded-xl bg-white hover:transform hover:scale-105 transition-transform">
                                    <x-label class="py-3" for="name" value="{{ __('Name') }}" />
                                    <p>{{ $ai->name }}</p>
                                </div>
                                <div class="form-group shadow-sm border-none p-3 my-4 rounded-xl bg-white hover:transform hover:scale-105 transition-transform">
                                    <x-label class="py-3" for="name" value="{{ __('AI API') }}" />
                                    <p>{{ $ai->setting->name }}</p>
                                    <x-label class="py-3" for="name" value="{{ __('AI API Key') }}" />
                                    <div>{{ Str::limit($ai->setting->api_key ,25,'...')}}</div>
                                </div>
                                <div class="form-group shadow-sm border-none p-3 my-4 rounded-xl bg-white hover:transform hover:scale-105 transition-transform">
                                    <x-label class="py-3" for="name" value="{{ __('Category') }}" />
                                    <p>{{ $ai->category->name }}</p>
                                </div>
                                <div class="form-group shadow-sm border-none p-3 my-4 rounded-xl bg-white hover:transform hover:scale-105 transition-transform">
                                    <x-label class="py-3" for="name" value="{{ __('Prompt') }}" />
                                    <p>{!! $ai->prompt !!}</p>
                                </div>
                                <div class="form-group shadow-sm border-none p-3 my-4 rounded-xl bg-white hover:transform hover:scale-105 transition-transform">
                                    <x-label class="py-3" for="name" value="{{ __('Status') }}" />
                                    <x-span class="bg-orange-500">{{ $ai->status }}</x-span>
                                </div>
                                
                            </div>
                            <div class="col-md-8">
                                <div class="flex flex-col bg-[#fcfcfc] hover:transform  transition-transform p-3 rounded-xl mt-4">
                                     <div class="card-tile py-3">Output Result</div>
                                     @php
                                         $output = DB::table('prompt_outputs')->where('ai_assistant_id',$ai->id)->first();
                                     @endphp
                                     <div>{!! $output->output !!}</div>
                                </div>
                            </div>
                        </div>
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