@section('custom-scripts')
<script src="{{ asset('admin/js/index.js') }}"></script>
@endsection

<x-admin-app-layout pageHeader=0>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-cosmic">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total Orders</p>
                            <h4 class="my-1 text-white">4805</h4>
                            <p class="mb-0 font-13 text-white">+2.5% from last week</p>
                        </div>
                        <div id="chart1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ibiza">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Total Revenue</p>
                            <h4 class="my-1 text-white">$84,245</h4>
                            <p class="mb-0 font-13 text-white">+5.4% from last week</p>
                        </div>
                        <div id="chart2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-ohhappiness">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-white">Bounce Rate</p>
                            <h4 class="my-1 text-white">34.6%</h4>
                            <p class="mb-0 font-13 text-white">-4.5% from last week</p>
                        </div>
                        <div id="chart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-kyoto">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-auto">
                            <p class="mb-0 text-dark">Total Customers</p>
                            <h4 class="my-1 text-dark">8.4K</h4>
                            <p class="mb-0 font-13 text-dark">+8.4% from last week</p>
                        </div>
                        <div id="chart4"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sales Overview</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-info"></i>Downloads</span>
                        <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1 text-danger"></i>Earnings</span>
                    </div>
                    <div class="chart-container-1">
                        <canvas id="chart5"></canvas>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-0 row-group text-center border-top">
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">$168</h4>
                            <small class="mb-0">Today's Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">$856</h4>
                            <small class="mb-0">This Week Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">$2400</h4>
                            <small class="mb-0">This Month Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <h4 class="mb-0">$4,562</h4>
                            <small class="mb-0">This Year Sales <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.62%</span></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Top Categories</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart-container-1 mt-4">
                        <canvas id="chart6"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Product Views</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart-container-1 mt-4">
                        <canvas id="chart7"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->

    <div class="card radius-10">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Orders</h6>
                </div>
                <div class="dropdown ms-auto">
                    <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Photo</th>
                            <th>Product ID</th>
                            <th>Status</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Shipping</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Iphone 5</td>
                            <td><img src="assets/images/products/18.png" class="product-img-2" alt="product img"></td>
                            <td>#9405822</td>
                            <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                            <td>$1250.00</td>
                            <td>03 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Earphone GL</td>
                            <td><img src="assets/images/products/16.png" class="product-img-2" alt="product img"></td>
                            <td>#8304620</td>
                            <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                            <td>$1500.00</td>
                            <td>05 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>HD Hand Camera</td>
                            <td><img src="assets/images/products/19.png" class="product-img-2" alt="product img"></td>
                            <td>#4736890</td>
                            <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                            <td>$1400.00</td>
                            <td>06 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>Clasic Shoes</td>
                            <td><img src="assets/images/products/04.png" class="product-img-2" alt="product img"></td>
                            <td>#8543765</td>
                            <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                            <td>$1200.00</td>
                            <td>14 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Sitting Chair</td>
                            <td><img src="assets/images/products/11.png" class="product-img-2" alt="product img"></td>
                            <td>#9629240</td>
                            <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                            <td>$1500.00</td>
                            <td>18 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Hand Watch</td>
                            <td><img src="assets/images/products/17.png" class="product-img-2" alt="product img"></td>
                            <td>#8506790</td>
                            <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                            <td>$1800.00</td>
                            <td>21 Feb 2020</td>
                            <td>
                                <div class="progress" style="height: 5px;">
                                    <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-lg-3">
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Sales This Week</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-1">
                        <canvas id="chart16"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Completed
                        <span class="badge bg-gradient-quepal rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Apple
                        <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Nokia <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Profit Ratio</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-1">
                        <canvas id="chart17"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Gross Profit <span class="badge bg-gradient-quepal rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Revenue <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Expense <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col d-flex">
            <div class="card radius-10 w-100">
                <div class="card-header bg-transparent">
                    <div class="d-flex align-items-center">
                        <div>
                            <h6 class="mb-0">Trending Products</h6>
                        </div>
                        <div class="dropdown ms-auto">
                            <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="javascript:;">Action</a>
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-container-1">
                        <canvas id="chart18"></canvas>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Jeans <span class="badge bg-gradient-quepal rounded-pill">25</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">T-Shirts <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Shoes
                        <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--end row-->
</x-admin-app-layout>