<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Excel Data into Database in Laravel</title>
    <!-- Add DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <!-- Display status message if any -->
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Import Excel Data into Database</h4>
                    </div>
                    <div class="card-body">
                        <!-- Form to import Excel file -->
                        <form action="{{ url('asset/import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="file" name="import_file" class="form-control" required />
                            </div>
                            <br>
                            <div class="input-group mb-3">
                                <input type="text" name="week" class="form-control" placeholder="Enter Week Number" required />
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Import</button>
                            <br>
                            <br>
                        </form>

                        <hr>

                        <!-- Table to display assets data -->
                        <table id="assetsTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Site ID</th>
                                    <th>Week</th>
                                    <th>Site Name</th>
                                    <th>AC Grouping</th>
                                    <th>Year</th>
                                    <th>NBV</th>
                                    <th>Vendor Name</th>
                                    <th>PO Number</th>
                                    <th>PO Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assets as $item)
                                <tr>
                                    <td>{{$item->SITE_ID}}</td>
                                    <td>{{$item->WEEK}}</td>
                                    <td>{{$item->SITE_NAME}}</td>
                                    <td>{{$item->AC_GROUPING}}</td>
                                    <td>{{$item->DPIS}}</td>
                                    <td>{{$item->NBV}}</td>
                                    <td>{{$item->VENDOR_NAME}}</td>
                                    <td>{{$item->PO_NUMBER}}</td>
                                    <td>{{$item->PO_DESC}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            // Initialize DataTables for the table
            $('#assetsTable').DataTable({
                "paging": true,        // Enable pagination
                "ordering": true,      // Enable sorting
                "info": true,          // Show info (records count)
                "searching": true,     // Enable search functionality
            });
        });
    </script>
</body>
</html>
