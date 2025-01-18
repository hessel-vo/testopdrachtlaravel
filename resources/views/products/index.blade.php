<!-- RapideTest -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-6">Product List</h1>

                    <a href="{{ route('products.create') }}" 
                       class="inline-block px-4 py-2 mb-4 text-white bg-green-600 hover:bg-green-700 rounded">
                        Add New Product
                    </a>


                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto" style="max-height: 600px;">
                        <table class="w-full border-separate border-spacing-0 border border-gray-300">
                            <thead class="sticky top-0 z-10">
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="border border-gray-300 px-4 py-2">#</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Description</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="overflow-y-auto">
                                @forelse ($products as $product)
                                    <tr class="text-center odd:bg-gray-50 even:bg-white dark:odd:bg-gray-700 dark:even:bg-gray-800">
                                        <td class="border-t border-l border-gray-300 px-4 py-2">{{ $product->id }}</td>
                                        <td class="border-t border-l border-gray-300 px-4 py-2 max-w-xs truncate">{{ $product->name }}</td>
                                        <td class="border-t border-l border-gray-300 px-4 py-2 max-w-xs truncate">{{ $product->description }}</td>
                                        <td class="border-t border-l border-gray-300 px-4 py-2">{{ number_format($product->price, 2) }}</td>
                                        <td class="border-t border-l border-gray-300 px-4 py-2">
                                            <a href="{{ route('products.show', $product->id) }}" 
                                            class="inline-block px-2 py-1 text-sm text-white bg-blue-500 hover:bg-blue-600 rounded">
                                                View
                                            </a>
                                            <a href="{{ route('products.edit', $product->id) }}" 
                                            class="inline-block px-2 py-1 text-sm text-white bg-amber-600 hover:bg-amber-700 rounded">
                                                Edit
                                            </a>
                                            <form action="{{ route('products.destroy', $product->id) }}" 
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-block px-2 py-1 text-sm text-white bg-red-500 hover:bg-red-600 rounded"
                                                        onclick="return confirm('Deleting item. Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-gray-600 dark:text-gray-400">
                                            No products found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>