<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">AI Prompt</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.create_ai') }}"  ><i class="fa-solid fa-hexagon-plus px-2"></i> Create Prompt</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto p-4">
                    <div class="lg:flex  sm:grid-cols-2 lg:justify-between sm:justify-center py-4">
                        <div>
                            <label for="search"
                                class="block text-sm font-medium leading-6 text-gray-900">Searching</label>
                            <div class="relative mt-2 border-none rounded-lg   shadow-sm">
                                <x-input type="text" name="search" id="search" wire:model.live='search'
                                placeholder="search by name..." />
                            </div>
                        </div>
                        <div>
                            <label for="sorting"
                                class="block text-sm font-medium leading-6 text-gray-900">Filter</label>
                            <div class="relative mt-2">
                                <x-select id="status" name="status" wire:model.live='status'
                                >
                                <option value="all">Choose Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                             </x-select>
                            </div>
                        </div>
                        <div>
                            <label for="sorting"
                                class="block text-sm font-medium leading-6 text-gray-900">Sorting</label>
                            <div class="relative mt-2">
                                <x-select id="sorting" name="sorting" wire:model.live='sorting'>
                                <option value="all">Choose Sorting Type</option>
                                <option value="asc">Old</option>
                                <option value="desc">New</option>
                            </x-select>
                            </div>
                        </div>
                        <div>
                            <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                            <div class="relative mt-2">
                                <x-select id="type" name="type" wire:model.live='type'>
                                        <option value="all">Choose Reveiws Type</option>
                                        <option value="amazon">Amazon</option>
                                        <option value="goodreads">GoodReads</option>
                                        <option value="b&n">B&N</option>
                                    </x-select>
                            </div>
                        </div>
                        <div>
                            <label for="sorting" class="block text-sm font-medium leading-6 text-gray-900">Page
                                Size</label>
                            <div class="relative mt-2">
                                <x-select id="perPage" name="perPage" wire:model.live='perPage'>
                                        <option value="8">Default Page size</option>
                                        <option value="12">12</option>
                                        <option value="16">16</option>
                                    </x-select>
                            </div>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400 my-1">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prompt
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    AI API
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ais as $ai)
                            <tr>
                                <td class="px-6 py-4">{{ $ai->id }}</td>
                                <td class="px-6 py-4">{{ $ai->name }}</td>
                                <td class="px-6 py-4">{{ $ai->setting->name }}</td>
                                <td class="px-6 py-4">{{ $ai->category->name }}</td>
                                
                                <td class="px-6 py-4" >
                                    <x-span class="cursor-pointer {{ $ai->status == 'active' ? 'bg-teal-500 text-white' :'bg-red-500 text-gray-300' }}" wire:click='updateSetting({{ $ai->id }})'>{{ $ai->status }}</x-span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <x-a  class="bg-blue-600 hover:bg-indigo-500" href="{{ route('admin.prompt_detail',['prompt'=>$ai->id]) }}">Detail Info</x-a>
                                        <x-a href="{{ route('admin.edit_ai',['id'=>$ai->id]) }}" class="mx-1" >
                                            Edit
                                        </x-a>
                                        <x-button  wire:click='delete({{ $ai->id }})'>
                                            Delete
                                        </x-button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr >
                                <td colspan="12">
                                  <div class="flex justify-center py-5">
                                      <img src="{{ asset('assets/images/sorry.svg') }}" width="100" alt="no_data">
  
                                  </div>
                                  <p class="text-center">sorry no data found</p>
                                </td>
                              </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $ais->links() }}
                   
                </div>
            </div>
        </section>
    </div>
    

</main>