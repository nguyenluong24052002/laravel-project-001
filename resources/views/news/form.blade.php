<x-app-layout>
    <x-slot name="header">
    <div class="toolbar" style="display: flex; justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('News Form') }}
            </h2>
            <a href="{{ route('news.index') }}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                        
                <form method="post" action="{{ isset($news) ? route('news.update', ['news' => $news->id]) : route('news.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        @if(!empty($news))
                            @method('put')  
                        @endif

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $news->name ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="start_at" :value="__('Start_at')" />
                            <x-text-input id="start_at" name="start_at" type="text" class="mt-1 block w-full flatpickr" :value="old('start_at', $news->start_at ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('start_at')" />
                        </div>

                        <div>
                            <x-input-label for="end_at" :value="__('End_at')" />
                            <x-text-input id="end_at" name="end_at" type="text" class="mt-1 block w-full flatpickr" :value="old('end_at', $news->end_at ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('end_at')" />
                        </div>

                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                flatpickr('.flatpickr', {
                                    dateFormat: 'Y-m-d',
                                    // Các tùy chọn khác của datepicker tùy theo nhu cầu
                                });
                            });
                        </script>


                        <div>
                            <x-input-label for="is_suspended" :value="__('Status')" />
                            <label>
                                <input type="radio" name="is_suspended" value="0" {{ old('is_suspended', $news->is_suspended ?? null) == 0 ? 'checked' : '' }}>Active
                            </label>
                            <label>
                                <input type="radio" name="is_suspended" value="1" {{ old('is_suspended', $usnewser->is_suspended ?? null) == 1 ? 'checked' : '' }}>Inactive
                            </label>
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
