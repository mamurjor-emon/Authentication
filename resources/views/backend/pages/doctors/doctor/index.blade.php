@extends('layouts.app')
@section('title', $title)
@section('add_button')
    <div>
        <a href="{{ route('admin.doctor.create') }}" class="create-btn btn btn-md mr-3 d-flex justify-content-between align-items-center text-white">
            <i class="material-icons">add</i>
            <span>Create</span>
        </a>
    </div>
@endsection
@section('content')
    <div class="row mt-3">
        <div class="col-md-12">
        <div class="card px-3 py-3">
            <div class="bg-white border-bottom-0 pb-4 d-flex justify-content-between align-items-center flex-row">
                <h2 class="backend-title">{{ $title }}</h2>
                <div class="email-template-search-bar btn-group d-flex align-items-center">
                    <input type="text" id="datatable-search" class="h-100 border"
                        placeholder="FName,Lname,Email,Deparment....">
                    <button type="button"
                        class="mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded"><i
                            class="mdi mdi-magnify"></i></button>
                </div>
            </div>
            <table id="doctors" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Position</th>
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
    var tables  = $('#doctors').DataTable({
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
            url: "{{ route('admin.doctor.get.data') }}",
            type: "POST",
            dataType: "JSON",
            data: function(d) {
                d._token = _token,
                d.search   = $('#datatable-search').val();
            },
        },
        columns: [
            {data: 'DT_RowIndex',orderable: false, searchable: false},
            {data: 'name'},
            {data: 'email'},
            {data: 'department'},
            {data: 'phone'},
            {data: 'image'},
            {data: 'position'},
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
                    title: 'Department',
                    filename: 'department_{{ date('d-m-Y') }}',
                    text: '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> PDF',
                    className: 'pdfButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    orientation: "landscape",
                    pageSize: "A4",
                    exportOptions: {
                        columns: '0,1,2'
                    },
                    customize: function(doc) {
                        doc.defaultStyle.alignment = 'center';
                    }
                },
                {
                    extend: 'excel',
                    title: 'Department',
                    filename: 'department_{{ date('d-m-Y') }}',
                    text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel',
                    className: 'excelButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    exportOptions: {
                        columns: '0,1,2'
                    },
                },
                {
                    extend: 'print',
                    text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                    className: 'printButton mdc-button mdc-button--raised filled-button--info mdc-ripple-upgraded mb-3',
                    orientation: "landscape",
                    pageSize: "A4",
                    exportOptions: {
                        columns: '0,1,2'
                    }
                }
            ]
        }
    });
    $(document).on('keyup keyup','input#datatable-search',function(e){
        tables.draw();
    });
</script>
@endpush
