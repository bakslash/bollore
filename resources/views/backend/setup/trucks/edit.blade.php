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
        @lang('Edit Trucks')
    </x-slot>

    @if ($logged_in_user->hasAllAccess())
    <x-slot name="headerActions">
        <x-utils.link class="card-header-action" :href="route('admin.setup.trucks.index')"
            :text="__('View Trucks')" />
    </x-slot>
    @endif

    <x-slot name="body">

        <form action="{{ route('admin.setup.trucks.update', $trucks) }}" method="POST">
            @csrf()

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <label for="cancelled_on">Truck Registration Number</label>
                    <div class="input-group">
                        <input value="{{ $trucks->treg }}" class=" form-control" type="text" name="treg" />
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <label for="cancelled_on">Truck Haulier Registration Number</label>
                    <div class="input-group">
                        <input value="{{ $trucks->treg }}" class=" form-control" type="text" name="hreg" />
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </x-slot>
</x-backend.card>
@endsection