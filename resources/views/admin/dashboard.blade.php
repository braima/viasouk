<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-md">
            <div class="p-4">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
            </div>
            <ul class="mt-6">
                <li class="p-4 hover:bg-gray-200"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="p-4 hover:bg-gray-200"><a href="{{ route('admin.categories') }}">Categories</a></li>
                <li class="p-4 hover:bg-gray-200"><a href="{{ route('admin.products') }}">Products</a></li>
                <li class="p-4 hover:bg-gray-200"><a href="{{ route('admin.cities') }}">City</a></li>
                <li class="p-4 hover:bg-gray-200"><a href="{{ route('admin.parameters') }}">Parameters</a></li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-semibold">Welcome to the Admin Dashboard</h1>
            <p class="mt-4">Here you can manage your application settings and content.</p>
            <!-- Add more content here -->
        </div>
    </div>
    <a href="{{ route('logout') }}" class="absolute top-4 right-4" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</body>
</html>
