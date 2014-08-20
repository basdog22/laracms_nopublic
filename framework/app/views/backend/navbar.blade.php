<header class="navbar">
    <div class="container-fluid expanded-panel">
        <div class="row">
            <div id="logo" class="col-xs-12 col-sm-2">
                {{ HTML::link('/backend/dashboard',Config::get('cms.brand')) }}
            </div>
            <div id="top-panel" class="col-xs-12 col-sm-10">
                <div class="row">
                    <div class="col-xs-8 col-sm-4">
                        <a href="#" class="show-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                        {{ Form::open(array('url'=>'backend/search', 'class'=>'form-search')) }}<div id="search">
                            {{ Form::text('search', null, array('placeholder'=>Lang::get('strings.search'))) }}
                            <i class="fa fa-search"></i>

                        </div>{{ Form::close() }}
                    </div>
                    <div class="col-xs-4 col-sm-8 top-panel-right">
                        <ul class="nav navbar-nav pull-right panel-menu">
                            {{ $navtools }}
                            <li class="hidden-xs">
                                <a id="addonslink" href="{{ url('addons/manage') }}" >
                                    <i class="fa fa-cogs"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">{{ Lang::get('strings.addons') }}</span>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a id="addonslink" href="{{ url('languages/manage') }}" >
                                    <i class="fa fa-globe"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">{{ Lang::get('strings.languages') }}</span>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a id="themeslink" class="ajax-link" href="{{ url('themes/manage') }}">
                                    <i class="fa fa-desktop"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">{{ Lang::get('strings.themes') }}</span>
                                </a>
                            </li>
                            <li class="hidden-xs">
                                <a id="userslink" href="{{ url('users/manage') }}" class="ajax-link">
                                    <i class="fa fa-users"></i>
                                    <span class="hidden-xs hidden-sm hidden-md">{{ Lang::get('strings.users') }}</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="http://www.gravatar.com/avatar/{{ md5(Auth::user()->email) }}" class="img-rounded" alt="avatar" />
                                    </div>
                                    <i class="fa fa-angle-down pull-right visible-lm"></i>
                                    <div class="user-mini pull-right hidden-md hidden-sm hidden-xs visible-lm">
                                        <span class="welcome">{{Lang::get('strings.welcome')}},</span>
                                        <span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span>

                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="modal-link" href="{{ url('users/profile/') }}">
                                            <i class="fa fa-user"></i>
                                            <span class="text">{{ Lang::get('strings.profile')}}</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/users/logout">
                                            <i class="fa fa-power-off"></i>
                                            <span class="text">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                                    <div class="avatar">
                                        <img src="{{ Config::get('cms.currlang.image') }}" class="img-rounded" alt="{{ Config::get('cms.currlang.title') }}" />
                                    </div>
                                    <i class="fa fa-angle-down pull-right visible-lm"></i>
                                    <div class="user-mini pull-right hidden-md hidden-sm hidden-xs visible-lm">
                                        <span class="welcome">{{ Config::get('cms.currlang.title') }},</span>
                                        <span>{{ Config::get('cms.currlang.code') }}</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach(Languages::all() as $lang)
                                    <li>
                                        <a  href="{{ url('languages/setcurrent/'.$lang->id) }}">
                                            <i class="fa fa-flag"></i>
                                            <span class="text">{{ $lang->title }}</span>
                                        </a>
                                    </li>

                                    @endforeach
                                </ul>
                            </li>
                            <li class="hidden-xs hidden-sm">
                                <a href="/backend/help" class="modal-link" id="helpdialog">
                                    <i class="fa fa-lightbulb-o"></i>

                                </a>
                            </li>
                            <li class="hidden-xs hidden-sm">
                                <a href="#" id="locked-screen">
                                    <i class="fa fa-lock"></i>

                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>