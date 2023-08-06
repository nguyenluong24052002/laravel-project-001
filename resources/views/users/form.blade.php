<x-app-layout>
    <x-slot name="header">
    <div class="toolbar" style="display: flex; justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('User Form') }}
            </h2>
            <a href="{{ route('user.index') }}">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">                           
                    <form method="post" action="{{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.store')}}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        @if(!empty($user))
                            @method('put')  
                        @endif

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $user->email ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Phone')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Address')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address ?? null)" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old('password', )" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
             
                        <div>
                            <x-input-label for="password_confirm" :value="__('Password confirm')" />
                            <x-text-input id="password_confirm" name="password_confirm" type="password" class="mt-1 block w-full" :value="old('password_confirm', )" />
                            <x-input-error class="mt-2" :messages="$errors->get('password_confirm')" />
                        </div>

                        <div>
                            <x-input-label for="gender" :value="__('Gender')" />
                            <label>
                                <input type="radio" name="gender" value="1" {{ old('gender', $user->gender ?? null) == 1 ? 'checked' : '' }}>Male
                            </label>
                            <label>
                                <input type="radio" name="gender" value="2" {{ old('gender', $user->gender ?? null) == 2 ? 'checked' : '' }}>Famale
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
                        </div>

                        <div>
                            <x-input-label for="avatar" :value="__('Avatar')" />
                            <label>
                                <input type="file" name="avatar">
                            </label>
                            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                            @if(!empty($user) && $user->avatar)
                            <br/> <br/>
                            <img src="/storage/{{ $user->avatar }}" width="200" />
                            @endif
                        </div>

                        <div>
                            <x-input-label for="family_id" :value="__('Family')" />
                            <select name="family_id" id="family_id" class="mt-1 block w-full">
                                <option value="">Select a family</option>
                                @foreach($families as $family)
                                    <option value="{{ $family->id }}" {{ old('family_id', $user->family_id ?? null) == $family->id ? 'selected' : '' }}>
                                        {{ $family->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('family_id')" />
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
