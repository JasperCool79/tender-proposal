@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Tender Proposal') }}</div>

                <div class="card-body">
                    @if ($errors->has('error-message'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('error-message') }}
                      </div>
                    @endif
                    <form method="POST" action="{{ route('proposals.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tender Name') }}</label>

                            <div class="col-md-6">
                                <input id="tender_name" type="text" class="form-control @error('tender_name') is-invalid @enderror" name="tender_name" value="{{ old('tender_name') }}">

                                @error('tender_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}">

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}">

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dead-line" class="col-md-4 col-form-label text-md-right">{{ __('Dead Line') }}</label>

                            <div class="col-md-6">
                                <input id="dead-line" type="date" class="form-control @error('dead_line') is-invalid @enderror" name="dead_line">

                                @error('dead_line')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="budget" class="col-md-4 col-form-label text-md-right">{{ __('Budget') }}</label>

                            <div class="col-md-6">
                                <input id="budget" type="number" class="form-control @error('budget') is-invalid @enderror" name="budget">

                                @error('budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input id="user_id" type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Proposal') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
