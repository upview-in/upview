<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upview | Invoice</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/css/bootstrap.min.css'>


    <style>
        .invoice-head td {
            padding: 0 8px;
        }

        .container {
            padding-top: 30px;
        }

        .invoice-body {
            background-color: transparent;
        }

        .invoice-thank {
            margin-top: 60px;
            padding: 5px;
        }

        address {
            margin-top: 15px;
        }
    </style>

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <div class="row">
            <div class="span4">
                <img alt="Upview" src="{{ asset('main/assets/images/resources/logo-black.svg') }}" class="img-rounded logo">
                <address>
                    <strong>Neomobile Advertising LLP</strong><br>
                    <br>
                </address>
            </div>
            <div class="span4 well">
                <table class="invoice-head">
                    <tbody>
                        <tr>
                            <td class="pull-right"><strong>Customer #</strong></td>
                            <td>Prince Suman</td>
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Invoice #</strong></td>
                            <td>XXXXXXXXXXXXX</td>
                        </tr>
                        <tr>
                            <td class="pull-right"><strong>Date</strong></td>
                            <td>06-06-2022</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="span8">
                <h2>Invoice</h2>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Description</th>
                            <th>Month/Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>SEO Bronze</td>
                            <td>www.swaransoft.com</td>
                            <td>8 Months</td>
                            <td>$1000</td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="2">&nbsp;</td>
                            <td><strong>Total</strong></td>
                            <td><strong>$1000.00</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="span8 well invoice-thank">
                <h5 style="text-align:center;">Thank You!</h5>
            </div>
        </div>
        <div class="row">
            <div class="span3">
                <strong>Phone:</strong>+91-124-111111
            </div>
            <div class="span3">
                <strong>Email:</strong> <a href="info@upview.in">info@upview.in</a>
            </div>
            <div class="span3">
                <strong>Website:</strong> <a href="https://upview.in">https://upview.in</a>
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.0/js/bootstrap.min.js'></script>
</body>

</html>