@extends('frontend.profile.layout.layout')
@section('user-dashboard-content')

    <!-- Profile Details Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-8 border border-gray-100 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">👤 My Profile</h2>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        <form action="{{ route('user.profile.update') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" name="phone_number" value="{{ old('phone', auth()->user()->phone_number) }}"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="px-6 py-2 bg-luxuryBrown text-white rounded hover:bg-opacity-80 transition">
                    Update Profile
                </button>
            </div>
        </form>
    </div>

    <!-- Update Password Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">🔒 Change Password</h2>

        @if(session('password_success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <p class="font-semibold">{{ session('password_success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.password.update') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Current Password</label>
                <input type="password" name="current_password"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">New Password</label>
                <input type="password" name="new_password"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input type="password" name="new_password_confirmation"
                       class="mt-1 block w-full bg-white text-gray-800 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-opacity-50">
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="px-6 py-2 bg-luxuryBrown text-white rounded hover:bg-opacity-80 transition">
                    Update Password
                </button>
            </div>
        </form>
    </div>

@endsection
