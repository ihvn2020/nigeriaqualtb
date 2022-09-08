@extends('layouts.register-theme')

@section('content')

                    <div class="card">
                        <div class="card-header">
                            Register
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Please Enter Required Fields</h4>

                            <form method="POST" action="{{ route('register') }}">

                                <div class="row">


                                    @csrf
                                    <div class="col-md-4">


                                        <div class="form-group row">
                                            <label for="name" class="control-label sr-only">{{ __('Name') }}</label>


                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus placeholder="Full Name">

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>





                                        <div class="form-group row">
                                            <label for="phone_number" class="control-label sr-only">{{ __('Phone Number') }}</label>


                                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}"  autocomplete="phone_number" autofocus placeholder="Phone Number">

                                                @error('phone_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>


                                        <div class="form-group row">
                                            <label for="about"  class="control-label sr-only">About User</label>
                                            <textarea name="about" class="form-control" placeholder="About Member" rows="4"></textarea>
                                        </div>




                                    </div>
                                    <div class="col-md-6  col-md-offset-1">


                                        <div class="form-group row">
                                            <label for="address" class="control-label sr-only">Facility Address</label>
                                                <input id="address" name="address" type="text" class="form-control" placeholder="Address">
                                        </div>

                                        <div class="form-group row">
                                            <label for="location" class="control-label sr-only">State Location</label>
                                                <input id="location" name="location" type="text" class="form-control" placeholder="Location">
                                        </div>

                                        <div class="form-group row">
                                            <label for="lga"  class="control-label sr-only">LGA</label>
                                            <select class="form-control" name="lga" id="lga">
                                                <option value="LGA" selected>LGA</option>
                                                <option value="AMAC">AMAC</option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-md-6 col-md-offset-1">

                                        <div class="form-group row">
                                            <label for="email" class="control-label sr-only">{{ __('E-Mail Address') }}</label>


                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="E-mail">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="control-label sr-only">{{ __('Password') }}</label>


                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="control-label sr-only">{{ __('Confirm Password') }}</label>


                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">

                                        </div>


                                    </div>
                                </div>

                                <div class="form-group row mb-0">

                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Sign Up') }}
                                        </button>

                                </div>
                            </form>


                        </div>

                    </div>


@endsection
