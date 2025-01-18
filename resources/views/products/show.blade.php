<!-- RapideTest -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('View Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Product Details</h1>

                    <div class="space-y-6">
                        <!-- Product Name -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg overflow-x-auto">
                            <h3 class="text-lg font-semibold underline">Name</h3>
                            <p class="mt-2 pl-4">{{ $product->name }}</p>
                        </div>

                        <!-- Product Description -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg max-h-96 overflow-y-auto">
                            <h3 class="text-lg font-semibold underline">Description</h3>
                            <p class="mt-2 pl-4">{{ $product->description }}</p>
                        </div>

                        <!-- Product Price -->
                        <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg">
                            <h3 class="text-lg font-semibold underline">Price</h3>
                            <p class="mt-2 pl-4">{{ number_format($product->price, 2) }}</p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('products.index') }}" class="inline-block px-4 py-2 text-sm text-white bg-pink-700 hover:bg-pink-800 rounded">
                            Back to List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
