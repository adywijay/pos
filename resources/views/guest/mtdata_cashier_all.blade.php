@extends('admin.page.kerangka_panggil')
@section('list_content')
    <div class="row">
        <div id="man" class="col s12">
            <div class="card material-table" style="border-radius: 5px;">
                <div class="table-header">
                    <span class="table-title">List data product</span>

                </div>
                <table class="responsive-table" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Cashier Name</th>
                            <th>Username</th>
                            <th>status</th>
                        </tr>
                    </thead>
                    <tbody id="data_product">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type='text/javascript'>

    $(document).ready(function() {
            getIndex();
        });

        function getIndex() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('cashier_data') }}",
                dataType: 'json',
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    console.log(dataResult['data']);
                    var resultData = dataResult['data'];
                    var bodyData = '';

                        $.each(resultData,function(index, row){
                            bodyData+="<tr>"
                            bodyData+="<td>"+ row.id+"</td><td>"+row.cashier_name+"</td><td>"+row.username+"</td><td>"+row.status+"</td>";
                            bodyData+="</tr>";

                        })
                    $("#data_product").append(bodyData);
                }
            });
        }
    </script>
@endsection
