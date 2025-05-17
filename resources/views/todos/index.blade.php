<!DOCTYPE html>
<html lang="en" class="bg-gray-100 min-h-screen">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Todo List</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center py-10">
        <div class="bg-white rounded-lg shadow-md w-full max-w-md p-6">
            <h1 class="text-2x1 font-bold text-center mb-6 text-gray-800">My Todo List</h1>
            {{-- form input todo baru --}}
            <form action="{{ route('todos.store') }}" method="POST" class="flex gap-2 mb-6">
                @csrf
                <input type="text" name="title" placeholder="What do you want to do?" required
                    class="flex-grow border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-blue-400">
                <button type="sumbit"
                    class="bg-red-800 text-white px-4 py-1 rounded hover:bg-red-900 transition">Add</button>
            </form>
            {{-- akhir form input todo baru --}}

            {{-- Daftar todo belom selesai --}}
            <div>
                <h2 class="text-xl font-semibold mb-3 text-gray-700">Pending Tasks</h2>
                <ul class="space-y-3">
                    @foreach ($incomplete as $todo)
                        <li
                            class="flex items-center justify-between bg-gray-50 px-4 py-2 rounded border border-gray-200">
                            <form action="{{ route('todos.toggle', $todo->_id) }}" method="POST"
                                class="flex items-center gap-3">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" onchange="this.form.submit()" class="w-5 h-5 cursor-pointer">
                                <span class="text-gray-800">{{ $todo->title }}</span>
                            </form>
                            <form action="{{ route('todos.destroy', $todo->_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition font-bold">
                                    X
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Daftar todo selesai --}}
            <div class="mt-8">
                <h2 class="text-xl font-semibold mb-3 text-gray-700">Pending Tasks</h2>
                <ul class="space-y-3">
                    @foreach ($complete as $todo)
                        <li
                            class="flex items-center justify-between bg-green-50 px-4 py-2 rounded border border-green-200">
                            <form action="{{ route('todos.toggle', $todo->_id) }}" method="POST"
                                class="flex items-center gap-3">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" onchange="this.form.submit()" class="w-5 h-5 cursor-pointer">
                                <span class="line-through text-green-700">{{ $todo->title }}</span>
                            </form>
                            <form action="{{ route('todos.destroy', $todo->_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 transition font-bold">
                                    X
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
