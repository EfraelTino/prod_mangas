<!-- BEGIN: Head -->
<?php
$title = 'Dashboard principal';
include("page-master/head.php");
?>
<!-- END: Head -->

<body class="py-5 md:py-0">

    <!-- BEGIN: Top Bar -->
    <?php
    $nombre_ruta= 'Sección principal';
    include("page-master/header.php");
    ?>
    <!-- END: Top Bar -->
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <?php
        include("page-master/side-navbar.php");
        if ($rol_id ==7 ) { ?>
            <div class="content">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 2xl:col-span-9">
                        <div class="grid grid-cols-12 gap-6">
                            <!-- BEGIN: Notification -->
                            <div class="col-span-12 mt-6 -mb-6 intro-y">
                                <!-- <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                                <span>Introducing new dashboard! Download now at <a href="https://themeforest.net/item/midone-jquery-tailwindcss-html-admin-template/26366820" class="underline ml-1" target="blank">themeforest.net</a>.</span>
                                <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                            </div> -->
                            </div>
                            <!-- BEGIN: Notification -->
                            <!-- BEGIN: General Report -->
                            <div class="col-span-12 lg:col-span-8 xl:col-span-6 mt-2">
                                <div class="intro-y block sm:flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Informe general
                                    </h2>
                                    <select class="sm:ml-auto mt-3 sm:mt-0 sm:w-auto form-select box">
                                        <option value="daily">Daily</option>
                                        <option value="weekly">Weekly</option>
                                        <option value="monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="custom-date">Custom Date</option>
                                    </select>
                                </div>
                                <div class="report-box-2 intro-y mt-12 sm:mt-5">
                                    <div class="box sm:flex">
                                        <div class="px-8 py-12 flex flex-col justify-center flex-1">
                                            <i data-lucide="shopping-bag" class="w-10 h-10 text-warning"></i>
                                            <div class="relative text-3xl font-medium mt-12 pl-4 ml-0.5"> <span class="absolute text-2xl font-medium top-0 left-0 -ml-0.5">$</span> 54.143 </div>
                                            <div class="report-box-2__indicator bg-success tooltip cursor-pointer" title="47% Higher than last month"> 47% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            <div class="mt-4 text-slate-500">Ganancias de ventas de este mes después de los honorarios del autor asociado y antes de impuestos</div>
                                            <button class="btn btn-outline-secondary relative justify-start rounded-full mt-12">
                                                Descargar informes
                                                <span class="w-8 h-8 absolute flex justify-center items-center bg-primary text-white rounded-full right-0 top-0 bottom-0 my-auto ml-auto mr-0.5"> <i data-lucide="arrow-right" class="w-4 h-4"></i> </span>
                                            </button>
                                        </div>
                                        <div class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                            <div class="text-slate-500 text-xs">TRANSACTION TOTAL </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">4.501</div>
                                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2" title="2% Lower than last month"> 2% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                            <div class="text-slate-500 text-xs mt-5">CASO CANCELATION </div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">2</div>
                                                <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2" title="0.1% Lower than last month"> 0.1% <i data-lucide="chevron-down" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                            <div class="text-slate-500 text-xs mt-5">GROSS RENTAL VALUE</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">$72.000</div>
                                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="49% Higher than last month"> 49% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                            <div class="text-slate-500 text-xs mt-5">GROSS RENTAL PROFIT</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">$54.000</div>
                                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="52% Higher than last month"> 52% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                            <div class="text-slate-500 text-xs mt-5">NEW USERS</div>
                                            <div class="mt-1.5 flex items-center">
                                                <div class="text-base">2.500</div>
                                                <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2" title="52% Higher than last month"> 52% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: General Report -->
                            <!-- BEGIN: Visitors -->
                            <!-- <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Visitors
                                </h2>
                                <a href="" class="ml-auto text-primary truncate">View on Map</a>
                            </div>
                            <div class="report-box-2 intro-y mt-5">
                                <div class="box p-5">
                                    <div class="flex items-center">
                                        Realtime active users
                                        <div class="dropdown ml-auto">
                                            <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical" class="w-5 h-5 text-slate-500"></i> </a>
                                            <div class="dropdown-menu w-40">
                                                <ul class="dropdown-content">
                                                    <li>
                                                        <a href="" class="dropdown-item"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export </a>
                                                    </li>
                                                    <li>
                                                        <a href="" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-2xl font-medium mt-2">214</div>
                                    <div class="border-b border-slate-200 flex pb-2 mt-4">
                                        <div class="text-slate-500 text-xs">Page views per second</div>
                                        <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-auto" title="49% Lower than last month"> 49% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                    <div class="mt-2 border-b broder-slate-200">
                                        <div class="-mb-1.5 -ml-2.5">
                                            <div class="h-[79px]">
                                                <canvas id="report-bar-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-slate-500 text-xs border-b border-slate-200 flex mb-2 pb-2 mt-4">
                                        <div>Top Active Pages</div>
                                        <div class="ml-auto">Active Users</div>
                                    </div>
                                    <div class="flex">
                                        <div>/letz-lara…review/2653</div>
                                        <div class="ml-auto">472</div>
                                    </div>
                                    <div class="flex mt-1.5">
                                        <div>/midone…review/1674</div>
                                        <div class="ml-auto">294</div>
                                    </div>
                                    <div class="flex mt-1.5">
                                        <div>/profile…review/46789</div>
                                        <div class="ml-auto">83</div>
                                    </div>
                                    <div class="flex mt-1.5">
                                        <div>/profile…review/24357</div>
                                        <div class="ml-auto">21</div>
                                    </div>
                                    <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4">Real-Time Report</button>
                                </div>
                            </div>
                        </div> -->
                            <!-- END: Visitors -->
                            <!-- BEGIN: Users By Age -->
                            <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2 lg:mt-6 xl:mt-2">
                                <div class="intro-y flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Usuarios por roles
                                    </h2>
                                    <!-- <a href="" class="ml-auto text-primary truncate">Show More</a> -->
                                </div>
                                <div class="report-box-2 intro-y mt-5">
                                    <div class="box p-5">
                                        <ul class=" nav nav-pills w-4/5 bg-slate-100 dark:bg-black/20 rounded-md mx-auto " role="tablist">
                                            <li id="active-users-tab" class="nav-item flex-1" role="presentation">
                                                <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill" data-tw-target="#active-users" type="button" role="tab" aria-controls="active-users" aria-selected="true"> Activos </button>
                                            </li>
                                            <li id="inactive-users-tab" class="nav-item flex-1" role="presentation">
                                                <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill" data-tw-target="#inactive-users" type="button" role="tab" aria-selected="false"> Inactivos </button>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-6">
                                            <div class="tab-pane active" id="active-users" role="tabpanel" aria-labelledby="active-users-tab">
                                                <div class="relative">
                                                    <div class="h-[208px]">
                                                        <canvas class="mt-3" id="report-donut-chart"></canvas>
                                                    </div>
                                                    <div class="flex flex-col justify-center items-center absolute w-full h-full top-0 left-0">
                                                        <div class="text-2xl font-medium">2.501</div>
                                                        <div class="text-slate-500 mt-0.5">Active Users</div>
                                                    </div>
                                                </div>
                                                <div class="w-52 sm:w-auto mx-auto mt-5">
                                                    <div class="flex items-center">
                                                        <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                        <span class="truncate">17 - 30 Years old</span> <span class="font-medium ml-auto">62%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                        <span class="truncate">31 - 50 Years old</span> <span class="font-medium ml-auto">33%</span>
                                                    </div>
                                                    <div class="flex items-center mt-4">
                                                        <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                        <span class="truncate">>= 50 Years old</span> <span class="font-medium ml-auto">10%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Users By Age -->
                            <!-- BEGIN: Official Store -->
                            <!-- <div class="col-span-12 lg:col-span-8 mt-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Official Store
                                </h2>
                                <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                                    <i data-lucide="map-pin" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                                    <input type="text" class="form-control sm:w-56 box pl-10" placeholder="Filter by city">
                                </div>
                            </div>
                            <div class="intro-y box p-5 mt-12 sm:mt-5">
                                <div>250 Official stores in 21 countries, click the marker to see location details.</div>
                                <div class="report-maps mt-5 bg-slate-200 rounded-md" data-center="-6.2425342, 106.8626478" data-sources="/json/location.json"></div>
                            </div>
                        </div> -->
                            <!-- END: Official Store -->
                            <!-- BEGIN: Weekly Best Sellers -->
                            <!-- <div class="col-span-12 xl:col-span-4 mt-6">
                            <div class="intro-y flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Weekly Best Sellers
                                </h2>
                            </div>
                            <div class="mt-5">
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="images/profile-7.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Charlize Theron</div>
                                            <div class="text-slate-500 text-xs mt-0.5">27 July 2022</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                                    </div>
                                </div>
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="images/profile-6.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Robert De Niro</div>
                                            <div class="text-slate-500 text-xs mt-0.5">14 August 2021</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                                    </div>
                                </div>
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="images/profile-1.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Arnold Schwarzenegger</div>
                                            <div class="text-slate-500 text-xs mt-0.5">7 August 2021</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                                    </div>
                                </div>
                                <div class="intro-y">
                                    <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                            <img alt="Midone - HTML Admin Template" src="images/profile-7.jpg">
                                        </div>
                                        <div class="ml-4 mr-auto">
                                            <div class="font-medium">Charlize Theron</div>
                                            <div class="text-slate-500 text-xs mt-0.5">29 April 2022</div>
                                        </div>
                                        <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium">137 Sales</div>
                                    </div>
                                </div>
                                <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                            </div>
                        </div> -->
                            <!-- END: Weekly Best Sellers -->
                            <!-- BEGIN: Ads 1 -->
                            <!-- <div class="col-span-12 lg:col-span-6 mt-6">
                            <div class="box p-8 relative overflow-hidden bg-primary intro-y">
                                <div class="leading-[2.15rem] w-full sm:w-72 text-white text-xl -mt-3">Transact safely with Lender’s Fund Account (RDL)</div>
                                <div class="w-full sm:w-72 leading-relaxed text-white/70 dark:text-slate-500 mt-3">Apply now, quick registration.</div>
                                <button class="btn w-32 bg-white dark:bg-darkmode-800 dark:text-white mt-6 sm:mt-10">Start Now</button>
                                <img class="hidden sm:block absolute top-0 right-0 w-2/5 -mt-3 mr-2" alt="Midone - HTML Admin Template" src="images/woman-illustration.svg">
                            </div>
                        </div> -->
                            <!-- END: Ads 1 -->
                            <!-- BEGIN: Ads 2 -->
                            <!-- <div class="col-span-12 lg:col-span-6 mt-6">
                            <div class="box p-8 relative overflow-hidden intro-y">
                                <div class="leading-[2.15rem] w-full sm:w-52 text-primary dark:text-white text-xl -mt-3">Invite friends to get <span class="font-medium">FREE</span> bonuses!</div>
                                <div class="w-full sm:w-60 leading-relaxed text-slate-500 mt-2">Get a IDR 100,000 voucher by inviting your friends to fund #BecomeMember</div>
                                <div class="w-48 relative mt-6 cursor-pointer tooltip" title="Copy referral link">
                                    <input type="text" class="form-control" value="https://dashboard.in">
                                    <i data-lucide="copy" class="absolute right-0 top-0 bottom-0 my-auto mr-4 w-4 h-4"></i>
                                </div>
                                <img class="hidden sm:block absolute top-0 right-0 w-1/2 mt-1 -mr-12" alt="Midone - HTML Admin Template" src="images/phone-illustration.svg">
                            </div>
                        </div> -->
                            <!-- END: Ads 2 -->
                            <!-- BEGIN: Weekly Top Products -->
                            <!-- <div class="col-span-12 mt-6">
                            <div class="intro-y block sm:flex items-center h-10">
                                <h2 class="text-lg font-medium truncate mr-5">
                                    Weekly Top Products
                                </h2>
                                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                                    <button class="btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </button>
                                    <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i data-lucide="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF </button>
                                </div>
                            </div>
                            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-nowrap">IMAGES</th>
                                            <th class="whitespace-nowrap">PRODUCT NAME</th>
                                            <th class="text-center whitespace-nowrap">STOCK</th>
                                            <th class="text-center whitespace-nowrap">STATUS</th>
                                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                    <div class="w-10 h-10 image-fit zoom-in">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-4.jpg" title="Uploaded at 27 July 2022">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-2.jpg" title="Uploaded at 10 November 2022">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-7.jpg" title="Uploaded at 23 June 2020">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                            </td>
                                            <td class="text-center">74</td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                    <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                    <div class="w-10 h-10 image-fit zoom-in">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-8.jpg" title="Uploaded at 14 August 2021">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-1.jpg" title="Uploaded at 17 May 2020">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-6.jpg" title="Uploaded at 12 May 2021">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="font-medium whitespace-nowrap">Samsung Q90 QLED TV</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Electronic</div>
                                            </td>
                                            <td class="text-center">196</td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Active </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                    <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                    <div class="w-10 h-10 image-fit zoom-in">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-9.jpg" title="Uploaded at 7 August 2021">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-11.jpg" title="Uploaded at 17 May 2020">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-10.jpg" title="Uploaded at 29 March 2022">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="font-medium whitespace-nowrap">Apple MacBook Pro 13</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">PC &amp; Laptop</div>
                                            </td>
                                            <td class="text-center">127</td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                    <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="intro-x">
                                            <td class="w-40">
                                                <div class="flex">
                                                    <div class="w-10 h-10 image-fit zoom-in">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-5.jpg" title="Uploaded at 29 April 2022">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-3.jpg" title="Uploaded at 25 April 2021">
                                                    </div>
                                                    <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                        <img alt="Midone - HTML Admin Template" class="tooltip rounded-full" src="images/preview-9.jpg" title="Uploaded at 29 December 2022">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="" class="font-medium whitespace-nowrap">Nikon Z6</a>
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Photography</div>
                                            </td>
                                            <td class="text-center">197</td>
                                            <td class="w-40">
                                                <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                                            </td>
                                            <td class="table-report__action w-56">
                                                <div class="flex justify-center items-center">
                                                    <a class="flex items-center mr-3" href=""> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                                    <a class="flex items-center text-danger" href=""> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                                <nav class="w-full sm:w-auto sm:mr-auto">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                                        </li>
                                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                                        <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                                        <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                                        </li>
                                    </ul>
                                </nav>
                                <select class="w-20 form-select box mt-3 sm:mt-0">
                                    <option>10</option>
                                    <option>25</option>
                                    <option>35</option>
                                    <option>50</option>
                                </select>
                            </div>
                        </div> -->
                            <!-- END: Weekly Top Products -->
                        </div>
                    </div>
                    <div class="col-span-12 2xl:col-span-3">
                        <div class="2xl:border-l -mb-10 pb-10">
                            <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                                <!-- BEGIN: Important Notes -->
                                <div class="col-span-12 md:col-span-6 xl:col-span-12 mt-3 2xl:mt-8">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-auto">
                                            Notas importantes
                                        </h2>
                                        <button data-carousel="important-notes" data-target="prev" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                        <button data-carousel="important-notes" data-target="next" class="tiny-slider-navigator btn px-2 border-slate-300 text-slate-600 dark:text-slate-300 mr-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                                    </div>
                                    <div class="mt-5 intro-x">
                                        <div class="box zoom-in">
                                            <div class="tiny-slider" id="important-notes">
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                                <div class="p-5">
                                                    <div class="text-base font-medium truncate">Lorem Ipsum is simply dummy text</div>
                                                    <div class="text-slate-400 mt-1">20 Hours ago</div>
                                                    <div class="text-slate-500 text-justify mt-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                                                    <div class="font-medium flex mt-5">
                                                        <button type="button" class="btn btn-secondary py-1 px-2">View Notes</button>
                                                        <button type="button" class="btn btn-outline-secondary py-1 px-2 ml-auto ml-auto">Dismiss</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Important Notes -->
                                <!-- BEGIN: Recent Activities -->
                                <!-- <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Recent Activities
                                    </h2>
                                    <a href="" class="ml-auto text-primary truncate">Show More</a>
                                </div>
                                <div class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-2.jpg">
                                            </div>
                                        </div>
                                        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                            <div class="flex items-center">
                                                <div class="font-medium">Morgan Freeman</div>
                                                <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                            </div>
                                            <div class="text-slate-500 mt-1">Has joined the team</div>
                                        </div>
                                    </div>
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-7.jpg">
                                            </div>
                                        </div>
                                        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                            <div class="flex items-center">
                                                <div class="font-medium">Al Pacino</div>
                                                <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                            </div>
                                            <div class="text-slate-500">
                                                <div class="mt-1">Added 3 new photos</div>
                                                <div class="flex mt-2">
                                                    <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Apple MacBook Pro 13">
                                                        <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="images/preview-7.jpg">
                                                    </div>
                                                    <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Samsung Q90 QLED TV">
                                                        <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="images/preview-14.jpg">
                                                    </div>
                                                    <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Apple MacBook Pro 13">
                                                        <img alt="Midone - HTML Admin Template" class="rounded-md border border-white" src="images/preview-10.jpg">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-14.jpg">
                                            </div>
                                        </div>
                                        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                            <div class="flex items-center">
                                                <div class="font-medium">Sylvester Stallone</div>
                                                <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                            </div>
                                            <div class="text-slate-500 mt-1">Has changed <a class="text-primary" href="">Apple MacBook Pro 13</a> price and description</div>
                                        </div>
                                    </div>
                                    <div class="intro-x relative flex items-center mb-3">
                                        <div class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-10.jpg">
                                            </div>
                                        </div>
                                        <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                            <div class="flex items-center">
                                                <div class="font-medium">Angelina Jolie</div>
                                                <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                            </div>
                                            <div class="text-slate-500 mt-1">Has changed <a class="text-primary" href="">Oppo Find X2 Pro</a> description</div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                                <!-- END: Recent Activities -->
                                <!-- BEGIN: Transactions -->
                                <!-- <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 mt-3">
                                <div class="intro-x flex items-center h-10">
                                    <h2 class="text-lg font-medium truncate mr-5">
                                        Transactions
                                    </h2>
                                </div>
                                <div class="mt-5">
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-7.jpg">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Charlize Theron</div>
                                                <div class="text-slate-500 text-xs mt-0.5">27 July 2022</div>
                                            </div>
                                            <div class="text-success">+$46</div>
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-6.jpg">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Robert De Niro</div>
                                                <div class="text-slate-500 text-xs mt-0.5">14 August 2021</div>
                                            </div>
                                            <div class="text-success">+$39</div>
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-1.jpg">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Arnold Schwarzenegger</div>
                                                <div class="text-slate-500 text-xs mt-0.5">7 August 2021</div>
                                            </div>
                                            <div class="text-danger">-$77</div>
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-7.jpg">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Charlize Theron</div>
                                                <div class="text-slate-500 text-xs mt-0.5">29 April 2022</div>
                                            </div>
                                            <div class="text-danger">-$51</div>
                                        </div>
                                    </div>
                                    <div class="intro-x">
                                        <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                            <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                                <img alt="Midone - HTML Admin Template" src="images/profile-1.jpg">
                                            </div>
                                            <div class="ml-4 mr-auto">
                                                <div class="font-medium">Kate Winslet</div>
                                                <div class="text-slate-500 text-xs mt-0.5">22 August 2022</div>
                                            </div>
                                            <div class="text-success">+$100</div>
                                        </div>
                                    </div>
                                    <a href="" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View More</a>
                                </div>
                            </div> -->
                                <!-- END: Transactions -->
                                <!-- BEGIN: Schedules -->
                                <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12 xl:col-start-1 xl:row-start-2 2xl:col-start-auto 2xl:row-start-auto mt-3">
                                    <div class="intro-x flex items-center h-10">
                                        <h2 class="text-lg font-medium truncate mr-5">
                                            Cronograma general
                                        </h2>
                                        <a href="" class="ml-auto text-primary truncate flex items-center"> <i data-lucide="plus" class="w-4 h-4 mr-1"></i> Add New Schedules </a>
                                    </div>
                                    <div class="mt-5">
                                        <div class="intro-x box">
                                            <div class="p-5">
                                                <div class="flex">
                                                    <i data-lucide="chevron-left" class="w-5 h-5 text-slate-500"></i>
                                                    <div class="font-medium text-base mx-auto">April</div>
                                                    <i data-lucide="chevron-right" class="w-5 h-5 text-slate-500"></i>
                                                </div>
                                                <div class="grid grid-cols-7 gap-4 mt-5 text-center">
                                                    <div class="font-medium">Su</div>
                                                    <div class="font-medium">Mo</div>
                                                    <div class="font-medium">Tu</div>
                                                    <div class="font-medium">We</div>
                                                    <div class="font-medium">Th</div>
                                                    <div class="font-medium">Fr</div>
                                                    <div class="font-medium">Sa</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">29</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">30</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">31</div>
                                                    <div class="py-0.5 rounded relative">1</div>
                                                    <div class="py-0.5 rounded relative">2</div>
                                                    <div class="py-0.5 rounded relative">3</div>
                                                    <div class="py-0.5 rounded relative">4</div>
                                                    <div class="py-0.5 rounded relative">5</div>
                                                    <div class="py-0.5 bg-success/20 dark:bg-success/30 rounded relative">6</div>
                                                    <div class="py-0.5 rounded relative">7</div>
                                                    <div class="py-0.5 bg-primary text-white rounded relative">8</div>
                                                    <div class="py-0.5 rounded relative">9</div>
                                                    <div class="py-0.5 rounded relative">10</div>
                                                    <div class="py-0.5 rounded relative">11</div>
                                                    <div class="py-0.5 rounded relative">12</div>
                                                    <div class="py-0.5 rounded relative">13</div>
                                                    <div class="py-0.5 rounded relative">14</div>
                                                    <div class="py-0.5 rounded relative">15</div>
                                                    <div class="py-0.5 rounded relative">16</div>
                                                    <div class="py-0.5 rounded relative">17</div>
                                                    <div class="py-0.5 rounded relative">18</div>
                                                    <div class="py-0.5 rounded relative">19</div>
                                                    <div class="py-0.5 rounded relative">20</div>
                                                    <div class="py-0.5 rounded relative">21</div>
                                                    <div class="py-0.5 rounded relative">22</div>
                                                    <div class="py-0.5 bg-pending/20 dark:bg-pending/30 rounded relative">23</div>
                                                    <div class="py-0.5 rounded relative">24</div>
                                                    <div class="py-0.5 rounded relative">25</div>
                                                    <div class="py-0.5 rounded relative">26</div>
                                                    <div class="py-0.5 bg-primary/10 dark:bg-primary/50 rounded relative">27</div>
                                                    <div class="py-0.5 rounded relative">28</div>
                                                    <div class="py-0.5 rounded relative">29</div>
                                                    <div class="py-0.5 rounded relative">30</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">1</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">2</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">3</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">4</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">5</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">6</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">7</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">8</div>
                                                    <div class="py-0.5 rounded relative text-slate-500">9</div>
                                                </div>
                                            </div>
                                            <div class="border-t border-slate-200/60 p-5">
                                                <div class="flex items-center">
                                                    <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                    <span class="truncate">UI/UX Workshop</span> <span class="font-medium xl:ml-auto">23th</span>
                                                </div>
                                                <div class="flex items-center mt-4">
                                                    <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                    <span class="truncate">VueJs Frontend Development</span> <span class="font-medium xl:ml-auto">10th</span>
                                                </div>
                                                <div class="flex items-center mt-4">
                                                    <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                    <span class="truncate">Laravel Rest API</span> <span class="font-medium xl:ml-auto">31th</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Schedules -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } else { ?>
            <div class="content">
                <div class="intro-y flex items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                    Bienvenido
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: FAQ Menu -->
                    <a href="" class="intro-y col-span-12 lg:col-span-4 box py-10 border-2 border-primary dark:border-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="shield" data-lucide="shield" class="lucide lucide-shield block w-12 h-12 text-primary mx-auto">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                        <div class="font-medium text-center text-base mt-3">Perfil</div>
                        <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">Administra tus datos, actualiza y empieza a trabajar con nosotros</div>
                    </a>
                    <a href="" class="intro-y col-span-12 lg:col-span-4 box py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="send" data-lucide="send" class="lucide lucide-send block w-12 h-12 text-primary mx-auto">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        <div class="font-medium text-center text-base mt-3">Tomar capítulos</div>
                        <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">Puedes tomar los capítulos que deseas de acuerdo al rol asignado que tengas, ¡Apresúrate que la competencia está dura!</div>
                    </a>
                    <a href="" class="intro-y col-span-12 lg:col-span-4 box py-10">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trending-up" data-lucide="trending-up" class="lucide lucide-trending-up block w-12 h-12 text-primary mx-auto">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        <div class="font-medium text-center text-base mt-3">Ranking</div>
                        <div class="text-slate-500 mt-2 w-3/4 text-center mx-auto">¿Quieres conocer quiénes son los mejores de nuestra plataforma o serás tú?, Descúbrelo   </div>
                    </a>
                    <!-- END: FAQ Menu -->
                </div>
            </div>
        <?php
        }
        ?>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->

        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <!-- <div data-url="side-menu-light-dashboard-overview-2.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div> -->
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
    <script src="js/app.js"></script>
    <!-- END: JS Assets-->
</body>

</html>