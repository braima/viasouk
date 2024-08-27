<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <div class="mt-4">
                    <a href="{{ route('admin.profile') }}" class="text-gray-600 hover:text-gray-900"><i class="fas fa-user-circle"></i> My Profile</a>
                </div>
            </div>
            <ul class="mt-6">
                <li class="p-4 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-200' }}">
                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="p-4 {{ request()->routeIs('admin.categories') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-200' }}">
                    <a href="{{ route('admin.categories') }}">Categories</a>
                </li>
                <li class="p-4 {{ request()->routeIs('admin.products') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-200' }}">
                    <a href="{{ route('admin.products') }}">Products</a>
                </li>
                <li class="p-4 {{ request()->routeIs('admin.cities') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-200' }}">
                    <a href="{{ route('admin.cities') }}">City</a>
                </li>
                <li class="p-4 {{ request()->routeIs('admin.parameters') ? 'bg-gray-200 font-bold' : 'hover:bg-gray-200' }}">
                    <a href="{{ route('admin.parameters') }}">Parameters</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="flex justify-end p-4">
                <div class="mr-4">
                    <a href="{{ route('admin.profile') }}" class="text-gray-600 hover:text-gray-900"><i class="fas fa-user-circle"></i> My Profile</a>
                </div>
                <div>
                    <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-900" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
            @yield('content')
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
