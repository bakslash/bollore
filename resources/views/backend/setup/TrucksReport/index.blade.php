@extends('backend.layouts.app')

@section('title', __('Trucks Report'))

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

  

    <x-slot name="body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>
                        <span>ID</span>
                    </th>
                    <th>
                        <span>Truck Registration Number</span>
                    </th>
                    <th>
                        <span>Truck Trailer</span>
                    </th>
                    <th>
                        <span>Type</span>
                    </th>
                    <th>
                        <span>Haulier Representative</span>
                    </th>
                    <th>
                        <span>Haulier</span>
                    </th>
                    <th>
                        <span>Within</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($trucks as $truck)
                <tr>
                    <td>{{ $truck->Tr_ID }}</td>
                    <td>{{ $truck->Tr_TruckRegNum }}</td>
                    <td>{{ $truck->Tr_TruckTrailer }}</td>
                    <td>{{ $truck->Tr_Type }}</td>
                    <td>{{ $truck->Tr_HaulierRep }}</td>
                    <td>{{ $truck->Tr_Hauler }}</td>
                    <td>{{ $truck->Tr_Within }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
    </x-slot>
</x-backend.card>
@endsection