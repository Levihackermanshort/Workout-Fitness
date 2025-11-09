<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Fitness Journal')</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Fitness Journal</h1>
            <nav class="navigation">
                <a href="{{ route('activities.index') }}" class="nav-link">All Activities</a>
                <a href="{{ route('activities.create') }}" class="nav-link">Add Activity</a>
                <a href="{{ route('activities.search') }}" class="nav-link">Search</a>
            </nav>
        </header>

        <main class="main-content">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} Fitness Journal. Track your workouts and stay fit!</p>
        </footer>
    </div>
</body>
</html>

