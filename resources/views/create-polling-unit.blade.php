<x-layout>
        <div class="mt-4 mx-auto">
            <div class="w-50 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="error-message">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <div class="w-50 mx-auto">
                @if(session('success'))
                    <span class="alert alert-success mt-4 mx-auto">{{ session('success') }}</span>
                @endif
            </div>
        </div>
    <x-nav/>

    <div class="container border-2 border-primary p-4">
        <h1>Create New Polling Unit</h1>
        <p>Use the form below to create a new polling unit.</p>

        <form action="{{ route('create-polling-unit.store') }}" method="post">
            @csrf

            <div class="form-group">
                <select class="form-control item mt-3" name="party" id="party">
                    <option value="">Enter party</option>
                    @foreach ($parties as $party)
                        <option value="{{ $party->partyid }}">{{ $party->partyname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control item mt-3" name="lga" id="lga">
                    <option value="">Enter Local Government Area</option>
                    @foreach ($lga as $localGovernmentArea)
                        <option value="{{ $localGovernmentArea->lga_id }}">{{ $localGovernmentArea->lga_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
               <select class="form-control item mt-3" name="wards" id="ward">
                   <option value="">Enter Ward</option>--}}
{{--                   @foreach ($wards as $ward)--}}
{{--                       <option value="{{ $ward->ward_id }}">{{ $ward->ward_name }}</option>)--}}
{{--                    @endforeach--}}
               </select>
            </div>

            <div class="form-group">
                <select class="form-control item mt-3" name="uniqueid" id="pol">
                    <option value="">Enter polling unit id</option>
{{--                    @foreach ($resultids as $id)--}}
{{--                        <option value="{{ $id->polling_unit_uniqueid }}">{{ $id->polling_unit_uniqueid }}</option>)--}}
{{--                    @endforeach--}}
                </select>
            </div>

            <div class="form-group">
                <input class="form-control mt-2" type="text" name="score" id="score" placeholder="party score">
            </div>
            <div class="form-group">
                <input class="form-control mt-2" type="date" name="date" id="date" placeholder="created date">
            </div>
            <button class="btn btn-primary" type="submit">Create Polling Unit</button>
        </form>
    </div>


</x-layout>

<script>
    $(function(){
        let lga = $('#lga');
        $('#lga').on('change',function(e){
            e.preventDefault();
            // alert(lga.val());
        $.ajax({
                url: 'http://127.0.0.1:8000/dd?lga_id='+lga.val(),
                method: 'GET',
                // dataType: 'html',
                success: function (data) {
                    // console.log(data);

                    let res = '';
                    $.each(data, function(index, item) {
                        // console.log("Index: " + index + ", Name: " + item.ward_name);
                        res = res.concat('<option value='+item.ward_id+'>' + item.ward_name + '</option>');
                    });

                    $('#ward').html(res);

                },
                error: function (xhr, status, error) {
                    res.html('<div class="alert alert-danger">Failed to load content.</div>');
                }
            });
            // console.log(cont);
        });



    });

    $(function(){
        let ward = $('#ward');
        $('#ward').on('change',function(e){
            e.preventDefault();
            // alert(ward.val());
            $.ajax({
                url: 'http://127.0.0.1:8000/pol?ward_id='+ward.val(),
                method: 'GET',
                // dataType: 'html',
                success: function (data) {
                    // console.log(data);

                    let res = '';
                    $.each(data, function(index, item) {
                        // console.log("Index: " + index + ", Name: " + item.polling_unit_id);
                        res = res.concat('<option value='+item.uniqueid+'>' + item.polling_unit_id + '</option>');
                    });

                    $('#pol').html(res);

                },
                error: function (xhr, status, error) {
                    res.html('<div class="alert alert-danger">Failed to load content.</div>');
                }
            });
            // console.log(cont);
        });



    });

</script>
