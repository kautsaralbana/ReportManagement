@extends('layouts.app')

@section('content')

@breadcumb(['header' => 'Detail Roles'])
    @breadc_item(['active' => 'Show'])
        @breadc_active Dashboard @endbreadc_active
    @endbreadc_item
@endbreadcumb
<div class="container-fluid">
    @card
        @slot('header')
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        @endslot
        @include('inc.ifalert')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permissions:</strong>
                    @if(!empty($rolePermissions))
                        @foreach($rolePermissions as $v)
                            <label class="label label-success">{{ $v->name }},</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    @endcard
</div>
@endsection
