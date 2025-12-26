<!DOCTYPE html>
<html>
  <body style="background-color:black;color:white;">
    <h1>Home</h1>
    <p>Olá, {{ $name }}</p>
    
    <strong>Your habits:</strong>
    
    <ul>
      @foreach ($habits as $item)
        <li>{{ $item }}</li>
      @endforeach
    </ul>
  </body>
</html>