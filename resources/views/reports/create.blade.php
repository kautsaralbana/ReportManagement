@extends('layouts.app', (['title' => 'Management Report']))

@section('content')

@breadcrumb(['header' => 'Report', 'active' => 'Show'])
@bcItem(['value' => 'Report'])
@bcItem(['value' => 'Projects'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@card(['header' => 'Create Report'])
<form role="form" action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="id_report">Report Name</label>
                <input type="text" id="id_report" name="name" required
                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                <p class="text-danger">{{ $errors->first('name') }}</p>
                {{-- <small class="form-control-feedback"> Write your report name here </small> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="brand_id">Brand Name</label>
                <select name="brand_id" id="brand_id" required
                    class="form-control {{ $errors->has('brand_id') ? 'is-invalid':'' }}">
                    <option></option>
                    @foreach ($brands as $item)
                    <option value="{{ $item->id_brand }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select brand </small> --}}
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label class="control-label" for="category_id">Category Name</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option></option>
                    @foreach ($categories as $item)
                    <option value="{{ $item->id_category }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Category </small> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="machine_id" class="control-label">Machine Name</label>
                <select name="machine_id" id="machine_id" class="form-control">
                    <option></option>
                    @foreach ($machines as $item)
                    <option value="{{ $item->id_machine }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Machine </small> --}}
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="production_id" class="control-label">Production Name</label>
                <select name="production_id" id="production_id" class="form-control">
                    <option></option>
                    @foreach ($productions as $item)
                    <option value="{{ $item->id_production }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Production Place </small> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="product_id" class="control-label">Product Name</label>
                <select name="product_id" id="product_id" class="form-control">
                    <option></option>
                    @foreach ($products as $item)
                    <option value="{{ $item->id_product }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Product Name </small> --}}
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="project_id" class="control-label">Project Name</label>
                <select name="project_id" id="project_id" class="form-control">
                    <option></option>
                    @foreach ($projects as $item)
                    <option value="{{ $item->id_project }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Project </small> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-material">
                <label for="type_id" class="control-label">Type Name</label>
                <select name="type_id" id="type_id" class="form-control">
                    <option></option>
                    @foreach ($types as $item)
                    <option value="{{ $item->id_type }}">{{ ucfirst($item->name) }}</option>
                    @endforeach
                </select>
                {{-- <small class="form-control-feedback"> Select Type </small> --}}
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-md-6">
            <label for="file">Please input file</label><br>
            <input type="file" id="file" name="file" class="dropify" />
        </div>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
        <a href="{{ route('reports.index') }}" class="btn waves-effect waves-light btn-info">Back </a>
    </div>
</form>
@endcard
@endsection
