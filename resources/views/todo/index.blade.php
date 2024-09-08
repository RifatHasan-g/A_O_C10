<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="container">
        <h1>Todo List</h1>

        <!-- Logout Button with Confirmation -->
        <form action="{{ route('logout') }}" method="POST" class="text-center mb-4" onsubmit="return confirm('Are you sure you want to log out?');">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        <!-- Form to add new todo -->
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <input type="text" name="todo" placeholder="Enter new todo">
            <button type="submit">Add Todo</button>
        </form>

        <!-- Display the list of todos -->
        @if(count($todos) > 0)
            <ul>
                @foreach($todos as $id => $todo)
                    <li>
                        {{ $todo }}
                        <div>
                            <a href="{{ route('todo.edit', $id) }}">Edit</a>

                            <!-- Delete Button with Confirmation -->
                            <form action="{{ route('todo.destroy', $id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No todos yet.</p>
        @endif

        <!-- Display cookie message -->
        @if(\Cookie::get('todo_cookie'))
            <p>{{ \Cookie::get('todo_cookie') }}</p>
        @endif
    </div>

</body>
</html>
