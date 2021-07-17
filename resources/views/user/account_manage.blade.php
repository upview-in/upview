<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upview - Account Management</title>
    <script src="https://kit.fontawesome.com/efdf2100de.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/nav-design.css') }}" />

</head>
<body>

    <x-app-layout title="Account Management">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="input-affix m-b-10">
                            <div class="container-fluid">
                                <div class="card shadow w-100" id="ChannelMainDiv">
                                    <div class="card shadow" id="highlights">
                                        <div class="card-header p-15 ml-3 w-500">
                                            <label class="h3 m-0">Manage Accounts</label>
                                        </div>
                                        <div class="card-header p-15 ml-3">
                                            
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                  <button class="btn  btn-lg float-sm-right btn-outline-secondary" type="button"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;Add Account</button>
                                                </div>
                                              </div>
                                            
                                              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                                <a class=" navbar-brand font-size-15" href="#">Connected Profiles</a><br>
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                  <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNav">
                                                  <ul class="navbar-nav">
                                                    <li class="nav-item nav-yt active">
                                                      <a class="nav-link" href="#">Youtube <span class="sr-only"></span></a>
                                                    </li>
                                                    <li class="nav-item nav-ig">
                                                      <a class="nav-link" href="#">Instagram</a>
                                                    </li>
                                                    <li class="nav-item nav-fb">
                                                      <a class="nav-link" href="#">Facebook</a>
                                                    </li>
                                                    <li class="nav-item">
                                                      <a class="nav-link disabled" href="#">Twitter</a>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </nav>                                              
                                              <div>
                                                    {{-- User Accounts Table Start --}}

                                                <table class="table">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Linked Account</th>
                                                        <th scope="col">Token Status</th>
                                                        <th scope="col">Authorized Since</th>
                                                        <th scope="col">Actions</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">1</th>
                                                        <td><i class="fas fa-user-alt-slash"></i> Mark</td>
                                                        <td class="text-info">Active</td>
                                                        <td>date format</td>
                                                        <td><a href="#"><i class="fas fa-trash text-danger justify-center" data-toggle="tooltip" data-placement="bottom" title="Delete Account" aria-hidden="false"></i></a>
                                                            <i class="far fa-star text-warning" data-toggle="tooltip" data-placement="bottom" title="Set as default" aria-hidden="false"></i>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                              </div>

                                                     {{-- User Accounts Table End --}}

                                        </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    
</body>
</html>


