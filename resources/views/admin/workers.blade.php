@extends('layouts.admin')

@section('content')
    <photo-modal></photo-modal>
    
    <delete-modal></delete-modal>
    
    <datatable  title="Workers"
                fetch-url="{{ route('workers.table') }}"
                :columns="['full_name', 'id','company', 'role', 'email' ]"
                modal-name="Worker">
    </datatable>
@endsection