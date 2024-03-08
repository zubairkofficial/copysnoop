<main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
    <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
        <div class="left-part">
            <h2 class="text-white font-extrabold">Available AI Chains</h2>
            <p class="text-gray-200 font-semibold mb-0">Lorem ipsum dolor sit amet </p>
        </div>
        <div class="right-part">
            <x-a href="{{ route('admin.create_chain') }}"><i class="fa-solid fa-hexagon-plus px-2"></i> Create New AI
                Chain</x-a>
        </div>
    </div>

    <div class="2xl:flex 2xl:space-x-[48px]">
        <section class="2xl:flex-1 2xl:mb-0 mb-6">

            <div class="bg-[#FAF9F6] overflow-hidden shadow-xl sm:rounded-lg p-3  ">
                <div class="flex justify-end p-2">
                    <div class="form-group">
                        <x-input placeholder="search here.." name='search' type='text' wire:model.live='search' />
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right  dark:text-gray-400 my-1">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Chain Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Prompts
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
                            @forelse ($chains as $chain)
                            <tr>
                                <td class="px-6 py-4">{{ $chain->id }}</td>
                                <td class="px-6 py-4">{{ $chain->name }}</td>
                                <td class="px-6 py-4">

                                    @foreach ($chain->chaining as $key=>$task)
                                    <x-span wire:click="updatePosition({{ $task->id }},{{ $task->position }})"
                                        class="bg-green-500 cursor-pointer">

                                        {{ $task->assistant->name }}

                                    </x-span>
                                    @endforeach


                                </td>

                                <td class="px-6 py-4">
                                    <x-span
                                        class="cursor-pointer {{ $chain->status == 'active' ? 'bg-teal-500 text-white' :'bg-red-500 text-gray-300' }}"
                                        wire:click='updateAiStatus({{ $chain->id }})'>{{ $chain->status }}</x-span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <x-a href="#" class="mx-1">
                                            Edit
                                        </x-a>
                                        <x-button wire:click='delete({{ $chain->id }})'>
                                            Delete
                                        </x-button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
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
                    {{ $chains->links() }}
                </div>

            </div>
        </section>
    </div>

</main>