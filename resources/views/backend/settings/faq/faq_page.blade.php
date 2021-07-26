@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('faq')}}</strong>
                        </h5>
                    </div>
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right"
                                data-target=".bd-example-modal-lg">
                            {{ln('add')}} {{ln('new')}} {{ln('faq')}}
                        </button>
                    </div>
                </div>
            </div>

                <div class="card-body">
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="false">
                        <div class="modal-dialog modal-lg">
                            <form action="{{route('sattings.faq_page.store')}}" method="post">
                                @csrf
                            <div class="modal-content">
                                <div class="modal-header"
                                     style="background-color: #4b7cf3">
                                    <h5 class="modal-title" style="color: white">{{ln('add')}} {{ln('new')}} {{ln('faq')}} </h5>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                        <span style="font-size:20px" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="control-label">{{ ln('title') }}*</label>
                                            <small>(In Any Language)</small>
                                            <input type="text" name="faq_title" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                        <label class="control-label" for="subtitle_text"><b>{{ln('description')}} *</b></label>
                                        <textarea class="summernote" name="faq_description"  placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-outline-primary active">
                                                <input name="faq_status" type="radio" value="1" required />
                                                {{ ln('active') }}</label>
                                            <label class="btn btn-outline-primary ">
                                                <input name="faq_status" type="radio" value="0"
                                                       required />
                                                {{ ln('inactive') }}</label>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer"
                                     style="background-color:#4b7cf3">
                                    <button type="submit" class="btn btn-success">{{ln('create')}}</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-5">
                                <table class="table table-hover nowrap" id="example1">
                                    <thead>
                                    <tr>
                                        <th>{{ ln('sl') }}.</th>
                                        <th>{{ ln('name') }}</th>
                                        <th>{{ ln('status') }}</th>
                                        <th>{{ ln('action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $number = 0; ?>
                                    @foreach ($faq as $key)
                                        <tr>
                                            <td>{{ $number + 1 }}</td>
                                            <?php $number++; ?>
                                            <td>{{ $key->faq_title }}</td>
                                            <td>
                                                @if($key->faq_status == '1')
                                                    <button class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>
                                                @else
                                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a type="button" onclick="update_faq({{ $key->faq_id}})"
                                                       class="btn btn-primary" data-toggle="modal"
                                                       data-target=".update">
                                                        {{ ln('edit') }}
                                                    </a>
                                                    <a onclick="confirm('{{ URL::to('sattings/faq_page/delete/'.$key->faq_id) }}')"
                                                       class="btn btn-danger">{{ln('delete')}}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            <!---------------------Update------->
            <div class="modal fade update bd-example-modal-lg" tabindex="-1" role="dialog"
                 aria-labelledby="myLargeModalLabel" aria-hidden="false">
                <div class="modal-dialog modal-lg">
                    <form action="{{route('sattings.faq_page.update')}}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header"
                                 style="background-color: #4b7cf3">
                                <h5 class="modal-title" style="color: white">{{ln('update')}} {{ln('faq')}}</h5>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                    <span style="font-size:20px" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="control-label">{{ ln('title') }}*</label>
                                        <small>(In Any Language)</small>
                                        <input type="text" name="faq_title" id="faq_title" class="form-control" required/>
                                        <input type="hidden" name="faq_id" id="faq_id" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"><b>{{ln('description')}} *</b></label>
                                        <textarea id="faq_descripti" class="summernote" name="faq_description" placeholder="Enter Description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <strong>{{ ln('status') }}* &nbsp;&nbsp;</strong>
                                        <input name="faq_status" type="radio" value="1" id="active" required />
                                        <label>{{ ln('active') }}</label>
                                        <input name="faq_status" type="radio" value="0" id="inactive" required />
                                        <label>{{ ln('inactive') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer"
                                 style="background-color:#4b7cf3">
                                <button type="submit" class="btn btn-success">{{ln('save_change')}}</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!---------------------Update------->
        </div>
        </div>

@endsection
@section('js')
    <script>
        ;
        (function($) {
            'use strict'
            $(function() {
                $('.summernote').summernote({
                    height: 300,
                })
            })
        })(jQuery)

        function update_faq(faq_id) {
            $.ajax({
                type: "GET",
                url: "<?php echo env('APP_URL'); ?>sattings/faq_page/edit/" + faq_id,
                dataType: 'JSON',
                error: function(xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function(data) {
                    console.log(data);
                    var id = "",
                        title = "",
                        des = "",
                        status = "";


                    id = data.faq_id;
                    title = data.faq_title;
                    des = data.faq_description;
                    status = data.faq_status;

                    if (status == 1) {
                        $('#active').attr('checked', 'true');
                    } else {
                        $('#inactive').attr('checked', 'true');
                    }
                    document.getElementById("faq_id").value = id;
                    document.getElementById("faq_title").value = title;
                    $('textarea[id="faq_descripti"]').summernote('code',des);

                }
            });
        }

    </script>
@endsection
