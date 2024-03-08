<div id="tab4" class="tab-pane">
    <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-5">
        B&N API Tokens Setting
    </h3>
    <div class="space-y-5">
        <div class="mt-8">
            <form action="">
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="fname" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">
                            Name</label>
                        <x-input type="text" class="bg-gray-300 p-4 rounded-lg h-14 border-none"
                            name="fname" placeholder="enter website name..." />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="slug"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Slug</label>
                        <x-input type="text" class="bg-gray-300 p-4 rounded-lg h-14 border-none"
                            name="slug" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="slug"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">API
                            Token</label>
                        <x-input type="text" class="bg-gray-300 p-4 rounded-lg h-14 border-none"
                            name="slug" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="status"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Status</label>
                        <select id="status" name="status" wire:model.live='status'
                            class="border-none focus-none border  text-gray-900 text-sm rounded-lg w-full p-2.5 h-14  dark:text-white">
                            <option value="all">Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>
                        </select>
                    </div>

                </div>

                <div class="flex justify-end">
                    <button class="rounded-lg bg-success-300 text-white font-semibold mt-10 py-3.5 px-4">
                        Save Setting
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>