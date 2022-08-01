@extends('layouts.main')

@section('content')

    <div class="row layout-top-spacing">

        <div id="basic" class="col-lg-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>School Name</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">

                    <div class="row">
                        <div class="col-lg-6 col-12 mx-auto">
                            <form method="post" action="{{route('schools.store')}}">
                               @include('Schools._form')
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


@stop


