@extends('layouts.app')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Company List') }} 
                <a  href="{{ route('company.create') }}" class="float-right text-white"><b>Add New Company</b></a></div>
                <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block mt-2">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                    <table id="tablist" class="display table">
                        <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Company Name</th>
                            <th>Website</th>
                            <th>Logo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ ucfirst($row->name) }}</td>
                            <td>{{ $row->website }}</td>
                            <td><img src="{{ $row->logo }}" alt="" style="width:100px" /></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('company.edit', $row->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('company.show', $row->id) }}" type="button" class="btn btn-success">Show</a>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_post_{{ $row->id }}">
                                <i class="fa fa-trash"></i> delete
                            </button>

                                    <div class="modal fade" id="delete_post_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{ route('company.destroy', $row->id) }}" id="form_delete_post_{{ $row->id }}" method="post">
                                                @csrf
                                                @method('DELETE');
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete "<b>{{ $row->name }}</b>" Company?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger">Yes! Delete It</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#tablist').DataTable();
    } );
</script>
@endsection