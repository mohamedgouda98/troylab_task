@csrf
<div class="input-group mb-3">
    <span class="input-group-text">Student Name</span>
    <input type="text" name="name" value="{{old('name', $student->name?? '')}}" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror">
    @error('name')
    <span class="invalid-feedback text-danger" role="alert">
        <p>{{ $message }}</p>
    </span>
    @enderror
</div>

<div class="input-group mb-3">
    <span class="input-group-text">Select School</span>
    <select class="form-control  basic" name="school_id">
        <option>Select One</option>
        @foreach(getSchools() as $school)
            <option value="{{$school->id}}" {{(old('school_id') == $school->id || ( isset($student) && $school->id == $student->school_id)) ? 'selected' : ''}}>{{$school->name}}</option>
        @endforeach
    </select>
    @error('name')
    <span class="invalid-feedback text-danger" role="alert">
        <p>{{ $message }}</p>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
