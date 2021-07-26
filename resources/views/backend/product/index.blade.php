@extends('backend.master')
@section('content')
    <div class="container">
        <br>
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4>
                            <strong>{{ln('add')}} {{ln('new')}} {{ln('product')}}</strong>
                        </h4>
                        <hr>
                        <br>
                            <div class="form-group">
                                <label for="inputEmail4"><b>{{ln('product')}} {{ln('name')}}*</b></label>
                                <small>(In Any Language)</small>
                                <input type="text" class="form-control" name="product_name" placeholder="{{ln('product')}} {{ln('name')}}" required/>
                            </div>
                        <div class="form-group">
                            <label for="inputEmail4"><b>{{ln('product')}} {{ln('code')}}*</b></label>
                            <input type="text" class="form-control" name="product_code" placeholder="{{ln('product')}} {{ln('code')}}" required/>
                        </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="inputState"><b>{{ ln('categrory') }}*</b></label>--}}
{{--                                <select name="categories_id" id="categories_idds" class="form-control">--}}
{{--                                    <option value="0" alt="">{{ ln('select') }} {{ ln('categrory') }}</option>--}}
{{--                                    @if (isset($category))--}}
{{--                                        @foreach ($category as $key)--}}
{{--                                            <option value="{{ $key->categories_id }}">{{ $key->categories_name }}--}}
{{--                                            </option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </select>--}}
{{--                            </div>--}}

                        <div class="form-group">
                            <label><b>{{ ln('categrory') }} *</b></label>
                            <select name="categories_id" id="categories_idds" class="select2" required>
                                <option value="0" alt="">{{ ln('select') }} {{ ln('categrory') }}</option>
                                @if (isset($category))
                                    @foreach ($category as $key)
                                        <option value="{{ $key->categories_id }}">{{ $key->categories_name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="inputState"><b>{{ ln('sub') }} {{ ln('categrory_name') }}*</b></label>--}}
{{--                                <select id="subcategory_idds" name="subcategory_id" class="form-control" >--}}
{{--                                    <option value="">{{ ln('select') }} {{ ln('sub') }} {{ ln('categrory') }}</option>--}}
{{--                                    @if (isset($subcategory))--}}
{{--                                        @foreach ($subcategory as $item)--}}
{{--                                            <option value="{{ $item->subcategory_id }}">--}}
{{--                                                {{ $item->subcategory_name }}</option>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}

{{--                                </select>--}}
{{--                            </div>--}}

                        <div class="form-group">
                            <label><b>{{ ln('sub') }} {{ ln('categrory_name') }}*</b></label>
                            <select id="subcategory_idds" name="subcategory_id" class="select2" required>
                                <option value="">{{ ln('select') }} {{ ln('sub') }} {{ ln('categrory') }}</option>
                                @if (isset($subcategory))
                                @foreach ($subcategory as $item)
                                    <option value="{{ $item->subcategory_id }}">
                                        {{ $item->subcategory_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>


                        <div class="form-group">
                            <label><b>{{ ln('child') }} {{ ln('categrory_name') }}*</b></label>
                            <select id="childcategory_ids" name="childcategory_id" class="select2" required>
                                <option value="">{{ ln('enter') }} {{ ln('child') }} {{ ln('categrory_name') }}</option>
                                @if (isset($childcategory))
                                    @foreach ($childcategory as $key)
                                        <option value="{{ $key->childcategory_id}}">
                                            {{ $key->childcategory_name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label><b>{{ln('brand')}}</b></label>
                            <select class="select2" name="brand_id" required>
                                <option value="">{{ ln('select') }} {{ln('brand')}}</option>
                                @if(isset($brand))
                                @foreach ($brand as $key)
                                    <option value="{{$key->brand_id}}">{{ $key->brand_name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>

                            <div class="form-group">
                                <label for="inputEmail4"><b>{{ln('product')}} {{ln('Short')}} {{ln('description')}}</b></label>
                                <textarea name="product_short_description" class="summernote"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail4"><b>{{ln('product')}} {{ln('long')}} {{ln('description')}}</b></label>
                                <textarea name="product_long_description" class="summernote"></textarea>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label><b>{{ln('buying')}} {{ln('price')}}</b></label>
                                        <input type="number" name="product_buying_price" class="form-control" min="1"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>{{ln('selling')}} {{ln('price')}}</b></label>
                                        <input type="number" name="product_selling_price" class="form-control" min="1"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inputZip"><b>{{ln('discount')}}</b></label>
                                        <input type="number" name="product_discount_value" class="form-control" min="1"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label><b>{{ln('discount')}} {{ln('type')}}</b></label>
                                        <select class="select2" name="product_discount_type">
                                            <option value="tk">Tk</option>
                                            <option value="%">%</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                                <label><b>{{ln('product')}} {{ ln('image') }}</b></label>
                                <input type="file" class="dropify" name="product_image"/>

                        </div>
                        <!-- Gallery Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                            {{ln('set')}} {{ln('gallery')}}
                        </button>

                        <div
                            class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">{{ln('gallery')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

{{--                                        <button type="button" class="btn btn-success fileup-btn">--}}
{{--                                            Select files--}}
{{--                                            <input type="file" name="product_gallery[]" id="upload-2" multiple>--}}
{{--                                        </button>--}}

{{--                                        <div id="upload-2-queue" class="queue"></div>--}}

                                        <table id="gallerytable" class="table-responsive">
                                            <tr>
                                                <td>
                                                    <label><b>{{ln('image')}} </b></label>
                                                    <input type="file" class="dropify" name="product_gallery[]">
                                                </td>

                                                <td>
                                                    <label><br></label>
                                                    <button style="margin-left: 30px;" onclick="gallerydelete(this)" type="button" class="form-control btn btn-danger">
                                                        {{ln('delete')}}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" rowspan="2">
                                                    <p rows="3"></p>
                                                </td>
                                            </tr>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <button onclick="gallery()" type="button" class="btn btn-primary">
                                                        {{ln('add')}} {{ln('new')}}</button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ln('close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Modal -->
                    <!-- Specification Modal -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                            {{ln('specification')}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ln('add')}} {{ln('specification')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="myTable" class="table table-hover nowrap">
                                            <tr>
                                                <td>
                                                    <label><b> {{ln('specification')}}</b></label>

                                                        <select class="select2 form-control" name="product_specification[]">
                                                            @if(isset($specification))
                                                                @foreach($specification as $spe)
                                                            <option value="{{$spe->specification_id}}">{{$spe->specification_name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>

                                                </td>
                                                <td>
                                                    <label><b>{{ln('value')}}</b></label>
                                                    <input type="text" name="product_specification_value[]" required class="form-control">
                                                </td>
                                                <td>
                                                    <label><br></label>
                                                    <button onclick="deleteRow(this)" type="button" class="form-control btn btn-danger">
                                                        {{ln('delete')}}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" rowspan="2">
{{--                                                    <p rows="3"></p>--}}
                                                </td>
                                            </tr>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <button onclick="myFunction2()" type="button" class="btn btn-primary">
                                                        {{ln('add')}} {{ln('new')}}</button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ln('close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Specification Modal -->
                        <!-- Color Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">
                            {{ln('color')}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ln('add')}} {{ln('color')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="colortable" class="table-responsive">
                                            <tr>
                                                <td>
                                                    <label><b>{{ln('product')}}  {{ln('color')}}</b></label>
                                                        <input type="color" class="form-control" name="product_color[]">
                                                </td>
                                                <td>
                                                    <label style="margin-left: 20px;"><b> {{ln('color')}} {{ln('name')}}</b></label>
                                                    <input type="text" style="margin-left: 20px;width: 200px;margin-right: 90px;" class="form-control" name="product_color_name[]" required>
                                                </td>
                                                <td>
                                                    <label><b> {{ln('color')}} {{ln('image')}}</b></label>
                                                    <input type="file" style="margin-left: 50px;" class="dropify" name="product_color_image[]" required>
                                                </td>
                                                <td>
                                                    <label><br></label>
                                                    <button style="margin-left: 20px;" onclick="deletecolor(this)" type="button" class="form-control btn btn-danger">
                                                        {{ln('delete')}}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" rowspan="2">
                                                    <p rows="3"></p>
                                                </td>
                                            </tr>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <button onclick="color()" type="button" class="btn btn-primary">{{ln('add')}} {{ln('new')}}</button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ln('close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Color Modal -->
                        <!-- Size Modal -->
                        <br> <br>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#size">
                            {{ln('size')}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="size" tabindex="-1" role="dialog"
                             aria-labelledby="colorTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ln('add')}} {{ln('size')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="sizetable" class="table-responsive">
                                            <tr>
                                                <td>
                                                    <label><b>{{ln('product')}}  {{ln('size')}}</b></label>
                                                    <input type="text" class="form-control" name="product_size[]">
                                                </td>

                                                <td>
                                                    <label><br></label>
                                                    <button style="margin-left: 30px;" onclick="deletesize(this)" type="button" class="form-control btn btn-danger">
                                                        {{ln('delete')}}</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="1" rowspan="2">
                                                    <p rows="3"></p>
                                                </td>
                                            </tr>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <button onclick="size()" type="button" class="btn btn-primary">{{ln('add')}} {{ln('new')}}</button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ln('close')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Size Modal -->
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                <div class="form-group">
                    <label for="inputEmail4"><b>{{ln('meta')}} {{ln('title')}}</b></label>
                    <input type="text" class="form-control" name="product_meta_title" placeholder="{{ln('meta')}} {{ln('title')}}"/>
                </div>
                <div class="form-group">
                    <label for="inputEmail4"><b>{{ln('meta')}} {{ln('keyword')}}</b></label>
                    <input type="text" class="form-control" name="product_meta_keyword" placeholder="{{ln('meta')}} {{ln('keyword')}}"/>
                </div>
                <div class="form-group">
                    <label class="control-label">{{ ln('meta') }} {{ln('description')}}</label>
                    <textarea class="form-control" name="product_meta_description" rows="3"  placeholder="{{ ln('meta') }}  {{ ln('description') }} "></textarea>
                </div>
                <div class="form-group">
                    <label><b>{{ln('branch')}} </b></label>
                <select class="select2" name="branch_id">
                    @if(isset($branch_name))
                        @foreach($branch_name as $bran)
                            <option value="{{$bran->branch_id}}">{{$bran->branch_name}}</option>
                        @endforeach
                    @endif
                </select>
                </div>
                        <div class="form-group">
                            <label><b>{{ln('shipping')}} {{ln('methods')}} </b></label>
                            <select class="select2" name="product_shipping_id[]" multiple>
                                @if(isset($shipping))
                                    @foreach($shipping as $ship)
                                <option value="{{$ship->shipping_id}}">{{$ship->shipping_title}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                <div class="form-group">
                            <strong>{{ ln('status') }} &nbsp;&nbsp;</strong> <br>
                            <div class="btn-group" data-toggle="buttons">
                                <label class="btn btn-outline-primary active">
                                    <input name="product_status" type="radio" value="1" required />
                                    {{ ln('active') }}</label>
                                <label class="btn btn-outline-primary">
                                    <input name="product_status" type="radio" value="0" required />
                                    {{ ln('inactive') }}</label>
                            </div>
                </div>
                        <button class="btn btn-success">{{$Branch_Type}}</button>
                    </div>
                </div>

            </div>
        </div>
            <button type="submit" class="btn btn-success">{{ln('add')}} {{ln('product')}} </button>
        </form>
    </div>
@endsection
@php
    $sub = DB::table('categories_subcategory')->get();
    $childcategory =DB::table('categories_childcategory')->get();
@endphp
@section('js')
    <script>
        var a = <?php echo json_encode($sub, true); ?>;
        $('select[id="categories_idd"]').change(function () {
            var val = $(this).val();
            $('select[id="subcategory_idd"]').html('<option value="">{{ln('enter')}} {{ ln('sub') }} {{ ln('categrory') }}*</option>');
            a.forEach(function (data) {
                if (data.categories_id == val) {
                    var html = '<option value="';
                    html += data.subcategory_id;
                    html += '">';
                    html += data.subcategory_name;
                    html += '</option>';
                    $('select[id="subcategory_idd"]').append(html);
                }
            });
        });

        $('select[id="categories_idds"]').change(function () {
            var val = $(this).val();
            $('select[id="subcategory_idds"]').html('<option value="">{{ln('enter')}} {{ ln('sub') }} {{ ln('categrory') }}</option>');
            a.forEach(function (data) {
                if (data.categories_id == val) {
                    var html = '<option value="';
                    html += data.subcategory_id;
                    html += '">';
                    html += data.subcategory_name;
                    html += '</option>';
                    $('select[id="subcategory_idds"]').append(html);
                }
            });
        });

        //Child--------------------
        var b = <?php echo json_encode($childcategory, true); ?>;
        $('select[id="subcategory_idds"]').change(function () {
            var val = $(this).val();
            $('select[id="childcategory_ids"]').html('<option value="">{{ ln('enter') }} {{ ln('child') }} {{ ln('categrory') }}</option>');
            b.forEach(function (data) {
                if (data.subcategory_id == val) {
                    var html = '<option value="';
                    html += data.childcategory_id;
                    html += '">';
                    html += data.childcategory_name;
                    html += '</option>';
                    $('select[id="childcategory_ids"]').append(html);
                }
            });
        });
        //Child--------------------
    </script>
    <script>
        ;
        (function ($) {
            'use strict'
            $(function () {
                $('.summernote').summernote({
                    height: 100,
                })
            })
        })(jQuery)

    </script>

    <script>
        var i = 1;

        function deleteRow(btn) {
            var rowCount = myTable.rows.length;
            //alert(rowCount);
            if (rowCount <= 3) {
                window.alert("There is only row, that you can not delete.");
            } else {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
            i--;
        }

        function myFunction2() {

            i++;
            var table = document.getElementById("myTable");
            var rowCount = myTable.rows.length;
            var row = table.insertRow(rowCount - 2);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            var option = '<option value="0"></option>';
            <?php
            if(isset($specification))
            {
                foreach($specification as $spe)
                { ?>
                option+= '<option value="<?php echo $spe->specification_id ?>"><?php echo $spe->specification_name; ?></option>';
               <?php }  }  ?>
var dropdown_sp = '<select class="select2 form-control" name="product_specification[]">'+option+'</select>';

            cell1.innerHTML = "<label>&nbsp; <br/><b>{{ln('specification')}} " + "</label><br/>"+dropdown_sp;
            cell2.innerHTML = "<label><br/> {{ln('value')}}</label><br/><input  name='product_specification_value[]' required type=\"text\" class=\"form-control\">";
            cell3.innerHTML = "<label>&nbsp;<br/></label><br/> <br/><button  onclick=\"deleteRow(this)\" type=\"button\" class=\"form-control btn btn-danger\">{{ln('delete')}}</button>";

            $('.select2').select2()
            $('.select2-tags').select2({
                tags: true,
                tokenSeparators: [',', ' '],
            })
        }

    </script>
{{--    <script src="{{asset('backend/multiple/fileup.js')}}"></script>--}}

    <!-------Color ----------------->
    <script>
        var i = 1;

        function deletecolor(btn) {
            var rowCount = colortable.rows.length;
            //alert(rowCount);
            if (rowCount <= 3) {
                window.alert("There is only row, that you can not delete.");
            } else {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
            i--;
        }

        function color() {

            i++;
            var table = document.getElementById("colortable");
            var rowCount = colortable.rows.length;
            var row = table.insertRow(rowCount - 2);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);

            cell1.innerHTML = "<label>&nbsp; <br/>{{ln('product')}} {{ln('color')}} " + "</label><input type=\"color\" class=\"form-control\" name=\"product_color[]\">";
            cell2.innerHTML = "<label style=\"margin-left: 20px;\"><br/><b>{{ln('color')}} {{ln('name')}}</b></label> <input type=\"text\" style=\"margin-left: 20px;width: 200px;margin-right: 90px;\" name=\"product_color_name[]\" required class=\"form-control\">";
            cell3.innerHTML = "<label style=\"margin-left: 20px;\"><br/><b>{{ln('color')}} {{ln('image')}}</b></label> <input type=\"file\" style=\"margin-left: 20px;\" name=\"product_color_image[]\" required class=\"dropify\">";
            cell4.innerHTML = "<label>&nbsp;<br/>&nbsp;</label><br/><button style=\"margin-left: 20px;\" onclick=\"deletecolor(this)\" type=\"button\" class=\"form-control btn btn-danger\">{{ln('delete')}}</button>";

            $('.dropify').dropify();

        }
    </script>
    <!-------Color ----------------->
    <!-------Gallery ----------------->
    <script>
        var i = 1;

        function gallerydelete(btn) {
            var rowCount = gallerytable.rows.length;
            //alert(rowCount);
            if (rowCount <= 3) {
                window.alert("There is only row, that you can not delete.");
            } else {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
            i--;
        }

        function gallery() {
            //------------------------------------


            //------------------------------------
            i++;

            var table = document.getElementById("gallerytable");
            var rowCount = gallerytable.rows.length;
            var row = table.insertRow(rowCount - 2);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);


            cell1.innerHTML = "<label>&nbsp; <br/> Image " + "</label><input type=\"file\" class=\"dropify\" name=\"product_gallery[]\">";
            cell2.innerHTML = "<label>&nbsp;<br/>&nbsp;</label><br/><button style=\"margin-left: 30px;\" onclick=\"gallerydelete(this)\" type=\"button\" class=\"form-control btn btn-danger\">{{ln('delete')}}</button>";

            $('.dropify').dropify();

        }

    </script>
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
    <!-------Gallery ----------------->

    <!-------Size ----------------->
    <script>
        var i = 1;

        function deletesize(btn) {
            var rowCount = sizetable.rows.length;
            //alert(rowCount);
            if (rowCount <= 3) {
                window.alert("There is only row, that you can not delete.");
            } else {
                var row = btn.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
            i--;
        }

        function size() {

            i++;
            var table = document.getElementById("sizetable");
            var rowCount = sizetable.rows.length;
            var row = table.insertRow(rowCount - 2);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);

            cell1.innerHTML = "<label>&nbsp; <br/>{{ln('product')}} {{ln('size')}} " + "</label><input type=\"text\" class=\"form-control\" name=\"product_size[]\">";
            cell2.innerHTML = "<label>&nbsp;<br/>&nbsp;</label><br/><button style=\"margin-left: 30px;\" onclick=\"deletesize(this)\" type=\"button\" class=\"form-control btn btn-danger\">{{ln('delete')}}</button>";



        }
    </script>
    <!-------Size ----------------->

@endsection

