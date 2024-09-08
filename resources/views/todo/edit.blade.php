<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Todo</title>
</head>
<body>
    <h1>Edit Todo</h1>

    <!-- Form to edit existing todo -->
    <form action="{{ route('todo.update', $id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="todo" value="{{ $todo }}">
        <button type="submit">Update Todo</button>
    </form>
</body>
</html>
