<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            {{--<div class="image">--}}
                {{--<img src="{{ asset('vendor/becoded/images/user.png') }}" width="48" height="48" alt="User" />--}}
            {{--</div>--}}
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('becoded_user')->user()->name }}</div>
                <div class="email">{{ Auth::guard('becoded_user')->user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('becoded.users.edit', ['id' => Auth::guard('becoded_user')->user()->id]) }}"><i class="material-icons">person</i>Profile</a></li>
                        {{--<li role="seperator" class="divider"></li>--}}
                        {{--<li><a href="javascript:void(0);"><i class="material-icons">settings_brightness</i>Edit background</a></li>--}}
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{ route('becoded.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                    <form id="logout-form" style="display: none;" method="post" action="{{route('becoded.logout')}}">{{csrf_field()}}</form>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION</li>
                <li {{ (Request::is('becoded') ? 'class=active' : '') }}>
                    <a href="{{ route('becoded.dashboard') }}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                <li {{ (Request::is('becoded/users*') ? 'class=active' : '') }}>
                    <a href="{{ route('becoded.users') }}">
                        <i class="material-icons">perm_identity</i>
                        <span>Users</span>
                    </a>
                </li>
                <li {{ (Request::is('becoded/pages*') ? 'class=active' : '') }}>
                    <a href="{{ route('becoded.pages') }}">
                        <i class="material-icons">content_copy</i>
                        <span>Pages</span>
                    </a>
                </li>
                <li style="border-bottom: 1px solid #ccc;" {{ (Request::is('becoded/logs') ? 'class=active' : '') }}>
                    <a href="{{ route('becoded.logs') }}">
                        <i class="material-icons">content_copy</i>
                        <span>Logs</span>
                    </a>
                </li>
                {{--<li {{ (Request::is('becoded/feedback') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">mode_edit</i>--}}
                        {{--<span>Feedback</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {{ (Request::is('becoded/clients') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">perm_identity</i>--}}
                        {{--<span>Clients</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {{ (Request::is('becoded/payments') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">payment</i>--}}
                        {{--<span>Payments</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {{ (Request::is('becoded/ads') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">view_module</i>--}}
                        {{--<span>Ads</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {{ (Request::is('becoded/banners') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">view_list</i>--}}
                        {{--<span>Banners</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li {{ (Request::is('becoded/complaints') ? 'class=active' : '') }}>--}}
                    {{--<a href="{{ route('becoded.dashboard') }}">--}}
                        {{--<i class="material-icons">chat_bubble_outline</i>--}}
                        {{--<span>Complaints</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2017 <a href="http://becoded.net" target="_blank">BeCoded admin</a>.
            </div>
            <div class="version">
                <b>Version: </b> 1.0
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
