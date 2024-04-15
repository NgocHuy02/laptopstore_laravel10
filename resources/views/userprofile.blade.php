@extends('layouts.user')

@section('title', 'Profile Settings')

@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Profile
        </h1>
    </div>
</header>
<hr />
<form method="POST" enctype="multipart/form-data" action="" class="max-w-md mx-auto bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
        <input name="name" type="text" id="name" value="{{ auth()->user()->name }}" placeholder="Your name" class="w-full input input-bordered rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
        <input name="email" type="text" id="email" value="{{ auth()->user()->email }}" placeholder="Your email" class="w-full input input-bordered rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="mb-4">
        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
        <input name="address" type="text" id="address" value="{{ auth()->user()->address }}" placeholder="Your address" class="w-full input input-bordered rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="mb-4">
        <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image URL</label>
        <input name="image" type="text" id="image" value="{{ auth()->user()->image }}" placeholder="URL of your profile picture" class="w-full input input-bordered rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="mb-4">
        <label for="mobile" class="block text-gray-700 text-sm font-bold mb-2">Mobile</label>
        <input name="mobile" type="text" id="mobile" value="{{ auth()->user()->mobile }}" pattern="[0-9]{10}" title="Số điện thoại phải có đúng 10 chữ số" placeholder="Your mobile number" class="w-full input input-bordered rounded-md py-2 px-3 focus:outline-none focus:ring focus:border-blue-300" />
    </div>
    <div class="flex items-center justify-end mt-4">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition duration-300 ease-in-out focus:outline-none focus:ring focus:ring-blue-300">
        Save Profile
    </button>
</div>
</form>
@endsection
