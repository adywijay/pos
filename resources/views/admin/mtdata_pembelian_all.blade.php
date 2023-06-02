@extends('admin.page.kerangka_panggil')
@section('list_content')
    <div class="row">
        <div id="man" class="col s12">
            <div class="card material-table" style="border-radius: 5px;">
                <div class="table-header">
                    <span class="table-title">List data pembelian</span>

                </div>
                <table class="responsive-table" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Id</th>
                            <th>Cashier Id</th>
                            <th>Qty</th>
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
                url: "{{ route('buyers_data') }}",
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
                            bodyData+="<td>"+ row.id+"</td><td>"+row.product_id+"</td><td>"+row.cashier_id+"</td><td>"+row.qty+"</td>";
                            bodyData+="</tr>";

                        })
                    $("#data_product").append(bodyData);
                }
            });
        }
    </script>
@endsection
