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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCertModal">
          Add Cert
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addCertModal" tabindex="-1" role="dialog" aria-labelledby="addCertLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">

              <form method="post" action="#">

                <div class="modal-header">
                  <h5 class="modal-title" id="addCertLabel">Add Cert</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
                  <div class="form-group">
                    <label for="url">URL</label>
                    <input id="url" class="form-control" type="text" name="url_field" placeholder="www.google.com" />
                  </div>

                  <div class="form-group">
                    <label for="agreement">Agreement</label>
                    <select class="form-control" id="agreement" name="agreement_field">
                      <option selected>TTT0909</option>
                      <option>TSX9385</option>
                      <option>LTR1122</option>
                      <option>DSL9384</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="expiration_date">Expiration Date</label>
                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                      <input type="text" id="expiration_date" class="form-control datetimepicker-input" data-target="#datetimepicker1" />
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="serial_number">Serial Number</label>
                    <input id="serial_number" class="form-control" type="text" name="serial_number_field" placeholder="56078e8e6108c85f0000000050db239e" />
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
              <tr>
                <td>9</td>
                <td>2018-07-06</td>
                <td>www.google.com</td>
                <td>2018-05-29</td>
                <td>Can't Reach Site</td>
                <td>INC#00000237243</td>
                <td>OIR9959</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>9</td>
                <td>2018-12-05</td>
                <td>duckduckgo.com</td>
                <td>2014-08-07</td>
                <td>2014-08-07</td>
                <td>INC#00000456785</td>
                <td>OIR9959</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td>2015-01-21</td>
                <td>www.bing.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000425638</td>
                <td>OIR9959</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>121</td>
                <td>2015-09-21</td>
                <td>www.yahoo.com</td>
                <td>2018-05-29</td>
                <td>Can't Reach Site</td>
                <td>INC#00000147586</td>
                <td>FSA0322</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>68</td>
                <td>2016-02-11</td>
                <td>www.dogpile.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000374258</td>
                <td>FSA0322</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>12</td>
                <td>2018-07-18</td>
                <td>mail.google.com</td>
                <td>2018-05-29</td>
                <td>Expired</td>
                <td>INC#00000024515</td>
                <td>FSA0322</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>11</td>
                <td>2017-12-15</td>
                <td>www.yippy.com</td>
                <td>2016-10-19</td>
                <td>2016-10-19</td>
                <td>INC#00000012567</td>
                <td>FSA0322</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>26</td>
                <td>2017-02-15</td>
                <td>www.msn.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000012587</td>
                <td>FSX0245</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>54</td>
                <td>2017-11-03</td>
                <td>analytics.google.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000126999</td>
                <td>FSX0245</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td>2017-10-13</td>
                <td>maps.google.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000134679</td>
                <td>FSX0247</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>110</td>
                <td>2017-10-15</td>
                <td>planet.google.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000555555</td>
                <td>FSX0247</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
                </td>
              </tr>
              <tr>
                <td>8</td>
                <td>2017-10-14</td>
                <td>maps.yahoo.com</td>
                <td>2018-05-29</td>
                <td>2018-05-29</td>
                <td>INC#00000555556</td>
                <td>FSX0247</td>
                <td>
                  <button type="button" class="btn btn-secondary">Send Mail</button>
                  <button type="button" class="btn btn-secondary">Edit Cert</button>
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
    } );
      $(function() {
        $('#datetimepicker1').datetimepicker({
          format: 'L'
        });
      });
  </script>

  <!-- Tempus Dominus (datetime picker) JS -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
@endsection