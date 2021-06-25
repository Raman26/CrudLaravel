@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header  bg-primary text-white">{{ __('Add Company') }}
                <a  href="{{ route('company.index') }}" class="text-white float-right">Company List</a></div>

                <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('company.index') }}" class="btn btn-info pull-right mb-3">Back</a>
                        </div>
                </div>
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $company->email }}</td>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <td>
                                    <img src="{{ $company->logo }}" alt="" style="width:200px" class="img-reponsive" />
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $company->created_at->diffForHumans() }}</td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection