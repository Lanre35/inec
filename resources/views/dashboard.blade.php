<x-layout>
    <div class="get">

    <div class="py-4">
        @if(session('success'))
            <span class="alert alert-success mt-4 mx-auto">{{ session('success') }}</span>
        @endif
    </div>

    <x-nav/>

    <div class="container mt-4">
        <div>
            <h1 class="text-center">Welcome to the INEC Results Dashboard</h1>
            <p class="text-center">Use the navigation above to view results by polling unit or see the total results.</p>
        </div>
    </div>

    </div>

</x-layout>





