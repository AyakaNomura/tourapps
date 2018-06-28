<header>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type=“button” class=“navbar-toggle collapsed” data-toggle=“collapse” data-target=“#bs-example-navbar-collapse-1” aria-expanded=“false”>
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-left" href="/"><img src="{{ secure_asset("images/logo.png") }}" alt="Original Tour Site"></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(\Auth::user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('users.show', \Auth::user()->id) }}">マイページ</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('user_logout.get') }}">観光者ログアウト</a>
                                </li>
                            </ul>
                        </li>
                    @elseif (Auth::guard('guide')->check())
                        <li>
                            <a href="{{ route('tours.create') }}">
                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                観光プランを作成
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="gravatar">
                                    <img src="{{ Gravatar::src(\Auth::guard('guide')->user()->email, 20) . '&d=mm' }}" alt="" class="img-circle">
                                </span>
                                {{ Auth::guard('guide')->user()->name }}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('guides.show', \Auth::guard('guide')->user()->id) }}">マイページ</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="{{ route('guide_logout.get') }}">ガイドログアウト</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('user_login') }}">観光者用ログイン</a></li>
                        <li><a href="{{ route('guide_login') }}">ガイド用ログイン</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>