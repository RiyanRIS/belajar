<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="container mt-5">
  <h3>Validasi Password</h3>
  <form>
    <div class="form-group mt-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password">
    </div>
    <div class="form-group mt-3">
      <label for="confirm-password">Konfirmasi Password</label>
      <input type="password" class="form-control" id="confirm-password">
    </div>
    <div id="password-strength-container" class=" mt-3">
      <div class="progress">
        <div id="password-strength" class="progress-bar" role="progressbar" style="width: 0%"></div>
      </div>
      <div id="password-labels" class="text-muted small">
        <span class="badge bg-danger" id="digit-label">Digit</span> |
        <span class="badge bg-danger" id="uppercase-label">Uppercase</span> |
        <span class="badge bg-danger" id="lowercase-label">Lowercase</span> |
        <span class="badge bg-danger" id="length-label">&gt;8</span>
      </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Submit</button>
  </form>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // var password = $("#password").val();
    var passwordStrengthh = 0;

    // Fungsi untuk memeriksa kekuatan password
    function checkPasswordStrength() {
      var password = $("#password").val();
      var passwordStrength = 0;

      // Pemeriksaan kekuatan password
      if (password.match(/[0-9]+/)) {
        passwordStrength += 25;
        $("#digit-label").addClass("bg-success").removeClass("bg-danger");
      } else {
        $("#digit-label").addClass("bg-danger").removeClass("bg-success");
      }

      if (password.match(/[A-Z]+/)) {
        passwordStrength += 25;
        $("#uppercase-label").addClass("bg-success").removeClass("bg-danger");
      } else {
        $("#uppercase-label").addClass("bg-danger").removeClass("bg-success");
      }

      if (password.match(/[a-z]+/)) {
        passwordStrength += 25;
        $("#lowercase-label").addClass("bg-success").removeClass("bg-danger");
      } else {
        $("#lowercase-label").addClass("bg-danger").removeClass("bg-success");
      }

      if (password.length >= 8) {
        passwordStrength += 25;
        $("#length-label").addClass("bg-success").removeClass("bg-danger");
      } else {
        $("#length-label").addClass("bg-danger").removeClass("bg-success");
      }

      passwordStrengthh = passwordStrength

      if (passwordStrength == 100) {
        $("#password").addClass("is-valid").removeClass("is-invalid");
        $("#password-strength").addClass("bg-success").removeClass("bg-danger");
      } else {
        $("#password").addClass("is-invalid").removeClass("is-valid");
        $("#password-strength").removeClass("bg-success");
      }

      // Update tampilan progres bar
      $("#password-strength").css("width", passwordStrength + "%");
      $("#password-strength").html(passwordStrength + "%");
    }

    // Pemanggilan fungsi ketika password berubah
    $("#password").on("input", checkPasswordStrength);

    // Pemeriksaan konfirmasi password
    $("#confirm-password").on("input", function() {
      var password = $("#password").val();
      var confirmPassword = $(this).val();

      if (password === confirmPassword) {
        $(this).removeClass("is-invalid").addClass("is-valid");
      } else {
        $(this).removeClass("is-valid").addClass("is-invalid");
      }
    });

    // Validasi saat mengirim formulir
    $("form").submit(function(event) {
      var password = $("#password").val();
      var confirmPassword = $("#confirm-password").val();

      // Pemeriksaan terakhir sebelum mengirim formulir
      if (password !== confirmPassword) {
        event.preventDefault(); // Mencegah pengiriman formulir jika konfirmasi password tidak sesuai
        $("#confirm-password").addClass("is-invalid");
        return
      }

      if (passwordStrengthh != 100) {
        event.preventDefault(); // Mencegah pengiriman formulir jika konfirmasi password tidak sesuai
        return
      }

      alert("done")
    });
  });
</script>