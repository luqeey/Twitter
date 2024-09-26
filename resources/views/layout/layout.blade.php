<!DOCTYPE html>
<html lang="EN">

<head>
    @include('layout.head')
</head>

<body>
    {{-- includovanie navbaru --}}
    @include('_template.nav')
<div class="container py-4">
    {{-- obsah --}}
    @yield('content')
</div>
    {{-- includovanie footeru --}}
    @include('layout.footer')
</body>

</html>
