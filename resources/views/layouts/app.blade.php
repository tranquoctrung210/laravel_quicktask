<!DOCTYPE html>
<html>
    <head>
        <title>{{ __('title') }}</title>

        <!-- CSS And JavaScript -->
    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
                <a href="{!! route('user.change-language', ['en']) !!}">English</a>
                <a href="{!! route('user.change-language', ['vi']) !!}">Vietnam</a>
            </nav>
        </div>

        @yield('content')
    </body>
</html>