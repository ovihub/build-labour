@extends('layouts.admin')

@section('content')

    <admin-company-datatable title="Companies"
                fetch-url="{{ route('companies.table') }}"
                :columns="['id', 'name', 'no_of_workers']"
                modal-name="Company">
    </admin-company-datatable>
@endsection