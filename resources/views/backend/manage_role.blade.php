@extends('backend.master')
@section('content')
<div class="container">
  <br>
      <div class="card">
          <div class="card-header">
              <div class="row">
                  <div class="col-md-6">
                      <h5>
                          <strong class="mr-3">Manage Roles</strong>
                      </h5>
                  </div>
                  <div class="col-md-6">
                      <button
                          type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="float: right;">
                          Add New Manage Roles
                      </button>
                  </div>
              </div>
          </div>

      <div class="card-body">
      <div class="row">
          <div class="col-md-6">
          </div>
          <div class="col-md-6">
          </div>
      </div>

      <div
          class="modal fade"
          id="exampleModalCenter"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalCenterTitle"
          aria-hidden="true"
      >
<div class="form">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="row">
                      <div class="col-md-1"></div>
                  <div class="col-md-10">
                      <br>
                      <h4 class="mb-4">
                          <strong>ADD NEW Manage Roles</strong>
                      </h4>
                      <form>
                      <div class="form-group">
                          <label for="inputEmail4"><b>Title *</b></label>
                          <small>(In Any Language)</small>
                          <input type="Text" class="form-control" id="inputEmail4" placeholder="Title" />
                      </div>
                      <div class="form-group">
                          <label for="inputEmail4"><b>Sub Title *</b></label>
                          <small>(In Any Language)</small>
                          <input type="Text" class="form-control" id="inputEmail4" placeholder="Title" />
                      </div>
                      <div class="form-group">
                                <label for="inputEmail4"><b>Description *</b></label>
                                <small>(In Any Language)</small>
                                    <textarea id="textarea" class="form-control" placeholder="Type Description"></textarea>
                                </div>
                                <br>
                      <div class="form-group">
                          <label><b>Current Featured Image *</b></label>
                          <input type="file" class="dropify" />
                          <small>Prefered Size: (600x600) or Square Sized Image</small>
                      </div>
                      <button type="button" class="btn btn-success"> Create Manage Roles</button>
                      </form>
                      <br>
                  </div>
                  <div class="col-md-1"></div>
              </div>
              </div>
          </div>
      </div>
    </div>

    <table class="table table-hover nowrap" id="example1">
      <thead class="thead-default">
        <tr>
          <th>ID</th>
          <th>Purchase Date</th>
          <th>Grand Total</th>
          <th>Shipping</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">000010</a></td>
          <td>2014/06/13</td>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">Damon</a></td>
          <td>85</td>
          <td><span class="font-size-12 badge badge-primary">Processing</span></td>
          <td>
            <a href="javascript: void(0);" class="btn btn-sm btn-light mr-2"
              ><i class="fe fe-edit mr-2"><!-- --></i> View</a
            >
            <a href="javascript: void(0);" class="btn btn-sm btn-light">
              <small
                ><i class="fe fe-trash mr-2"><!-- --></i></small
              >
              Remove</a
            >
          </td>
        </tr>
        <tr>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">000021</a></td>
          <td>2014/06/13</td>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">Damon</a></td>

          <td>85</td>
          <td><span class="font-size-12 badge badge-default">Complete</span></td>
          <td>
            <a href="javascript: void(0);" class="btn btn-sm btn-light mr-2"
              ><i class="fe fe-edit mr-2"><!-- --></i> View</a
            >
            <a href="javascript: void(0);" class="btn btn-sm btn-light">
              <small
                ><i class="fe fe-trash mr-2"><!-- --></i></small
              >
              Remove</a
            >
          </td>
        </tr>
        <tr>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">000022</a></td>
          <td>2014/09/12</td>
          <td><a href="javascript: void(0);" class="btn btn-sm btn-light">Torrey</a></td>

          <td>77</td>
          <td><span class="font-size-12 badge badge-default">Complete</span></td>
          <td>
            <a href="javascript: void(0);" class="btn btn-sm btn-light mr-2"
              ><i class="fe fe-edit mr-2"><!-- --></i> View</a
            >
            <a href="javascript: void(0);" class="btn btn-sm btn-light">
              <small
                ><i class="fe fe-trash mr-2"><!-- --></i></small
              >
              Remove</a
            >
          </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Date</th>
          <th>Grand Total</th>
          <th>Shipping</th>
          <th>Quantity</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
    </div>
  </div>
  </div>
@endsection
