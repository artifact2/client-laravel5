
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/">{{ env('APP_NAME')  }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="/">Documentatie</a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="/html5">HTML5</a>
            </li>
            <li class="nav-item ">
                @if ($sbObject && $sbObject->auth->token)
                <a class="nav-link enabled" href="" style="color: red;">Logout</a>
                @else
                    <a class="nav-link enabled" href="login"f>Login</a>
                @endif
            </li>
        </ul>
    </div>
</nav>
