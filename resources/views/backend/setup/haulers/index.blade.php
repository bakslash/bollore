@extends('backend.layouts.app')

@section('title', __('Add/Edit Haulers'))

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
        @lang('Haulers')
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.setup.haulers.create')"
            :text="__('Create Haulers')" />
    </x-slot>
    @endif

    <x-slot name="body">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>
                    <span>Haulers</span>
                </th>
                <th>
                    <span>Actions</span>
                </th>
            </tr>
            @foreach($haulers as $haulers)
            <tr>
                <td>{{ $haulers->id }}</td>
                <td>{{ $haulers->hname }}</td>
                <td>
                    <a href="{{ route('admin.setup.haulers.edit', $haulers->id)}}" class="btn btn-info
                        btn-xs">edit</a>
                    <a href="{{ route('admin.setup.haulers.destroy', $haulers->id)}}" class="btn btn-danger
                        btn-xs">delete</a>
                </td>
            </tr>
            @endforeach
        </table>

       
    </x-slot>
</x-backend.card>
@endsection