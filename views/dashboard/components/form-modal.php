<!-- Vertically centered scrollable modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                  <input type="hidden" name="id" id="formId">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter your first name" required>
                            <div class="invalid-feedback">Please enter your first name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter your last name" required>
                            <div class="invalid-feedback">Please enter your last name.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                        <div class="invalid-feedback">Please provide a valid email address.</div>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" pattern="[0-9]+" required>
                        <div class="invalid-feedback">Please enter a valid phone number (numbers only).</div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address <span class="text-danger fw-bold">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                        <div class="invalid-feedback">Please provide your address.</div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label for="city" class="form-label">City <span class="text-danger fw-bold">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                            <div class="invalid-feedback">Please enter your city.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                            <div class="invalid-feedback">Please enter your state.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="zip" class="form-label">ZIP</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" pattern="[0-9]+" required>
                            <div class="invalid-feedback">Please enter a valid ZIP code (numbers only).</div>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" placeholder="Country">
                        <div class="invalid-feedback">Please enter your country.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submit-button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    (function () {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();

$(document).ready(function () {
  // Show form for "Add New"
  $(document).on("click", "#addNewBtn", function () {
    $("#exampleModalLabel").text("Add New Record"); // Update modal title
    $("#submit-button").text("Add").data("action", "add"); // Set action to "add"
    $(".needs-validation")[0].reset(); // Clear form fields
    $(".needs-validation").removeClass("was-validated"); // Reset validation
    $("#exampleModal").modal("show"); // Show the modal
  });

  // Show form for "Edit"
  $(document).on("click", ".edit-btn", function () {
    const row = $(this).closest("tr");
    const rowData = {
      id: row.find(".id").text(), // Assuming the table row has a class "id" for the ID
      firstName: row.find(".first-name").text(), // Row data
      lastName: row.find(".last-name").text(),
      email: row.find(".email").text(),
      phone: row.find(".phone").text(),
      address: row.find(".address").text(),
      city: row.find(".city").text(),
      state: row.find(".state").text(),
      zip: row.find(".zip").text(),
      country: row.find(".country").text(),
    };

    $("#exampleModalLabel").text("Edit Record"); // Update modal title
    $("#submit-button").text("Update").data("action", "edit"); // Set action to "edit"
    $("#firstName").val(rowData.firstName); // Populate form fields
    $("#lastName").val(rowData.lastName);
    $("#email").val(rowData.email);
    $("#phone").val(rowData.phone);
    $("#address").val(rowData.address);
    $("#city").val(rowData.city);
    $("#state").val(rowData.state);
    $("#zip").val(rowData.zip);
    $("#country").val(rowData.country);
    $("#exampleModal").modal("show"); // Show the modal
  });

  // Handle form submission (Add or Edit)
  $(document).on("click", "#submit-button", function (event) {
    event.preventDefault(); // Prevent form's default behavior

    const form = $(".needs-validation")[0]; // Select the form
    if (!form.checkValidity()) {
      // Trigger validation feedback if form is invalid
      form.classList.add("was-validated");
    } else {
      // Determine action (add or edit)
      const action = $(this).data("action");
      const url =
        action === "add"
          ? "../../model/insert-contact.php"
          : "../../model/update-contact.php"; // Dynamic URL
      const formData = {
        id: action === "edit" ? $("#formId").val() : "", // Include ID only for edit
        firstName: $("#firstName").val(),
        lastName: $("#lastName").val(),
        email: $("#email").val(),
        phone: $("#phone").val(),
        address: $("#address").val(),
        city: $("#city").val(),
        state: $("#state").val(),
        zip: $("#zip").val(),
        country: $("#country").val(),
      };

      // AJAX request for Add or Edit
      $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function (response) {
          alert(response); // Show the server's response
          $("#exampleModal").modal("hide"); // Hide the modal
          $(".needs-validation")[0].reset(); // Clear form fields
          loadTableData(); // Refresh the table (assuming this function exists)
        },
        error: function (xhr, status, error) {
          alert("An error occurred: " + error);
          console.error("Error details:", status, error);
        },
      });
    }
  });
});

</script>