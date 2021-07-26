@extends('backend.master')
@section('content')
    <div class="container-fluid">
        <br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h5>
                            <strong class="mr-3">{{ln('home')}} {{ln('page')}} {{ln('customization')}}</strong>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="mb-5">
                        <form action="{{route('sattings.home_page_customization.update')}}" method="post">
                            @csrf
                        <table class="table table-hover nowrap">
                            <thead>
                            <tr>
                                <th>{{ ln('settings') }} {{ ln('name') }}</th>
                                <th>{{ ln('status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Slider</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input name="slider" type="radio" value="1" <?php if (getsettings('Slider') == 1)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('active') }}</label>
                                                <label class="btn btn-outline-danger">
                                                    <input name="slider" type="radio" value="0" <?php if (getsettings('Slider') == 0)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('inactive') }}</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Partner</td>
                                   <td>
                                       <div class="form-group">
                                           <div class="btn-group" data-toggle="buttons">
                                               <label class="btn btn-outline-primary">
                                                   <input name="partner" type="radio" value="1" <?php if (getsettings('Partner') == 1)
                                            {echo "checked";} ?>/>
                                                   {{ ln('active') }}</label>
                                               <label class="btn btn-outline-danger">
                                                   <input name="partner" type="radio" value="0" <?php if (getsettings('Partner') == 0)
                                                   {echo "checked";} ?>/>
                                                   {{ ln('inactive') }}</label>
                                           </div>
                                       </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Footer</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input name="footer" type="radio" value="1" <?php if (getsettings('Footer') == 1)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('active') }}</label>
                                                <label class="btn btn-outline-danger">
                                                    <input name="footer" type="radio" value="0" <?php if (getsettings('Footer') == 0)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('inactive') }}</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Recently Viewed</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="btn-group" data-toggle="buttons">
                                                <label class="btn btn-outline-primary">
                                                    <input name="recently_viewed" type="radio" value="1" <?php if (getsettings('Recently_Viewed') == 1)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('active') }}</label>
                                                <label class="btn btn-outline-danger">
                                                    <input name="recently_viewed" type="radio" value="0" <?php if (getsettings('Recently_Viewed') == 0)
                                                    {echo "checked";} ?>/>
                                                    {{ ln('inactive') }}</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Secret Key</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" name="Secret_Key" value="{{getsettings('Secret_Key')}}" class="form-control" required/>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
