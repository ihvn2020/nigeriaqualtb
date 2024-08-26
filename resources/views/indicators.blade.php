@extends('layouts.theme')
<style>
    .result {
        font-weight: 900;
        background-color: white;
        position: relative;
        float: right;
        width: 50px;
        height: 25px;
        text-align: center;
        font-size: 1em;
        border: solid 1px green;
        border-radius: 20px;
        color: green;
        display: none;
        visibility: hidden;
    }
</style>
@section('content')
    @php $pagetype="report"; @endphp

        <h2>QUAL TB Indicators</h2>

        <a href="{{ route('indicators.create') }}" class="btn btn-success mb-3">Add Indicator</a> <br><br>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table responsive-table" id="products" style="width: 100% !important">
            <thead>
                <tr>
                    <th>Indicator #</th>
                    <th>Indicator</th>
                    <th>Numerator Code</th>
                    <th>Numerator</th>
                    <th>Denominator Code</th>
                    <th>Denominator</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($indicators as $indicator)
                <tr>
                    <td><b>{{substr($indicator->dcode, 5)}}</b></td>
                    <td>{{ $indicator->indicator }}</td>
                    <td>{{ $indicator->ncode }}</td>
                    <td>{{ $indicator->ntext }}</td>
                    <td>{{ $indicator->dcode }}</td>
                    <td>{{ $indicator->dtext }}</td>
                    <td>
                        <a href="{{ route('indicators.edit', $indicator->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('indicators.destroy', $indicator->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

@endsection
