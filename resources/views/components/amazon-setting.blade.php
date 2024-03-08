<div id="tab2" class="tab-pane">
    <h3 class="text-2xl font-bold text-bgray-900 dark:text-white mb-5">
        Amazon API user_ids Setting
    </h3>
    <div class="space-y-5">
        <div class="mt-8">
            <form wire:submit.prevent='saveAmazon'>
                <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-6">
                    <div class="flex flex-col gap-2">
                        <label for="analyzier" class="text-base text-bgray-600 dark:text-bgray-50  font-medium">
                            Name (Should Be Amazon)</label>
                        <x-input type="text" 
                            name="analyzier" wire:model='analyzier' placeholder="enter website name..." wire:keyup='genAmazonSlug' />
                            @error('analyzier')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="slug"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Slug (Auto Generated)</label>
                        <x-input type="text" 
                            name="slug" wire:model='slug' />
                            @error('slug')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="user_id"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">API
                            User Id or User Name</label>
                        <x-input type="text" 
                            name="user_id" wire:model='user_id' />
                            @error('user_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="user_id"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">
                            Password</label>
                        <x-input type="text" 
                            name="password" wire:model='password' />
                            @error('password')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="status"
                            class="text-base text-bgray-600 dark:text-bgray-50  font-medium">Status</label>
                        <x-select id="status" name="status" wire:model='status'
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
                        <x-select id="platform" name="platform" wire:model='platform'
                           >
                            <option value="">Choose platform</option>
                            <option value="amazon">Amazon</option>
                            <option value="goodreads">GoodReads</option>
                        </x-select>
                        @error('platform')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                    </div>

                </div>

                <div class="flex justify-end my-3">
                    <x-button type="submit" class=" bg-green-500 ">
                        Save Amzon Setting
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>