@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">Screenings | <small style="color: green">All Screenings</small></h3>
    <div class="row">
        
            <div class="panel">
              
                <div class="panel-body">
                    <a href="new-screening" class="btn btn-primary pull-right" style="margin-bottom: 10px;">Add New</a>

                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">
                                <th style="width: 5%">ID</th>
                                <th>Patient Name</th>
                                <th>Age</th>
                                <th>Sex</th>   
                                <th>Chest Xray</th>
                                <th>Presumtive</th>
                                <th>Visit Date</th> 
                                <th>Result/Comments</th>                                                     
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($screenings as $sc)

                                <tr
                                    @if ($sc->sex=="Female")
                                        style="background-color: azure !important;"
                                    @endif                                
                                >
                                    <td>{{$sc->id}}</td>
                                    <td>{{$sc->first_name}} {{$sc->last_name}}
                                        <br>
                                        @if($sc->dscapture)                                            
                                                     <span class="badge badge-success">Captured</span>                              
                                        @endif
                                    </td>
                                    <td>{{$sc->age}}</td>
                                    <td>{{$sc->sex}}</td>
                                    <td>{{$sc->chestxray}}</td>
                                    <td>{{$sc->presumptive}}</td>
                                    <td>{{$sc->visit_date}}</td>
                                    <td>{{$sc->result}}/{{$sc->comments}}</td>
                                    
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit-screening/{{$sc->id}}" class="label label-primary left">Edit</a>
                                            @if(!$sc->dscapture) 
                                                <a href="new-dscapture/{{$sc->id}}/" class="label label-success">Capture TB</a>
                                            @endif
                                            <a href="delete/{{$sc->id}}/screening" class="label label-danger">Delete</a>
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
