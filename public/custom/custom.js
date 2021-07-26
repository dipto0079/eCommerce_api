// $(document).ready(function () {
//     $.ajax({
//         type: "GET",
//         url: "api/getcategory",
//         dataType: 'JSON',
//         error: function (xhr, status, error) {
//             var errorMessage = xhr.status + ': ' + xhr.statusText
//             // alert(errorMessage);
//         },
//         success: function (data) {
//             //var a = JSON.parse(['x','y','x']);
//             //var x = JSON.stringify(data);
//             //JSON.parse(x)
//
//             var cat_name = [];
//             var cat_name = "";
//             for (var i = 0; i < data.length; i++) {
//                 // console.log(data[i]['categories_name']);
//                 cat_name = data[i]['categories_name'];
//                 // cat_name.push(data[i]['categories_name']);
//             }
//             // document.getElementById("category_name").innerHTML = cat_name;
//
//         }
//     });
//
// // $.get('../main_categories',function(data){
// //        // data = JSON.parse(data);
// //         console.log(data);
// // },json);
//
//     $('#basicsCollapseOne').html('<div class="card-body p-0">\n' +
//         '                                        <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space hs-menu-initialized">\n' +
//         '                                            <div id="navBar" class="collapse navbar-collapse u-header__navbar-collapse">\n' +
//         '                                                <ul class="navbar-nav u-header__navbar-nav">\n' +
//         '                                                    <li class="nav-item u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a href="#" class="nav-link u-header__nav-link font-weight-bold">Value of the Day</a>\n' +
//         '                                                    </li>\n' +
//         '                                                    <li class="nav-item u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a href="#" class="nav-link u-header__nav-link font-weight-bold">Top 100 Offers</a>\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-animation-in="slideInUp"\n' +
//         '                                                        data-animation-out="fadeOut"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Computers & Accessories</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img1.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span id="category_name" class="u-header__sub-menu-title">Computers & Accessories</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Computers & Accessories</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Laptops, Desktops & Monitors</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Printers & Ink</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Networking & Internet Devices</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Computer Accessories</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Software</a></li>\n' +
//         '                                                                        <li>\n' +
//         '                                                                            <a class="nav-link u-header__sub-menu-nav-link u-nav-divider border-top pt-2 flex-column align-items-start" href="#">\n' +
//         '                                                                                <div class="">All Electronics</div>\n' +
//         '                                                                                <div class="u-nav-subtext font-size-11 text-gray-30">Discover more products</div>\n' +
//         '                                                                            </a>\n' +
//         '                                                                        </li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Office & Stationery</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Office & Stationery</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu1" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Cameras, Audio & Video</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu1">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img4.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Cameras & Photography</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Lenses</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Camera Accessories</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Security & Surveillance</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Binoculars & Telescopes</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Camcorders</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Software</a></li>\n' +
//         '                                                                        <li>\n' +
//         '                                                                            <a class="nav-link u-header__sub-menu-nav-link u-nav-divider border-top pt-2 flex-column align-items-start" href="#">\n' +
//         '                                                                                <div class="">All Electronics</div>\n' +
//         '                                                                                <div class="u-nav-subtext font-size-11 text-gray-30">Discover more products</div>\n' +
//         '                                                                            </a>\n' +
//         '                                                                        </li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Audio & Video</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Audio & Video</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Headphones & Speakers</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu2" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Mobiles & Tablets</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu vmm-bg-extended" aria-labelledby="basicMegaMenu2">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img3.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Mobiles & Tablets</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Mobile Phones</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Smartphones</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Refurbished Mobiles</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link border-top pt-2" href="#">All Mobile Accessories</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Cases & Covers</a></li>\n' +
//         '                                                                        <li>\n' +
//         '                                                                            <a class="nav-link u-header__sub-menu-nav-link u-nav-divider border-top pt-2 flex-column align-items-start" href="#">\n' +
//         '                                                                                <div class="">All Electronics</div>\n' +
//         '                                                                                <div class="u-nav-subtext font-size-11 text-gray-30">Discover more products</div>\n' +
//         '                                                                            </a>\n' +
//         '                                                                        </li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Tablets</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Tablet Accessories</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu3" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Movies, Music & Video Game</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu3">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img2.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Movies & TV Shows</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Movies & TV Shows</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All English</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link border-bottom pb-3" href="#">All Hindi</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Video Games</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">PC Games</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Consoles</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Accessories</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Music</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Music</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Indian Classical</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Musical Instruments</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu4" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">TV & Audio</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu4">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img5.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Audio & Video</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Audio & Video</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Televisions</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Headphones</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Speakers</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Audio & Video Accessories</a></li>\n' +
//         '                                                                        <li>\n' +
//         '                                                                            <a class="nav-link u-header__sub-menu-nav-link u-nav-divider border-top pt-2 flex-column align-items-start" href="#">\n' +
//         '                                                                                <div class="">Electro Home Appliances</div>\n' +
//         '                                                                                <div class="u-nav-subtext font-size-11 text-gray-30">Available in select cities</div>\n' +
//         '                                                                            </a>\n' +
//         '                                                                        </li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Music</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Televisions</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Headphones</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu5" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Watches & Eyewear</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu5">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img6.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Watches</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Watches</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Men\'s Watches</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Women\'s Watches</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Premium Watches</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Deals on Watches</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Eyewear</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Men\'s Sunglasses</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item MegaMenu -->\n' +
//         '                                                    <li class="nav-item hs-has-mega-menu u-header__nav-item"\n' +
//         '                                                        data-event="hover"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="basicMegaMenu3" class="nav-link u-header__nav-link u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false">Car, Motorbike & Industrial</a>\n' +
//         '\n' +
//         '                                                        <!-- Nav Item - Mega Menu -->\n' +
//         '                                                        <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu3">\n' +
//         '                                                            <div class="vmm-bg">\n' +
//         '                                                                <img class="img-fluid" src="../../assets/img/500X400/img7.png" alt="Image Description">\n' +
//         '                                                            </div>\n' +
//         '                                                            <div class="row u-header__mega-menu-wrapper">\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Car & Motorbike</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group mb-3">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Cars & Bikes</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Car & Bike Care</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link border-bottom pb-3" href="#">Lubricants</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Shop for Bike</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Helmets & Gloves</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Bike Parts</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '\n' +
//         '                                                                <div class="col mb-3 mb-sm-0">\n' +
//         '                                                                    <span class="u-header__sub-menu-title">Industrial Supplies</span>\n' +
//         '                                                                    <ul class="u-header__sub-menu-nav-group">\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">All Industrial Supplies</a></li>\n' +
//         '                                                                        <li><a class="nav-link u-header__sub-menu-nav-link" href="#">Lab & Scientific</a></li>\n' +
//         '                                                                    </ul>\n' +
//         '                                                                </div>\n' +
//         '                                                            </div>\n' +
//         '                                                        </div>\n' +
//         '                                                        <!-- End Nav Item - Mega Menu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item MegaMenu-->\n' +
//         '                                                    <!-- Nav Item -->\n' +
//         '                                                    <li class="nav-item hs-has-sub-menu u-header__nav-item"\n' +
//         '                                                        data-event="click"\n' +
//         '                                                        data-animation-in="slideInUp"\n' +
//         '                                                        data-animation-out="fadeOut"\n' +
//         '                                                        data-position="left">\n' +
//         '                                                        <a id="homeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-toggle" href="javascript:;" aria-haspopup="true" aria-expanded="false" aria-labelledby="homeSubMenu">Accessories</a>\n' +
//         '\n' +
//         '                                                        <!-- Home - Submenu -->\n' +
//         '                                                        <ul id="homeSubMenu" class="hs-sub-menu u-header__sub-menu animated hs-position-left fadeOut" aria-labelledby="homeMegaMenu" style="min-width: 230px; display: none;">\n' +
//         '                                                            <!-- Home-v1 -->\n' +
//         '                                                            <li class="hs-has-sub-menu">\n' +
//         '                                                                <a class="nav-link u-header__sub-menu-nav-link " href="index.html">Home-v1</a>\n' +
//         '                                                            </li>\n' +
//         '                                                            <!-- End Home-v1 -->\n' +
//         '\n' +
//         '                                                            <!-- Home-v2 -->\n' +
//         '                                                            <li class="hs-has-sub-menu">\n' +
//         '                                                                <a class="nav-link u-header__sub-menu-nav-link " href="home-v2.html">Home-v2</a>\n' +
//         '                                                            </li>\n' +
//         '                                                            <!-- End Home-v2 -->\n' +
//         '\n' +
//         '                                                            <!-- Home-v3 -->\n' +
//         '                                                            <li class="hs-has-sub-menu">\n' +
//         '                                                                <a class="nav-link u-header__sub-menu-nav-link " href="home-v3.html">Home-v3</a>\n' +
//         '                                                            </li>\n' +
//         '                                                            <!-- End Home-v3 -->\n' +
//         '\n' +
//         '                                                            <!-- Home-v4 -->\n' +
//         '                                                            <li class="hs-has-sub-menu">\n' +
//         '                                                                <a class="nav-link u-header__sub-menu-nav-link " href="home-v4.html">Home-v4</a>\n' +
//         '                                                            </li>\n' +
//         '                                                            <!-- End Home-v4 -->\n' +
//         '                                                        </ul>\n' +
//         '                                                        <!-- End Home - Submenu -->\n' +
//         '                                                    </li>\n' +
//         '                                                    <!-- End Nav Item -->\n' +
//         '                                                </ul>\n' +
//         '                                            </div>\n' +
//         '                                        </nav>\n' +
//         '                                    </div>\n' +
//         '                               ')
//     $.ajax({
//         type: "GET",
//         url: "api/getcategory",
//         dataType: 'JSON',
//         error: function (xhr, status, error) {
//             var errorMessage = xhr.status + ': ' + xhr.statusText
//             // alert(errorMessage);
//         },
//         success: function (data) {
//             //var a = JSON.parse(['x','y','x']);
//             //var x = JSON.stringify(data);
//             //JSON.parse(x)
//
//             for(var i=0;i<data.length;i++)
//             {
//                 console.log(data[i]['categories_name']);
//             }
//
//         }
//     });
//
//
// });
//
//
