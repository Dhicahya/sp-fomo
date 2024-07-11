  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  {{-- Box Icons JS Files --}}
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


  {{-- hapus data --}}
  <script>
      function deleteData(url) {
          if (confirm("Yakin?")) {
              window.location.href = url;
          }
      }
  </script>

    {{-- Toggle Password Hide/Unhide --}}
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const togglePassword = document.querySelector('#togglePassword');
          const password = document.querySelector('#password');

          togglePassword.addEventListener('click', function(e) {
              // toggle the type attribute
              const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
              password.setAttribute('type', type);
              // toggle the eye / eye-slash icon
              this.querySelector('i').classList.toggle('bi-eye-slash');
              this.querySelector('i').classList.toggle('bi-eye');
          });

          const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
          const passwordConfirm = document.querySelector('#password-confirm');

          togglePasswordConfirm.addEventListener('click', function(e) {
              // toggle the type attribute
              const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
              passwordConfirm.setAttribute('type', type);
              // toggle the eye / eye-slash icon
              this.querySelector('i').classList.toggle('bi-eye');
              this.querySelector('i').classList.toggle('bi-eye-slash');
          });
      });
  </script>