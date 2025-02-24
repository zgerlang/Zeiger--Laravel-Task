@extends('layout.admin.master')
@section('content')
    <div class="max-w-lg mx-auto bg-white border border-gray-300 rounded-lg shadow-lg p-6">

        {{-- Display Success Message --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Display Error Message --}}
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Add New Product</h2>
            <a class="bg-blue-500 text-white px-3 py-1 rounded" href="{{ route('admin.products.index') }}">Back</a>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            {{-- Name Field --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Name:</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                    type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price Field --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Price (RM):</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                    type="text" name="price" placeholder="99.90" value="{{ old('price') }}">
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Details Field --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Detail:</label>
                <textarea class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500"
                    name="details" placeholder="Detail" rows="4">{{ old('details') }}</textarea>
                @error('details')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Publish Field --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Publish:</label>
                <div class="flex items-center space-x-4">
                    <label class="flex items-center">
                        <input class="text-blue-500 focus:ring-blue-500" type="radio" name="publish" value="yes"
                            {{ old('publish') == 'yes' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">Yes</span>
                    </label>
                    <label class="flex items-center">
                        <input class="text-blue-500 focus:ring-blue-500" type="radio" name="publish" value="no"
                            {{ old('publish') == 'no' ? 'checked' : '' }}>
                        <span class="ml-2 text-gray-700">No</span>
                    </label>
                </div>
                @error('publish')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit Button --}}
            <div class="text-center">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
