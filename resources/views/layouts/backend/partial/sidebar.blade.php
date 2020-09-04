<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ url('storage/profile/'.Auth::user()->image) }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <li class="{{ Request::is('admin/product*') ? 'active' : '' }}">
                <a href="{{ route('product.index') }}">
                    <i class="material-icons">view_headline</i>
                    <span>Products</span>
                </a>
            </li>
            {{-- <li class="{{ Request::is('admin/client*') ? 'active' : '' }} {{ Request::is('admin/status/client*') ? 'active' : '' }} {{ Request::is('admin/poc/client*') ? 'active' : '' }} {{ Request::is('admin/deactivate/client*') ? 'active' : '' }} {{ Request::is('admin/dormant/client*') ? 'active' : '' }} {{ Request::is('admin/unconverted_poc/client*') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled">
                    <i class="material-icons">people</i>
                    <span>Clients</span>
                </a>
                <ul class="ml-menu" style="display: block;">
                    <li>
                        <a href="{{ route('client.create') }}" class=" waves-effect waves-block">Add Client</a>
                    </li>
                    <li>
                        <a href="{{ route('client.status') }}" class=" waves-effect waves-block">Inactive Clients</a>
                    </li>
                    <li>
                        <a href="{{ route('client.poc') }}" class=" waves-effect waves-block">POC's Clients</a>
                    </li>
                </ul>
            </li> --}}
            <li class="{{ Request::is('admin/client*') ? 'active' : '' }} {{ Request::is('admin/status/client*') ? 'active' : '' }} {{ Request::is('admin/poc/client*') ? 'active' : '' }} {{ Request::is('admin/deactivate/client*') ? 'active' : '' }} {{ Request::is('admin/dormant/client*') ? 'active' : '' }} {{ Request::is('admin/unconverted_poc/client*') ? 'active' : '' }}">
                    <a href="{{ route('client.index') }}">
                        <i class="material-icons">people</i>
                        <span>Clients</span>
                    </a>
            </li>
            <li class="{{ Request::is('admin/device*') ? 'active' : '' }} {{ Request::is('admin/status/device*') ? 'active' : '' }} {{ Request::is('admin/lost/device*') ? 'active' : '' }}">
                <a href="{{ route('device.index') }}">
                    <i class="material-icons">phone_android</i>
                    <span>Devices</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/phone*') ? 'active' : '' }}">
                <a href="{{ route('phone.index') }}">
                    <i class="material-icons">device_unknown</i>
                    <span>Device Models</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/simcard*') ? 'active' : '' }}">
                <a href="{{ route('simcard.index') }}">
                    <i class="material-icons">sim_card</i>
                    <span>Simcard Type</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/contact*') ? 'active' : '' }}">
                <a href="{{ route('contact.index') }}">
                    <i class="material-icons">contacts</i>
                    <span>Contacts</span>
                </a>
            </li>
                <li class="header">System</li>

            <li class="{{ Request::is('admin/settings*') ? 'active' : '' }}">
                <a href="{{ route('admin.settings') }}">
                    <i class="material-icons">settings</i>
                    <span>Settings</span>
                </a>
            </li>

                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    {{--<div class="legal">--}}
        {{--<div class="copyright">--}}
            {{--&copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.--}}
        {{--</div>--}}
        {{--<div class="version">--}}
            {{--<b>Version: </b> 1.0.5--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
