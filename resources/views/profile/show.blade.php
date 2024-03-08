<x-app-layout>
    <main class="w-full xl:px-12 px-6 pb-6 xl:pb-12 sm:pt-[116px] pt-[100px]">
        <div class="page-header flex items-center justify-between mr-bottom-30 bg-[#5266b0] p-[80px] rounded-lg my-2">
            <div class="left-part">
                <h2 class="text-white font-extrabold">{{ Auth::user()->name }}</h2>
                <p class="text-gray-200 font-semibold mb-0 uppercase">Welcome {{ Auth::user()->utype }} </p>
                <p class="text-gray-200 font-semibold mb-0 uppercase">Update Your Profile</p>
            </div>
            <div class="right-part">
                {{-- <a href="{{ route('admin.create_chain') }}" wire:navigate
                    class="bg-orange-600 rounded-lg text-white  fs-18 font-bold p-4"><i
                        class="fa-solid fa-hexagon-plus"></i> Create New AI Chain</a> --}}
                        <img src="{{ asset('assets/images/user-1.png') }}" class="rounded-full w-14 h-14 border-4" alt="">
            </div>
        </div>

        <div class="2xl:flex 2xl:space-x-[48px]">
            <section class="2xl:flex-1 2xl:mb-0 mb-6">

                <div>
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        @livewire('profile.update-profile-information-form')

                        <x-section-border />
                        @endif

                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.update-password-form')
                        </div>

                        <x-section-border />
                        @endif

                        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.two-factor-authentication-form')
                        </div>

                        <x-section-border />
                        @endif

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                        <x-section-border />

                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.delete-user-form')
                        </div>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </main>
</x-app-layout>