@extends('layouts.admin')

@section('content')
    <datatable  title="Jobs"
                fetch-url="{{ route('jobs.table') }}"
                :columns="['id', 'title', 'description', 'about', 'exp_level',
                            'contract_type', 'salary', 'reports_to', 'location']"
                modal-name="Job">
    </datatable>
@endsection
