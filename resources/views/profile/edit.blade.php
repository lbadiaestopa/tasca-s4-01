<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>

            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
