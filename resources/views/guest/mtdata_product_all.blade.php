@extends('guest.page.kerangka_panggil')
@section('list_content')
    <div class="carousel carousel-slider center">
        <div class="carousel-fixed-item center" style="height: 200px; !important">
            <div class="container">
                <form id="frm-search">
                    <blockquote class="white-text"><i>Silakan menggunkan inputan URL : https://dummyjson.com/products</i>
                    </blockquote>
                    @csrf
                    <div class="card card-input">
                        <input placeholder="Silakan input link disini" type="text" name="url" id="url">
                        <i class="material-icons grey-text">search</i>
                    </div>
                    <div class="modal-footer">
                        <button id="submit" class="btn waves-effect waves-light red" type="submit">submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="carousel-item red white-text" href="#one!">
            {{-- <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p> --}}
        </div>
        <div class="carousel-item amber white-text" href="#two!">
            {{-- <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p> --}}
        </div>
        <div class="carousel-item green white-text" href="#three!">
            {{-- <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p> --}}
        </div>
        <div class="carousel-item blue white-text" href="#four!">
            {{-- <h2>First Panel</h2>
      <p class="white-text">This is your first panel</p> --}}
        </div>
    </div>
    <section id="gallery" class="section section-gallery scrollspy">
        <div class="container">
            <h4 class="center">
                <blockquote><i><span class="orange-text">Searching product result &nbsp; <i class="material-icons small">search</i></span></i></blockquote>
                <div class="progress" id="loader">
                    <div class="indeterminate"></div>
                </div>
            </h4>
            {{-- <div class="row" id="konten-hasil"></div> --}}

        </div>
    </section>
    <section>
        <style>
            :root {
                --column-fixed-width: 150px;
            }

            table {
                width: 100%;
                font-size: 13px;
            }

            /* Table Fixed Column */

            table th,
            table td {
                padding-right: 24px;
                padding-left: 24px;
                white-space: nowrap;
            }

            table th:last-of-type,
            table td:last-of-type {
                border-left: 3px solid #d0d0d0;
                border-bottom: 1px solid #d0d0d0;
                position: absolute;
                width: var(--column-fixed-width);
                right: 0;
                top: auto;
            }

            .scroll {
                width: calc(100% - var(--column-fixed-width));
                overflow: auto;
                /*box-shadow: inset -12px 0 9px -7px rgba(0,0,0,0.25);*/
                /*overflow-x: scroll;
      overflow-y: visible;*/
            }
        </style>
        <div class="card">
            <div class="scroll">
                <table class="bordered highlight">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Item Price</th>
                            <th>Brand</th>
                            <th>Dicscounts % </th>
                            <th>Tumbnails</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody id="list-isi-tabel">
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type='text/javascript'>
        $(document).ready(function() {
            $('.carousel').carousel({
                fullWidth: true,
                indicators: true,
                transition: 500
            });
            $('#loader').hide();
            autoplay();

            function autoplay() {
                $('.carousel').carousel('next');
                setTimeout(autoplay, 4500);
            }

            $('#frm-search').on('submit', function(event) {
                event.preventDefault();
                url = $('#url').val();
                if (url === '') {
                    alert('Url Tidak boleh kosong');
                } else if (url !== 'https://dummyjson.com/products') {
                    alert('Url Tidak mengarah pada alamat dummyjson.com');
                    $('#frm-search').trigger("reset");
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('tes_ae') }}",
                        dataType: 'json',
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            url: url
                        },
                        beforeSend: function() {
                            $("#loader").show();
                        },
                        success: function(data) {
                            $('#loader').hide();
                            $('#frm-search').trigger("reset");
                            let html = "";
                            $(data).each(function(i, data) {
                                html += '<tr>' +
                                    '<td>' + data.title + '</td>' +
                                    '<td>' + data.price + '</td>' +
                                    '<td>' + data.brand + '</td>' +
                                    '<td>' + data.discountPercentage + '</td>' +
                                    '<td>' + '<a href="' + data.thumbnail + '" target="_blank">'+ 'Details'+'</a>' + '</td>' +
                                    '<td>' + data.category + '</td>' +
                                    '</tr>';
                            })
                            $('#list-isi-tabel').html(html);
                        }
                    })
                }
            })
        });
    </script>
@endsection
