<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Dashboard</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Agrega las hojas de estilo de Bootstrap y Bootstrap Datepicker -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">


</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
  
      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
        {{-- @include('layouts.navbar') --}}
        <!-- End of Topbar -->
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>
  
          @yield('contents')
  
          <!-- Content Row -->
  
  
        </div>
        <!-- /.container-fluid -->
  
      </div>
      <!-- End of Main Content -->
  
      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->
  
    </div>
    <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script>
  <!-- Agrega las bibliotecas de jQuery y Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(document).ready(function () {
      // Inicializa el datepicker
      $('.datepicker').datepicker({
          format: 'dd/mm/yyyy',  // Define el formato de fecha deseado
          autoclose: true,       // Cierra automáticamente el calendario cuando se selecciona una fecha
      });
  });
</script>
<script>
    // $(document).ready(function () {
    //     const group1 = $("#group1");
    //     const group2 = $("#group2");
    //     const group3 = $("#group3");

    //     const field1a = $("#field1a");
    //     const field1b = $("#field1b");
    //     const field2a = $("#field2a");
    //     const field2b = $("#field2b");
    //     const field3a = $("#field3a");
    //     const field3b = $("#field3b");

    //     const awd1 = $("#awd1");
    //     const awd2 = $("#awd2");
    //     const awd3 = $("#awd3");

    //     const percentage1 = $("#percentage1");
    //     const percentage2 = $("#percentage2");
    //     const percentage3 = $("#percentage3");

    //     // Deshabilitar todos los campos de los grupos 2 y 3 al inicio
    //     field2a.prop("disabled", true);
    //     field2b.prop("disabled", true);
    //     awd2.prop("disabled", true);
    //     percentage2.prop("disabled", true);
    //     field3a.prop("disabled", true);
    //     field3b.prop("disabled", true);
    //     awd3.prop("disabled", true);
    //     percentage3.prop("disabled", true);

    //     function checkGroup1() {
    //         const value1a = parseInt(field1a.val());
    //         const value1b = parseInt(field1b.val());
    //         const awdValue1 = awd1.val().trim();
    //         const percentageValue1 = percentage1.val().trim();

    //         if (!isNaN(value1a) && !isNaN(value1b) && value1a <= value1b && (awdValue1 !== "" || percentageValue1 !== "")) {
    //             field2a.prop("disabled", false);
    //             field2b.prop("disabled", false);
    //             awd2.prop("disabled", false);
    //             percentage2.prop("disabled", false);
    //         } else {
    //             field2a.prop("disabled", true);
    //             field2b.prop("disabled", true);
    //             awd2.prop("disabled", true);
    //             percentage2.prop("disabled", true);
    //             field3a.prop("disabled", true);
    //             field3b.prop("disabled", true);
    //             awd3.prop("disabled", true);
    //             percentage3.prop("disabled", true);
    //         }
    //     }

    //     function checkGroup2() {
    //         const value2a = parseInt(field2a.val());
    //         const value2b = parseInt(field2b.val());
    //         const awdValue2 = awd2.val().trim();
    //         const percentageValue2 = percentage2.val().trim();

    //         if (!isNaN(value2a) && !isNaN(value2b) && value2a <= value2b && (awdValue2 !== "" || percentageValue2 !== "")) {
    //             field3a.prop("disabled", false);
    //             field3b.prop("disabled", false);
    //             awd3.prop("disabled", false);
    //             percentage3.prop("disabled", false);
    //         } else {
    //             field3a.prop("disabled", true);
    //             field3b.prop("disabled", true);
    //             awd3.prop("disabled", true);
    //             percentage3.prop("disabled", true);
    //         }
    //     }

    //     field1a.on("input", checkGroup1);
    //     field1b.on("input", checkGroup1);
    //     awd1.on("input", checkGroup1);
    //     percentage1.on("input", checkGroup1);

    //     field2a.on("input", checkGroup2);
    //     field2b.on("input", checkGroup2);
    //     awd2.on("input", checkGroup2);
    //     percentage2.on("input", checkGroup2);
    // });

    $(document).ready(function () {
        const group1 = $("#group1");
        const group2 = $("#group2");
        const group3 = $("#group3");

        const field1a = $("#field1a");
        const field1b = $("#field1b");
        const field2a = $("#field2a");
        const field2b = $("#field2b");
        const field3a = $("#field3a");
        const field3b = $("#field3b");

        const awd1 = $("#awd1");
        const awd2 = $("#awd2");
        const awd3 = $("#awd3");

        const percentage1 = $("#percentage1");
        const percentage2 = $("#percentage2");
        const percentage3 = $("#percentage3");

        function checkFields() {
            const value1a = parseInt(field1a.val());
            const value1b = parseInt(field1b.val());
            const awdValue1 = awd1.val().trim();
            const percentageValue1 = percentage1.val().trim();

            const value2a = parseInt(field2a.val());
            const value2b = parseInt(field2b.val());
            const awdValue2 = awd2.val().trim();
            const percentageValue2 = percentage2.val().trim();

            const value3a = parseInt(field3a.val());
            const value3b = parseInt(field3b.val());
            const awdValue3 = awd3.val().trim();
            const percentageValue3 = percentage3.val().trim();

            // Habilita o deshabilita los campos según las condiciones
            if (!isNaN(value1a) && !isNaN(value1b) && value1a <= value1b && (awdValue1 !== "" || percentageValue1 !== "")) {
                field2a.prop("disabled", false);
                field2b.prop("disabled", false);
                awd2.prop("disabled", false);
                percentage2.prop("disabled", false);
            } else {
                field2a.prop("disabled", true);
                field2b.prop("disabled", true);
                awd2.prop("disabled", true);
                percentage2.prop("disabled", true);
                field3a.prop("disabled", true);
                field3b.prop("disabled", true);
                awd3.prop("disabled", true);
                percentage3.prop("disabled", true);
            }

            if (!isNaN(value2a) && !isNaN(value2b) && value2a <= value2b && (awdValue2 !== "" || percentageValue2 !== "")) {
                field3a.prop("disabled", false);
                field3b.prop("disabled", false);
                awd3.prop("disabled", false);
                percentage3.prop("disabled", false);
            } else {
                field3a.prop("disabled", true);
                field3b.prop("disabled", true);
                awd3.prop("disabled", true);
                percentage3.prop("disabled", true);
            }
        }

        // Ejecuta la función al cargar la página y cuando se cambian los valores
        checkFields();

        field1a.on("input", checkFields);
        field1b.on("input", checkFields);
        awd1.on("input", checkFields);
        percentage1.on("input", checkFields);

        field2a.on("input", checkFields);
        field2b.on("input", checkFields);
        awd2.on("input", checkFields);
        percentage2.on("input", checkFields);
    });
</script>

    

</body>
</html>