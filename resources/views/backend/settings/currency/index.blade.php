@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('website')}} {{ln('currency')}}</strong>
                        </h5>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <form action="{{route('sattings.currency.update')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>{{ln('currency')}} </b></label>
{{--                                            <select class="select2" name="settings_value" required>--}}
{{--                                                <option value="$" <?php if (getsettings('Currency') == "$")--}}
{{--                                                {echo "selected";} ?>>$</option>--}}
{{--                                                <option value="OMR" <?php if (getsettings('Currency') == "OMR")--}}
{{--                                                {echo "selected";} ?>>OMR</option>--}}
{{--                                            </select>--}}
                                        <input type="text" name="settings_value" value="{{getsettings('Currency')}}" class="form-control"/>

                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-primary">{{ln('update')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        ; (function ($) {
            'use strict'
            $(function () {
                $('.select2').select2()
                $('.select2-tags').select2({
                    tags: true,
                    tokenSeparators: [',', ' '],
                })
            })
        })(jQuery)
    </script>
@endsection
