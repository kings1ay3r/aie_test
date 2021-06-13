<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap"
            rel="stylesheet"
        />
        <!-- Styles -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            integrity="undefined"
            crossorigin="anonymous"
        />
        <style>
            h2 {
                padding-top: 15px;
            }
            * {
                box-sizing: border-box;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            body {
                font-family: Helvetica;
                -webkit-font-smoothing: antialiased;
                /* background: rgba( 71, 147, 227, 1); */
            }
            h2,
            h3 {
                text-align: center;
                font-size: 18px;
                text-transform: uppercase;
                letter-spacing: 1px;
                padding: 30px 0;
            }
            h2 {
                color: white;
            }

            /* Table Styles */

            .table-wrapper {
                margin: 10px 70px 70px;
                box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
            }

            .fl-table {
                border-radius: 5px;
                font-size: 12px;
                font-weight: normal;
                border: none;
                border-collapse: collapse;
                width: 100%;
                max-width: 100%;
                white-space: nowrap;
                background-color: white;
            }

            .fl-table td,
            .fl-table th {
                text-align: center;
                padding: 8px;
            }

            .fl-table td {
                border-right: 1px solid #f8f8f8;
                font-size: 12px;
            }

            .fl-table thead th {
                color: #ffffff;
                background: #4fc3a1;
            }

            .fl-table thead th:nth-child(odd) {
                color: #ffffff;
                background: #324960;
            }

            .fl-table tr:nth-child(even) {
                background: #f8f8f8;
            }

            /* Responsive */

            @media (max-width: 767px) {
                .fl-table {
                    display: block;
                    width: 100%;
                }
                .table-wrapper:before {
                    content: "Scroll horizontally >";
                    display: block;
                    text-align: right;
                    font-size: 11px;
                    color: white;
                    padding: 0 0 10px;
                }
                .fl-table thead,
                .fl-table tbody,
                .fl-table thead th {
                    display: block;
                }
                .fl-table thead th:last-child {
                    border-bottom: none;
                }
                .fl-table thead {
                    float: left;
                }
                .fl-table tbody {
                    width: auto;
                    position: relative;
                    overflow-x: auto;
                }
                .fl-table td,
                .fl-table th {
                    padding: 20px 0.625em 0.625em 0.625em;
                    height: 60px;
                    vertical-align: middle;
                    box-sizing: border-box;
                    overflow-x: hidden;
                    overflow-y: auto;
                    width: 120px;
                    font-size: 13px;
                    text-overflow: ellipsis;
                }
                .fl-table thead th {
                    text-align: left;
                    border-bottom: 1px solid #f7f7f9;
                }
                .fl-table tbody tr {
                    display: table-cell;
                }
                .fl-table tbody tr:nth-child(odd) {
                    background: none;
                }
                .fl-table tr:nth-child(even) {
                    background: transparent;
                }
                .fl-table tr td:nth-child(odd) {
                    background: #f8f8f8;
                    border-right: 1px solid #e6e4e4;
                }
                .fl-table tr td:nth-child(even) {
                    border-right: 1px solid #e6e4e4;
                }
                .fl-table tbody td {
                    display: block;
                    text-align: center;
                }
            }
        </style>
    </head>
    <body>
        <div class="">
            <div class="content"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title m-b-md">
                            <h3>
                                {{ $title }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="fl-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Age</th>
                                    <th>Date of Joining</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->employee_name}}</td>
                                    <td>{{$employee->employee_age}}</td>
                                    <td>{{$employee->employee_doj}}</td>
                                    <td>
                                        <a
                                            href="#"
                                            class="ajax_submit edit_button"
                                            data-e_id="{{$employee->id}}"
                                            onclick="launchform({{$employee->id}})"
                                            >Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <form class="update_employee" id="update_employee" hidden>
                            <h4>Edit Data</h4>>
                            <input type="text" name="employee_name" />
                            <input type="number" name="employee_age" />
                            <input type="date" name="employee_doj" />
                            <input type="submit" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="modal" id="e_form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="update_employee">
                            <input type="text" name="employee_name" />
                            <input type="number" name="employee_age" />
                            <input type="date" name="employee_doj" />
                            <input
                                type="hidden"
                                value="0"
                                id="form_identifier"
                            />
                            <input type="submit" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="undefined"
        crossorigin="anonymous"
    ></script>
    <script>
        function launchform(eid) {
            $(".update_employee").removeAttr("hidden");
            $(".update_employee").reset();
            $(".update_employee").attr('action', '/api/edit_employee/'+eid);
        }
        $(".update_employee").submit(function (e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var url = form.attr("action");
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function (data) {
                    alert("Updated Values Succesfully"); // show response from the php script.
                    location.reload();
                },
            });
        });
    </script>
</html>
