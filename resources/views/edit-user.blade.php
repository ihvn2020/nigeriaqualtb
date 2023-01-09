@extends('layouts.theme')

@section('content')
    <div class="card">
        <div class="card-header">
            Add/Update User
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('addnew-user') }}">

                <div class="row">

                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <div class="col-md-6">


                        <div class="form-group">
                            <label for="name" class="control-label ">{{ __('Name') }}</label>


                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ $user->name }}" autocomplete="name" autofocus
                                placeholder="Full Name">

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="phone_number" class="control-label ">{{ __('Phone Number') }}</label>


                            <input id="phone_number" type="text"
                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                value="{{ $user->phone_number }}" autocomplete="phone_number" autofocus
                                placeholder="Phone Number">

                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>

                        <div class="form-group">
                            <label for="role" class="control-label ">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="" selected>Select Role</option>
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                    </div>

                    @php
                        $facilities = \App\Models\facilities::all();
                    @endphp
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="state" class="control-label ">State</label>
                            <select class="form-control" name="state" id="state">
                                <option value="">Select State</option>

                                <option value="{{ $user->state }}" selected>{{ $user->state }}
                                </option>
                                @foreach ($facilities as $fac)
                                    <option value="{{ $fac->state }}">{{ $fac->state }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="facility" class="control-label ">Facility</label>
                            <select class="form-control" name="facility" id="facility">
                                <option value="">Select Facility</option>

                                <option value="{{ $user->facility }}" selected>{{ $user->facility }}
                                </option>

                                @foreach ($facilities as $facs)
                                    <option value="{{ $facs->facility_name }}">{{ $facs->facility_name }}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status" class="control-label ">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="" selected>Select Status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-md-4">
                        <label for="email" class="control-label ">{{ __('E-Mail Address') }}</label>


                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $user->email }}" autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-md-4">
                        <label for="password" class="control-label ">{{ __('Password') }}</label>
                        <input type="hidden" name="oldpassword" value="{{ $user->password }}">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" autocomplete="new-password"placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group col-md-4">
                        <label for="password-confirm" class="control-label ">{{ __('Confirm Password') }}</label>


                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Confirm Password">

                    </div>
                </div>

                <div class="row">



                    <div class="col-md-6 col-md-offset-6">
                        @if ($user->id)
                            <a href="/delete-user/{{ $user->id }}" class="btn btn-danger pull-left"
                                onclick="return confirm('Are you sure you want to delete {{ $user->name }}\'s account?')"><i
                                    class="fa fa-remove"></i> Delete User</a>
                        @endif
                    </div>
                    <div class="form-group col-md-6">

                        <button type="submit" class="btn btn-primary  pull-right">
                            <i class="fa fa-check"></i>
                            {{ __('Update User Info') }}
                        </button>

                    </div>

                </div>

            </form>


        </div>
        <div class="card-footer text-muted">
            Info:
        </div>
    </div>
@endsection
