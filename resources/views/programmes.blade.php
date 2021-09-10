@extends('layouts.theme')

@section('content')
    @php $modal="programme"; @endphp

    <h3 class="page-title">Publish | <small style="color: green">Posts/ Programmes / Events</small></h3>
    <div class="row">
            <div class="panel">
                <div class="panel-heading">
                    
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#programme">Add New</a>
                    
                    
                </div>
                <div class="panel-body">
                    <table class="table  responsive-table">
                        <thead>
                            <tr style="color: ">
                                <th>Banner</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Category</th>
                                <th>Host</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programmes as $prog)

                                <tr>
                                    <td width="20%"><img src="{{asset('/images/'.$prog->picture)}}" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="Image" width="100%" height="auto"></td>
                                    <td><b>{{$prog->title}}</b><br>{{$prog->details}}</td>
                                    <td><b>{{$prog->from==$prog->to?$prog->from:$prog->from." to ".$prog->to}}</b></td>
                                    <td>{{$prog->type}}</td>
                                    <td>{{$prog->category}}</td>
                                    <td>{{$prog->ministry}}</td>
                                    <td>
                                        
                                        <button class="label label-primary" id="ach{{$prog->id}}" onclick="programme({{$prog->id}})"  data-toggle="modal" data-target="#programme" data-title="{{$prog->title}}" data-type="{{$prog->type}}" data-from="{{$prog->from}}" data-from="{{$prog->from}}"  data-to="{{$prog->to}}"  data-details="{{$prog->details}}"  data-category="{{$prog->category}}"  data-picture="{{$prog->picture}}"  data-ministry="{{$prog->ministry}}">Edit</button>
                                    <a href="/delete-prog/{{$prog->id}}" class="label label-danger"  onclick="return confirm('Are you sure you want to delete the post: {{$prog->title}}?')">Delete</a>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
                    <div style="text-align: right">
                        {{$programmes->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        
    </div>
    

    <!-- Button to Open the Modal -->

  
  <!-- The Modal -->
  <div class="modal" id="programme">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New Post</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            
            <form method="POST" action="{{ route('addprogramme') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id">
                                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="type">Type</label>
                        <select class="form-control" name="type" id="type">
                          <option value="News">News</option>
                          <option value="Event">Event</option>
                          <option value="Programme">Programme</option>
                          <option value="Announcement">Announcement</option>
                          <option value="Sermon">Sermon/Message</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="from">Start Date</label>
                        <input type="text" name="from" id="from" class="form-control">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="to">End Date</label>
                        <input type="text" name="to" id="to" class="form-control">
                    </div>
                    
                </div>
        
                <div class="form-group">
                    <label for="details"  class="control-label">Details</label>
                    <textarea name="details" id="details" class="form-control" placeholder="Details" rows="4"></textarea>
                </div>
                <div class="row">
                    
                    <div class="form-group col-md-6">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                        <option value="Upcoming">Upcoming</option>
                        <option value="Past">Past</option>
                        <option value="Periodic">Periodic</option>
                        <option value="Others">Others</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="ministry" class="control-label">Organizer / Host</label>
                        <select class="form-control" name="ministry" id="ministry">
                            <option value="Church" selected>Church</option>
                            @foreach ($ministries as $mins)
                                <option value="{{$mins->name}}">{{$mins->name}}</option>
                            @endforeach                                          
                        
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="picture">Upload Featured Image</label>
                    <input type="file" name="picture" id="picture" class="form-control">
                </div>

                
            

                

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Publish Post') }}
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