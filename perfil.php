<?php
$title = 'Perfil del usuario';
include("page-master/head.php");
?>
<!-- END: Head -->

<body class="py-5 md:py-0">
    <!-- BEGIN: Top Bar -->
    <?php
    include("page-master/header.php");
    ?>
    <!-- END: Top Bar -->
    <div class="flex overflow-hidden">
        <!-- BEGIN: Side Menu -->
        <?php include("page-master/side-navbar.php"); ?>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Profile Layout
                </h2>
            </div>
            <!-- BEGIN: Profile Info -->
            <div class="intro-y box px-5 pt-5 mt-5">
                <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                    <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                        <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                            <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-1.jpg"> 
                        </div>
                        
                        <div class="ml-5">
                            <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?php echo  $username; ?></div>
                            <div class="text-slate-500"><?php
                                                        switch ($rol) {
                                                            case 1:
                                                                echo 'Traductor';
                                                                break;
                                                            case 2:
                                                                echo 'Typer';
                                                                break;
                                                            case 3:
                                                                echo 'Cleaner';
                                                                break;
                                                            case 4:
                                                                echo 'Raw Hunter';
                                                                break;
                                                            case 5:
                                                                echo 'Otro';
                                                                break;
                                                            case 5:
                                                                echo 'Administrador';
                                                                break;
                                                            default:
                                                                'Traductor';
                                                                break;
                                                        }
                                                        ?> </div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                        <div class="font-medium text-center lg:mt-3 flex  w-100" style="justify-content: space-between; align-items: center;"><span style="width: 50%;">Detalles de la cuenta </span><a href="actualizar-perfil?id=<?php echo $_SESSION['userid'];?>" class="btn btn-sm btn-secondary w-24 mr-1 mb-2 ml-5" style="width: 50%;">Editar mis datos personales</a></div>
                        <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                            <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> <strong style="margin-right: 10px;">  Email* </strong> <span> <?php echo$email; ?> </span></div>
                            
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="credit-card" class="w-4 h-4 mr-2"></i> <strong style="margin-right: 10px;"> Método de pago* </strong> <span> <?php if($metodo == 0){echo ' No especificado';}else{$metodo;} ?> </span>  </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="link-2" class="w-4 h-4 mr-2"></i> <strong style="margin-right: 10px;"> Enlace de pago* </strong> <span> 
                                <?php if($enlace_pago == ''){echo ' No especificado';}else{$enlace_pago;} ?> </span> </div>
                            <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="link" class="w-4 h-4 mr-2"></i> <strong style="margin-right: 10px;"> Enlace de telegram* </strong> <span> <?php if($enlace_telegram == ''){echo ' No especificado';}else{$enlace_telegram;} ?> </span> </div>
                        </div>
                    </div>
                    <div class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"><?php  echo $completados?></div>
                            <div class="text-slate-500">Trabajos realizados</div>
                        </div>
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"><?php echo '$'. $ganancia .'.00'; ?></div>
                            <div class="text-slate-500">Monto generado</div>
                        </div>
                        <div class="text-center rounded-md w-20 py-3">
                            <div class="font-medium text-primary text-xl"><?php echo $trabajos_realizados?></div>
                            <div class="text-slate-500">Trabajos asigandos</div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-link-tabs flex-col sm:flex-row justify-center lg:justify-start text-center" role="tablist">
                    <li id="profile-tab" class="nav-item" role="presentation">
                        <a href="javascript:;" class="nav-link py-4 flex items-center active" data-tw-target="#profile" aria-controls="profile" aria-selected="true" role="tab"> <i class="w-4 h-4 mr-2" data-lucide="user"></i> Profile </a>
                    </li>
                    <li id="account-tab" class="nav-item" role="presentation">
                        <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#account" aria-selected="false" role="tab"> <i class="w-4 h-4 mr-2" data-lucide="shield"></i> Account </a>
                    </li>
                    <li id="change-password-tab" class="nav-item" role="presentation">
                        <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#change-password" aria-selected="false" role="tab"> <i class="w-4 h-4 mr-2" data-lucide="lock"></i> Change Password </a>
                    </li>
                    <li id="settings-tab" class="nav-item" role="presentation">
                        <a href="javascript:;" class="nav-link py-4 flex items-center" data-tw-target="#settings" aria-selected="false" role="tab"> <i class="w-4 h-4 mr-2" data-lucide="settings"></i> Settings </a>
                    </li>
                </ul>
            </div>
            <!-- END: Profile Info -->
            <div class="tab-content mt-5">
                <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="grid grid-cols-12 gap-6">
                        <!-- BEGIN: Latest Uploads -->
                        <div class="intro-y box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Latest Uploads
                                </h2>
                                <div class="dropdown ml-auto sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            <li> <a href="javascript:;" class="dropdown-item">All Files</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary hidden sm:flex">All Files</button>
                            </div>
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="file"> <a href="" class="w-12 file__icon file__icon--directory"></a> </div>
                                    <div class="ml-4">
                                        <a class="font-medium" href="">Documentation</a>
                                        <div class="text-slate-500 text-xs mt-0.5">40 KB</div>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="file">
                                        <a href="" class="w-12 file__icon file__icon--file">
                                            <div class="file__icon__file-name text-xs">MP3</div>
                                        </a>
                                    </div>
                                    <div class="ml-4">
                                        <a class="font-medium" href="">Celine Dion - Ashes</a>
                                        <div class="text-slate-500 text-xs mt-0.5">40 KB</div>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center mt-5">
                                    <div class="file"> <a href="" class="w-12 file__icon file__icon--empty-directory"></a> </div>
                                    <div class="ml-4">
                                        <a class="font-medium" href="">Resources</a>
                                        <div class="text-slate-500 text-xs mt-0.5">0 KB</div>
                                    </div>
                                    <div class="dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                        <div class="dropdown-menu w-40">
                                            <ul class="dropdown-content">
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i> Share File </a>
                                                </li>
                                                <li>
                                                    <a href="" class="dropdown-item"> <i data-lucide="trash" class="w-4 h-4 mr-2"></i> Delete </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Latest Uploads -->
                        <!-- BEGIN: Work In Progress -->
                        <div class="intro-y box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Work In Progress
                                </h2>
                                <div class="dropdown ml-auto sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                    <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                        <ul class="dropdown-content">
                                            <li> <a id="work-in-progress-mobile-new-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-new" class="dropdown-item" role="tab" aria-controls="work-in-progress-new" aria-selected="true">New</a> </li>
                                            <li> <a id="work-in-progress-mobile-last-week-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-last-week" class="dropdown-item" role="tab" aria-selected="false">Last Week</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist">
                                    <li id="work-in-progress-new-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5 active" data-tw-target="#work-in-progress-new" aria-controls="work-in-progress-new" aria-selected="true" role="tab"> New </a> </li>
                                    <li id="work-in-progress-last-week-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5" data-tw-target="#work-in-progress-last-week" aria-selected="false" role="tab"> Last Week </a> </li>
                                </ul>
                            </div>
                            <div class="p-5">
                                <div class="tab-content">
                                    <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                        <div>
                                            <div class="flex">
                                                <div class="mr-auto">Pending Tasks</div>
                                                <div>20%</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-1/2 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex">
                                                <div class="mr-auto">Completed Tasks</div>
                                                <div>2 / 20</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-1/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <div class="flex">
                                                <div class="mr-auto">Tasks In Progress</div>
                                                <div>42</div>
                                            </div>
                                            <div class="progress h-1 mt-2">
                                                <div class="progress-bar w-3/4 bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <a href="" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Work In Progress -->
                        <!-- BEGIN: Daily Sales -->
                        <div class="intro-y box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Daily Sales
                                </h2>
                                <div class="dropdown ml-auto sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                    <div class="dropdown-menu w-40">
                                        <ul class="dropdown-content">
                                            <li>
                                                <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary hidden sm:flex"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Excel </button>
                            </div>
                            <div class="p-5">
                                <div class="relative flex items-center">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-1.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">Angelina Jolie</a>
                                        <div class="text-slate-500 mr-5 sm:mr-5">Bootstrap 4 HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-slate-600 dark:text-slate-500">+$19</div>
                                </div>
                                <div class="relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-8.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">Al Pacino</a>
                                        <div class="text-slate-500 mr-5 sm:mr-5">Tailwind HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-slate-600 dark:text-slate-500">+$25</div>
                                </div>
                                <div class="relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit">
                                        <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-13.jpg">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <a href="" class="font-medium">Russell Crowe</a>
                                        <div class="text-slate-500 mr-5 sm:mr-5">Vuejs HTML Admin Template</div>
                                    </div>
                                    <div class="font-medium text-slate-600 dark:text-slate-500">+$21</div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Daily Sales -->
                        <!-- BEGIN: Latest Tasks -->
                        <div class="intro-y box col-span-12 lg:col-span-6">
                            <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    Latest Tasks
                                </h2>
                                <div class="dropdown ml-auto sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                                    <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                        <ul class="dropdown-content">
                                            <li> <a id="latest-tasks-mobile-new-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#latest-tasks-new" class="dropdown-item" role="tab" aria-controls="latest-tasks-new" aria-selected="true">New</a> </li>
                                            <li> <a id="latest-tasks-mobile-last-week-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#latest-tasks-last-week" class="dropdown-item" role="tab" aria-selected="false">Last Week</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist">
                                    <li id="latest-tasks-new-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5 active" data-tw-target="#latest-tasks-new" aria-controls="latest-tasks-new" aria-selected="true" role="tab"> New </a> </li>
                                    <li id="latest-tasks-last-week-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5" data-tw-target="#latest-tasks-last-week" aria-selected="false" role="tab"> Last Week </a> </li>
                                </ul>
                            </div>
                            <div class="p-5">
                                <div class="tab-content">
                                    <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                        <div class="flex items-center">
                                            <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                <a href="" class="font-medium">Create New Campaign</a>
                                                <div class="text-slate-500">10:00 AM</div>
                                            </div>
                                            <div class="form-check form-switch ml-auto">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-5">
                                            <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                <a href="" class="font-medium">Meeting With Client</a>
                                                <div class="text-slate-500">02:00 PM</div>
                                            </div>
                                            <div class="form-check form-switch ml-auto">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                        <div class="flex items-center mt-5">
                                            <div class="border-l-2 border-primary dark:border-primary pl-4">
                                                <a href="" class="font-medium">Create New Repository</a>
                                                <div class="text-slate-500">04:00 PM</div>
                                            </div>
                                            <div class="form-check form-switch ml-auto">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: Latest Tasks -->
                        <!-- BEGIN: New Products -->
                        <div class="intro-y box col-span-12">
                            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    New Products
                                </h2>
                                <button data-carousel="new-products" data-target="prev" class="tiny-slider-navigator btn btn-outline-secondary px-2 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                <button data-carousel="new-products" data-target="next" class="tiny-slider-navigator btn btn-outline-secondary px-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                            </div>
                            <div id="new-products" class="tiny-slider py-5">
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/preview-11.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Sony A7 III</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">42</div>
                                                <div class="text-slate-500">Orders</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">99k</div>
                                                <div class="text-slate-500">Purchases</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">42</div>
                                                <div class="text-slate-500">Reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">7 May 2022</div>
                                            <div class="text-slate-500">Date of Release</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Preview</button>
                                            <button class="btn btn-secondary w-20 ml-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="./images/preview-4.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Sony A7 III</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">50</div>
                                                <div class="text-slate-500">Orders</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">27k</div>
                                                <div class="text-slate-500">Purchases</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">50</div>
                                                <div class="text-slate-500">Reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">30 January 2021</div>
                                            <div class="text-slate-500">Date of Release</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Preview</button>
                                            <button class="btn btn-secondary w-20 ml-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/preview-11.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Sony Master Series A9G</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 20</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">41</div>
                                                <div class="text-slate-500">Orders</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">219k</div>
                                                <div class="text-slate-500">Purchases</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">41</div>
                                                <div class="text-slate-500">Reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">8 September 2020</div>
                                            <div class="text-slate-500">Date of Release</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Preview</button>
                                            <button class="btn btn-secondary w-20 ml-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/preview-12.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Oppo Find X2 Pro</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">23</div>
                                                <div class="text-slate-500">Orders</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">135k</div>
                                                <div class="text-slate-500">Purchases</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">23</div>
                                                <div class="text-slate-500">Reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">14 December 2022</div>
                                            <div class="text-slate-500">Date of Release</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Preview</button>
                                            <button class="btn btn-secondary w-20 ml-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/preview-5.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Nike Tanjun</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">26</div>
                                                <div class="text-slate-500">Orders</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">55k</div>
                                                <div class="text-slate-500">Purchases</div>
                                            </div>
                                            <div class="text-center rounded-md w-20 py-3">
                                                <div class="font-medium text-primary text-xl">26</div>
                                                <div class="text-slate-500">Reviews</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">18 March 2021</div>
                                            <div class="text-slate-500">Date of Release</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Preview</button>
                                            <button class="btn btn-secondary w-20 ml-2">Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: New Products -->
                        <!-- BEGIN: New Authors -->
                        <div class="intro-y box col-span-12">
                            <div class="flex items-center px-5 py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                                <h2 class="font-medium text-base mr-auto">
                                    New Authors
                                </h2>
                                <button data-carousel="new-authors" data-target="prev" class="tiny-slider-navigator btn btn-outline-secondary px-2 mr-2"> <i data-lucide="chevron-left" class="w-4 h-4"></i> </button>
                                <button data-carousel="new-authors" data-target="next" class="tiny-slider-navigator btn btn-outline-secondary px-2"> <i data-lucide="chevron-right" class="w-4 h-4"></i> </button>
                            </div>
                            <div id="new-authors" class="tiny-slider py-5">
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-1.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Angelina Jolie</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Backend Engineer</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="flex items-center">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                                angelinajolie@left4code.com
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                                Angelina Jolie
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">7 May 2022</div>
                                            <div class="text-slate-500">Joined Date</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                            <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-8.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Al Pacino</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Software Engineer</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="flex items-center">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                                alpacino@left4code.com
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                                Al Pacino
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">30 January 2021</div>
                                            <div class="text-slate-500">Joined Date</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                            <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-13.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Russell Crowe</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">Software Engineer</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="flex items-center">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                                russellcrowe@left4code.com
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                                Russell Crowe
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">8 September 2020</div>
                                            <div class="text-slate-500">Joined Date</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                            <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-15.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Kevin Spacey</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">DevOps Engineer</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="flex items-center">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                                kevinspacey@left4code.com
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                                Kevin Spacey
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">14 December 2022</div>
                                            <div class="text-slate-500">Joined Date</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                            <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5">
                                    <div class="flex flex-col lg:flex-row items-center pb-5">
                                        <div class="flex-1 flex flex-col sm:flex-row items-center pr-5 lg:border-r border-slate-200/60 dark:border-darkmode-400">
                                            <div class="sm:mr-5">
                                                <div class="w-20 h-20 image-fit">
                                                    <img alt="Midone - HTML Admin Template" class="rounded-full" src="images/profile-10.jpg">
                                                </div>
                                            </div>
                                            <div class="mr-auto text-center sm:text-left mt-3 sm:mt-0">
                                                <a href="" class="font-medium text-lg">Al Pacino</a>
                                                <div class="text-slate-500 mt-1 sm:mt-0">DevOps Engineer</div>
                                            </div>
                                        </div>
                                        <div class="w-full lg:w-auto mt-6 lg:mt-0 pt-4 lg:pt-0 flex-1 flex flex-col justify-center items-center lg:items-start px-5 border-t lg:border-t-0 border-slate-200/60 dark:border-darkmode-400">
                                            <div class="flex items-center">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="facebook"></i> </a>
                                                alpacino@left4code.com
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <a href="" class="w-8 h-8 rounded-full flex items-center justify-center border mr-2 text-slate-400"> <i class="w-3 h-3 fill-current" data-lucide="twitter"></i> </a>
                                                Al Pacino
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col sm:flex-row items-center border-t border-slate-200/60 dark:border-darkmode-400 pt-5">
                                        <div class="w-full sm:w-auto flex justify-center sm:justify-start items-center border-b sm:border-b-0 border-slate-200/60 dark:border-darkmode-400 pb-5 sm:pb-0">
                                            <div class="px-3 py-2 text-primary bg-primary/10 dark:bg-darkmode-400 dark:text-slate-300 rounded font-medium mr-3">18 March 2021</div>
                                            <div class="text-slate-500">Joined Date</div>
                                        </div>
                                        <div class="flex sm:ml-auto mt-5 sm:mt-0">
                                            <button class="btn btn-secondary w-20 ml-auto">Message</button>
                                            <button class="btn btn-secondary w-20 ml-2">Profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: New Authors -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content -->
    </div>
    <!-- BEGIN: Dark Mode Switcher-->
    <div data-url="side-menu-light-profile-overview-2.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
        <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
        <div class="dark-mode-switcher__toggle dark-mode-switcher__toggle--active border"></div>
    </div>
    <!-- END: Dark Mode Switcher-->

    <!-- BEGIN: JS Assets-->
    <?php

    include("page-master/js.php");
    ?>
    <!-- END: JS Assets-->
</body>

</html>