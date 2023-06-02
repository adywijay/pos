@extends('guest.page.kerangka_panggil')
@section('list_content')
    <div class="parallax-container center valign-wrapper">
        <div class="container">
            <form id="frm-search">
                @csrf
                <blockquote>
                    <i>
                        <span class="white-text">Total produk terinput &nbsp;
                            {{ $publish }}
                        </span>
                    </i>
                </blockquote>
                <div class="card card-input">
                    <input id="search" placeholder="Silakan input nama produk berdasarkan field 'title' pada db" type="text" name="search">
                    <i class="material-icons grey-text">search</i>
                </div>
                <div class="modal-footer">
                    <button id="submit" class="btn waves-effect waves-light red" type="submit">cari
                    </button>
                </div>
            </form>
        </div>

        <div class="parallax">
            <img src="{{ asset('load_extern/images/bg/office.jpg') }}" alt="Unsplashed background img 1">
        </div>

    </div>
    <section id="gallery" class="section section-gallery scrollspy">
        <div class="container">
            <h4 class="center">
                <blockquote><i><span class="orange-text">Searching product result &nbsp; <i
                                class="material-icons small">search</i></span></i></blockquote>
                <div class="progress" id="loader">
                    <div class="indeterminate"></div>
                </div>
            </h4>
            {{-- <div class="row" id="konten-hasil"></div> --}}

        </div>
    </section>
    <!-- Modal 1 (for add data)-->
    <div id="modal1" class="modal">
        <div class="modal-content" style="border-radius: 5px;">
            <form id="product-form">
                @csrf
                {{-- <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Nama Produk" name="title" id="title" type="text" class="validate" required="">
                            <label id="title" for="title" class="red-text">Nama Produk *</label>
                        </div>
                        <div class="input-field col s6">
                            <input placeholder="Deskripsi" name="description" id="description" type="text" class="validate" required="">
                            <label id="description" for="description" class="red-text">Deskripsi *</label>
                        </div>
                    </div> --}}

                <div class="row">
                    <div class="input-field col s6">
                        <input name="title" id="title" type="text" class="validate" required=""
                            placeholder="Nama Produk">
                        <label id="title" for="title" class="red-text">Nama Produk *</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="description_product" id="description_product" type="text" class="validate"
                            required="" placeholder="Deskripsi Produk">
                        <label id="description_product" for="description_product" class="red-text">Deskripsi *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Link Tumbnail Produk" name="thumbnail" id="thumbnail" type="text"
                            class="validate" required="">
                        <label id="thumbnail" for="thumbnail" class="red-text">Link Tumbnail Produk *</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea name="image" id="image" class="materialize-textarea" placeholder="link url"></textarea>
                        <label for="image">Link Foto Produk *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input placeholder="Brand" id="brand" type="text" class="validate" required="">
                        <label id="brand" for="brand" class="red-text">Brand *</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="category" id="category">
                            <option value="" disabled selected></option>
                            <option value="smartphones">Smartphones</option>
                            <option value="laptops">Laptops</option>
                            <option value="fragance">Fragance</option>
                            <option value="skincare">Skincare</option>
                            <option value="groceries">Groceries</option>
                            <option value="home_decoration">Home Decoration</option>
                        </select>
                        <label id="category" for="category" class="red-text">Kategori *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input placeholder="Harga" name="price" id="price" type="number" class="validate"
                            required="">
                        <label id="price" for="price" class="red-text">Harga *</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Diskon" name="discon_percentage" id="discon_percentage" type="number"
                            class="validate" required="">
                        <label id="discon_percentage" for="discon_percentage" class="red-text">Diskon *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <div class="range-field">
                            <input type="range" name="rating" id="rating" min="0" max="100" />
                        </div>
                        <div class="red-text"><label id="rating" for="rating">Rating *</label></div>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="stock" name="stock" id="stock" type="number" class="validate"
                            required="">
                        <label id="stock" for="stock" class="red-text">Stock *</label>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <div class="row center">
                    <button id="submit-form" class="btn waves-effect waves-light orange accent-4" type="submit"
                        onclick="addproduct()">Simpan
                    </button>
                    <a href="javascript:void(0)" onclick="tutupFormAddProduct()"
                        class="btn waves-effect waves-light orange accent-4">Tutup</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal 1-->

    <!-- Modal 2 (for add data)-->
    <div id="modal2" class="modal">
        <div class="modal-content" style="border-radius: 5px;">
            <form id="product-form-edit">

                @csrf
                <input hidden name="id" id="id" type="number" class="validate" required="">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="title2" id="title2" type="text" class="validate" required=""
                            placeholder="Nama Produk">
                        <label id="title2" for="title2" class="red-text">Nama Produk *</label>
                    </div>
                    <div class="input-field col s6">
                        <input name="description_product" id="description_product2" type="text" class="validate"
                            required="" placeholder="Deskripsi Produk">
                        <label id="description_product2" for="description_product2" class="red-text">Deskripsi *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Link Tumbnail Produk" name="thumbnail2" id="thumbnail2" type="text"
                            class="validate" required="">
                        <label id="thumbnail2" for="thumbnail2" class="red-text">Link Tumbnail Produk *</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea name="image2" id="image2" class="materialize-textarea" placeholder="link url"></textarea>
                        <label for="image">Link Foto Produk *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input placeholder="Brand" id="brand2" type="text" class="validate" required="">
                        <label id="brand2" for="brand2" class="red-text">Brand *</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <select name="category2" id="category2">
                            <option value="" disabled></option>
                            <option value="smartphones">Smartphones</option>
                            <option value="laptops">Laptops</option>
                            <option value="fragance">Fragance</option>
                            <option value="skincare">Skincare</option>
                            <option value="groceries">Groceries</option>
                            <option value="home_decoration">Home Decoration</option>
                        </select>
                        <label id="category2" for="category2" class="red-text">Kategori *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <input placeholder="Harga" name="price2" id="price2" type="number" class="validate"
                            required="">
                        <label id="price2" for="price2" class="red-text">Harga *</label>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="Diskon" name="discon_percentage2" id="discon_percentage2" type="number"
                            class="validate" required="">
                        <label id="discon_percentage2" for="discon_percentage2" class="red-text">Diskon *</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 m6">
                        <div class="range-field">
                            <input type="range" name="rating2" id="rating2" min="0" max="100" />
                        </div>
                        <div class="red-text"><label id="rating2" for="rating2">Rating *</label></div>
                    </div>
                    <div class="input-field col s12 m6">
                        <input placeholder="stock" name="stock2" id="stock2" type="number" class="validate"
                            required="">
                        <label id="stock2" for="stock2" class="red-text">Stock *</label>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <div class="row center">
                    <button id="submit-form" class="btn waves-effect waves-light orange accent-4" type="submit"
                        onclick="simpan_edit_product()">Simpan
                    </button>
                    <a href="javascript:void(0)" onclick="tutup()"
                        class="btn waves-effect waves-light orange accent-4">Tutup</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal 1-->
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
        <div class="right-align">
            <a href="javascript:void(0)" onclick="callFormAddProduct()"
                class="modal-trigger btn-floating btn-medium waves-effect waves-light red"><i
                    class="material-icons">add_shopping_cart</i></a>
        </div>

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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="list-isi-tabel">
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script type='text/javascript'>
        function callFormAddProduct() {
            $('#modal1').modal('open');
        }
        function tutupFormAddProduct() {
            $('#modal1').trigger('reset');
            $('#modal1').modal('close');
        }

        function addproduct() {
            Swal.fire({
                title: "Simpan.?",
                icon: 'question',
                text: "Apakah anda yakin.!",
                showCancelButton: !0,
                confirmButtonText: "Ya, simpan.!",
                cancelButtonText: "Tidak, batal.!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    $('#loader').show();
                    var title = $('#title').val();
                    var description_product = $('#description_product').val();
                    var price = $('#price').val();
                    var discon_percentage = $('#discon_percentage').val();
                    var rating = $('#rating').val();
                    var stock = $('#stock').val();
                    var brand = $('#brand').val();
                    var category = $('#category').val();
                    var thumbnail = $('#thumbnail').val();
                    var image = $('#image').val();

                    //alert(discon_percentage + ' ' + image);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('add_products') }}",
                        dataType: 'json',
                        cache: false,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            title: title,
                            description_product: description_product,
                            price: price,
                            discon_percentage: discon_percentage,
                            rating: rating,
                            stock: stock,
                            brand: brand,
                            category: category,
                            thumbnail: thumbnail,
                            image: image
                        },
                        success: function(data) {
                            $("#loader").hide();

                            //console.log(data);

                            if (data['respon_code'] === 201) {
                                Swal.fire('Sukses!', data['message'], 'success');
                                // refresh page after 2 seconds
                                setTimeout(function() {
                                    location.reload();
                                }, 2000);
                            } else {
                                Swal.fire('Gagal!', data['message'], 'warning');
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            });
        }

        function simpan_edit_product() {
            Swal.fire({
                title: "Simpan perubahan.?",
                icon: 'question',
                text: "Apakah anda yakin.!",
                showCancelButton: !0,
                confirmButtonText: "Ya, simpan.!",
                cancelButtonText: "Tidak, batal.!",
                reverseButtons: !0
            }).then(function(e) {

                if (e.value === true) {
                    $('#loader').show();
                    var id = $('#id').val();
                    var title = $('#title2').val();
                    var description_product = $('#description_product2').val();
                    var price = $('#price2').val();
                    var discon_percentage = $('#discon_percentage2').val();
                    var rating = $('#rating2').val();
                    var stock = $('#stock2').val();
                    var brand = $('#brand2').val();
                    var category = $('#category2').val();
                    var thumbnail = $('#thumbnail2').val();
                    var image = $('#image2').val();

                    //alert(discon_percentage + ' ' + image);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('update_products') }}",
                        dataType: 'json',
                        cache: false,
                        type: "PUT",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            id: id,
                            title: title,
                            description_product: description_product,
                            price: price,
                            discon_percentage: discon_percentage,
                            rating: rating,
                            stock: stock,
                            brand: brand,
                            category: category,
                            thumbnail: thumbnail,
                            image: image
                        },
                        success: function(data) {
                            $("#loader").hide();

                            //console.log(data);

                            if (data['respon_code'] === 200) {
                                Swal.fire('Sukses!', data['message'], 'success');
                            } else {
                                Swal.fire('Gagal!', data['message'], 'warning');
                            }
                        }
                    });

                } else {
                    e.dismiss;
                }

            });
        }

        function tutup() {
            $('#modal2').trigger('reset');
            $('#modal2').modal('close');
        }

        function batal_edit_product() {
            $('#modal2').trigger('reset');
            $('#modal2').modal('close');
        }


        function getbyproduct(id) {
            $.get('getby_product/' + id, function(data) {
                $("#modal2").modal('open');
                $("#id").val(data.id);
                $('#title2').val(data.title);
                $('#description_product2').val(data.description_product);
                $('#price2').val(data.price);
                $('#discon_percentage2').val(data.discon_percentage);
                $('#rating2').val(data.rating);
                $('#stock2').val(data.stock);
                $('#brand2').val(data.brand);
                $('#category2').val(data.category).change();
                $('#thumbnail2').val(data.thumbnail);
                $('#image2').val(data.image);
            });
        }


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

            $('input.autocomplete').autocomplete({
                data: {
                    "Apple": null,
                    "Microsoft": null,
                    "Google": 'https://placehold.it/250x250'
                },
            });

            $('#frm-search').on('submit', function(event) {
                event.preventDefault();
                var search = $('#search').val();
                if (search === '') {
                    alert('Url Tidak boleh kosong');
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('search_products') }}",
                        dataType: 'json',
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            search: search
                        },
                        beforeSend: function() {
                            $("#loader").show();
                        },
                        success: function(data) {
                            //console.log(data);
                            $('#loader').hide();
                            $('#frm-search').trigger("reset");
                            let html = "";
                            $(data).each(function(i, data) {
                                html += '<tr>' +
                                        '<td>' + data.title + '</td>' +
                                        '<td>' + data.price + '</td>' +
                                        '<td>' + data.brand + '</td>' +
                                        '<td>' + data.discon_percentage + '</td>' +
                                        '<td>' + '<a href="' + data.thumbnail + '" target="_blank">' + 'Details' + '</a></td>' +
                                            '<td><a href="javascript:void(0)" onclick="getbyproduct(' + data.id +')"' +
                                            'class="modal-trigger btn-floating btn-small waves-effect waves-light blue nopadding">' +
                                            '<i class="medium material-icons white-text">edit</i></a>' + '</td>' +
                                    '</tr>';
                            })
                            $('#list-isi-tabel').html(html);
                        }
                    })
                }
            });

            // $('#product-form').on('submit', function(event) {
            //     event.preventDefault();
            //     var title = $('#title').val();
            //     var description_product = $('#description_product').val();
            //     var price = $('#price').val();
            //     var discon_percentage = $('#discon_percentage').val();
            //     var rating = $('#rating').val();
            //     var stock = $('#stock').val();
            //     var brand = $('#brand').val();
            //     var category = $('#category').val();
            //     var thumbnail = $('#thumbnail').val();
            //     var image = $('#image').val();

            //     swal({
            //             title: "Apakah anda yakin.?",
            //             type: "warning",
            //             buttons: true,
            // dangerMode: false,
            //             showCancelButton: true,
            //             confirmButtonColor: "#DD6B55",
            //             confirmButtonText: "Yes, delete it!",
            //             closeOnConfirm: false
            //         },
            //         function() {
            //             swal("Deleted!", "Your imaginary file has been deleted.", "success");
            //         }).then((simpan) => {
            //         if (simpan) {
            //             $("#load").show();
            //             var formdata = $("#form-input-gejala").serialize();
            //             $.ajax({
            //                 type: 'POST',
            //                 url: "",
            //                 cache: false,
            //                 dataType: 'json',
            //                 data: formdata + '&simpan=1',
            //                 success: function(msg) {
            //                     $("#load").hide();
            //                     if (msg.code == 200) {
            //                         swal({
            //                             title: "Sukses",
            //                             text: msg.msg,
            //                             type: "success",
            //                             icon: "success",
            //                         });
            //                     } else {
            //                         swal("Gagal!", msg.msg, "warning")
            //                     }
            //                 },
            //                 error: function() {
            //                     $("#load").hide();
            //                     swal("Gagal!",
            //                         "Proses simpan data gagal, silahkan ulangi lagi",
            //                         "warning")
            //                 }
            //             });
            //         }
            //     });


            // });

        });
    </script>
@endsection
