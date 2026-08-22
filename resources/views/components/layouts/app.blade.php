<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans antialiased">
    {{ $slot }}

    {{-- ── Global submit-button loading state ─────────────────────────
         Intercepts every form submission, disables the submit button and
         shows a spinner so users know their action is being processed.
         Restores automatically on browser back-navigation (pageshow).
    ─────────────────────────────────────────────────────────────────── --}}
    <script>
    (function () {
        var SPINNER = '<svg class="animate-spin h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>';

        document.addEventListener('submit', function (e) {
            var form = e.target;
            // Skip forms that opt out
            if (form.hasAttribute('data-no-loading')) return;
            // Skip forms targeting a new tab
            if (form.target === '_blank') return;

            var btn = form.querySelector('[type="submit"]');
            if (!btn || btn.disabled) return;

            // Preserve original state
            btn._origHTML     = btn.innerHTML;
            btn._origDisabled = btn.disabled;
            btn._origClass    = btn.className;

            // Apply loading state
            btn.disabled  = true;
            btn.innerHTML = SPINNER + '<span>Please wait…</span>';
            btn.classList.add('opacity-75', 'cursor-not-allowed', 'gap-2', 'inline-flex', 'items-center', 'justify-center');
        }, true);

        // Restore on browser back-navigation (bfcache)
        window.addEventListener('pageshow', function (e) {
            if (!e.persisted) return;
            document.querySelectorAll('[type="submit"]').forEach(function (btn) {
                if (btn._origHTML !== undefined) {
                    btn.innerHTML = btn._origHTML;
                    btn.disabled  = btn._origDisabled || false;
                    btn.className = btn._origClass   || btn.className;
                    delete btn._origHTML;
                    delete btn._origDisabled;
                    delete btn._origClass;
                }
            });
        });
    })();
    </script>
</body>
</html>
