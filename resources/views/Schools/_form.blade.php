@csrf
<div class="input-group mb-3">
    <span class="input-group-text">School Name</span>
    <input type="text" name="name" value="{{old('name', $school->name?? '')}}" class="form-control @error('name') is-invalid fparsley-error parsley-error @enderror">
    @error('name')
    <span class="invalid-feedback text-danger" role="alert">
        <p>{{ $message }}</p>
    </span>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
