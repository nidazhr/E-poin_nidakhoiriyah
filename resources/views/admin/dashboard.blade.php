<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
</head>
<body>
      
<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementByid('logout-form').submit();">Logout</a>
<from id="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
</form>
<h1>Dashboard Admin</h1>
@if ($message = Session::get('success'))

<p>{{ $message }}</p>
@else
<p>You are logged in!</p>
@endif


</body>

<footer>

</footer>
</html>