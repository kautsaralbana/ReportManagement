@extends('layouts.app', (['title' => 'Management Brand']))

@section('content')

@breadcrumb(['header' => 'Management Brands', 'active' => 'Brands'])
@bcItem(['value' => 'Data Master'])
@endbreadcrumb

@ifAlert

@card
@slot('header')
@modalBtn(['btnClass' => 'primary btn pull-left', 'dataTarget' => 'create', 'icon' => 'mdi mdi-plus-circle-outline',
'name' => 'Create Brand'])
@modalBtn(['btnClass' => 'info btn pull-right', 'dataTarget' => 'inactive', 'icon' => 'mdi mdi-information-outline',
'name' => 'Unapproved Data'])
@endslot
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Details</th>
                <th>Created and Updated By</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        @role('Admin|Manager')
        <tbody>
            @forelse ($brands as $brand)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->detail }}</td>
                <td><label class="badge badge-success">{{ $brand->createdBy['name'] }}</label><i
                        class="mdi mdi-arrow-right-bold"></i><label
                        class="badge badge-warning">{{ $brand->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', [$brand->id_brand]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('brands.edit', [$brand->id_brand]) }}"
                            class="btn btn-warning waves-effect waves-light">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data Brand</td>
            </tr>
            @endforelse
        </tbody>
        @else
        <tbody>
            @forelse ($user_brands as $brand)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $brand->name }}</td>
                <td>{{ $brand->detail }}</td>
                <td><label class="badge badge-success">{{ $brand->createdBy['name'] }}</label>/<label
                        class="badge badge-warning">{{ $brand->updatedBy['name'] }}</label>
                </td>
                <td>
                    <form action="{{ route('brands.destroy', [$brand->id_brand]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ route('brands.edit', [$brand->id_brand]) }}" class="btn btn-warning">
                            <i class="fa fa-edit"> Edit</i>
                        </a>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash"> Delete</i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data Brand</td>
            </tr>
            @endforelse
        </tbody>
        @endrole
    </table>
</div>

@role('Admin|Manager')
{{ $brands->links() }}
@else
{{ $user_brands->links() }}
@endrole

@endcard

@modal(['id' => 'inactive', 'size' => 'lg', 'color' => 'info', 'title' => 'Inactive Data List'])
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Created By</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($inactive as $brand)
        <tr>
            <td>{{ $brand->name }}</td>
            <td>{{ $brand->detail }}</td>
            <td>{{ $brand->createdBy['name'] }}</td>
            <td>{{ $brand->created_at }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="text-center">Semua data sudah di approve</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endmodal

@modal(['id' => 'create', 'size' => '', 'color' => 'primary', 'title' => 'Create Data Brand'])
<form role="form" action="{{ route('brands.store') }}" method="post" class="form-material">
    @csrf
    <div class="form-group">
        <input id="id_brand" type="text" name="name" required
            class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" placeholder="Brand Name">
        <p class="text-danger">{{ $errors->first('name') }}</p>
    </div>
    <div class="form-group">
        <input id="id_detail" type="text" name="detail" required
            class="form-control {{ $errors->has('detail') ? 'is-invalid':'' }}" placeholder="Description">
        <p class="text-danger">{{ $errors->first('detail') }}</p>
    </div>
    <div class="form-group pull-right">
        <button class="btn waves-effect waves-light btn-primary">
            <i class="fa fa-send"></i> Save
        </button>
    </div>
</form>
@endmodal
@endsection
