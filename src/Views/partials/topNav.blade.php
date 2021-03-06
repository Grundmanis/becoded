
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="#">BeCoded Admin</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Open website" href="/" role="button">
                        <i class="material-icons">tab</i>
                    </a>
                </li>
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count">{{count($top_logs)}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                @foreach($top_logs as $log)
                                    <li>
                                        <a href="{{ route('becoded.logs') }}">
                                            @if (!empty($log->icon))
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">{{ $log->icon }}</i>
                                                </div>
                                            @endif
                                            <div class="menu-info">
                                                <h4>{{ $log->text }}</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> {{ $log->created_at }}
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="{{ route('becoded.logs') }}">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                {{--<li class="dropdown">--}}
                    {{--<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">--}}
                        {{--<i class="material-icons">flag</i>--}}
                        {{--<span class="label-count">9</span>--}}
                    {{--</a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li class="header">TASKS</li>--}}
                        {{--<li class="body">--}}
                            {{--<ul class="menu tasks">--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<h4>--}}
                                            {{--Footer display issue--}}
                                            {{--<small>32%</small>--}}
                                        {{--</h4>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<h4>--}}
                                            {{--Make new buttons--}}
                                            {{--<small>45%</small>--}}
                                        {{--</h4>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<h4>--}}
                                            {{--Create new dashboard--}}
                                            {{--<small>54%</small>--}}
                                        {{--</h4>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<h4>--}}
                                            {{--Solve transition issue--}}
                                            {{--<small>65%</small>--}}
                                        {{--</h4>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0);">--}}
                                        {{--<h4>--}}
                                            {{--Answer GitHub questions--}}
                                            {{--<small>92%</small>--}}
                                        {{--</h4>--}}
                                        {{--<div class="progress">--}}
                                            {{--<div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li class="footer">--}}
                            {{--<a href="javascript:void(0);">View All Tasks</a>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                <!-- #END# Tasks -->
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>
    </div>
</nav>