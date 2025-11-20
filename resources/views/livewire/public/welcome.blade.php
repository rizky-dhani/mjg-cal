<div class="container mx-auto px-4 py-8">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to Our Application</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            This is a public page that does not require authentication. 
            You can access this page without logging in.
        </p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Public Content</h2>
        <p class="text-gray-600 mb-4">
            This section is visible to all users, including guests who are not logged in.
            You can place any public content here that should be accessible without authentication.
        </p>
        
        <div class="mt-6">
            <a href="{{ route('login') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-300">
                Log In
            </a>
            <a href="{{ route('register') }}" class="inline-block ml-3 bg-gray-800 hover:bg-gray-900 text-white font-medium py-2 px-4 rounded transition duration-300">
                Register
            </a>
        </div>
    </div>
</div>