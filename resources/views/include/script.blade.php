  <!-- Vendor JS Files -->
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

  {{-- Toggle Password Hide/Unhide --}}
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            togglePassword.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                // toggle the eye / eye-slash icon
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });

            const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
            const passwordConfirm = document.querySelector('#password-confirm');

            togglePasswordConfirm.addEventListener('click', function (e) {
                // toggle the type attribute
                const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordConfirm.setAttribute('type', type);
                // toggle the eye / eye-slash icon
                this.querySelector('i').classList.toggle('bi-eye');
                this.querySelector('i').classList.toggle('bi-eye-slash');
            });
        });
    </script>