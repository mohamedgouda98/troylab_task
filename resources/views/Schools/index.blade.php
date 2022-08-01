@extends('layouts.main')

@section('content')

    <div id="tableHover" class="col-lg-12 col-12">
        <div class=" widget box box-shadow">
            <div class="widget-content widget-content-area">
                <a class="btn btn-primary" href="{{route('schools.create')}}">Add New School</a>
                <hr>
                <div class="table-responsive">
                    {{$dataTable->table(), ['class' => 'table table-bordered mb-4']}}
                </div>
            </div>

        </div>
    </div>

@stop

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

{{--    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>--}}
{{--    <script src="/vendor/datatables/buttons.server-side.js"></script>--}}
    {{$dataTable->scripts()}}
@endpush
