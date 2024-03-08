<div class="relative left-0 top-0 z-[1055]  h-full w-full overflow-y-auto overflow-x-hidden outline-none"
  aria-labelledby="modal-title" role="dialog" aria-modal="true">

  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

      <div
        class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 max-w-4xl">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div
              class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-200 sm:mx-0 sm:h-10 sm:w-10">
              <i class="fa-sharp fa-solid fa-microchip-ai"></i>
            </div>
            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">

              <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">AI Prompt Result</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">

                <form wire:submit.prevent='previewPromptResult' wire:loading.class='opacity-50'>
                  <div class="row p-2">
                    @if($file == null)
                    <div class="col-md-12 mb-2">
                      <div class="form-group">
                       
                        <x-select id="platform" name="platform" wire:model='platform'
                          >
                          <option value="">Select Platform</option>
                          <option value="amazon">Amazon</option>
                          <option value="goodreads">GoodReads</option>
                          <option value="b&n">B&N</option>
                        </x-select>
                        @error('platform')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group mb-2">
                       
                        <x-input id="product" placeholder="Enter product id or url..." type="text" name="product"
                          wire:model='product' />
                        @error('product')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    @endif
                    <div class="col-md-12">
                      <div class="mt-[55px] flex justify-center">
                        <x-button class="ms-4 py-3.5">
                          {{ __('Generate Reviews') }}
                        </x-button>
                       
                      </div>
                    </div>
                  </div>

                </form>

                <div wire:loading wire:target="previewPromptResult" class="py-5">
                  <div class="flex justify-center">
                    <img src="{{ asset('assets/images/8.svg') }}" alt="">
                  </div>
                  <p class='text-center'>{{ $loaderMessage }}</p>
                </div>


                @if($data)
                <div class="my-5">
                  {!! $data !!}
                  <!--<div class="flex justify-end mt-5"><button class="btn btn-sm bg-orange-400" wire:click='isSave'>Save Output</button></div>-->
                </div>
                @else
                <div class="my-5" wire:loading.class='opacity-0'>
                  <div class="flex justify-center ">
                    <img src="{{ asset('assets/images/sorry.svg') }}" style="width:150px;height:150px;" alt="">
                  </div>
                  <p class="text-center">Start Product Reviews Analysis by adding url / product id and selecting
                    platform</p>
                </div>
                @endif
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button type="button"
            class="inline-flex w-full justify-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 sm:ml-3 sm:w-auto"
            wire:click='isSave'>Save</button>
          <button type="button"
            class="inline-flex w-full justify-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"
            wire:click='closeModal'>Close</button>
        </div>
      </div>
    </div>
  </div>
</div>