@extends('layouts.user')
 
@section('title', 'About Us')
 
@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            About Us
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div class="px-4 py-6 sm:px-0">
                    <div>
                        <p class="text-lg text-gray-800">
                            We are dedicated to providing high-quality laptops and excellent customer service. Our team is passionate about technology and committed to helping you find the perfect laptop for your needs.
                        </p>
                        <p class="mt-4 text-lg text-gray-800">
                            At our store, you'll find a curated selection of laptops from top brands, ensuring you get the latest technology and the best value for your money.
                        </p>
                        <p class="mt-4 text-lg text-gray-800">
                            Whether you're a student, a professional, or a gamer, we have the right laptop for you. Visit us today and experience the difference!
                        </p>
                    </div>
                </div>
                <div class="px-4 py-6 sm:px-0">
                    <div class="border-4 border-dashed border-gray-200 rounded-lg h-auto">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeVZWtfSG57DMVIAHiE1m5mXL7qp0qJqBYuIb9IkaMyA&s" alt="About Us" class="w-full h-auto rounded-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
