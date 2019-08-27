@extends('layouts.admin')

@section('content')
    <datatable title="Companies"
                fetch-url="{{ route('companies.table') }}"
                :columns="['id', 'name', 'no_of_workers']"
                modal-name="Company">
    </datatable>
@endsection