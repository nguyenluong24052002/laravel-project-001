@extends('layouts.admin')

@section('title', 'Form category')

@section('content') 
    <style>
        .error-message {
            color: red;
        }
    </style>

    <div class="container">
        <h2>Form Category</h2>
        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="{{ old('name') }}" name="name" />
                @error('name')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('email') }}" name="email" />
                @error('email')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('phone') }}" name="phone" />
                @error('phone')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" value="{{ old('address') }}" name="address" />
                @error('address')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <label>
                <input type="radio" name="gender" value="1" {{ old('gender') == 1 ? 'checked' : '' }}>
                    Male
                </label>
                <label>
                <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                    Female
                </label>
                @error('gender')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputFile" class="form-label">File</label>
                <input type="file" class="form-control" id="exampleInputFile" name="file" />
                @error('file')
                <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Localtions</label><br>    
                <label>
                    <input type="radio" name="localtion" value="1" onclick="toggleDetailInfo(1)" {{ old('localtion') == 1 ? 'checked' : '' }}>
                    Hà Nội
                </label>
                <label>
                    <input type="radio" name="localtion" value="2" onclick="toggleDetailInfo(2)" {{ old('localtion') == 2 ? 'checked' : '' }}>
                    HCM
                </label>
                <label>
                    <input type="radio" name="localtion" value="3" onclick="toggleDetailInfo(3)" {{ old('localtion') == 3 ? 'checked' : '' }}>
                    Đà Nẵng
                </label>
                <label>
                    <input type="radio" name="localtion" value="4" onclick="toggleDetailInfo(4)" {{ old('localtion') == 4 ? 'checked' : '' }}>
                    Cần Thơ
                </label>
                @error('location')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-info" id="localtionId" style="display: {{ old('localtion') == 4 ? 'none' : 'block' }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Người phụ thuộc</label>
                    <input type="text" class="form-control" name="member">
                    @error('member')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Số năm kinh nghiệm</label>
                    <input type="text" class="form-control" name="year">
                    @error('year')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Facebook URL</label>
                    <input type="text" class="form-control" name="facebook_url">
                    @error('facebook_url')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <script>
            function toggleDetailInfo(Value) {
                const localtionId = document.getElementById('localtionId');

                if (Value == 4) {
                    localtionId.style.display = 'none';
                } else {
                    localtionId.style.display = 'block';
                }
            }
        </script>
   
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection