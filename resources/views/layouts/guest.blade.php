<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') — {{ template_config('name') }}</title>

    <style>
        :root {
            --brand: {{ template_config('color', '#6366f1') }};
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #f5f5f7;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .auth-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,.08), 0 8px 32px rgba(0,0,0,.06);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-logo .logo-icon {
            width: 48px; height: 48px;
            background: var(--brand);
            border-radius: 12px;
            display: inline-flex;
            align-items: center; justify-content: center;
            font-size: 22px; font-weight: 800; color: #fff;
            margin-bottom: 12px;
        }

        .auth-logo h1 { font-size: 20px; font-weight: 700; color: #111; }
        .auth-logo p  { font-size: 13px; color: #6b7280; margin-top: 4px; }

        .form-group { margin-bottom: 16px; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 6px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            border: 1.5px solid #e5e7eb;
            border-radius: 8px;
            font-size: 14px;
            color: #111;
            background: #fff;
            transition: border-color .15s;
            outline: none;
        }

        input:focus { border-color: var(--brand); box-shadow: 0 0 0 3px color-mix(in srgb, var(--brand) 15%, transparent); }

        .btn-primary {
            width: 100%;
            padding: 11px;
            background: var(--brand);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: opacity .15s;
        }

        .btn-primary:hover { opacity: .9; }

        .auth-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #6b7280;
        }

        .auth-footer a { color: var(--brand); text-decoration: none; font-weight: 600; }

        .error-msg { color: #dc2626; font-size: 12px; margin-top: 4px; }

        .checkbox-row {
            display: flex; align-items: center; gap: 8px;
            font-size: 13px; color: #374151;
        }

        .checkbox-row input { width: auto; }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-logo">
            <div class="logo-icon">{{ mb_substr(template_config('name', 'A'), 0, 1) }}</div>
            <h1>{{ template_config('name') }}</h1>
            <p>@yield('subtitle')</p>
        </div>

        @yield('content')
    </div>
</body>
</html>
