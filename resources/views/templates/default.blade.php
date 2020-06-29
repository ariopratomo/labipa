<!DOCTYPE html>
<html lang="en">
@include('templates.partials.head')

<body id="page-top">
    <div id="wrapper">
        @include('templates.partials.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('templates.partials.navbar')
                @yield('content')
            </div>
            <!-- End of Main Content -->
            @include('templates.partials.footer')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('templates.components.logoutmodal')
    @include('templates.partials.script')

</body>

</html>
