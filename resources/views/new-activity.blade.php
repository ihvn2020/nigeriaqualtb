@extends('layouts.theme')

@section('content')
    
    <div class="row">
        <h3 class="page-title">Report | <small style="color: green">Generate</small></h3>
            <div class="panel">
                <div class="panel-heading">
                    
                        <h4>Please Select Period</h4>                   
                    
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('newreport') }}">
                        
                        @csrf

                        <div class="row form-row">
                            <div class="form-group col-md-3 col-md-offset-2">
                                <label for="from">From (Date)</label>
                                <input type="text" name="from" id="from" class="form-control" placeholder="From">                                  
                            </div>
                            <div class="form-group col-md-3">
                                <label for="to">To (Date)</label>
                                <input type="text" name="to" id="to" class="form-control" placeholder="From">                                  
                            </div>
                            <div class="col-md-2">
                                <label for=".">.</label>
                                <button type="submit" class="btn btn-primary form-control btnNext" >Generate</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        
    </div>
    
@endsection