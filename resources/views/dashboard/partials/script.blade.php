  <!-- Core -->
  <script src="{{ asset('dashboard/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/vanilla-calendar/vanilla-calendar.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs4/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('dashboard/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('dashboard/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('dashboard/assets/js/argon.js?v=1.2.0') }}"></script>
  <script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All Pages"]],
      "pageLength": 5,
      "language": {
        "paginate": {
          "previous": "<",
          "next": ">"
        }
      }
    });
  });
  </script>