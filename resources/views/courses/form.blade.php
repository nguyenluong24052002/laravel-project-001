<x-app-layout>
    @push('styles')
    <style>
        /* CSS cho bảng */
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        /* CSS cho các ô trong bảng */
        .table th,
        .table td {
            padding: 8px; /* Điều chỉnh padding cho ô */
            border: 1px solid #ddd; /* Điều chỉnh đường viền */
            text-align: left; /* Căn lề văn bản */
        }

        /* CSS cho form tìm kiếm */
        .form-search {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .form-search input[type="text"] {
            padding: 5px;
        }

        .form-search button {
            margin-left: 10px;
        }
    </style>
    @endpush

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                        
                <form method="post" action="{{ isset($course) ? route('course.update', ['course' => $course->id]) : route('course.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        @if(!empty($course))
                            @method('put')  
                        @endif

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $course->name ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $course->slug ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <div>
                            <x-input-label for="link" :value="__('Link')" />
                            <x-text-input id="link" name="link" type="text" class="mt-1 block w-full" :value="old('link', $course->link ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('link')" />
                        </div>

                        <div>
                            <x-input-label for="price" :value="__('Price')" />
                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $course->price ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <div>
                            <x-input-label for="old_price" :value="__('Old Price')" />
                            <x-text-input id="old_price" name="old_price" type="text" class="mt-1 block w-full" :value="old('old_price', $course->old_price ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('old_price')" />
                        </div>

                        <div>
                            <x-input-label for="created_by" :value="__('Created By')" />
                            <x-text-input id="created_by" name="created_by" type="text" class="mt-1 block w-full" :value="old('created_by', $course->created_by ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('created_by')" />
                        </div>

                        <div>
                            <x-input-label for="category_id" :value="__('Category ID')" />
                            <x-text-input id="category_id" name="category_id" type="text" class="mt-1 block w-full" :value="old('category_id', $course->category_id ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>

                        <div>
                            <x-input-label for="lessons" :value="__('Lessons')" />
                            <x-text-input id="lessons" name="lessons" type="text" class="mt-1 block w-full" :value="old('lessons', $course->lessons ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('lessons')" />
                        </div>

                        <div>
                            <x-input-label for="view_count" :value="__('View count')" />
                            <x-text-input id="view_count" name="view_count" type="text" class="mt-1 block w-full" :value="old('view_count', $course->view_count ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('view_count')" />
                        </div>

                        <div>
                            <x-input-label for="benefits" :value="__('Benefits')" />
                            <x-text-input id="benefits" name="benefits" type="text" class="mt-1 block w-full" :value="old('benefits', $course->benefits ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('benefits')" />
                        </div>

                        <div>
                            <x-input-label for="fqa" :value="__('FQA')" />
                            <x-text-input id="fqa" name="fqa" type="text" class="mt-1 block w-full" :value="old('fqa', $course->fqa ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('fqa')" />
                        </div>

                        
                        <div>
                            <x-input-label for="is_feature" :value="__('Is feature')" />
                            <x-text-input id="is_feature" name="is_feature" type="text" class="mt-1 block w-full" :value="old('is_feature', $course->is_feature ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('is_feature')" />
                        </div>

                        <div>
                            <x-input-label for="is_online" :value="__('Is online')" />
                            <x-text-input id="is_online" name="is_online" type="text" class="mt-1 block w-full" :value="old('is_online', $course->is_online ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('is_online')" />
                        </div>
                      
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $course->description ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Content')" />
                            <x-text-input id="content" name="content" type="text" class="mt-1 block w-full" :value="old('content', $course->content ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="meta_title" :value="__('Meta title')" />
                            <x-text-input id="meta_title" name="meta_title" type="text" class="mt-1 block w-full" :value="old('meta_title', $course->meta_title ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('meta_title')" />
                        </div>

                        <div>
                            <x-input-label for="meta_desc" :value="__('Meta desc')" />
                            <x-text-input id="meta_desc" name="meta_desc" type="text" class="mt-1 block w-full" :value="old('meta_desc', $course->meta_desc ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('meta_desc')" />
                        </div>

                        
                        <div>
                            <x-input-label for="meta_keyword" :value="__('Meta keyword')" />
                            <x-text-input id="meta_keyword" name="meta_keyword" type="text" class="mt-1 block w-full" :value="old('meta_keyword', $course->meta_keyword ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('meta_keyword')" />
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>    
                    </form>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
