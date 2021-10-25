@extends('layouts.theme')

@section('content')
                    <h3 class="page-title">Add New Users </h3>

                    <div class="panel">

                        <div class="panel-body">

                            <form method="POST" action="{{ route('addnew') }}">

                                <div class="row">
                                    
                                
                                    @csrf
                                    <div class="col-md-6">
            
                                    
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
            
                                        
                                        
                                    
            
                                        
                                    </div>
                                    <div class="col-md-6">
                                        

                                       
                                        <div class="form-group row">
                                            <label for="facility" class="control-label sr-only">Facility Name</label>
                                                <input id="facility" name="facility" type="text" class="form-control" placeholder="facility">
                                        </div>

                                        <div class="form-group row">
                                            <label for="state"  class="control-label sr-only">State</label>
                                            <select class="form-control" name="state" id="state">
                                            <option value="" selected></option>
                                            <option value="FCT">FCT</option>
                                       
                                            
                                            
                                            </select>
                                        </div>

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

                                        <div class="form-group row">
                                            <label for="role"  class="control-label sr-only">Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="User" selected>User</option>
                                                <option value="SAdmin">SAdmin</option>
                                                <option value="FAdmin">SAdmin</option>
                                                <option value="CAdmin">CAdmin</option>
                                               
                                                @if ($settings->mode=="Maintenance")
                                                <option value="Super">Super</option>
                                                @endif                                                
                                            </select>
                                        </div>

                                        <div class="form-group row">
                                            <label for="status"  class="control-label sr-only">Status</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="Active" selected>Active</option>
                                                <option value="Inactive">Inactive</option>
                                                       
                                            </select>
                                        </div>

                                        
                                    </div>

                                   
                                </div>
        
                                <div class="form-group row mb-0">
                                    
                                        <button type="submit" class="btn btn-primary pull-right">
                                            {{ __('Add New User') }}
                                        </button>
                                    
                                </div>
                            </form>

                            
                        </div>
                       
                    </div>
                    
               
@endsection
