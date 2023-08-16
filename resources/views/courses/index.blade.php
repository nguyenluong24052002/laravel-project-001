<x-app-layout>
    <x-slot name="header">
        <div class="toolbar" style="display: flex; justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course list') }}
            </h2>
            <a href="{{ route('course.create') }}">Create new</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="form-search">
                    <form action="{{ route('course.index')}}" method="get" class="form-control">
                        <input type="text" placeholder="Search by name" name="name" value="{{ request()->get('name')}}">
                        <button class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="p-6 text-gray-900">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Link</th>
                                <th scope="col">Price</th>
                                <th scope="col">Old Price</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Category ID</th>
                                <th scope="col">Lessons</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $course)
                            <tr>
                                <td>{{ $course->id }}</td>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->slug }}</td>
                                <td>{{ $course->link }}</td>
                                <td>{{ $course->price }}</td>
                                <td>{{ $course->old_price }}</td>
                                <td>{{ $course->created_by }}</td>
                                <td>{{ $course->category_id }}</td>
                                <td>{{ $course->lessons }}</td>
                                <td>
                                <a href="{{ route('course.edit', ['course' => $course->id]) }}">Edit</a>
                                <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa tin tức {{ $course->name }}?')">Delete</button>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="5">{{ $courses->links() }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
