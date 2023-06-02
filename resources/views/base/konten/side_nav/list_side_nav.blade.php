@section('sidenav')
    <ul id="sidebar-1" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background" height="100">
                    <img src="{{ asset('load_extern/images/bg/user-profile-bg.jpg') }}">
                </div>
                <a><img class="circle" src="{{ asset('load_extern/images/avatar/avatar-11.png') }}"></a>
                <a><span class="white-text name">sdgsdgsg</span></a>
                <a><span class="white-text email">sdfsdf</span></a>
            </div>
        </li>
    @show
    <li>

        <ul class="collapsible">
            <li>
                <div class="collapsible-header hide-on-large-only show-on-small">
                    <a href=""
                        onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Logout
                    </a>
                    <form id="frm-logout" action="" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </li>
    <ul>
