@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Edit Company') }}
                <a  href="{{ route('company.index') }}" class="float-right text-white">Company List</a></div>

                <div class="card-body">
                <form method="post" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}" autocomplete="name" autofocus>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->email }}" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ $company->website }}" autocomplete="website">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ $company->address }}" autocomplete="address">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="logo" class="col-md-4 col-form-label text-md-right">{{ __('Logo') }}</label>

                            <div class="col-md-6">
                                
                                <input id="logo" type="file" name="logo" >

                                <input type="hidden" name="old_logo" value="{{ $company->logo }}">
                                
                                @if($company->logo == "")
                                        <img src="{{ $company->logo }}" alt="" style="width:200px" />
                                @endif
                                    
                                @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                    <a href="{{ route('company.index') }}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection