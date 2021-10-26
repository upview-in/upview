@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection

@section('custom-styles')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap5.css">
@endsection

@section('custom-scripts')
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.bootstrap5.min.js"></script>
{!! $dataTable->scripts() !!}
@endsection

<x-admin-app-layout title="Users">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-10">
                <div class="card-body">
                    {!! $dataTable->table() !!}
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>