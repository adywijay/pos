@extends('base.kerangka_panggil')
@section('list_content')
    <div class="container">
        <div class="row">
            <div class="col s12">
                @include('admin.page.flash_message')
                <div class="card z-depth-5" style="border-radius: 6px;">
                    <nav class="orange darken-4">
                        <span class="card-title center-align"><i>Welcome</i></span>
                    </nav>
                    <div class="card-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea quidem ad cum animi voluptate
                            architecto voluptas aperiam tempora saepe, enim fugiat, earum quam, cumque reprehenderit? Porro
                            blanditiis ex commodi quidem?
                        </p>
                    </div>
                    <div class="card-action">
                        <div id="div" class="row center">
                            <ul class="collapsible z-depth">
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">access_time</i>
                                        Date Time
                                    </div>
                                    <div class="collapsible-body">
                                        <p id="dateTime" class="orange-text"></p>
                                        </i>
                                    </div>
                                </li>
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">person_pin</i>
                                        Registration
                                    </div>
                                    <div class="collapsible-body">

                                            <p>Lorem ipsum dolor sit amet.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- Modals-->
                <div id="modal1" class="modal col s6 modal-fixed-footer" style="border-radius: 7px;">
                    <nav class="orange darken-4">
                        <span class="card-title center-align"><i>Form Registrasi</i></span>
                    </nav>
                    <br>
                    <br>

                </div>
            </div>
        </div>
    </div>
    <script type='text/javascript'>
        function tutup() {
            $('#modal1').modal('close'),
                $('#role-form-edit').trigger("reset")
        }

        setInterval(() => $("#dateTime").text(new Date().toLocaleString()), 1000);
    </script>
@endsection
