@extends('component.main')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="text-center bg-white p-4 rounded-lg shadow-lg max-w-md">
        <div class="flex justify-center">
            <span class="material-icons text-[#8B4513] text-6xl">check_circle</span>
        </div>
        <h1 class="text-3xl font-bold text-[#8B4513] mt-4">Thank You!</h1>
        <p class="text-gray-700 mt-2">Your booking request has been successfully submitted.</p>
        <a href="{{ url('/') }}" 
           class="mt-6 inline-flex items-center bg-[#8B4513] text-white px-6 py-2 rounded-lg hover:bg-[#5A2E1A] transition duration-300 shadow-md">
            <span class="material-icons mr-2" aria-hidden="true">home</span>
            Back to Home
        </a>
    </div>
</div>
@endsection
