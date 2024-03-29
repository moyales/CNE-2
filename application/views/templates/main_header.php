<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />-->
        <link rel="stylesheet" href="http://students.stevens.edu/cne/project_css/cne_styling.css?v={random number/string}">
        <link rel="stylesheet" href="http://students.stevens.edu/cne/project_css/dashboard.css?v={random number/string}">
        <link rel="icon" href="http://students.stevens.edu/cne/project_images/cne-home-logo.png">
    </head>
    <body id="login">
        <header class="main-header">
            <svg class="header-logo" viewBox="0 0 96 96">
                <path id="d-sign" d="M50.029,42.133c-11.81,-3.146 -15.607,-6.4 -15.607,-11.466c0,-5.814 5.254,-9.867 14.046,-9.867c9.261,0 12.694,4.533 13.006,11.2l11.498,0c-0.364,-9.173 -5.827,-17.6 -16.7,-20.32l0,-11.68l-15.607,0l0,11.52c-10.093,2.24 -18.209,8.96 -18.209,19.253c0,12.32 9.937,18.454 24.451,22.027c13.007,3.2 15.608,7.893 15.608,12.853c0,3.68 -2.549,9.547 -14.047,9.547c-10.717,0 -14.931,-4.907 -15.503,-11.2l-11.445,0c0.624,11.68 9.156,18.24 19.145,20.427l0,11.573l15.607,0l0,-11.467c10.145,-1.973 18.208,-8 18.208,-18.933c0,-15.147 -12.642,-20.32 -24.451,-23.467Z" />
                <path id="leaf" d="M47.45,57.491c-9.036,8.573 -9.036,22.453 -0.066,31.026c4.866,-10.677 13.538,-19.595 24.362,-24.903c-9.169,7.349 -15.59,17.618 -17.841,29.268c8.606,3.863 19.198,2.45 26.315,-4.302c11.519,-10.928 13.405,-43.807 13.405,-43.807c0,0 -34.656,1.79 -46.175,12.718Z" />
            </svg>
            <h1 class="left">Cheap<span id="header-span">&</span>Ease</h1>

            <div class="main-navbar">
                <div class="dropdown">
                    <button class="navbtn">Manage</button>
                    <div class="dropdown-content">
                        <a href="http://students.stevens.edu/cne/main/main_income">Income</a>
                        <a href="http://students.stevens.edu/cne/main/main_expenses">Expenses</a>
                        <a href="http://students.stevens.edu/cne/main/main_goals">Goals</a>
                        <a href="http://students.stevens.edu/cne/main/main_forecast">Forecast</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="navbtn">Review</button>
                    <div class="dropdown-content">
                        <a href="http://students.stevens.edu/cne/main/main_summary">Summary</a>
                        <a href="http://students.stevens.edu/cne/main/main_history">History</a>
                        <a href="#">Trends</a>
                    </div>
                </div>

            </div>

            <div class="right">
                    <p>Welcome, <strong id="username"><?php echo $firstName; ?></strong></p>
                    <div class="dropdown">
                        <button class="dropbtn"><i class="material-icons" id="user-icon">account_circle</i></button>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="#">Settings</a>
                            <a href="http://students.stevens.edu/cne/Auth/logout">Log Off</a>
                        </div>
                    </div>                    
                </div>                
            </div>

        </header>

        <div class="ban-box">
            <h2>Balance</h2>
            <h3 class="ban">$<?php echo number_format((float)$balance, 2, '.', ''); ?></h3>
        </div>

        <div class="ban-box">
            <h2>Budget Variance</h2>
            <h3 class="ban"><?php echo number_format((float)$variance, 2, '.', ''); ?>%</h3>
        </div>

        <div class="ban-box">
            <h2>E-to-I Ratio</h2>
            <h3 class="ban"><?php echo number_format((float)$e2i * 100, 2, '.', ''); ?>%</h3>
        </div>





