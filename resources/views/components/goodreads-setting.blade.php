<div id="tab3" class="tab-pane">
    <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-5">
        GoodReads API Tokens Setting
    </h3>
    <div class="space-y-5">
        <div class="mt-8">
            <form wire:submit.prevent='saveGoodReads'>
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="analyzer2" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">
                            Name</label>
                        <x-input type="text" 
                            name="analyzer2" placeholder="enter website name..." wire:model='analyzer2' wire:keyup='genGoodReadSlug' />
                            @error('analyzer2')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="slug"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Slug</label>
                        <x-input type="text" 
                            name="gslug" wire:model='gslug' />
                            @error('gslug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="token"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">API
                            Token</label>
                        <x-input type="text" 
                            name="gtoken" wire:model='gtoken' />
                            @error('gtoken')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="actor_id"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Actor</label>
                        <x-input type="text" 
                            name="actor_id" wire:model='actor_id' />
                            @error('actor_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="status"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Status</label>
                        <x-select id="gstatus" name="gstatus" wire:model='gstatus'
                            >
                            <option value="all">Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">InActive</option>
                        </x-select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="platform"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Platform</label>
                        <x-select id="gplatform" name="gplatform" wire:model='gplatform'
                            >
                            <option value="">Choose platform</option>
                            <option value="goodreads">GoodReads</option>
                            <option value="amazon">Amazon</option>
                        </x-select>
                        @error('platform')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="flex justify-end my-3">
                    <x-button type='submit' class=" bg-green-500 ">
                        Save GoodReads Setting
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>