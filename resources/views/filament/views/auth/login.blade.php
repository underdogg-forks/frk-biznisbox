{{-- Converted Blade template for Laravel Filament --}}
{{-- This template requires Filament components and controller data --}}
{{-- Vue components are marked with TODO comments for conversion --}}

<div id="auth_login_page">
        <div class="flex justify-center items-center h-screen">
            <div class="p-2 shadow-md border border-surface-300 rounded-md w-full md:w-96 mx-4">
                {{-- TODO: Start LoadingScreen Filament equivalent --}}
                    <img
                        class="w-32 h-32 mx-auto"
                        alt="logo"
                    />

                    <h1 class="text-center text-2xl font-bold mb-4 dark:text-surface-200">
                        {{ __("auth.login") }}
                    </h1>
                    <form method="POST">
                        @csrf
                        {{-- TODO: Convert TextInput to Filament equivalent --}}
                        {{-- TODO: Convert PasswordInput to Filament equivalent --}}

                        {{-- TODO: Convert OtpInput to Filament equivalent --}}
                        {{-- TODO: Convert Button to Filament equivalent --}}
                    </form>
                {{-- TODO: End LoadingScreen --}}
            </div>
        </div>
    </div>