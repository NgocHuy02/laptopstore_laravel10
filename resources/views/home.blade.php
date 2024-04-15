@extends('layouts.user')
 
@section('title', 'Home')
 
@section('contents')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Welcome to our Laptop Store
        </h1>
    </div>
</header>
<hr />
<main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <div class="px-4 py-6 sm:px-0">
                <div class="border-4 border-dashed border-gray-200 rounded-lg h-auto">
                    <img src="https://d1kivxjtmxnd4.cloudfront.net/filters:format(webp)/images/Category_Page_Banners_12-06.png" alt="Laptop Store" class="w-full h-auto rounded-lg">
                </div>
            </div>
            <div class="px-4 py-6 sm:px-0">
                <div>
                    <p class="text-lg text-gray-800">
                        Welcome to our laptop store! We offer a wide range of laptops for all your needs, whether you're a student, a professional, or a gamer. From sleek ultrabooks to powerful gaming rigs, we have something for everyone.
                    </p>
                    <p class="mt-4 text-lg text-gray-800">
                        Browse through our collection of laptops from top brands like Apple, Dell, HP, Lenovo, and more. With our competitive prices and excellent customer service, we're confident you'll find the perfect laptop to suit your needs.
                    </p>
                    <p class="mt-4 text-lg text-gray-800">
                        Start exploring our store now and find your next laptop upgrade!
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

