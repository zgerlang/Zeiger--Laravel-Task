@extends('layout.admin.master')
@section('content')
    <div class="max-w-md mx-auto bg-white border border-gray-300 rounded-lg shadow-lg p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Show Product</h2>
            <a class="bg-blue-500 text-white px-3 py-1 rounded" href="#">Back</a>
        </div>
        <div class="text-gray-800">
            <p><span class="font-semibold">Name:</span> {{ $product->name }}</p>
            <p><span class="font-semibold">Price:</span>{{ $product->price }}</p>
            <p><span class="font-semibold">Details:</span>{{ $product->details }}</p>
            <p><span class="font-semibold">Publish:</span> {{ $product->publish }}</p>
        </div>
    </div>
@endsection
