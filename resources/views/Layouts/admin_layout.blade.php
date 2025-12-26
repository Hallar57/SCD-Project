<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Registration/Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href='{{asset('css/layout.css')}}' rel="stylesheet">
</head>
<body>

@include('Include.admin_header')
@yield('content')

<div id="toast-container"
     style="
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        gap: 10px;
     ">
</div>

<script>
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.innerText = message;

        toast.style.cssText = `
            padding: 12px 16px;
            border-radius: 6px;
            color: white;
            font-weight: 500;
            min-width: 250px;
            max-width: 320px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            animation: fadeIn 0.4s, fadeOut 0.4s 2.8s;
        `;

        toast.style.backgroundColor =
            type === 'success' ? '#28a745' : '#dc3545';

        document.getElementById('toast-container').appendChild(toast);

        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    @if (session('success'))
    showToast("{{ session('success') }}", 'success');
    @endif

    @if (session('error'))
    showToast("{{ session('error') }}", 'error');
    @endif
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>
