@extends('layouts.app')

@section('title')
    <title>Edit Type</title>
@endsection

@section('content')
@breadcumb(['header' => 'Edit Type'])
    @breadc_item(['active' => 'Edit'])
    @breadc_active Type @endbreadc_active
        @breadc_active Data Master @endbreadc_active
    @endbreadc_item
@endbreadcumb

<div class="row">
    <div class="col-md-6">
        @cardbox(['header' => 'Edit Type'])
            @if (session('error'))
                @alert(['type' => 'danger'])
                    {!! session('error') !!}
                @endalert
            @endif​

            <form role="form" action="{{ route('types.update', $types->id_type) }}" method="POST" class="floating-labels">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="id_location">Type</label>
                    <input name="name" value="{{ $types->name }}" type="text" class="form-control" id="id_location" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Update</button>
                    <button href="{{ route('types.index') }}" class="btn btn-warning waves-effect waves-light m-r-10">Cancel</button>
                </div>
            </form>
        @endcardbox
    </div>
</div>
@endsection
