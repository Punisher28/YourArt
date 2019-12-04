<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="shortcut icon" href="{{ asset('storage/logo.png') }}" type="image/png">
    <title>{{ config('app.name') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.1/css/all.css" integrity="sha384-wxqG4glGB3nlqX0bi23nmgwCSjWIW13BdLUEYC4VIMehfbcro/ATkyDsF/AbIOVe" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/font.css') }}" />--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

</head>

<body class="">
