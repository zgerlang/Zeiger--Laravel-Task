@extends('layout.admin.master')
@section('content')
    <div class="container mx-auto mt-8 p-4">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif
        <div class="grid columns-2 justify-end mb-4">
            <a class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                href="{{ route('admin.products.create') }}">Create New Product</a>

            <div class="flex items-center space-x-2 my-2">
                <form action="{{ route('admin.products.search') }}" method="GET">
                    <input class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                        type="text" name="search" placeholder="Search" value="{{ request('search') }}">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">No</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">Price (RM)</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">Details</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">Publish</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left font-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $product->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ number_format($product['price'], 2) }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $product->details }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $product->publish }}</td>
                            <td class="py-2 px-4 border-b border-gray-300 space-x-2">
                                <a class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600"
                                    href="{{ route('admin.products.show', $product->id) }}">Show</a>
                                <a class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600"
                                    href="{{ route('admin.products.edit', $product->id) }}">Edit</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                        type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $products->links() }}
        </div>
    </div>
@endsection
