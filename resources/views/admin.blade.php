@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading"><strong class="text-danger font-weight-bold">ADMIN</strong> Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')

                    @endcomponent

                    {{--You are logged in as <strong>ADMIN</strong>!--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
