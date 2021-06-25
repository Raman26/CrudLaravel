@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Edit employee') }}
                <a  href="{{ route('employee.index') }}" class="float-right">Employee List</a></div>

                <div class="card-body">
                <form method="post" action="{{ route('employee.update', $employee->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}" autocomplete="name" autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('email') is-invalid @enderror" name="phone" value="{{ $employee->phone }}" autocomplete="phone">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                            <div class="col-md-6">
                                <select id="company_name" class="form-control @error('company_name') is-invalid @enderror"  name="company_name">
                                    <option disable >Select Company</option>
                                    @foreach($companies as $show)
                                        <option selected="@if($show->id == $employee->company_id) ? selected : '' @endif " value="{{ $show->id }}">{{ $show->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block mt-2">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-2">{{ $error }}</div>
                            @endforeach
                        @endif
                    </form>
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('employee.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection