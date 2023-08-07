<x-app-layout>
    <x-slot name="header">
        <div class="toolbar" style="display: flex; justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User list') }}
            </h2>
            <a href="{{ route('user.create') }}">Create new</a>
        </div>

        <div class="form-search">
            <form action="{{ route('user.index')}}" method="get" class="form-control">
                <select name="family_id" id="">
                    <option value="">---</option>
                    @foreach($families as $family)
                        <option value="{{ $family->id}}" {{ $family->id == request()->get('family_id') ? 'selected' : '' }}>{{ $family->name}}</option>
                    @endforeach
                </select>
                <input type="text" placeholder="Your keyword" name="keyword" value="{{ request()->get('keyword')}}">
                <button class="btn btn-primary">Seach</button>
            </form>
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
                                    @if (!empty($user->avatar))
                                        <img src="{{ asset('storage/' . $user->avatar) }}" width="50" alt="Avatar">
                                    @else
                                        No avatar
                                    @endif
                                </td>
                                <td>{{ $user->user_type }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->family->name ?? 'No family' }}</td>
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
                        <tr>
                            <td colspan="5">{{ $users->links() }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
