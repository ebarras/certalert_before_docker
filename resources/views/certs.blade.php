@extends('layouts.public')



@section('page-specific-css')
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

  <!-- Tempus Dominus (datetime picker) CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection



@section('body')
<div class="container-fluid">
    <div class="row form-group">
      <div class="col">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
          <p>{{ $message }}</p>
        </div>
        @endif
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
        @endif
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCertModal">
          Add Cert
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addCertModal" tabindex="-1" role="dialog" aria-labelledby="addCertLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <form method="post" action="{{ route('certs.store') }}">
                {{ csrf_field() }}
                <div class="modal-header">
                  <h5 class="modal-title" id="addCertLabel">Add Cert</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <div class="form-group">
                    <label for="url">URL *</label>
                    <input id="url" class="form-control" type="text" name="url_field" placeholder="www.google.com" />
                  </div>

                  <div class="form-group">
                    <label for="agreement">Agreement *</label>
                    <select class="form-control" id="agreement" name="agreement_field">
                      @foreach ($agreements as $agreement)
                      @if ($loop->first)
                      <option selected value="{{ $agreement->id }}">{{ $agreement->agreement_code }} - {{ $agreement->agency->name_long }}</option>
                        @continue
                      @endif
                      <option value="{{ $agreement->id }}">{{ $agreement->agreement_code }} - {{ $agreement->agency->name_long }}</option>
                    @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="expiration_date">Expiration Date *</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                      <input type="text" id="expiration_date" name="expiration_date" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="serial_number">Serial Number</label>
                    <input id="serial_number" class="form-control" type="text" name="serial_number_field" placeholder="56078e8e6108c85f0000000050db239e" />
                  </div>

                  <div class="form-group">
                    <label for="incident">Remedy Incident Number</label>
                    <input id="incident" class="form-control" type="text" name="incident_field" placeholder="INC000009955995" />
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>

              </form>

            </div>
          </div>
        </div> <!-- End Modal -->
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="table">
          <table id="home-certs-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="display:none">
            <thead>
              <tr>
                <th>Days Left</th>
                <th>Expiration Date</th>
                <th>URL</th>
                <th>Last Email</th>
                <th>Verified Date</th>
                <th>Incident #</th>
                <th>Agreement</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($certs as $cert)
              <tr>
                <td>{{ \App\Http\Controllers\HelperController::DaysFromNow($cert->expiration_date) }}</td>
                <td>{{ $cert->expiration_date }}</td>
                <td>{{ $cert->url }}</td>
                <td>{{ $cert->last_email_datetime ?? 'No Emails Sent' }}</td>
                <td>{{ $cert->expiration_datetime_verified ?? 'Verification Not Attempted' }}</td>
                <td>{{ $cert->incident ?? 'No Incident ID' }}</td>
                <td>{{ $cert->agreement->agreement_code }}</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                  <button type="button" data-id="{{ $cert->id  }}" class="btn btn-secondary verify-button">Verify</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!-- /.container -->
@endsection



@section('page-specific-js')
<!-- Datatables JS -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#home-certs-table').DataTable( {
        dom: 'Bfrtip',
        buttons: 
          [
            {
              extend: 'copy',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
              extend: 'csv',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
              extend: 'excel',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
              extend: 'pdf',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
              extend: 'print',
              exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
          ]
      } );
      $('#home-certs-table').show(); //The table is hidden when the page is built, then shown after all the content is formatted.
    
      $(function() {
        $('#datetimepicker1').datetimepicker({
          format: 'YYYY-MM-DD'
        });
      });
    });
  </script>

  <script type="text/javascript">
    //$('.verify-button').click(function (e) {
      $('body').on('click', '.verify-button', function(e) { 
        var button = $(this);
        var id = String($(this).data('id'));

        e.preventDefault();
        console.log($(this).data('id'));
        // change the route 
            $.get('/validate/' + id )

               .done(function (response) {
             // instead of button insert check icon
                  button.parent().append('<button type="button" data-id="'+ id +'" class="btn btn-success verify-button">Verified</button>');
             // remove button
                  button.remove();
                  console.log(response);
                })

                .fail(function (respnse) {
                  console.log('Some Kind of Failure in the validation of the cert');

                });
      });
  </script>

  <!-- Tempus Dominus (datetime picker) JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection