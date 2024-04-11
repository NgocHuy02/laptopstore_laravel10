@extends('layouts.app')

@section('title', 'Home Brand List')

@section('contents')
<div>
    <h1 class="font-bold text-2xl ml-3">Home Brand List</h1>
    <a href="{{ route('admin/brands/create') }}" class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Brand</a>
    <hr />
    @if(Session::has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Image</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($brand->count() > 0)
            @foreach($brand as $rs)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4">
                    {{ $rs->name }}
                </td>
                <td class="px-6 py-4">
                    <div class="w-20 h-20">
                        <img class="w-full h-full object-cover" src="{{ asset($rs->image) }}" alt="{{ $rs->name }}">
                    </div>
                </td>
                <td class="w-36 px-6 py-4">
                    <div class="flex items-center">
                        <a href="{{ route('admin/brands/show', $rs->id) }}" class="text-blue-800 hover:underline">Detail</a>
                        <a href="{{ route('admin/brands/edit', $rs->id)}}" class="text-green-800 ml-2 hover:underline">Edit</a>
                        <form action="{{ route('admin/brands/destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Delete?')" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-800 hover:underline">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center py-4" colspan="5">Brand not found</td>
            </tr>
            @endif
        </tbody>
    </table>

</div>
@endsection