@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            {{-- <strong class="mr-3">{{ ln(stock') }}</strong> --}}
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-5">
                            <table class="table table-hover nowrap" id="example1">
                                <thead>
                                    <tr>
                                        <th>{{ ln('sl') }}.</th>
                                        <th>{{ ln('branch_name') }}</th>
                                        <th>{{ ln('supplier') }}</th>
                                        <th>{{ ln('product') }}{{ln('name')}}</th>
                                        <th>{{ ln('product') }}{{ln('code')}}</th>
                                        <th>{{ ln('product') }}{{ln('quantity')}}</th>
                                        <th>{{ ln('product') }}{{ln('subtotal')}}</th>
                                        <th>{{ ln('status') }}</th>
                                        <th>{{ ln('action') }}</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    <?php  
                                    $stock_product = json_decode($stock_product->stock_product);
                                     $number = 0; ?>
                                     @if(isset($branch_name))
                                     @foreach($branch_name as $bran)
                                        <tr>
                                            <td>{{ $number + 1 }}</td>
                                            <?php $number++; ?>
                                            <td>{{ $bran->branch_name}}</td>
                                            <td>{{ $key->categories_slug }}</td>
                                            <td>
        
                                            </td>
                                            <td>
                                                @if ($key->categories_status == '1')
                                                    <button
                                                        class="btn btn-sm btn-success">&nbsp;&nbsp;{{ ln('active') }}&nbsp;&nbsp;</button>

                                                @else
                                                    <button class="btn btn-sm btn-danger">{{ ln('inactive') }}</button>

                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a type="button" onclick="upadte_category({{ $key->categories_id }})"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModalCenter1">
                                                        {{ ln('edit') }}
                                                    </a>
                                                    <a onclick="confirm('{{ URL::to('categories/delete/' . $key->categories_id) }}')"
                                                        class="btn btn-danger">{{ ln('delete') }}</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection