<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>
    @include('client.template.head')
    @yield('head')
</head>

<body class="body-wrapper">

@include('client.template.header')

@yield('content')

<!--============================
=            Footer            =
=============================-->

@include('client.template.footer')

@include('client.template.script')

</body>

</html>



