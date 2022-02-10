@section('path-navigation')
<a class="breadcrumb-item" href="#">Packages</a>
<span class="breadcrumb-item active">{{ decrypt($packageName) }}</span>
@endsection

@section('custom-css')
<style>
    @import url("https://fonts.googleapis.com/css?family=Roboto:300");
    body {
    margin: 0;
    padding: 0;
    font-family: "Roboto", sans-serif !important;
    }
    section {
    width: 100%;
    height: 100vh;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 140px 0;
    }
    .card {
    position: relative;
    max-width: 300px;
    height: auto;
    background: linear-gradient(-45deg, #fe0847, #feae3f);
    border-radius: 15px;
    margin: 0 auto;
    padding: 40px 20px;
    -webkit-box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
    -webkit-transition: 0.5s;
    transition: 0.5s;
    }
    .card:hover {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    }
    .col-sm-4:nth-child(1) .card,
    .col-sm-4:nth-child(1) .card .title .fa {
    background: linear-gradient(-45deg, #f403d1, #64b5f6);
    }
    .col-sm-4:nth-child(2) .card,
    .col-sm-4:nth-child(2) .card .title .fa {
    background: linear-gradient(-45deg, #ffec61, #f321d7);
    }
    .col-sm-4:nth-child(3) .card,
    .col-sm-4:nth-child(3) .card .title .fa {
    background: linear-gradient(-45deg, #24ff72, #9a4eff);
    }
    .card::before {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 80%;
    height: 40%;
    background: rgba(255, 255, 255, 0.1);
    z-index: 1;
    -webkit-transform: skewY(-5deg) scale(1.5);
    transform: skewY(-5deg) scale(1.5);
    }
    .title .fa {
    color: #fff;
    font-size: 60px;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    text-align: center;
    line-height: 100px;
    -webkit-box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }
    .title h2 {
    position: relative;
    margin: 20px 0 0;
    padding: 0;
    color: #fff;
    font-size: 28px;
    z-index: 2;
    }
    .price,
    .option {
    position: relative;
    z-index: 2;
    }
    .price h4 {
    margin: 0;
    padding: 20px 0;
    color: #fff;
    font-size: 60px;
    }
    .option ul {
    margin: 0;
    padding: 0;
    }
    .option ul li {
    margin: 0 0 10px;
    padding: 0;
    list-style: none;
    color: #fff;
    font-size: 16px;
    }
    .card a {
    position: relative;
    z-index: 2;
    background: #fff;
    color: black;
    width: 150px;
    height: 40px;
    line-height: 40px;
    border-radius: 40px;
    display: block;
    text-align: center;
    margin: 20px auto 0;
    font-size: 16px;
    cursor: pointer;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }
    .card a:hover {
    text-decoration: none;
    }

</style>
@endsection

<x-app-layout title="Package Details">
    <div class="row">
        <div class="col-sm-4">
            <div class="card text-center">
            <div class="title">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                <h2>Basic</h2>
            </div>
            <div class="price">
                <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
                <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 10 GB Space </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 3 Domain Names </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 20 Email Address </li>
                <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                </ul>
            </div>
            <a href="#">Order Now </a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center">
            <div class="title">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                <h2>Pro</h2>
            </div>
            <div class="price">
                <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
                <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 10 GB Space </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 3 Domain Names </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 20 Email Address </li>
                <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                </ul>
            </div>
            <a href="#">Order Now </a>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card text-center">
            <div class="title">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                <h2>Enterprise</h2>
            </div>
            <div class="price">
                <h4><sup>$</sup>25</h4>
            </div>
            <div class="option">
                <ul>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 10 GB Space </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 3 Domain Names </li>
                <li> <i class="fa fa-check" aria-hidden="true"></i> 20 Email Address </li>
                <li> <i class="fa fa-times" aria-hidden="true"></i> Live Support </li>
                </ul>
            </div>
            <a href="#">Order Now </a>
            </div>
        </div>
    </div>
</x-app-layout>