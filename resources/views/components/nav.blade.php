<x-layout>
    <div class="text-right position-relative mt-2 mb-2">
        {{-- This button is for logging out --}}

        <a class="btn btn-danger" href="{{ route('logout') }}">logout</a>
    </div>
    <div class="text-center mt-0">

        <a class="btn btn-primary" href="{{ route('dashboard') }}">Home</a>
        <a class="btn btn-success" href="{{ url('polling-unit') }}">Polling Unit Result</a>
        <a class="btn btn-secondary" href="{{ route('polling-result') }}">Total Results of The Polling Units</a>
        <a class="btn btn-info" href="{{ url('create-polling-unit') }}">Create Polling Unit</a>

    </div>
</x-layout>

{{--<script src="{{asset('assets/index.js')}}"></script>--}}

<script>
    // $(function () {
    //     // Use event delegation for better performance and to handle dynamically added buttons
    //     $(document).on('click', '.btn', function (e) {
    //         alert('ok');
    //         e.preventDefault();
    //         const route = $(this).attr('href');
    //         // Find the nearest .container or fallback to global .container
    //         // const $container = $(this).closest('.container').length ? $(this).closest('.container') : $('.container');
    //         const cont = $('.container');
    //         $.ajax({
    //             url: route,
    //             method: 'GET',
    //             dataType: 'html',
    //             success: function (data) {
    //                 cont.html(data);
    //             },
    //             error: function (xhr, status, error) {
    //                 cont.html('<div class="alert alert-danger">Failed to load content.</div>');
    //             }
    //         });
    //         // console.log(cont);
    //     });
    // });
</script>


