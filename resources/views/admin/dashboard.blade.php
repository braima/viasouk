@extends('layouts.header')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-2xl font-semibold">Welcome to the Admin Dashboard</h1>
    <p class="mt-4">Here you can manage your application settings and content.</p>
    <div class="grid grid-cols-3 gap-4 mt-6">
        <div class="bg-white p-4 shadow rounded">
            <h2 class="font-bold">Total Users</h2>
            <p class="text-2xl">3,456</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="font-bold">Total Revenue</h2>
            <p class="text-2xl">$45,200</p>
        </div>
        <div class="bg-white p-4 shadow rounded">
            <h2 class="font-bold">Total Products</h2>
            <p class="text-2xl">2,450</p>
        </div>
    </div>
@endsection
