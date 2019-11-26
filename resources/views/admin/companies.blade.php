@extends('layouts.admin')

@section('content')
    <datatable title="Companies"
                fetch-url="{{ route('companies.table') }}"
                :columns="['id', 'name', 'no_of_workers', 'created_at']"
                modal-name="Company">
    </datatable>
@endsection