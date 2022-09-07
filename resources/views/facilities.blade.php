@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">Facilities | <small style="color: green">View All</small></h3>
    <div class="row">
        
       
        
            <div class="panel">
              
                <div class="panel-body">
                    <a href="new-facility" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Add New</a>
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th>Facility Code</th>
                                <th>Name</th>
                                <th>IP</th>
                                <th>State</th>                           
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facilities as $fac)

                                <tr
                                    @if ($fac->gender=="Female")
                                        style="background-color: azure !important;"
                                    @endif                                
                                >
                                    <td>{{$fac->facility_code}}</td>
                                    <td>{{$fac->facility_name}}</td>
                                    <td>{{$fac->facility_ip}}</td>
                                    <td>{{$fac->state}}</td>
                                    
                                    <td width="90">
                                        <div class="btn-group">
                                            <a href="edit-facility/{{$fac->id}}" class="label label-primary left"><i class="lnr lnr-pencil"></i></a>
                                            <a href="delete/{{$fac->id}}/facilities" class="label label-danger"><i class="lnr lnr-cross"></i></a>
                                        </div>
                                    </td>
                                   
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
        
    </div>
    
        
    
@endsection
