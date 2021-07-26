@extends('frontend.electro.extra_page.master')
@include('Develop.develop')
@section('content')
    <?php
    $app_url = env('APP_URL');
    if (strlen($token) > 100){

    $url = env('APP_URL') . 'api/check/' . $token;
    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, $url);
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HEADER, false);
    $result = curl_exec($cSession);
    $data = json_decode($result);
    curl_close($cSession);
    if($data->return)
    {
    \Session::put('user', $data->userData);
    \Session::put('token', $token);
    //redirect
    $user = $data->userData;

    $user_slug = Str::slug($data->userData->customer_name);
    ?>
    <script>window.location = '{{$app_url.'account'.'/'.$user_slug}}'; </script>
    <?php
    // header('location:' . env('APP_URL') . 'account/'.$user->customer_name);
    }
    else {
        //redirect
       // die;
        header('location:' . env('APP_URL') . '?return=false');
    }
    }
    else {
        if (\Session::has('user') && \Session::has('token')) {
            $customer_id = Session::get('user')->customer_id;
            $customer_details = DB::table('customers')->where('customer_id',$customer_id)->first();
        } else {
            header("Location:" .env('APP_URL'));
            die();
        }
    }


    ?>
    <div class="container">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                    <!-- List -->
                    <ul class="list-unstyled mb-0 sidebar-navbar">
                        <li>
                            <a class="tablinks dropdown-title" href="#" onclick="openCity(event, 'MMAcount')"
                               id="defaultOpen"> <b>Manage My Account</b> </a>
                        </li>
                        <li>
                            <ul class="list-unstyled mb-0 sidebar-navbar">
                                <!-- Menu List -->
                                <li><a class="tablinks dropdown-item" onclick="openCity(event, 'MProfile')" href="#">My
                                        Profile</a></li>
                                <li><a class="tablinks dropdown-item" onclick="openCity(event, 'Address')" href="#">Address
                                        Book</a></li>
                                <!-- End Menu List -->
                            </ul>
                        </li>
                        <li>
                            <a class="tablinks dropdown-current active" onclick="openCity(event, 'Paris')" href="#">My
                                Orders</a>

                            <ul class="list-unstyled mb-0 sidebar-navbar">
                                <!-- Menu List -->
                                <li><a class="dropdown-item" href="#">My Returns</a></li>
                                <li><a class="dropdown-item" href="#">My Cancellations</a></li>
                                <!-- End Menu List -->
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-title" href="#"> <b>My Reviews</b> </a>
                        </li>
                        <li>
                            <a class="dropdown-title" href="#"> <b>My Wishlist & Followed Stores</b> </a>
                        </li>
                    </ul>
                    <!-- End List -->
                </div>
            </div>
            {{-------------------------------------------------------Show Manage My Account ----------------------------------------------}}
            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="MMAcount">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Manage My Account</h3>
                </div>
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                        <div class="product-item__header col-6 col-md-6">
                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h4>Personal Profile</h4>
                                    @if(isset($customer_details))
                                    <p>{{$customer_details->customer_name}} <br>
                                        {{$customer_details->customer_email}}
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="product-item__body col-6 col-md-6">
                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h4>Address Book</h4>
                                    <small>Save your shipping address here.</small>
                                    <br><br><br>
                                    <br>
                                    <i class="ec ec-map-pointer mr-1" style="font-size: 50px"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-------------------------------------------------------------- End Manage My Account -----------------------------------------------------}}
            {{----------------------------------------------------------------- edit profile ------------------------}}

            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="MProfile">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">My profile</h3>
                </div>
                <form id="updateProfile" enctype="multipart/form-data">
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                        <div class="product-item__header col-6 col-md-4">

                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h6><b>Full name</b></h6>
                                    @if(isset($customer_details))
                                    <p>{{$customer_details->customer_name}}</p>
                                        <h6><b>Birthday</b></h6>
                                    <input type="date" class="form-control" id="customer_birthday" value="{{$customer_details->customer_birthday}}">
                                        <input type="hidden" value="{{Session()->get('user')->customer_id}}" class="form-control" id="customer_id">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="product-item__body col-6 col-md-4">
                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h6><b>Email Address</b></h6>
                                    @if(isset($customer_details))
                                    <p>{{$customer_details->customer_email}}</p>

                                    <h6><b>Gender</b></h6>
                                    <select class="form-control" name="customer_gender" id="customer_gender">
                                        <option value="Male" <?php if ($customer_details->customer_gender == "Male"){
                                            echo "selected";} ?>>Male</option>
                                        <option value="Female" <?php if ($customer_details->customer_gender == "Female"){
                                            echo "selected";
                                            } ?>>Female</option>
                                    </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="product-item__body col-6 col-md-4">
                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    @if(isset($customer_details))
                                    <h6><b>Mobile</b></h6>
                                    <input type="text" name="customer_mobile" value="{{$customer_details->customer_mobile}}" class="form-control" id="customer_mobile" placeholder="Enter Your Mobile Number">
                                    @endif
{{--                                    <div class="js-form-message form-group">--}}
{{--                                        <label class="form-label"><b>Photo</b></label>--}}
{{--                                        <input type="file" name="customer_photo" id="customer_photo">--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4 mx-auto rounded p-2">
                            <button type="submit" class="btn btn-primary form-control">Save Change</button>
                        </div>
                        <div class="col-md-4 mx-auto rounded p-2">
                            <button type="button" class="tablinks btn btn-success form-control"
                                    onclick="openCity(event, 'Password')">Change Password
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            {{------------------------------------------------------------------- End Profile  ------------------------------------------------------------------------------------}}
            {{--------------------------------------------------------------------Change Password ---------------------------------------------------------------------------------}}
            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="Password">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Change Password</h3>
                </div>
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                        <div class="product-item__header col-6 col-md-12">
                            <form action="" method="post">
                                <label for="">Current Password</label>
                                <input type="text" class="form-control">
                                <label for="">New Password</label>
                                <input type="text" class="form-control">
                                <label for=""> Confirm Password</label>
                                <input type="text" class="form-control">
                            </form>

                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mx-auto rounded p-2">
                        <button type="submit" class=" btn btn-success form-control">Svae</button>
                    </div>
                    <div class="col-md-4 mx-auto rounded p-2">
                        <button type="submit" class="tablinks btn btn-danger form-control"
                                onclick="openCity(event, 'MProfile')">Cencel
                        </button>
                    </div>
                </div>
            </div>
            {{-----------------------------------------------------------------End Change Password ---------------------------------------------------------------------------------}}
            {{------------------------------------------------------------------ Add address ---------------------------------------------------------------------------------------}}
            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="Address">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Address</h3>
                </div>
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                        <div class="product-item__header col-6 col-md-12">

                            <div class="card" style="height: 300px">
                                <div class="card-body">
                                    <p>Save your shipping and billing address here.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <button type="submit" class="tablinks btn btn-info" onclick="openCity(event, 'NewAddress')">+ADD NEW
                        ADDRESS
                    </button>
                </div>
            </div>
            {{----------------------------------------------------------------------address  -------------------------------------------------------------------------------------}}
            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="NewAddress">
                <form id="addressBook">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Add New Address</h3>
                </div>
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4">
                        <div class="row">
                        <div class="product-item__header col-6 col-md-6">
                                <label><b>Full Name</b></label>
                                <input type="text" class="form-control" id="address_name">
                                <label><b>Phone Number</b></label>
                                <input type="text" class="form-control" id="address_phn">
                        </div>
                            <div class="product-item__header col-6 col-md-6">
                                <label><b>Region</b></label>
                                <input type="text" class="form-control" id="address_region">
                                <label><b>City</b></label>
                                <input type="text" class="form-control" id="address_city">
                                <label><b>Zip</b></label>
                                <input type="text" class="form-control" id="address_zip">
                                <label> <b>Address</b></label>
                                <textarea class="form-control" name="" id="address_details" cols="5" rows="5"></textarea>
                                <div class="form-group">
                                    <strong>Default</strong> <br>
                                    <div class="btn-group" data-toggle="buttons">
                                        <label class="btn btn-outline-primary">
                                            <input name="address_status" id="address_status" type="radio" value="1" required />
                                            Yes</label>
                                        <label class="btn btn-outline-primary">
                                            <input name="address_status" id="address_status" type="radio" value="0" required />
                                            No</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mx-auto rounded p-2">
                        <button type="submit" class=" btn btn-success form-control">Save</button>
                    </div>
                    <div class="col-md-4 mx-auto rounded p-2">
                        <button type="button" class="tablinks btn btn-danger form-control"
                                onclick="openCity(event, 'Address')">Cencel
                        </button>
                    </div>
                </div>
                </form>
            </div>
            {{-- Add address  --}}

            <div class="tabcontent col-xl-9 col-wd-9gdot5" id="Paris">
                <br>
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title section-title__full mb-0 pb-2 font-size-22">Order</h3>
                </div>
                <div class="product-item__outer w-100">
                    <div class="product-item__inner remove-prodcut-hover py-4 row">
                        <div class="product-item__header col-6 col-md-4">

                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h4>Personal Profile</h4>
                                    <h5>Talha</h5>
                                    <h5>talha@gmail.com</h5>

                                </div>
                            </div>
                        </div>
                        <div class="product-item__body col-6 col-md-8">
                            <div class="card" style="height: 250px">
                                <div class="card-body">
                                    <h4>Personal </h4>
                                    <h5>Talha</h5>
                                    <h5>talha@gmail.com</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection

@section('js')
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <script type="text/javascript">
        $('#updateProfile').on('submit', function (event) {
            event.preventDefault();

            let customer_birthday = $('#customer_birthday').val();
            let customer_gender = $('#customer_gender').val();
            let customer_mobile = $('#customer_mobile').val();
            // let customer_photo = $('#customer_photo').val();
            let customer_id = $('#customer_id').val();

            $.ajax({
                type: "POST",
                url: "<?php echo env('APP_URL'); ?>api/customer/update",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                // contentType: false,
                // processData: false,
                //enctype: 'multipart/form-data',
                data: {
                    "customer_id": customer_id,
                    "customer_birthday": customer_birthday,
                    "customer_gender": customer_gender,
                    "customer_mobile": customer_mobile,
                    // "customer_photo": customer_photo,
                },
                dataType: 'JSON',
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function (data) {
                    if (!data.key) {
                        location.reload();
                        toastr.error("Something Went Wrong");
                    } else {
                        location.reload();
                        toastr.success("Successfully Updated");

                    }
                }
            });

        });
    </script>
    <script type="text/javascript">
        $('#addressBook').on('submit', function (event) {
            event.preventDefault();

            let address_name = $('#address_name').val();
            let address_phn = $('#address_phn').val();
            let address_region = $('#address_region').val();
            let customer_id = $('#customer_id').val();
            let address_city = $('#address_city').val();
            let address_zip = $('#address_zip').val();
            let address_status = $('#address_status:checked').val();
            let address_details = $('#address_details').val();

            $.ajax({
                type: "POST",
                url: "<?php echo env('APP_URL'); ?>api/customer/address",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "customer_id": customer_id,
                    "address_name": address_name,
                    "address_phn": address_phn,
                    "address_region": address_region,
                    "address_city": address_city,
                    "address_zip": address_zip,
                    "address_status": address_status,
                    "address_details": address_details,
                },
                dataType: 'JSON',
                error: function (xhr, status, error) {
                    var errorMessage = xhr.status + ': ' + xhr.statusText
                    alert(errorMessage);
                },
                success: function (data) {
                    if (!data.key) {
                        location.reload();
                        toastr.error("Something Went Wrong");
                    } else {
                        location.reload();
                        toastr.success("Successfully Address Added");

                    }
                }
            });

        });
    </script>
@endsection
