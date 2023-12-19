@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-left"> Banks List</div>
                    <div class="pull-right"> <a href="{{ url('/admin/create-banks2') }}" class="btn btn-md btn-primary"> + Add Bank</a> </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table" id="banks-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">BankName</th>
                                <th scope="col">BankCode</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script>
    $(function() {
        
        $('#banks-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/get-banks2') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'BankName', name: 'BankName'},
                {data: 'BankCode', name: 'BankCode'},
                {data: 'edit', name: 'edit', orderable: false, searchable: false},
                {data: 'delete', name: 'delete', orderable: false, searchable: false},
            ]
        });
    });

    function deleteBank(id) {
        if (confirm("Are you sure you want to delete?")) {
            window.location.href = "{{ url('admin/delete-banks2') . '/' }}" + id;
        } else {
            return false;
        }
    }
</script>
@endsection
