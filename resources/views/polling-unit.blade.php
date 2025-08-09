<x-layout>

    <x-nav/>
    <div>

        <h1 class="text-center mt-4">Polling Unit Result</h1>
            <div class="m-0">
                <span class="alert text-danger" id="span"></span>
            </div>
        <form action="{{ url('search') }}" method="get">
            @csrf
            <div>
                <input id="form" type="text" name="search" placeholder="Search Polling Unit" class="form-control-lg">
                <div><span class="alert text-danger" id="error-message"></span></div>
            </div>

            {{-- <div>

            </div> --}}

            <button  id="get-data" type="button" class="btn btn-primary btn-lg mt-2">Search</button>
        </form>
     </div>


     <div>
        <table class="table table-striped table-xl">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>PARTY ABBREVIATION</th>
                    <th>PARTY SCORE</th>
                </tr>
            </thead>
            <tbody id="body">
            </tbody>
        </table>
        <div class="text"></div>
     </div>
</x-layout>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script>
    $(function(){
        let p = $('#form')
        let msg = $('#error-message');

        $('#get-data').on('click',function(e){


            if(p.val())
            {

                $.ajax({
                    url: 'http://127.0.0.1:8000/ss?polling_unit_uniqueid='+ p.val(),

                    method: 'GET',
                    dataType: 'json',

                    success: function (data) {
                        let res = $('#body').empty();

                        $.each(data, function(index, item) {
                            res = $('#body').append(

                                `
                                    <tr>
                                        <td>${item.result_id}</td>
                                        <td>${item.party_abbreviation}</td>
                                        <td>${item.party_score}</td>
                                    </tr>
                                `
                            ).css({
                                'text-align' : 'center'
                            });
                        });

                        $('#table').html(res);


                        p.val('');
                        $('#error-message').text('');
                    },
                    // error: function (jqXHR, textStatus, errorThrown) {
                    // //    console.log(
                    // //     res.text('<div class="alert alert-danger">Failed to load content.</div>')
                    // //     );
                    // console.log('Error:' + errorThrown);
                    // }

                })

            }
            e.preventDefault();
            $('#error-message').text('Empty Field');

        });
    });
</script>
