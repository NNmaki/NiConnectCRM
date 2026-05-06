<x-guest-layout>

<!-- PopUp disclaimer -->
<div id="popupDisc" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 p-6 transform transition-all mb-16 mt-[10%] ml-[25%]">
        <div class="mb-4">
            <p class="text-lg font-bold text-gray-900 mb-2">Attention!</p>
            <p class="text-gray-600">This is not a real-life solution, this is a practice project made for educational purposes.</p>
            <p><br></p>
            <p class="text-gray-600">You can test NiConnect MiniCRM - system by logging in with testuser credentials.</p>
            <p><br></p>
        </div>
        <div class="flex justify-end">
            <button 
                id="close-disc-btn" 
                onclick="closePopupDisc()" 
                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                OK
            </button>
        </div>
    </div>
</div>
<!-- PopUp disclaimer -->

<div class="flex flex-col justify-center items-center p-16 bg-cover bg-center">

    <h1 class="text-3xl font-bold text-center text-gray-900 dark:text-gray-100 mb-4">
            Welcome to NiConnect CRM-System!
        </h1>
        <p class="text-center text-gray-600 dark:text-gray-400 mb-6">
            Let us help you with your customer relationship.
        </p>
        <div class="flex justify-center space-x-4">
            <a href="{{ route('login') }}" class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-base text-white uppercase tracking-wider hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                Login
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center px-8 py-3 border border-gray-300 rounded-lg font-semibold text-base text-gray-700 uppercase tracking-wider hover:bg-gray-100 focus:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-300 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                Register
            </a>
        </div>
    <!-- </div>         -->
</div>
</x-guest-layout>