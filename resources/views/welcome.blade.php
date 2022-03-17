<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!--cdn---->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                /* height: 100vh; */
                margin: 0;
                /* overflow: hidden; */
            }

            /* .full-height {
                height: 100vh;
            } */

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .card{
                border:solid #eee 1px;
                border-radius: 5px;
             
                /* margin-top: 200px; */
            }
            .card:hover{
                cursor: pointer;
            }
            /* img{
                margin-top: 200px;
            } */
            span{
                margin-left:5%;  
            }
            .title{
                font-size: 25px;
                font-weight: 500;
            }
           
           footer {
                background: #1A1E25;
                color: #868c96;
            }

            footer p {
                padding: 40px 0;
                text-align: center;
            }

            footer img {
                width: 44px;
            }
           
        </style>
    </head>
    <body>

        <div class="container position-ref full-height" style="float: center;">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                       

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="container-fluid">
            <div class="content">
                 <div>
                    <div class="title m-b-md">
                        <img src="/images/kuyaAllanLogo.jpg" alt="logo" style="height:900px;">
                    </div>

                    <br>

                 
                        <h3 style="letter-spacing: 3px;">User Quick Guide</h3>
                        <small class="text-muted">A Brief Documentation on how to use this Inventory System</small>
                        <hr>
                   
                    
                    
                    <div style="text-align: left">

                        <!------------------ Dashboard ------------------------>

                        <div class="card">
                            <div class="card-header" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="collapseExample">
                                <div class="container" style="padding-left:10%">
                                    {{-- <span class="title">Dashboard</span>
                                  <span>
                                    An Instant Glance to Stock Item Status and Purchase Details
                                  </span> --}}
                                  <div class="row">
                                    <div class="col-md-2">
                                        <span class="title">Dashboard</span>
                                    </div>
                                    <div class="col" style="padding-top:5px">
                                        An Instant Glance to Stock Item Status and Purchase Details
                                    </div>
                                </div>

                                </div>
                               
                            </div>
                            <div class="collapse" id="dashboard">
                                <div class="card card-body">
                                    <br>
                                    <div class="container">
                                        {{-- <b-row>
                                            <b-col>
                                                <img src="/images/docs/dashboard.png" alt="dashboard" style="width:65%;"> 
                                            </b-col>
                                            <b-col cols="2">
                                              <h1>dfbvdf</h1>
                                            </b-col>
                                        </b-row> --}}

                                        <div class="row">
                                            <div class="col-md-9">
                                                <img src="/images/docs/dashboard.png" alt="dashboard" style="width:100%;border:solid #fff 4px;"> 
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card" style="padding:20px">
                                                    <div>
                                                        <h3>Legends</h3>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <h3>A</h3>
                                                        </div>
                                                        <div class="col">Clickable widgets with related reports regards to stock items status and purchases.</div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <h3>B</h3>
                                                        </div>
                                                        <div class="col">Search Module. Users can search purchase ID, Transaction Dates, 
                                                            Customer ID, Created by who and even amount due of a specific purchase transaction.</div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <h3>C</h3>
                                                        </div>
                                                        <div class="col">Date Filter. Users can select a specific start date and 
                                                            end date and the module returns the purchases within the date filter range. </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <h3>D</h3>
                                                        </div>
                                                        <div class="col">Purchases and it's details. </div>
                                                    </div>
                                                  
                                                </div>
                                            </div> 
                                        </div>


                                    </div>
                                </div>
                            </div>
                          </div>

                          <!------------------ Invoice ------------------------>

                          <div class="card">
                                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#invoice" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="container" style="padding-left:10%">
                                        {{-- <span class="title">Invoice</span>
                                        <span>
                                            Receive and Process Customer's Purchase
                                        </span> --}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="title">Invoice</span>
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                                Receive and Process Customer's Purchase
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="invoice">
                                    <div class="card card-body">
                                        <br>
                                        <div class="container">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                        <img src="/images/docs/invoice.png" alt="invoice">
                                        <img src="/images/docs/checkout.png" alt="checkout">
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!------------------ customers ------------------------>

                           <div class="card">
                                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#customers" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="container" style="padding-left:10%">
                                        {{-- <span class="title">Customers</span>
                                        <span>
                                            Add, Edit/Update, Delete and Search Customers on Record
                                        </span> --}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="title">Customers</span>
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                                Add, Edit/Update, Delete and Search Customers on Record
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="customers">
                                    <div class="card card-body">
                                        <br>
                                        <div class="container">
                                        <img src="/images/docs/customer.png" alt="customer">
                                       
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <!------------------ products ------------------------>

                           <div class="card">
                                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#items" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="container" style="padding-left:10%">
                                        {{-- <span class="title">Items</span>
                                        <span>
                                           Record Item, Update and Delete Item and it's Details
                                        </span> --}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="title">Items</span>
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                                Record Item, Update and Delete Item and it's Details
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="items">
                                    <div class="card card-body">
                                        <br>
                                        <div class="container">
                                        <img src="/images/docs/items.png" alt="items">
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!------------------ users ------------------------>

                           <div class="card">
                                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="container" style="padding-left:10%">
                                        {{-- <span class="title">Users</span>
                                        <span>
                                            Manage Users. Create, Edit and Delete a System User
                                        </span> --}}
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="title">Users</span>
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                                Manage Users. Create, Edit and Delete a System User
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="collapse" id="users">
                                    <div class="card card-body">
                                        <br>
                                        <div class="container">
                                        <img src="/images/docs/users.png" alt="users">
                                        </div>
                                    </div>
                                </div>
                            </div>

                             <!------------------ settings ------------------------>

                           <div class="card">
                                <div class="card-header" data-bs-toggle="collapse" data-bs-target="#settings" aria-expanded="false" aria-controls="collapseExample">
                                    <div class="container" style="padding-left:10%">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <span class="title">Settings</span>
                                            </div>
                                            <div class="col" style="padding-top:5px">
                                                Contains Category Module. Add and Update Product or Item Category.
                                            </div>
                                        </div>
                                        {{-- <span class="title">Settings</span>
                                        <span>
                                            Contains Category Module. Add and Update Product or Item Category.
                                        </span> --}}
                                    </div>
                                </div>
                                <div class="collapse" id="settings">
                                    <div class="card card-body">
                                        <br>
                                        <div class="container">
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                                        {{-- <img src="/images/cars/cima_1912_top_01.jpg.ximg.l_full_m.smart.jpg" alt="logo"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>


                    </div>

                 </div>
              



                {{-- <svg id="b33613f3-47b2-4fb7-9d5b-ca5c70d6619d" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="450" viewBox="0 0 863 826.71426"><title>laravel and vue</title><path d="M908.58458,346.02969C863.66819,169.40825,708.46793,41.91226,526.2964,36.79851,429.98777,34.095,328.64421,66.0363,254.85863,177.81049c-131.89969,199.80845,8.10555,337.88223,105.7135,403.49213a610.75776,610.75776,0,0,1,126.24112,113.4651c65.931,78.23772,192.76719,175.45908,343.82337,23.12816C940.12233,607.48624,938.50333,463.677,908.58458,346.02969Z" transform="translate(-168.5 -36.64287)" fill="#f2f2f2"/><path d="M1030.5,739.35713c0,43.35436-189.18913,124-427.5,124s-434.5-75.64564-434.5-119,196.18913-38,434.5-38S1030.5,696.00278,1030.5,739.35713Z" transform="translate(-168.5 -36.64287)" fill="#3f3d56"/><path d="M1030.5,739.35713c0,43.35436-189.18913,124-427.5,124s-434.5-75.64564-434.5-119,196.18913-38,434.5-38S1030.5,696.00278,1030.5,739.35713Z" transform="translate(-168.5 -36.64287)" opacity="0.1"/><ellipse cx="431.5" cy="707.21426" rx="431.5" ry="78.5" fill="#3f3d56"/><polygon points="594.859 440.238 594.859 650.182 629.976 707.413 632.649 711.766 771.212 711.766 774.011 440.238 594.859 440.238" fill="#2f2e41"/><polygon points="594.859 440.238 594.859 650.182 629.976 707.413 632.131 440.238 594.859 440.238" opacity="0.1"/><polygon points="260.348 434.639 260.348 644.583 225.231 701.814 222.558 706.167 83.994 706.167 81.195 434.639 260.348 434.639" fill="#2f2e41"/><polygon points="260.348 434.639 260.348 644.583 225.231 701.814 223.075 434.639 260.348 434.639" opacity="0.1"/><polygon points="816 430.44 816 443.037 63 443.037 63 424.842 132.981 388.452 754.416 388.452 816 430.44" fill="#2f2e41"/><polygon points="816 430.44 816 443.037 63 443.037 63 424.842 816 430.44" opacity="0.1"/><polygon points="170.771 493.424 137.18 493.424 123.184 483.626 186.167 483.626 170.771 493.424" opacity="0.1"/><polygon points="170.771 534.013 137.18 534.013 123.184 524.215 186.167 524.215 170.771 534.013" opacity="0.1"/><polygon points="170.771 591.398 137.18 591.398 123.184 581.6 186.167 581.6 170.771 591.398" opacity="0.1"/><polygon points="170.771 648.782 137.18 648.782 123.184 638.985 186.167 638.985 170.771 648.782" opacity="0.1"/><polygon points="684.435 499.022 718.026 499.022 732.022 489.225 669.039 489.225 684.435 499.022" opacity="0.1"/><polygon points="684.435 539.611 718.026 539.611 732.022 529.814 669.039 529.814 684.435 539.611" opacity="0.1"/><polygon points="684.435 596.996 718.026 596.996 732.022 587.199 669.039 587.199 684.435 596.996" opacity="0.1"/><polygon points="684.435 654.381 718.026 654.381 732.022 644.583 669.039 644.583 684.435 654.381" opacity="0.1"/><path d="M701.01569,390.06945,696.347,419.877s-22.98411,12.2103-6.8234,12.56943,92.29556,0,92.29556,0,14.72419,0-8.619-12.92856l-4.66865-31.244Z" transform="translate(-168.5 -36.64287)" fill="#3f3d56"/><path d="M686.27261,432.123a63.5688,63.5688,0,0,1,10.07442-6.66854l4.66865-29.80753,67.51582.06351,4.66865,29.38488a61.30417,61.30417,0,0,1,10.78841,7.09889c2.99811-.68405,6.2745-3.22612-10.78841-12.67635l-4.66865-31.244-67.51582,1.79564L696.347,419.877S677.03363,430.13851,686.27261,432.123Z" transform="translate(-168.5 -36.64287)" opacity="0.1"/><rect x="413.82432" y="145.67179" width="304.18032" height="211.88475" rx="10.6948" fill="#3f3d56"/><rect x="424.05943" y="156.98428" width="283.71009" height="158.734" fill="#f2f2f2"/><circle cx="565.91447" cy="151.9565" r="1.79563" fill="#f2f2f2"/><path d="M886.50463,364.93058v18.574a10.69346,10.69346,0,0,1-10.6948,10.69481H593.01912a10.69346,10.69346,0,0,1-10.6948-10.69481v-18.574Z" transform="translate(-168.5 -36.64287)" fill="#3f3d56"/><circle cx="565.91447" cy="343.01191" r="6.82341" fill="#f2f2f2"/><polygon points="555.281 415.196 555.281 418.788 362.071 418.788 362.071 415.915 362.337 415.196 367.099 402.268 551.331 402.268 555.281 415.196" fill="#3f3d56"/><path d="M798.13506,448.32338c-.35194,1.50472-1.68071,3.09212-4.683,4.59324-10.77381,5.3869-32.68053-1.4365-32.68053-1.4365s-16.879-2.873-16.879-10.41468a13.46778,13.46778,0,0,1,1.4796-.87984c4.52961-2.3964,19.54831-8.3097,46.17806.25038a11.10594,11.10594,0,0,1,5.06187,3.31716A5.29644,5.29644,0,0,1,798.13506,448.32338Z" transform="translate(-168.5 -36.64287)" fill="#3f3d56"/><path d="M798.13506,448.32338c-13.18712,5.05294-24.94133,5.43-37.00441-2.94842-6.0836-4.22333-11.61057-5.2684-15.75848-5.18936,4.52961-2.3964,19.54831-8.3097,46.17806.25038a11.10594,11.10594,0,0,1,5.06187,3.31716A5.29644,5.29644,0,0,1,798.13506,448.32338Z" transform="translate(-168.5 -36.64287)" opacity="0.1"/><ellipse cx="613.10087" cy="407.29559" rx="4.66865" ry="1.43651" fill="#f2f2f2"/><polygon points="555.281 415.196 555.281 418.788 362.071 418.788 362.071 415.915 362.337 415.196 555.281 415.196" opacity="0.1"/><path d="M834.19367,268.59416c-1.52438-1.52439-21.08732-26.1686-24.39014-30.23362-3.55691-4.065-5.08129-3.30284-7.36787-3.04877s-26.93078,4.57315-29.72549,4.82721c-2.7947.50813-4.57315,1.52439-2.7947,4.065,1.52438,2.28657,17.78447,25.15234,21.34137,30.48768l-64.78633,15.4979-51.32094-86.1277c-2.03251-3.04877-2.54064-4.065-7.11379-3.811s-40.39618,3.30283-42.93682,3.30283c-2.54064.25407-5.33535,1.27032-2.79471,7.36786s43.19089,93.49557,44.20714,96.03621,4.065,6.60566,10.92475,5.08128c7.1138-1.77845,31.504-8.13,44.96934-11.68694,7.11379,12.7032,21.34138,38.61773,24.13609,42.42869,3.5569,5.08128,6.09754,4.065,11.43288,2.54064,4.31909-1.27032,66.56478-23.62795,69.35948-24.89827s4.57316-2.03251,2.54064-4.82722c-1.52438-2.03251-17.78448-24.13609-26.42267-35.569,5.84349-1.52438,26.93079-7.11379,29.21737-7.876,2.54064-.76219,3.04876-2.03251,1.52438-3.5569ZM716.562,292.73024c-.76219.25406-37.09335,8.89225-38.8718,9.40038-2.03251.50813-2.03251.25406-2.03251-.50813-.50813-.76219-43.19088-89.17648-43.95307-90.19274-.50813-1.01626-.50813-2.03251,0-2.03251s34.29863-3.04877,35.31488-3.04877c1.27032,0,1.01626.25406,1.52439,1.01625,0,0,47.51,82.06268,48.27216,83.333,1.01626,1.27032.50813,1.77845-.25406,2.03251Zm102.13375,19.05481c.50812,1.01626,1.27032,1.52438-.7622,2.03251-1.77844.76219-61.22943,20.83325-62.49975,21.34137s-2.03251.76219-3.5569-1.52438-20.83326-35.569-20.83326-35.569l63.26194-16.51416c1.52438-.50813,2.03252-.76219,3.04876.76219,1.01626,1.77845,20.83325,28.70924,21.34139,29.47144Zm4.065-44.71527c-1.52438.25406-24.64421,6.09753-24.64421,6.09753l-19.0548-25.91453c-.50813-.76219-1.01626-1.52439.25406-1.77845s22.86576-4.065,23.882-4.31909,1.77844-.50813,3.04876,1.27032c1.27032,1.52438,17.53043,22.35763,18.29261,23.11982s-.25406,1.27033-1.77844,1.52439Z" transform="translate(-168.5 -36.64287)" fill="#fb503b"/><circle cx="394.63903" cy="155.89453" r="38.24668" fill="#ffb9b9"/><path d="M534.95727,211.66073v60.38949h62.40247s-8.05193-50.32457-4.026-65.42194Z" transform="translate(-168.5 -36.64287)" fill="#ffb9b9"/><path d="M658.75572,293.18654s-59.383-29.18825-59.383-31.20123-6.03894-15.09737-10.06491-15.09737-38.24668-11.07141-57.37,5.03245l-2.013,13.08439-73.47387,48.31159,20.12983,73.47388s13.08438,14.09088,9.05842,24.1558,3.01947,61.396,3.01947,61.396l158.01916-5.03245V398.86815s5.03246-16.10387,8.05194-21.13632,0-20.12983,0-20.12983l24.15579-30.19475S675.86608,299.22549,658.75572,293.18654Z" transform="translate(-168.5 -36.64287)" fill="#d0cde1"/><path d="M458.96717,337.97541l4.52921-24.659S437.3276,427.04991,440.34707,440.1343s25.16229,33.21422,28.18176,34.22071,31.20124-86.55827,31.20124-86.55827Z" transform="translate(-168.5 -36.64287)" opacity="0.1"/><path d="M473.56129,310.2969l-17.11035,3.01947S430.28216,427.04991,433.30163,440.1343s25.16229,33.21422,28.18176,34.22071,31.20124-86.55827,31.20124-86.55827Z" transform="translate(-168.5 -36.64287)" fill="#d0cde1"/><path d="M664.29142,344.01436l8.55518-16.60711s12.0779,113.73354,4.026,124.805-39.90294,15.21422-39.90294,15.21422l-.35672-82.64915Z" transform="translate(-168.5 -36.64287)" opacity="0.1"/><path d="M665.80116,314.32286l13.08439,13.08439s12.0779,113.73354,4.026,124.805-39.90294,15.21422-39.90294,15.21422l-.35672-82.64915Z" transform="translate(-168.5 -36.64287)" fill="#d0cde1"/><path d="M470.54182,487.4394s-29.18826-11.07141-34.22071,10.06491S448.399,613.25083,448.399,613.25083s11.07141,71.46089,18.11685,73.47388,38.24668,3.01947,43.27913-6.03895-15.09737-101.65564-15.09737-101.65564l116.753-2.013s-7.04544,80.51931-11.0714,87.56475-4.026,31.20124,0,31.20124,48.31159-2.013,51.33106-8.05193,20.12983-141.9153,20.12983-141.9153,14.09088-47.3051-2.013-44.28562S470.54182,487.4394,470.54182,487.4394Z" transform="translate(-168.5 -36.64287)" fill="#3f3d56"/><path d="M642.65186,683.70523s10.06491-7.04544,15.09737,0,7.04544,15.09737-15.09737,27.17527-39.25317,9.05843-39.25317,7.04544V688.73769Z" transform="translate(-168.5 -36.64287)" fill="#2f2e41"/><path d="M468.52883,680.68576s-10.06491-7.04544-15.09737,0S446.386,695.78313,468.52883,707.861s39.25317,9.05842,39.25317,7.04544V685.71822Z" transform="translate(-168.5 -36.64287)" fill="#2f2e41"/><path d="M563.38706,144.31209a32.34794,32.34794,0,0,0-11.23352,1.60112,43.42778,43.42778,0,0,0-8.00273,4.2341L527.26546,160.6475a7.90785,7.90785,0,0,0-4.76623,7.37l-2.11,15.80182c-.53248,3.98775-1.02331,8.25232.7618,11.85776,1.49,3.00929,4.3314,5.06856,6.66782,7.4804a27.456,27.456,0,0,1,7.23648,14.06091c1.20795,6.59754.43461,14.5425,5.65567,18.75287,2.827,2.27972,6.6803,2.71095,10.30576,2.92289a153.78563,153.78563,0,0,0,29.70069-1.14315,11.81912,11.81912,0,0,0,4.48748-1.25739c1.775-1.04988,2.89248-2.90316,3.93692-4.68137,3.77061-6.41971,7.657-13.24892,7.61606-20.69395-.02026-3.68318-.96268-7.6389.8058-10.8698a42.49668,42.49668,0,0,1,3.03759-3.945c2.18963-3.07677,2.61589-7.03,2.97274-10.7897,1.13978-12.00866-.05177-21.1472-8.90224-29.60633C586.41,148.011,574.65448,144.38477,563.38706,144.31209Z" transform="translate(-168.5 -36.64287)" fill="#2f2e41"/><polygon points="300.937 569.703 267.346 740.458 284.141 740.458 316.333 572.503 300.937 569.703" fill="#2f2e41"/><polygon points="408.708 583.7 429.703 779.648 443.699 779.648 431.102 578.101 408.708 583.7" fill="#2f2e41"/><polygon points="466.093 578.101 495.485 708.267 509.481 708.267 481.489 575.302 466.093 578.101" fill="#2f2e41"/><polygon points="354.123 578.101 349.924 681.674 361.121 681.674 369.519 578.101 354.123 578.101" fill="#2f2e41"/><path d="M445.64312,588.15108s-22.394-149.76023,40.58922-153.95911,152.55948,0,152.55948,0,51.78625-4.19889,36.39034,153.95911c0,0,13.99628,46.18773-111.97026,41.98884S445.64312,588.15108,445.64312,588.15108Z" transform="translate(-168.5 -36.64287)" fill="#6c63ff"/><path d="M1019.5,649.30794c0,26.1153-15.52513,35.23378-34.67635,35.23378s-34.67635-9.11848-34.67635-35.23378,34.67635-59.33808,34.67635-59.33808S1019.5,623.19264,1019.5,649.30794Z" transform="translate(-168.5 -36.64287)" fill="#6c63ff"/><polygon points="815.416 622.048 830.195 595.009 815.471 618.619 815.631 608.792 825.817 589.229 815.673 606.191 815.96 588.516 826.868 572.942 816.005 585.737 816.185 553.327 815.106 594.394 804.06 577.487 814.972 597.859 813.939 617.599 813.908 617.075 801.123 599.212 813.869 618.926 813.74 621.395 813.717 621.432 813.728 621.635 811.106 647.977 814.609 647.977 815.029 645.849 827.744 626.182 815.06 643.904 815.416 622.048" fill="#3f3d56"/><polygon points="838.47 704.549 797.129 704.549 786.445 644.163 846.831 644.163 838.47 704.549" fill="#2f2e41"/><rect x="145" y="296.30047" width="86" height="100.82759" fill="#3f3d56"/><rect x="158.34483" y="311.94613" width="59.31034" height="69.53627" fill="#f2f2f2"/><path d="M362.4444,363.35713l-6.02314,10.4315-6.02315-10.4315H330.34252l26.07874,45.17047L382.5,363.35713Z" transform="translate(-168.5 -36.64287)" fill="#4dba87"/><path d="M362.4444,363.35713l-6.02314,10.4315-6.02315-10.4315H340.774l15.64724,27.101,15.64724-27.101Z" transform="translate(-168.5 -36.64287)" fill="#435466"/></svg> --}}
            </div>
        </div>
        
        <div>
            <br>
            <br>
            <br>
           
            <!-- =============== 1.9 Contact Area End ====================-->
            <!-- =============== 1.9 Footer Area Start ====================-->
            <footer>
                <p>Copyright &copy; 2019 <img src="https://i.ibb.co/QDy827D/ak-logo.png" alt="logo"> All Rights Reserved.</p>
            </footer>
        </div>

    </body>
</html>
