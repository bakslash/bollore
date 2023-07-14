@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>BP List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Company</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bps as $bp)
                    <tr>
                        <td>{{ $bp->bp_id }}</td>
                        <td>{{ $bp->bp_Company }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
