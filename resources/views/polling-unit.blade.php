<x-layout>

    <x-nav/>
    <div>
        <h1 class="text-center mt-4">Polling Unit</h1>
        <form action="{{ url('search') }}" method="get">
            @csrf
            <div>
                <input type="text" name="search" placeholder="Search Polling Unit" class="form-control-lg mb-3">
            </div>
            <button type="submit" class="btn btn-primary btn-lg ct">Search</button>
        </form>
     </div>


     <div>
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PARTY ABBREVIATION</th>
                    <th>PARTY SCORE</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($pollingUnitResult))


                @foreach ($pollingUnitResult as $pollingUnit)
                    <tr>
                        <td>{{ $pollingUnit->result_id }}</td>
                        <td>{{ $pollingUnit->party_abbreviation }}</td>
                        <td>{{ $pollingUnit->party_score }}</td>
                    </tr>
                @endforeach
            @endif



            </tbody>
        </table>
        {{-- {{ $name }} --}}
     </div>




</x-layout>
