<x-layout>
    <x-nav/>


    <div class="border-3">
        <form action="{{ route('total') }}" method="get">
            @csrf
                <h1 class="mt-4 mb-4 text-center">Total Result by Polling Unit</h1>



                <div>
                    <select class="form-control w-2" name="local_government_area" id="">
                        <option value="">Select Local Government Area</option>
                        @foreach ($lga as $lg)
                        <option value="{{ $lg->lga_id }}">{{ $lg->lga_name }}</option>
                        @endforeach
                </select>


                <span class="no-results text text-danger" style="display: none;"></span>
            </div>
            <button id="btn" type="button" class="btn btn-primary btn-lg mt-2">Search</button>
        </form>

         <table class="table table-striped table-xl mt-4">
                <thead>
                    <tr>
                        <th>Party Abbreviation</th>
                        <th>Total Score</th>
                    </tr>
                </thead>
                <tbody class="tbody">

                </tbody>
            </table>
    </div>
</x-layout>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


<script>
    $(document).ready(function() {
        let form = $('form');
        let button = $('#btn');

        button.click(function(event) {
            event.preventDefault(); // Prevent the default form submission
            if(form.find('select[name="local_government_area"]').val() === "") {
                let msg = "Please Select a Local Government Area";
                $('.no-results').text(msg).show();
                event.preventDefault();
            }
            else {
                $('.no-results').hide();
            }

            $.ajax({
                url: form.attr('action'),
                type: 'GET',
                data: form.serialize(),
                success: function(response) {
                    // console.log(response);
                    let tbody = $('.tbody').empty();
                   $.each(response, function(index, result) {
                    if(result.party_abbreviation || result.total_score) {
                        tbody = $('.tbody').append(

                                `
                                    <tr>
                                        <td>${result.party_abbreviation}</td>
                                        <td>${result.total_score}</td>
                                    </tr>
                                `
                            )
                    }


                    });
                    $(form.find('select[name="local_government_area"]')).val('');
                    $('#table').html(tbody);
                },
                // error: function(xhr, status, error) {
                //     console.error('Error fetching results:', error);
                // }
            });
        });
    });
</script>
