@extends('template.mains')
@section('title', 'Employment Survey Record')
@section('content')
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   @if(session('error'))
   <script>
       Swal.fire({
           icon: 'error',
           title: 'Error!',
           text: '{{ session('error') }}',
           timer: 1000,
           showConfirmButton: false
       })
   </script>
   @endif
<style>
     @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        *{
            font-family: 'Poppins';
        }
    .bold-blue {
        font-weight: bold;
        color: blue;
    }

    #table {
        table-layout: fixed;
    }

    th, td {
        text-align: center;
    }

    #table th:first-child,
    #table td:first-child,
    #table th:nth-child(2),
    #table td:nth-child(2),
    #table th:nth-child(3),
    #table td:nth-child(3) {
        position: sticky;
        left: 0;
        z-index: 1;
        background-color: white;
    }

    #table th:nth-child(n+4),
    #table td:nth-child(n+4) {
        position: sticky;
        z-index: 0;
    }
    .content{
        margin-left: -17rem;
    }
    h1{
        position: relative;
        width: 700px;
        left: -17rem;
    }
    .pointer-cursor {
        cursor: pointer;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">@yield('title')</h1>
    </div>
    </div>
    </div>
    </div>
    @if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ session('error') }}',
        timer: 5000,
        showConfirmButton: true
    })
</script>
@endif

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-header">
                            <div id="toolbar">
                                <form id="filterForm" action="{{ route('index.employmentdata') }}" method="GET">
                                    @csrf
                                    <select name="batchNumber" id="batchNumberFilter" class="form-control pointer-cursor" style="width: 200px; display: inline-block;">
                                        <option value="">Select Batch Number</option>
                                        @foreach($employmentdata->unique('batchNumber') as $data)
                                            <option value="{{ $data->batchNumber }}">{{ $data->batchNumber }}</option>
                                        @endforeach
                                    </select>
                                    <select name="employment_status" id="employmentStatusFilter" class="form-control pointer-cursor" style="width: 200px; display: inline-block;">
                                        <option value="">Select Employment Status</option>
                                        @foreach($employmentdata->unique('employment_status') as $data)
                                            <option value="{{ $data->employment_status }}">{{ $data->employment_status }}</option>
                                        @endforeach
                                    </select>
                                    <?php
                                        // Default to current month and year
                                        $currentMonth = date('Y-m');
                                        // Check if filter_month is set in the request
                                        if (request()->has('filter_month')) {
                                            $currentMonth = request('filter_month');
                                        }
                                    ?>
                                    <input type="month" name="filter_month" id="filterMonth" value="{{ $currentMonth }}" class="form-control pointer-cursor" style="width: 200px; display: inline-block;">
                                    <button type="submit" class="btn btn-primary pointer-cursor">Filter</button>
                                </form>

                            </div>


                            <div id="toolbar">
                                <button id="exportExcelButton" class="btn btn-success"><i class="fa-solid fa-download" style="margin: 5px;"></i>Export to Excel</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table"
                                   data-toggle="table"
                                   data-search="true"
                                   data-show-export="true"
                                   data-pagination="true"
                                   data-page-list="[5, 10, 25, 50, 100, 250, 500]"
                                   data-toolbar="#toolbar"
                                   class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="action" data-filter-control="input">Action</th>
                                        <th data-field="emp_id" data-filter-control="input">#</th>
                                        <th data-field="batchNumber" data-filter-control="input">SDTP Batch #</th>
                                        <th data-field="name" data-filter-control="input">Name</th>
                                        <th data-field="employment_status" data-filter-control="input">Employment Status</th>
                                        <th data-field="company_name" data-filter-control="input">Company Name</th>
                                        <th data-field="job_title" data-filter-control="input">Job Title</th>
                                        <th data-field="location" data-filter-control="input">Location</th>
                                        <th data-field="remarks" data-filter-control="input">Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employmentdata as $data)
                                    <tr data-batchNumber="{{ $data->batchNumber }}" data-employmentStatus="{{ $data->employment_status }}">
                                        <td class="bs-checkbox"><input data-index="{{ $loop->index }}" name="btSelectItem" type="checkbox"></td>
                                        <td>
                                            <form class="d-inline" action="{{ route('employmentdata.edit', $data->emp_id) }}" method="GET">
                                                <button type="submit" class="btn btn-success btn-sm mr-1">
                                                    <i class="fa-solid fa-pen"></i> Edit
                                                </button>
                                            </form>

                                        </td>
                                        <td>{{ $data->emp_id }}</td>
                                        <td>{{ $data->batchNumber }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->employment_status }}</td>
                                        <td>{{ $data->company_name }}</td>
                                        <td>{{ $data->job_title }}</td>
                                        <td>{{ $data->location }}</td>
                                        <td>{{ $data->remarks }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    @endsection
    <script>
        $(document).ready(function() {
            $('#batchNumberFilter, #employmentStatusFilter, [name="filter_month"]').on('change', function() {
                $('#filterForm').submit();
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/TableExport/5.2.0/js/tableexport.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.3/xlsx.full.min.js"></script>
    <script>
    $(function () {
        var $table = $('#table');

        $('#exportExcelButton').click(function () {
            exportTableToExcel($table);
        });

        $('#batchNumberFilter, #employmentStatusFilter').change(function () {
            var selectedBatch = $('#batchNumberFilter').val();
            var selectedStatus = $('#employmentStatusFilter').val();
            var filters = {};
            if (selectedBatch) {
                filters.batchNumber = selectedBatch;
            }
            if (selectedStatus) {
                filters.employment_status = selectedStatus;
            }
            $table.bootstrapTable('filterBy', filters);
        });

        $table.bootstrapTable();

        $table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
            var selectedRows = $table.bootstrapTable('getSelections');
            var exportButton = $('#exportExcelButton');

            if (selectedRows.length > 0) {
                exportButton.prop('disabled', false);
            } else {
                exportButton.prop('disabled', true);
            }
        });
    });

    function exportTableToExcel($table) {
        var rows = $table.bootstrapTable('getData', {useCurrentPage: true, includeHiddenRows: false});

        if (rows.length === 0) {
            alert('No rows to export');
            return;
        }

        var headers = [];
        $table.find('thead th').each(function () {
            var headerText = $(this).text().trim();
            if (headerText && headerText !== 'Action' && headerText !== '') {
                headers.push(headerText);
            }
        });

        var data = rows.map(function (row) {
            return headers.map(function (header) {
                var key = $table.find('th:contains("' + header + '")').data('field');
                return row[key] || '';
            });
        });

        var workbook = XLSX.utils.book_new();
        var worksheet = XLSX.utils.aoa_to_sheet([headers].concat(data));
        XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

        XLSX.writeFile(workbook, 'Alumni Record.xlsx');
    }




    </script>

