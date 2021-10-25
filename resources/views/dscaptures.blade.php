@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">DS Captures | <small style="color: green">All DS Records</small></h3>
    <div class="row">
        
       
        
            <div class="panel">
              
                <div class="panel-body">
                    <a href="/add-newds" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Add New</a>

                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th>Patient ID</th>
                                <th>LGA TB Number</th>
                                <th>First Name</th>
                                <th>Last Name</th>                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dscaptures as $ds)

                                <tr
                                    @if ($ds->gender=="Female")
                                        style="background-color: azure !important;"
                                    @endif                                
                                >
                                    <td>{{$ds->patient_id}}</td>
                                    <td>{{$ds->lga_tb_number}}</td>
                                    <td>{{$ds->first_name}}</td>
                                    <td>{{$ds->last_name}}</td>
                                    
                                    <td width="90">
                                        <div class="btn-group">
                                            <a href="/edit-dscapture/{{$ds->id}}" class="label label-primary left"><i class="lnr lnr-pencil"></i></a>
                                            <a href="/edit-dscapture/{{$ds->id}}/" class="label label-success"><i class="lnr lnr-eye"></i></a>
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
