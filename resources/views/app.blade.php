<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    @class(['dark' => ($appearance ?? 'system') == 'dark'])
>
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <script>
        (function () {
            const appearance = '{{ $appearance ?? "system" }}';

            if (appearance === 'system') {
                const prefersDark = window
                    .matchMedia('(prefers-color-scheme: dark)')
                    .matches;

                if (prefersDark) {
                    document.documentElement.classList.add('dark');
                }
            }
        })();
    </script>

    <style>
        html {
            background-color: #f8fafc;
        }

        html.dark {
            background-color: #0f172a;
        }
    </style>

    <link
        rel="icon"
        href="/favicon.ico"
        sizes="any"
    >

    <link
        rel="icon"
        href="/favicon.svg"
        type="image/svg+xml"
    >

    <link
        rel="apple-touch-icon"
        href="/apple-touch-icon.png"
    >

    @fonts

    @viteReactRefresh

    @vite([
        'resources/css/app.css',
        'resources/js/app.tsx',
        "resources/js/pages/{$page['component']}.tsx"
    ])

    <x-inertia::head>
        <title>
            {{ config('app.name', 'Course Management System') }}
        </title>
    </x-inertia::head>
</head>

<body class="font-sans antialiased">

    <nav class="navbar">

        <div class="navbar-container">

            <div class="navbar-brand">

                <a
                    href="{{ route('courses.index') }}"
                    class="navbar-logo"
                >
                    Course Management System
                </a>

            </div>

            <div class="navbar-links">

                <a
                    href="{{ route('courses.index') }}"
                    class="navbar-link"
                >
                    Courses
                </a>

                <a
                    href="{{ route('students.index') }}"
                    class="navbar-link"
                >
                    Students
                </a>

            </div>

            <div class="navbar-actions">

                <a
                    href="{{ route('courses.create') }}"
                    class="navbar-add"
                >
                    Add Course
                </a>

            </div>

        </div>

    </nav>

    <main class="main-content">

        <x-inertia::app />

    </main>

</body>
</html>