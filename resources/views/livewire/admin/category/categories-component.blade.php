<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Categories</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.create_category') }}"  ><i
                    class="fa-solid fa-hexagon-plus px-2"></i> Create Category</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">
            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-4">
                <div class="flex justify-between p-2">
              
                    <div>
                        <label for="sorting" class="block text-sm font-medium leading-6 text-gray-900">Search</label>
                        <div class="relative mt-2">
                            <x-input type="text" name="search" id="search" wire:model.live='search'
                            
                            placeholder="search by name..." />
                        </div>
                    </div>
                    <div>
                        <label for="sorting" class="block text-sm font-medium leading-6 text-gray-900">Filter</label>
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
                        <label for="sorting" class="block text-sm font-medium leading-6 text-gray-900">Sorting</label>
                        <div class="relative mt-2 ">
                            <x-select id="sorting" name="sorting" wire:model.live='sorting'
                            >
                            <option value="all">Choose Sorting Type</option>
                            <option value="asc">Old</option>
                            <option value="desc">New</option>
                        </x-select>
                        </div>
                    </div>
                    <div>
                        <label for="sorting" class="block text-sm font-medium leading-6 text-gray-900">Page Size</label>
                        <div class="relative mt-2 ">
                            <x-select id="perPage" name="perPage" wire:model.live='perPage'
                            >
                            <option value="8">Default Page size</option>
                            <option value="12">12</option>
                            <option value="16">16</option>
                        </x-select>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400 my-1">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-3 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Slug
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr class="bg-transparent border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-3 py-4">
                                    {{ $category->id }}
                                </td>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>
                                        <img class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                                            src="{{ asset('assets/images/categories') }}/{{ $category->logo }}" alt="">

                                        <span>{{ $category->name }}</span>
                                    </p>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($category->status ==='active')
                                    <x-span
                                        class="bg-green-700 cursor-pointer"
                                        
                                        wire:click='updateStatus({{ $category->id }})'>{{
                                        $category->status }}</x-span>
                                    @else
                                    <x-span
                                        class="bg-red-600 cursor-pointer"
                                        
                                        wire:click='updateStatus({{ $category->id }})'>{{
                                        $category->status }}</x-span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{\Carbon\Carbon::parse($category->created_at)->isoFormat('MMM Do YYYY')}}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <x-a href="{{ route('admin.edit_category',['id'=>$category->id]) }}"
                                            class="bg-green-500 mx-1">Edit</x-a>
                                        <x-button  wire:click='delete({{ $category->id }})'
                                            >Delete</x-button>
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
                </div>

                {{ $categories->links() }}
            </div>
        </section>
    </div>
</main>