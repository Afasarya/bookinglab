@extends('admin.components.base')

@section('title', 'Laboratory')

@section('content')
<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Laboratory Overview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Laboratory</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <form class="d-flex me-3" action="" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Search Laboratory...">
                <button type="submit" class="btn btn-secondary ms-2">Search</button>
            </form>
            <a href="{{ route('laboratories.create') }}" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span>Create Laboratory</span>
            </a>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Kapasitas</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($laboratories as $laboratory)
                                        <tr>
                                            <td>{{ $laboratory->id }}</td>
                                            <td>{{ $laboratory->name }}</td>
                                            <td>{{ $laboratory->capacity }}</td>
                                            <td>{{ $laboratory->is_booked ? 'Sudah Dibooking' : 'Tersedia' }}</td>
                                            <td class="text-end">
                                                <div class="dropdown">
                                                    <a href="javascript:void(0);" class="text-dark" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a href="{{ route('laboratories.edit', $laboratory->id) }}" class="dropdown-item"><i class="feather-edit"></i>Edit</a>
                                                        <form action="{{ route('laboratories.destroy', $laboratory->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i class="feather-trash-2"></i>Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('style')
<style>
    .card {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
@endsection
