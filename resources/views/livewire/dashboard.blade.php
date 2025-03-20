<div class="min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-white shadow-xl z-10">
        <div class="flex flex-col h-full">
            <!-- Logo -->
            <div class="flex items-center justify-center h-16 px-4 bg-primary-700">
                <x-application-logo class="w-8 h-8" />
                <span class="ml-2 text-xl font-bold text-white">{{ config('app.name') }}</span>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <x-nav-link href="{{ route('dashboard') }}" icon="home" active>
                    Dashboard
                </x-nav-link>
                <x-nav-link href="#" icon="users">
                    Users
                </x-nav-link>
                <x-nav-link href="#" icon="cog">
                    Settings
                </x-nav-link>
            </nav>

            <!-- User Profile -->
            <div class="p-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center min-w-0">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center">
                                <span class="text-primary-700 font-medium text-sm">
                                    {{ substr(auth()->user()->email, 0, 2) }}
                                </span>
                            </div>
                        </div>
                        <div class="ml-3 min-w-0">
                            <p class="text-sm font-medium text-gray-700 truncate">
                                {{ auth()->user()->email }}
                            </p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="flex">
                        @csrf
                        <button type="submit" class="text-sm text-gray-500 hover:text-primary-700 flex items-center">
                            <x-icon name="logout" class="w-5 h-5 mr-2" />
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="ml-64">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
        <div class="mt-4">
            <!-- Your main content goes here -->
        </div>
    </div>
</div>
