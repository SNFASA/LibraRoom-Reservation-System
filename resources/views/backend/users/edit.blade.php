@extends('backend.layouts.master')

@section('main-content')

<div class="card">
    <h5 class="card-header">Edit User</h5>
    <div class="card-body">
      <form method="post" action="{{route('users.update',$user->id)}}">
        @csrf 
        @method('PATCH')
        <div class="form-group">
            <label for="inputTitle" class="col-form-label">No matriks</label>
          <input id="inputTitle" type="text" name="no_matriks" placeholder="Enter no matriks"  value="{{$user->no_matriks}}" class="form-control">
          @error('no_matriks')
          <span class="text-danger">{{$message}}</span>
          @enderror
          </div>

        <div class="form-group">
          <label for="inputTitle" class="col-form-label">Name</label>
        <input id="inputTitle" type="text" name="name" placeholder="Enter name"  value="{{$user->name}}" class="form-control">
        @error('name')
        <span class="text-danger">{{$message}}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="inputEmail" class="col-form-label">Email</label>
          <input id="inputEmail" type="email" name="email" placeholder="Enter email"  value="{{$user->email}}" class="form-control">
          @error('email')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>

        {{-- <div class="form-group">
            <label for="inputPassword" class="col-form-label">Password</label>
          <input id="inputPassword" type="password" name="password" placeholder="Enter password"  value="{{$user->password}}" class="form-control">
          @error('password')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div> --}}

        {{--<div class="form-group">
        <label for="inputPhoto" class="col-form-label">Photo</label>
        <div class="input-group">
            <span class="input-group-btn">
                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                <i class="fa fa-picture-o"></i> Choose
                </a>
            </span>
            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{$user->photo}}">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;">
          @error('photo')
          <span class="text-danger">{{$message}}</span>
          @enderror
        </div>--}}
        @php
          // Fetching roles, faculty offices, and courses data from the database
          $roles = DB::table('users')->select('role')->where('id', $user->id)->get();
          $facultyOffices = DB::table('facultyOffice')->select('id', 'name')->get();
          $courses = DB::table('course')->select('id', 'name')->get();
        @endphp
    
    <div class="form-group">
        <label for="role" class="col-form-label">Role</label>
        <select name="role" class="form-control">
            <option value="">-----Select Role-----</option>
            @foreach($roles as $role)
                <option value="{{ $role->role }}" {{ $role->role == 'Student' ? 'selected' : '' }}>Student</option>
                <option value="{{ $role->role }}" {{ $role->role == 'Staff' ? 'selected' : '' }}>Staff</option>
            @endforeach
        </select>
        @error('role')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="facultyOffice" class="col-form-label">Faculty Office</label>
        <select name="facultyOffice" class="form-control">
            <option value="">-----Select Faculty Office-----</option>
            @foreach($facultyOffices as $office)
                <option value="{{ $office->id }}">{{ $office->name }}</option>
            @endforeach
        </select>
        @error('facultyOffice')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="course" class="col-form-label">Course</label>
        <select name="course" class="form-control">
            <option value="">-----Select Course-----</option>
            @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        @error('course')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
        <div class="form-group mb-3">
           <button class="btn btn-success" type="submit">Update</button>
        </div>
      </form>
    </div>
</div>

@endsection

@push('scripts')
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
@endpush