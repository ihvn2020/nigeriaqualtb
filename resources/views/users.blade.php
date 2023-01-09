@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">Users | <small style="color: green">View All</small></h3>
    <div class="row">



        <div class="panel">
            <a href="{{ url('new-user') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px;">New User</a>

            <div class="panel-body">
                @php
                    if (auth()->user()->role == 'Super') {
                        $clients = \App\Models\User::all();
                    } else {
                        $clients = \App\Models\User::where('state', Auth()->user()->state)->get();
                    }

                    $facilities = \App\Models\facilities::select('id', 'facility_name')->get();

                @endphp

                @if ($clients != null)
                    <table id="products" class="display responsive-table" style="width:100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th>Facility</th>
                                <th>State</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $ca)
                                <tr>
                                    <td>{{ $ca->name }}</td>
                                    <td>{{ $ca->email }}</td>
                                    <td>{{ $ca->phone_number }}</td>
                                    <td>{{ $facilities[array_search($ca->facility, array_column($facilities->toArray(), 'id'))]['facility_name'] }}
                                    </td>
                                    <td>{{ $ca->state }}</td>
                                    <td>{{ $ca->role }}</td>
                                    <td><a href="{{ url('edit_user/' . $ca->id) }}" class="btn btn-xs">Edit</a> </td>

                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone Number</th>
                                <th>Facility</th>
                                <th>State</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <blockquote>No User found in the database.</blockquote>
                @endif
            </div>
        </div>

    </div>



@endsection
