<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        <style>
            :root {
                --bg: #f7f7f6;
                --card-bg: #ffffff;
                --border: #e5e5e3;
                --text: #1b1b18;
                --text-muted: #6b6b66;
                --accent: #f53003;
                --accent-hover: #d92700;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background: var(--bg);
                color: var(--text);
                font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
                padding: 1.5rem;
            }

            header.top-nav {
                width: 100%;
                max-width: 640px;
                display: flex;
                justify-content: flex-end;
                gap: 0.75rem;
                margin-bottom: 1.5rem;
            }

            header.top-nav a {
                text-decoration: none;
                font-size: 0.875rem;
                font-weight: 500;
                padding: 0.5rem 1.1rem;
                border-radius: 6px;
                border: 1px solid var(--border);
                color: var(--text);
                transition: background-color 0.15s ease, border-color 0.15s ease;
            }

            header.top-nav a.primary {
                background: var(--text);
                border-color: var(--text);
                color: #fff;
            }

            header.top-nav a:hover {
                border-color: #c9c9c5;
            }

            header.top-nav a.primary:hover {
                background: #000;
            }

            main.card {
                width: 100%;
                max-width: 480px;
                background: var(--card-bg);
                border: 1px solid var(--border);
                border-radius: 12px;
                padding: 2.5rem 2rem;
                text-align: center;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            }

            main.card h1 {
                font-size: 1.5rem;
                font-weight: 700;
                margin: 0 0 0.5rem;
            }

            main.card p.subtitle {
                color: var(--text-muted);
                font-size: 0.95rem;
                margin: 0 0 2rem;
                line-height: 1.5;
            }

            ul.links {
                list-style: none;
                padding: 0;
                margin: 0 0 2rem;
                display: flex;
                flex-direction: column;
                gap: 0.6rem;
                text-align: left;
            }

            ul.links li {
                font-size: 0.9rem;
                color: var(--text-muted);
                display: flex;
                align-items: center;
                gap: 0.6rem;
            }

            ul.links li::before {
                content: '';
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: var(--border);
                flex-shrink: 0;
            }

            ul.links a {
                color: var(--accent);
                font-weight: 500;
                text-decoration: none;
            }

            ul.links a:hover {
                color: var(--accent-hover);
                text-decoration: underline;
            }

            footer.version {
                font-size: 0.8rem;
                color: var(--text-muted);
            }

            footer.version a {
                color: var(--accent);
                text-decoration: none;
                font-weight: 500;
            }

            footer.version a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        @if (Route::has('login'))
            <header class="top-nav">
                @auth
                    <a href="{{ url('/home') }}" class="primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Entrar</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="primary">Registrar</a>
                    @endif
                @endauth
            </header>
        @endif

        <main class="card">
            <h1>{{ config('app.name', 'Laraaavel') }}</h1>
            <p class="subtitle">Bem-vindo! Este projeto está pronto para uso.</p>

            <ul class="links">
                <li>
                    Leia a <a href="https://laravel.com/docs" target="_blank">Documentação</a>
                </li>
                <li>
                    Assista tutoriais no <a href="https://laracasts.com" target="_blank">Laracasts</a>
                </li>
            </ul>

            <footer class="version">
                v{{ app()->version() }}
            </footer>
        </main>
    </body>
</html>