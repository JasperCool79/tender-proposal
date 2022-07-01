@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class="px-3">
                            {{ __('List Of Your Tender Proposals') }}
                        </div>
                        <div class="px-3">
                            <a href="{{route('proposals.create')}}" class="btn btn-success">Create New Tender Proposal</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {!! dd($proposals) !!} --}}
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
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
