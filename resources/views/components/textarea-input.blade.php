<!-- RapideTest -->

@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'block mt-1 w-full px-3 py-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) }}> {{ $slot }}</textarea>
