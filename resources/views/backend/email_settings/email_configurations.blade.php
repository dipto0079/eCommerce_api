@extends('backend.master')
@section('content')
<div class="container">
<br>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                    <h4>
                        <strong>Email Configuration</strong>
                    </h4>
                    <hr>
                    <br>
                    <form>
                    <div class="form-group">
                        <label for="inputState"><b>Mail Engine *</b></label>
                                <select id="inputState" class="form-control">
                                    <option selected="">SMTP</option>
                                    <option>SENDMAIL</option>
                                </select>
                        </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>SMTP Host *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="SMTP Host" />
                            </div>

                            <div class="form-group">
                                <label for="inputEmail4"><b>SMTP Port *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="SMTP Port" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>Encryption *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Encryption" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>SMTP Username *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="SMTP Username" />
                            </div>

                            <div class="form-group">
                                <label for="inputEmail4"><b>SMTP Password *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="SMTP Password" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>From Email *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="From Email" />
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>From Name *</b></label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="From Name" />
                            </div>
                    
                                                        
                        <button type="button" class="btn btn-success px-5" style="float: right;"><b>Submit</b></button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
@endsection