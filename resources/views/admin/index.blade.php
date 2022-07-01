@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Tender Proposals By Admin View') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tinder Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Location</th>
                            <th scope="col">Dead Line</th>
                            <th scope="col">Budget</th>
                            <th scope="col">Status</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposals as $proposal)
                                <tr>
                                    <th scope="row">{{++$loop->index}}</th>
                                    <td>{{$proposal->tender_name}}</td>
                                    <td>{{$proposal->date}}</td>
                                    <td>{{$proposal->location}}</td>
                                    <td>{{$proposal->dead_line}}</td>
                                    <td>{{number_format($proposal->budget)}}</td>
                                    <td>{{$proposal->status_string}}</td>
                                    <td>{{$proposal->user_id}}</td>
                                    <td>
                                        @if ($proposal->status === 0)
                                            <button data-id="{{$proposal->id}}" id="approve" class="btn btn-sm btn-success">Approve</button>&nbsp;<button data-id="{{$proposal->id}}"  id="reject" class="btn btn-sm btn-danger">Reject</button>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-stop-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M5 6.5A1.5 1.5 0 0 1 6.5 5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3z"/>
                                            </svg>
                                        @endif
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click', '#approve', function(event) {
        event.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/proposals/update/'+id+'?status=1',
            dataType: 'json',
            success:function(data){
                location.reload()
            },
            fail: function(){
                alert('request failed');
                location.reload()
            }
        });

    });
    $(document).on('click', '#reject', function(event) {
        event.preventDefault();
        var id = $(this).data("id");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'/proposals/update/'+id+'?status=2',
            dataType: 'json',
            success:function(data){
                location.reload()
            },
            fail: function(){
                alert('request failed');
                location.reload()
            }
        });
    });
 </script>
@endsection
