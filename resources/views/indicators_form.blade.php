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
    <div class="container">
        <h2>{{ isset($indicator) ? 'Edit Indicator' : 'Add Indicator' }}</h2>

        <form method="POST" action="{{ isset($indicator) ? route('indicators.update', $indicator) : route('indicators.store') }}">
            @csrf
            @if(isset($indicator))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label for="indicator" class="form-label">Indicator</label>
                <input type="text" class="form-control" id="indicator" name="indicator" value="{{ old('name', $indicator->indicator ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="ncode" class="form-label">Numerator Code (ncode)</label>
                <input type="text" class="form-control" id="ncode" name="ncode" value="{{ old('ncode', $indicator->ncode ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="ntext" class="form-label">Numerator Text (ntext)</label>
                <textarea class="form-control" id="ntext" name="ntext" rows="3" required>{{ old('ntext', $indicator->ntext ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="dcode" class="form-label">Denominator Code (dcode)</label>
                <input type="text" class="form-control" id="dcode" name="dcode" value="{{ old('dcode', $indicator->dcode ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="dtext" class="form-label">Denominator Text (dtext)</label>
                <textarea class="form-control" id="dtext" name="dtext" rows="3" required>{{ old('dtext', $indicator->dtext ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($indicator) ? 'Update' : 'Submit' }}</button>
        </form>
    </div>

@endsection
