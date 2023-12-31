@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2> RAJ</h2>
                    <div class="pull-left"> Countries List</div>
                    <div class="pull-right">
                        <a href="{{ url('/admin/create-country1') }}" class="btn btn-md btn-primary"> + Add Country</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table" id="artists-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Country Code</th>
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
        $('#artists-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('admin/get-countries1') }}",
            columns: [
    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
    { data: 'name', name: 'name' },
    { data: 'country_code', name: 'country_code' },
    { data: 'edit', name: 'edit', orderable: false, searchable: false },
    { data: 'delete', name: 'delete', orderable: false, searchable: false },
]


        });
    });

    function deleteArtist(id) {
        if (confirm("Are you sure want to delete ?by raj")) {
            window.location.href = "{{ url('admin/delete-country1').'/' }}" + id;
        } else {
            return false;
        }
    }
</script>
@endsection
