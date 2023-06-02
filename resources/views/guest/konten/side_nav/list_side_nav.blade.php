@section('sidenav')
    <ul id="sidebar-1" class="sidenav sidenav-fixed">
        <li>
            <div class="user-view">
                <div class="background" height="100">
                    <img src="{{ asset('load_extern/images/bg/user-profile-bg.jpg') }}">
                </div>
                <a href="#"><img class="circle" src="{{ asset('load_extern/images/user.png') }}"></a>
                <a href="#"><span class="white-text name"></span></a>
                <a href="#"><span class="white-text email"></span></a>
            </div>
        </li>
    @show
    <li>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header"><i class="material-icons">storage</i>Master Data
                </div>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="{{route('product_data')}}"><i class="material-icons">enhanced_encryption</i>View Product By URL Limit</a></li>
                        <li><a href="{{route('view_products')}}"><i class="material-icons">add_shopping_cart</i>View Product</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header hide-on-large-only show-on-small">
                    <a href="" class="btn">Logout</a>
                </div>
            </li>
        </ul>
    </li>
    <ul>
