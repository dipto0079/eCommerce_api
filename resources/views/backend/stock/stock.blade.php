@extends('backend.master')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="mb-4">
                    <strong>Stock</strong>
                </h4>
            </div>
            <div class="col-lg-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" style="float: right" data-target=".bd-example-modal-lg">
                    {{ln('add')}} {{ln('new')}} {{ln('supplier')}}
                </button>
            </div>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-image: linear-gradient(to right, rgb(5, 69, 112) , rgb(43, 163, 243))">
                        <h5 class="modal-title" style="color: white">{{ln('add')}} {{ln('new')}} {{ln('supplier')}}</h5>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                            <span style="font-size:20px" aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('supplier.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="card-body" style="background-color: rgb(235, 241, 241)">
                                <div class="form-group">
                                    <label for="">{{ln('supplier')}} {{ln('name')}}</label>
                                    <input type="text" name="supplier_name" value="" id="" class="form-control" placeholder="{{ln('enter')}} {{ln('supplier')}} {{ln('name')}}" required />
                                </div>
                                <div class="form-group">
                                    <label for="">{{ln('supplier')}} {{ln('phone')}}</label>
                                    <input type="text" name="supplier_phone" value="" id="" class="form-control" placeholder="{{ln('enter')}} {{ln('supplier')}} {{ln('phone')}}" required />
                                </div>
                                <div class="form-group">
                                    <label for="">{{ln('supplier')}} {{ln('address')}}</label>
                                    <input type="text" name="supplier_address" value="" id="" class="form-control" placeholder="{{ln('enter')}} {{ln('supplier')}} {{ln('address')}}" required />
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><b>{{ ln('image') }}</b></label>
                                        <input type="file" class="dropify" name="supplier_image" />
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="background-image:linear-gradient(to right, rgb(18, 154, 245) , rgb(1, 34, 56)) ">
                            <button type="submit" class="btn btn-success">{{ln('create')}} {{ln('supplier')}}</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ln('close')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body" style="background-color: rgb(229, 242, 250)">
        <form action="{{route('stock.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>{{ln('supplier')}}</b></label>
                        <select class="select2 form-control" name="supplier_id" id="">
                            <option value="" selected>select </option>
                            @if(isset($supplier))
                            @foreach ($supplier as $item)
                            <option value="{{ $item->supplier_id }}">{{ $item->supplier_name}}</option>
                            @endforeach
                            @endif

                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>{{ln('product')}}</b></label>
                        <select class="select2 form-control" name="" id="select">
                            <option value="" selected>Select Product</option>
                            @if(isset($product))
                            @foreach($product as $spe)
                            <option value="{{$spe->product_id}}">{{$spe->product_name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>{{ln('status')}}</b></label>
                        <select class="form-control" name="stock_status" id="">
                            <option selected>select </option>
                            <option value="1">Received</option>
                            <option value="0">Order</option>
                        </select>
                    </div>
                </div>
            </div>


            <input type="hidden" name="stock_product[]" value="" id="value">
            <input type="hidden" value="" id="total">

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-5">
                        <table class="table table-hover nowrap" id="tablepp">
                            <thead>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Quantity</th>
                                <th>Net Unit Cost</th>
                                <th>Sub Total</th>
                                <th>Action</th>
                            </thead>

                            {{-- <td><input type="text" value="" id="pid"></td>
                    <td><input type="text" value="" id="pcode"></td>
                    <td><input type="text" value="" id="pquntity"></td>
                    <td><input type="text" value="" id="pcost"></td> --}}

                            <tbody>
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>Total</th>
                                <th id="grand_total"></th>
                            </tfoot>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Note</b></label>
                                    <textarea class="form-control" name="note" id="" cols="8" rows="4"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
        </form>
    </div>
</div>
</div>

@endsection
@section('js')
<script>
    $('.select2').select2()
    $('.select2-tags').select2({
        tags: true,
        tokenSeparators: [',', ' '],
    })
</script>
<script>
    // var pid =1;
    // var pcode =1;
    // var pquntity = 1;
    // var pcost = 1;
    // var i =0;
    // //i++;
    var grand_total = 0;
    var count = 0;
    var x = [];
    var stock = [];
    var tr = $('table tr').last().clone();
    tr = '<tr><td id="p_name"></td>' +
        '<td id="code_name"></td>' +
        '<td id=""><input type="number" ></td>' +
        '<td id="cost_name"></td>' +
        '<td id="subTotal"></td>' +
        '</tr>';


    $(document).ready(function() {
        $("select#select").change(function() {
            var select = $(this).children("option:selected").val();
            if (!_in_array(select, stock)) {
                //alert(_in_array(select, stock));
                $.ajax({
                    type: "GET",
                    url: "<?php echo env('APP_URL'); ?>stock/product/edit/" + select,
                    dataType: 'JSON',
                    error: function(xhr, status, error) {
                        var errorMessage = xhr.status + ': ' + xhr.statusText
                        alert(errorMessage);
                    },
                    success: function(data) {
                        //console.log(data);
                        count++;
                        var id = "",
                            name = "",
                            status = "",
                            pcode = "",
                            imag = "";
                        id = data.product_id;
                        name = data.product_name;
                        pcode = data.product_code;
                        cost = data.product_buying_price;
                        //document.getElementById('pcode').value = pcode;

                        var _st = {
                            'product_id': id,
                            'product_name': name,
                            'product_code': pcode,
                            'product_Qty': parseFloat(0),
                            'product_buying_price': parseFloat(cost),
                            'product_subtotal': parseFloat(0)
                        };
                        stock.push(_st);
                        document.getElementById('value').value = JSON.stringify(stock);
                        tr = '<tr><td id="p_name">' + name + '</td>' +
                            '<td id="code_name">' + pcode + '</td>' +
                            '<td id=""><input  onkeyup="add_cost(this,' + id + ');" data-count="' + count + '" type="number" ></td>' +
                            '<td id="cost_name">' + cost + '</td>' +
                            '<td id="subTotal"></td>' +
                            '<td id=""><button class="btn btn-danger" onclick="delete_row(this);" type="button">Delete</button></td>' +
                            '</tr>';
                        $('table tbody').append(tr);
                    }

                });
                //   i++;

                // stock.find( a => a.product_Qty === 'key', true);
            } else {
                toastr.warning("<?= ln('product_selected_message') ?>");
            }
        });
    });

    // stock.find(function(a){
    //     var key = $(a).data('count');
    //     for (var i = 0; i < stock.length; i++) {
    //             var single_product = stock[i];
    //             var  x = single_product['product_id'];
    //     if (a.product_id === x) {
    //                    var dd =  a.product_Qty = key;
    //                      alert(dd)
    //                      return true;
    //                          }
    //                     return false;

    // }
    // });
    function _in_array(value, arr) {
        var result = false;
        for (var i = 0; i < stock.length; i++) {
            var single_product = stock[i];
            var x = single_product['product_id'];
            if (value.includes(x)) {
                result = true;
                break;
            }
        }

        return result;
    }


    function delete_row(a,id) {
        
        var cost = $(a).parent().parent().find('#subTotal').text();
        var ee = $(a).parent().parent().find('input').data('count');
        var product_id = id;
        x.splice(ee, 1);
        var b = $('#grand_total').text();
        var biyog = Number(b) - Number(cost);
        $(a).parent().parent().text('');
        $('#grand_total').text(biyog);

        $.each(stock, function(index, value) {
            var single_product = value;
            if (single_product['product_id']==product_id){
                stock.splice(index, 1);
             }
        });
    }

    function get_x() {
        var xx = 0;
        x.forEach((data) => {
            xx += data;
        });
        return xx;
    }

    function add_cost(a, id) {
        var val = $(a).val();
        var key = $(a).data('count');
        var sub = $(a).parent().parent().find('#subTotal');
        var cost = $(a).parent().parent().find('#cost_name').text();
        var product_id = id;

        var total = Number(val) * Number(cost);
        x[key] = total;
        grand_total = get_x();
        sub.text(total);
        $('#grand_total').text(get_x());

        //var _dt = [ {'id': 0}, {'key':key}, {'sub':sub}];
        //stock.push(_dt);
        // alert('grand_total'); 
        // return grand_total;
        $.each(stock, function(index, value) {
           var single_product = value;
           if(single_product['product_id']==product_id)
           {
                value['product_Qty'] = val;
                value['product_subtotal'] =total;
           }
        });

        document.getElementById('total').value = grand_total;


    }


    //  y = {

    //   product_id   : $('input[name=product_id[]]').val(),
    //   branch_id    : $('input[name=branch_id]').val(),
    //   supplier_id  : $('input[name=supplier_id]').val(),
    //   note         : $('input[name=note]').val(),
    //   stock_status : $('input[name=stock_status]').val(),


    // }

    // $.post('{{route('stock.store')}}', y , function(response){ 
    //     //  alert("success");
    //       $("#mypar").html(response.amount);



    // });
</script>

@endsection