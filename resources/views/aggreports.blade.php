@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">Aggregate Reports | <small style="color: green">View All</small></h3>
    <div class="row">
        
       
        
            <div class="panel">
              
                <div class="panel-body">
                    <a href="aggregate-report" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Add New</a>
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th>Facility</th>
                                <th>State</th>
                                <th>Duration</th>                                
                                <th>Create On</th>
                                <th>Created By</th>                              
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aggreports as $agr)

                                <tr
                                    @if ($agr->status=="Open")
                                        style="background-color: azure !important;"
                                    @else
                                        style="background-color: red !important;"
                                    @endif                                
                                >   
                                    <td>{{$agr->faciliti->facility_name}}</td>
                                    <td>{{$agr->faciliti->state}}</td>
                                    <td><small><i>({{date('jS F, Y', strtotime($agr->from))." To: ".date('jS F, Y', strtotime($agr->to))}})</i></small></td>
                                    
                                    <td>{{date('jS F, Y', strtotime($agr->created_at))}}</td>
                                    <td>{{$agr->user->name}}</td>
                                    
                                    <td width="90">
                                        <div class="btn-group">
                                            <!--<a href="edit-report/{{$agr->id}}" target="_blank" class="label label-primary left"><i class="lnr lnr-pencil"></i></a>-->
                                            <a href="view-reportpdf/{{$agr->id}}" target="_blank" class="label label-warning">PDF</a>
                                            <a href="view-report/{{$agr->id}}" target="_blank" class="label label-success"></i>View</a>
                                            <a href="delete/{{$agr->id}}/aggreport" onclick="return confirm('Are you sure you want to delete this item?');" target="_blank" class="label label-danger"></i>Del</a>
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
