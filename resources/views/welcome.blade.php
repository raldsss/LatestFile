@extends('template.main')
@section('title', 'Alumni')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.18.3/bootstrap-table.min.css">

<style>
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
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">@yield('title')</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="/alumni/create" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Alumni</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="toolbar">
                                <button id="exportExcelButton" class="btn btn-success"><i class="fa-solid fa-download" style="margin: 5px;"></i>Export to Excel</button>
                            </div>
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
                                        <th data-filter-control="input">#</th>
                                        <th data-filter-control="input">First Name</th>
                                        <th data-filter-control="input">Middle Name</th>
                                        <th data-filter-control="input">Last Name</th>
                                        <th data-filter-control="input">Street Address</th>
                                        <th data-filter-control="input">Barangay</th>
                                        <th data-filter-control="input">City</th>
                                        <th data-filter-control="input">District</th>
                                        <th data-filter-control="input">Province</th>
                                        <th data-filter-control="input">Region</th>
                                        <th data-filter-control="input">Birth Date</th>
                                        <th data-filter-control="input">Age</th>
                                        <th data-filter-control="input">Gender</th>
                                        <th data-filter-control="input">Nationality</th>
                                        <th data-filter-control="input">Civil Status</th>
                                        <th data-filter-control="input">Email</th>
                                        <th data-filter-control="input">Batch #</th>
                                        <th data-filter-control="input">Training Status</th>
                                        <th data-filter-control="input">Scholarship</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumni as $data)
                                    <tr>
                                        <td class="bs-checkbox"><input data-index="{{ $loop->index }}" name="btSelectItem" type="checkbox"></td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $data->alumni_id }}" data-id="{{ $data->alumni_id }}">
                                                <i class="fa-solid fa-pen-to-square" style="margin: 5px; font-size:15px;"></i>Edit
                                            </button>
                                        </td>
                                        <td>{{ $data->alumni_id }}</td>
                                        <td>{{ $data->firstName }}</td>
                                        <td>{{ $data->middleName }}</td>
                                        <td>{{ $data->lastName }}</td>
                                        <td>{{ $data->streetAddress }}</td>
                                        <td>{{ $data->barangay }}</td>
                                        <td>{{ $data->city }}</td>
                                        <td>{{ $data->district }}</td>
                                        <td>{{ $data->province }}</td>
                                        <td>{{ $data->region }}</td>
                                        <td>{{ $data->birthdate }}</td>
                                        <td>{{ $data->age }}</td>
                                        <td>{{ $data->sex }}</td>
                                        <td>{{ $data->nationality }}</td>
                                        <td>{{ $data->civil_status }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->batchNumber }}</td>
                                        <td>{{ $data->training_status }}</td>
                                        <td>{{ $data->scholarship }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
</div>

@endsection

{{-- @push('scripts') --}}
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

        // Uncheck all checkboxes on page load
        $('input[name="btSelectItem"]').prop('checked', false);

        var trBoldBlue = $("table");
        $(trBoldBlue).on("click", "tr", function () {
            $(this).toggleClass("bold-blue");
        });
    });

    function exportTableToExcel($table) {
        var selectedRows = $table.bootstrapTable('getSelections');

        if (selectedRows.length === 0) {
            alert('No rows selected');
            return;
        }

        // Extract headers and filter out unwanted columns
        var headers = [];
        $table.find('thead th').each(function () {
            var headerText = $(this).text().trim();
            if (headerText !== 'state' && headerText !== 'Action') {
                headers.push(headerText);
            }
        });

        // Extract selected rows data
        var data = selectedRows.map(function (row) {
            return headers.map(function (header) {
                var key = $table.find('th:contains("' + header + '")').data('field');
                var cellData = row[key];
                if (cellData === true) {
                    cellData = '';
                }
                return cellData;
            });
        });

        // Prepare workbook
        var workbook = XLSX.utils.book_new();
        var worksheet = XLSX.utils.aoa_to_sheet([headers].concat(data));
        XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");

        // Export workbook
        XLSX.writeFile(workbook, 'selected_table_data.xlsx');
    }

    function exportTableToPDF($table) {
        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();

        var selectedRows = $table.bootstrapTable('getSelections');
        if (selectedRows.length === 0) {
            alert('No rows selected');
            return;
        }

        var headers = [];
        $table.find('thead th').each(function() {
            headers.push($(this).text().trim());
        });

        var data = [];
        selectedRows.forEach(function(row) {
            var rowData = [];
            headers.forEach(function(header) {
                // Exclude "state" and "action" columns
                if (header !== 'state' && header !== 'Action') {
                    var key = $table.find('th:contains("' + header + '")').data('field');
                    var cellData = row[key];
                    if (cellData === true) {
                        cellData = '';
                    }
                    rowData.push(cellData);
                }
            });
            data.push(rowData);
        });

        doc.autoTable({
            head: [headers.filter(header => header !== 'state' && header !== 'Action')],
            body: data
        });

        doc.save('selected_table_data.pdf');
    }

    function calculateAge() {
        var birthdate = document.getElementById("birthdate").value;
        if (birthdate) {
            var today = new Date();
            var birthDate = new Date(birthdate);
            var age = today.getFullYear() - birthDate.getFullYear();
            var monthDifference = today.getMonth() - birthDate.getMonth();

            // Adjust age if birth month hasn't occurred yet this year
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            document.getElementById("age").value = age;
        }
    }
</script>
{{-- @endpush --}}
