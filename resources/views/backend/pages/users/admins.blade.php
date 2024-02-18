@extends('layouts.app')
@section('title', $title)
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="card px-3 py-3">
            <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                <h2 class="backend-title">{{ $title }}</h2>
                <div class="email-template-search-bar btn-group d-flex align-items-center">
                    <input type="text" id="datatable-search" class="h-100 border"
                        placeholder="Section Name ,Title....">
                    <button type="button"
                        class="mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded"><i
                            class="mdi mdi-magnify"></i></button>
                </div>
            </div>
            <table id="allAdmins" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    var tables  = $('#allAdmins').DataTable({
        processing: true,
        serverSide: true,
        order: [], //Initial no order
        bInfo: true, //TO show the total number of data
        bFilter: false, //For datatable default search box show/hide
        responsive: true,
        ordering: false,
        lengthMenu: [
            [5, 10, 15, 25, 50, 100, 1000, 10000, -1],
            [5, 10, 15, 25, 50, 100, 1000, 10000, "All"]
        ],
        pageLength: 25, //number of data show per page
        ajax: {
            url: "{{ route('admin.user.management.get.data') }}",
            type: "POST",
            dataType: "JSON",
            data: function(d) {
                d._token = _token,
                d.search   = $('#datatable-search').val();
            },
        },
        columns: [
            {data: 'DT_RowIndex',orderable: false, searchable: false},
            {data: 'fname'},
            {data: 'lname'},
            {data: 'email'},
            {data: 'avatar'},
            {data: 'phone'},
            {data: 'status'},
            {data: 'action'},
        ],
        language: {
            processing: '<img src="{{ asset('backend/assets/images/table-loading.svg') }}">',
            emptyTable: '<strong class="text-danger">No Data Found</strong>',
            infoEmpty: '',
            zeroRecords: '<strong class="text-danger">No Data Found</strong>',
            oPaginate: {
                sPrevious: "Previous", // This is the link to the previous page
                sNext: "Next", // This is the link to the next page
            },
            lengthMenu: "_MENU_"
        },
        dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6' <'float-right pr-15'B>>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'<'float-right pr-15'p>>>",
        buttons: {
            buttons: [{
                    text: '<i class="fa fa-refresh" aria-hidden="true"></i> Reload',
                    className: 'mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    action: function(e, dt, node, config) {
                        dt.ajax.reload(null, false);
                    }
                },
                {
                    extend: 'pdf',
                    title: 'Admins',
                    filename: 'admins_{{ date('d-m-Y') }}',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
                    className: 'pdfButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    orientation: "landscape",
                    pageSize: "A4",
                    exportOptions: {
                        columns: '0,1,2,3,4,5,6'
                    },
                    customize: function(doc) {
                        doc.defaultStyle.alignment = 'center';
                    }
                },
                {
                    extend: 'excel',
                    title: 'Admins',
                    filename: 'admins_{{ date('d-m-Y') }}',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel',
                    className: 'excelButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    exportOptions: {
                        columns: '0,1,2,3,4,5,6'
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                    className: 'printButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    orientation: "landscape",
                    pageSize: "A4",
                    exportOptions: {
                        columns: '0,1,2,3,4,5,6'
                    }
                }
            ]
        }
    });
    $(document).on('keyup keyup','input#datatable-search',function(e){
        tables.draw();
    });

    // Admin Status Change
    function roleChange(userid){
        var role = $('#role_change_'+userid).val();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able change this user role!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Change It !"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('admin.user.management.role.change') }}",
                    method: "POST",
                    data: {
                        _token : _token,
                        userid : userid,
                        role: role
                    },
                    success: function(res) {
                        if(res.status == 'success'){
                            flashMessage(res.status,res.message);
                            location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    }

</script>
@endpush
