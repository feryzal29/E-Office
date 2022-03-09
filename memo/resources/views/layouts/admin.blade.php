<!DOCTYPE html>
<html lang="en">

<head>

    @include('partial.admin.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('partial.admin.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('partial.admin.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('body')
                    @include('sweetalert::alert')
                </div>
                <!-- /.container-fluid -->

                <!-- Footer -->
                @include('partial.admin.footer')
                <!-- End of Footer -->

            </div>
            <!-- End of Main Content -->



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    @include('partial.admin.js')
</body>

</html>