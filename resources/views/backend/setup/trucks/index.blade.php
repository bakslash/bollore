@extends('backend.layouts.app')

@section('title', __('Add/Edit Trucks'))

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
        @lang('Trucks')
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.setup.trucks.create')"
            :text="__('Create Trucks')" />
    </x-slot>
    @endif

    <x-slot name="body">
        <table class="table table-hover table-striped">
            <tr>
                <th>#</th>
                <th>
                    <span>Truck Registration Number</span>
                </th>
                <th>
                    <span>Truck Haulier Registration Number</span>
                </th>
                <th>
                    <span>Actions</span>
                </th>
            </tr>
            @foreach($trucks as $truck)
            <tr>
                <td>{{ $truck->id}}</td>
                <td>{{ $truck->treg }}</td>
                <td>{{ $truck->Tr_Hauler }}</td>
                <td>
                    <a href="{{ route('admin.setup.trucks.edit', $truck->id)}}" class="btn btn-info
                        btn-xs">edit</a>
                    <a href="{{ route('admin.setup.trucks.destroy', $truck->id)}}" class="btn btn-danger
                        btn-xs">delete</a>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="row">
            <div class="col-12">
                {{ $trucks->links() }}
            </div>
        </div>
    </x-slot>
</x-backend.card>
@endsection
