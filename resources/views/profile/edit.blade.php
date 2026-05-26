<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto flex flex-col items-center space-y-6">
            <div class="max-w-xl w-full">
                <a href="orchestras" class="inline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 -960 960 960" width="1.5rem" fill="#000000">
                        <path d="M400-240 160-480l240-240 56 58-142 142h486v80H314l142 142-56 58Z" />
                    </svg>
                </a>
            </div>

            <div class="max-w-xl w-full">
                @include('profile.partials.update-profile-information-form')
            </div>

            <div class="max-w-xl w-full">
                @include('profile.partials.update-password-form')
            </div>

            <div class="max-w-xl w-full">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
