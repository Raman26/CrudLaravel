@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Add Employee') }}
                <a  href="{{ route('employee.index') }}" class="float-right text-white">Employee List</a></div>

                <div class="card-body">
                <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('employee.index') }}" class="btn btn-info pull-right mb-3">Back</a>
                        </div>
                </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $employee->phone }}</td>
                            </tr>
                            
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection