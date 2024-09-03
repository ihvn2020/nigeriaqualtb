@extends('layouts.theme')

@section('content')
    @php $pagetype="report"; @endphp

    <h3 class="page-title">NOTIFICATIONS | <small style="color: green">View All</small></h3>
    <div class="row">



        <div class="panel">
            <a href="{{ url('new-user') }}" class="btn btn-primary pull-right" style="margin-bottom: 10px;">New User</a>

            <div class="panel-body">
                <h1>Send Notification</h1>
                    <form action="{{ route('sendNotification') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input id="title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Notification Message:</label>
                            <textarea id="message" name="message" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="actionUrl">Action URL (Optional):</label>
                            <input id="actionUrl" name="actionUrl" class="form-control" value="#">
                        </div>
                        <button type="submit" class="btn btn-primary">Send Notification</button>
                    </form>
            </div>
        </div>

    </div>



@endsection
