@extends('layouts.ecommerce')

@section('content')
    
<div class="md:flex items-start justify-center max-w-4xl mx-auto py-8 px-6 bg-white
shadow-md transition-shadow duration-300 hover:shadow-xl rounded-md mb-8">

    <img src="{{ $product->image }}" class="w-60 h-60 mx-auto object-contain" 
    alt="Product img">

    <div class="md:w-1/2 lg:ml-8 md:ml-6 md:mt-0 mt-6 border-l-2 pl-8">

        <div class="border-b border-gray-200 pb-6">

            <p class="text-sm leading-none text-gray-600 dark:text-gray-300 capitalize">
                {{ $product->category }}
            </p>

            <h2 class="lg:text-2xl text-xl font-semibold lg:leading-6 leading-7 
            text-gray-800 dark:text-white mt-2">
                {{ $product->name }}
            </h2>
            
        </div>

        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
          <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Colours</p>
          <div class="flex items-center justify-center">
            <p class="text-sm leading-none text-gray-600 dark:text-gray-300">Smoke Blue with red accents</p>
            <div class="w-6 h-6 bg-gradient-to-b from-gray-900 to-indigo-500 ml-3 mr-4 cursor-pointer"></div>
            <svg class="cursor-pointer text-gray-300 dark:text-white" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L5 5L1 9" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
        </div>

        <div class="py-4 border-b border-gray-200 flex items-center justify-between">
          <p class="text-base leading-4 text-gray-800 dark:text-gray-300">Size</p>
          <div class="flex items-center justify-center">
            <p class="text-sm leading-none text-gray-600 dark:text-gray-300 mr-3">38.2</p>
            <svg class="text-gray-300 dark:text-white cursor-pointer" width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M1 1L5 5L1 9" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
          </div>
        </div>

        <button class="dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-base flex items-center justify-center leading-none text-white bg-gray-800 w-full py-4 hover:bg-gray-700 focus:outline-none">
          <svg class="mr-3 text-white dark:text-gray-900" width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.02301 7.18999C7.48929 6.72386 7.80685 6.12992 7.93555 5.48329C8.06425 4.83666 7.9983 4.16638 7.74604 3.55724C7.49377 2.94809 7.06653 2.42744 6.51835 2.06112C5.97016 1.6948 5.32566 1.49928 4.66634 1.49928C4.00703 1.49928 3.36252 1.6948 2.81434 2.06112C2.26615 2.42744 1.83891 2.94809 1.58665 3.55724C1.33439 4.16638 1.26843 4.83666 1.39713 5.48329C1.52583 6.12992 1.8434 6.72386 2.30968 7.18999L4.66634 9.54749L7.02301 7.18999Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.66699 4.83333V4.84166" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M13.69 13.8567C14.1563 13.3905 14.4738 12.7966 14.6025 12.15C14.7312 11.5033 14.6653 10.8331 14.413 10.2239C14.1608 9.61476 13.7335 9.09411 13.1853 8.72779C12.6372 8.36148 11.9926 8.16595 11.3333 8.16595C10.674 8.16595 10.0295 8.36148 9.48133 8.72779C8.93314 9.09411 8.5059 9.61476 8.25364 10.2239C8.00138 10.8331 7.93543 11.5033 8.06412 12.15C8.19282 12.7966 8.51039 13.3905 8.97667 13.8567L11.3333 16.2142L13.69 13.8567Z" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M11.333 11.5V11.5083" stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          Check availability in store
        </button>

    </div>

</div>

<div class="flex-center">
    <a href="{{ route('ecommerce.index') }}" class="btn-secondary">
        <i class="material-icons mr-2">arrow_back</i> Volver al catálogo
    </a>
</div>

@endsection