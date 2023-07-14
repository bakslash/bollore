@extends('backend.layouts.app')

@section('title', __('Add/Edit Users'))

@push('after-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
    integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('breadcrumb-links')
{{-- @include('backend.auth.user.includes.breadcrumb-links')--}}
@endsection

@section('content')
<x-backend.card>
    <x-slot name="header">
        @lang('Users')
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.setup.user.create')"
            :text="__('Create Users')" />
    </x-slot>
    @endif

    <x-slot name="body">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>
                    <span>stf_StaffNames</span>
                </th>
                <th>
                    <span>stf_Username</span>
                </th>
                <th>
                    <span>stf_email</span>
                </th>
                <th>
                    <span>Actions</span>
                </th>
            </tr>
            @foreach($user as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->stf_StaffNames }}</td>
                <td>{{ $user->stf_Username }}</td>
                <td>{{ $user->stf_email }}</td>
                <td>
                    <a href="{{ route('admin.setup.user.edit', $user->id)}}" class="btn btn-info
                        btn-xs">edit</a>
                    <a href="{{ route('admin.setup.user.destroy', $user->id)}}" class="btn btn-danger
                        btn-xs">delete</a>
                </td>
            </tr>
            @endforeach
        </table>

      
    </x-slot>
</x-backend.card>
@endsection
