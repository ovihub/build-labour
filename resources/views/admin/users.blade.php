@extends('layouts.admin')

@section('content')
    <!-- <photo-modal></photo-modal> -->
    
    <!-- <delete-modal></delete-modal> -->
    
    <datatable  title="Users"
                fetch-url="{{ route('users.table') }}"
                :columns="['full_name', 'id', 'email',  'address']"
                modal-name="User">
    </datatable>
@endsection
