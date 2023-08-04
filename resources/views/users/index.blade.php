<x-app-layout>
    <x-slot name="header">
        <div class="toolbar" style="display: flex; justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User list') }}
            </h2>
            <a href="{{ route('user.create') }}">Create new</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Family</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>  
                                <td>
                                    @if ($user->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" style="max-width: 70px; max-height: 70px;">
                                    @else
                                         <!-- Nếu người dùng không có avatar, có thể hiển thị 1 ảnh mặc định tại đây  -->
                                        <img src="{{ asset('path/to/default/avatar.jpg') }}" alt="Default Avatar" style="max-width: 50px; max-height: 50px;">
                                    @endif
                                </td>
                                <td>{{ $user->user_type }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->Family }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->gender_label}}</td>
                                <td>
                                    <a href="{{ route('user.edit', ['user' => $user->id]) }}">Edit</a>
                                    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa người dùng {{ $user->name }}?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
