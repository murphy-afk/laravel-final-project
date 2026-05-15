<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/js/app.js'])
  <title>@yield('title')</title>
</head>

<body class="text-light">
  <header class="bg-dark border-bottom border-secondary py-3 mb-4">
    <div class="container d-flex justify-content-between align-items-center">
      <a href="{{ route('admin.rocks.index') }}" class="text-decoration-none">
        <h2 class="fw-bold text-light m-0">🪨 Pet Rock Admin</h2>
      </a>
      <nav class="d-flex gap-3">
        <a href="{{ route('admin.rocks.index') }}" class="text-light text-decoration-none">
          All Rocks
        </a>
        <a href="{{ route('admin.rocks.create') }}" class="text-light text-decoration-none">
          Add Rock
        </a>
        <a href="{{ route('dashboard') }}" class="text-light text-decoration-none">
          Dashboard
        </a>
      </nav>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
</body>

</html>