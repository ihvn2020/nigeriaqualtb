@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title" style="clear: both; position: relative">Indicator Issues for: <small style="color: green">{{$aggreportissues->first()->aggreport->title}} </small></h3>
    <div class="row">

            <div class="panel">

                <div class="panel-heading">
                    <b>Report State/Facility:</b> {{$aggreportissues->first()->aggreport->faciliti->state ." / ". $aggreportissues->first()->aggreport->faciliti->facility_name}}
                </div>

                <div class="panel-body">
                    <table class="table  responsive-table" id="products">
                        <thead>
                            <tr style="color: ">

                                <th style="width: 5%">Indicator No</th>
                                <th>Issue(s)</th>

                                <th>QI Activities</th>
                                <th>Admin Comments</th>
                                <th>New Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aggreportissues as $agri)

                                <tr>

                                    <td>{{$agri->indicator_no}}</td>
                                    <td>{{$agri->issues}} | <i><small style="color:green">{{$agri->enteredby->name}} - {{date('jS F, Y', strtotime($agri->created_at))}}</small></i></td>

                                    <td>
                                        <ul>
                                            @foreach ($agri->qiactivities as $qia)
                                                <li>{{$qia->activities}}  | <i><small style="color:green">{{$qia->enteredby->name}}- {{$qia->dated}}</small></i></li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        @if (Auth()->user()->role=="Super")

                                        <form action="{{route('saveqicomment')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$agri->id}}">
                                            <div class="row">
                                                <div class="form-group col-md-10">
                                                    <input type="text" name="comments" placeholder="enter comment & save" class="form-control">
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <button class="btn btn-xs">Save</button>
                                                </div>
                                            </div>

                                        </form>
                                        @endif
                                        <small><ul>{!!$agri->comments!!}</ul></small>


                                    </td>
                                    <th><a href="#"  id="iid{{$agri->id}}" class="btn btn-primary btn-sm newqi" data-toggle="modal" data-target="#newqi" data-issue_id="{{$agri->id}}">Add QI</a></th>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

    </div>

      <!-- The Modal -->
  <div class="modal" id="newqi">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Quality Improvement Activity</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

            <form method="POST" action="{{ route('saveqi') }}">
                @csrf
                <input type="hidden" name="issue_id" id="issue_id">
                <div class="form-group">
                  <label for="activities">Activities</label>
                  <textarea name="activities" class="form-control" id="activities" rows="5" maxlength="250" placeholder="Upto 250 characters"></textarea>
                </div>

                <div class="form-group">
                    <label for="dated">Date</label>
                    <input type="date" name="dated" id="dated" class="form-control datepicker">
                  </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save QI') }}
                    </button>
                </div>


            </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
@endsection
