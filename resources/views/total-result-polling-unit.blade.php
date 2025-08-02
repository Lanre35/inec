<x-layout>
    <x-nav/>


    <div class="border-3">
        <form action="{{ url('total') }}" method="get">
            <h1 class="mt-4 mb-4 text-center">Total Result by Polling Unit</h1>
            <div>
                 <select class="form-control w-2" name="local_government_area" id="">
                     <option value="">Select Local Government Area</option>
                    @foreach ($lga as $lg)
                        <option value="{{ $lg->lga_id }}">{{ $lg->lga_name }}</option>
                    @endforeach
            </select>
            </div>
             {{-- <div class="mt-4">
                <input type="text" name="search" placeholder="Search Polling Unit" class="form-control-lg mb-3">
            </div> --}}
            <button type="submit" class="btn btn-primary btn-lg mt-2">Search</button>
        </form>
    </div>
</x-layout>
