@extends('layouts.public')



@section('page-specific-css')
  <!-- Datatables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection



@section('body')
  <div class="container-fluid">
    <div class="row form-group">
      <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right page-top-button" data-toggle="modal" data-target="#addAgreementModal">
          Add Agreement
        </button>
        <button type="button" class="btn btn-primary float-right page-top-button" data-toggle="modal" data-target="#addAgencyModal">
          Add Agency
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addAgreementModal" tabindex="-1" role="dialog" aria-labelledby="addCertLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post" action="#">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCertLabel">Add Agreement</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="agreement_code">Agreement Code</label>
                    <input id="agreement_code" class="form-control" type="text" name="agreement_field" placeholder="TTT9909">
                  </div>
                  <div class="form-group">
                    <label for="agency">Agency</label>
                    <input id="agency" class="form-control" type="text" name="agency_field" placeholder="TTT">
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

        <!-- Modal -->
        <div class="modal fade" id="addAgencyModal" tabindex="-1" role="dialog" aria-labelledby="addCertLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form method="post" action="#">
                <div class="modal-header">
                  <h5 class="modal-title" id="addCertLabel">Add Agency</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="agency">Agency Abbreviation</label>
                    <input id="agency" class="form-control" type="text" name="agency_field" placeholder="TTT">
                  </div>
                  <div class="form-group">
                    <label for="agency_long_name">Agency</label>
                    <input id="agency_long_name" class="form-control" type="text" name="agency_long_name_field" placeholder="Test Agency Name">
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
          <table id="agreement-certs-table" class="table table-striped table-bordered" cellspacing="0" width="100%" style="display:none">
            <thead>
              <tr>
                <th>Agreement</th>
                <th>Agency</th>
                <th>Agency Long Name</th>
                <th>Account Managers</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>OIR9959</td>
                <td>NITC</td>
                <td>National Information Technology Center</td>
                <td>Steve Stevenson, <br />Jeff Jefferson</td>
                <td>
                  <button type="button" class="btn btn-secondary">Edit Agreement</button>
                  <button type="button" class="btn btn-secondary">Edit Contacts</button>
                </td>
              </tr>
              </tr>
              <tr>
                <td>FSA0322</td>
                <td>FSA</td>
                <td>Farm Service Agency</td>
                <td>Steve Stevenson, <br />Jeff Jefferson</td>
                <td>
                  <button type="button" class="btn btn-secondary">Edit Agreement</button>
                  <button type="button" class="btn btn-secondary">Edit Contacts</button>
                </td>
              </tr>
              <tr>
                <td>FSX0245</td>
                <td>FS</td>
                <td>Forest Service</td>
                <td>Steve Stevenson, <br />Jeff Jefferson</td>
                <td>
                  <button type="button" class="btn btn-secondary">Edit Agreement</button>
                  <button type="button" class="btn btn-secondary">Edit Contacts</button>
                </td>
              </tr>
              <tr>
                <td>FSX0247</td>
                <td>FS</td>
                <td>Forest Service</td>
                <td>Steve Stevenson, <br />Jeff Jefferson</td>
                <td>
                  <button type="button" class="btn btn-secondary">Edit Agreement</button>
                  <button type="button" class="btn btn-secondary">Edit Contacts</button>
                </td>
              </tr>
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
      $('#agreement-certs-table').DataTable( {
        dom: 'Bfrtip',
        buttons: 
          [
            {
              extend: 'copy',
              exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
              extend: 'csv',
              exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
              extend: 'excel',
              exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
              extend: 'pdf',
              exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
            {
              extend: 'print',
              exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
            },
          ]
      } );
      $('#agreement-certs-table').show(); //The table is hidden when the page is built, then shown after all the content is formatted.
    } );
  </script>
@endsection