<!-- Jquery needed -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

<!-- Function used to shrink nav bar removing paddings and adding black background -->
    <script>
        $(window).scroll(function() {
            if ($(document).scrollTop() > 50) {
                $('.nav').addClass('affix');
                console.log("OK");
            } else {
                $('.nav').removeClass('affix');
            }
        });

        // Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


    </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
	<script src="{{ asset('bootstrap-4.3.1-dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-select-country.min.js') }}"></script>
  <script>
    $('.countrypicker').countrypicker();
  </script>
  <script type="text/javascript" src="{{mix('/js/app.js')}}"></script>
  <script src="{{ asset('js/autosize.min.js') }}"></script>
  <script src="{{ asset('js/resume.js') }}"></script>  
