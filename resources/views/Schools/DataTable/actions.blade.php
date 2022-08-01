<div class="btn-group">
    <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
            <polyline points="6 9 12 15 18 9"></polyline>
        </svg>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
        <a  class="dropdown-item"  href="{{route('schools.edit', $id)}}">
            Edit
        </a>

        <div class="dropdown-divider"></div>
        <form method="post" action="{{route('schools.delete')}}">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$id}}">
            <button onclick="return confirm('Are you sure?')" class="dropdown-item btn btn-danger">Delete</button>
        </form>

    </div>
</div>
