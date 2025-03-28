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
          <input type="hidden" id="formId" name="id">
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
            <label for="phone" class="form-label">Phone (+880) <span class="text-danger fw-bold">*</span></label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number after (+880)" pattern="[0-9]+" required>
            <div class="invalid-feedback">Please enter exactly 10 digits after +880 (e.g., "XXXXXXXXXX").</div>
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
              <label for="zip" class="form-label">ZIP <span class="text-danger fw-bold">*</span></label>
              <input type="text" class="form-control" id="zip" name="zip" placeholder="ZIP" pattern="[0-9]+" required>
              <div class="invalid-feedback">Please enter a valid ZIP code (numbers only).</div>
            </div>
          </div>
          <div class="mb-3 mt-3">
            <label for="country" class="form-label">Country</label>
            <input type="text" class="form-control" id="country" name="country" placeholder="Country">
            <div class="invalid-feedback">Please enter your country.</div>
          </div>
          <div class="mb-3 mt-3">
            <div class="fullscreen-drop" id="fullscreenDrop">
              <h5 class="text-dark">Drop your image here!</h5>
            </div>
            <div class="mb-3">
              <label for="imageInput" class="form-label">Upload Your Image</label>
              <div class="upload-area" id="uploadArea">
                Drag and drop an image here or click to upload
                <input type="file" class="form-control d-none" id="imageInput" accept="image/*">
              </div>
            </div>
            <div class="image-preview" id="imagePreview" style="display: none;">
              <button type="button" class="btn-close remove-button" id="removeButton" aria-label="Remove"></button>
              <img src="" id="previewImage" class="img-fluid" alt="Preview">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary update-btn" id="submit-button">Submit</button>
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
  const maxLength = 10; // Desired length for the phone number
  const phoneInput = document.querySelector('#phone'); // Ensure this matches your phone input field ID
  const updateButtons = document.querySelectorAll('.update-btn'); // Select all update buttons with the class

  Array.from(forms).forEach(form => {
    // Validate on input (real-time feedback)
    phoneInput.addEventListener('input', function () {
      validatePhone(phoneInput);
    });

    // Validate on form submission
    form.addEventListener('submit', event => {
      validatePhone(phoneInput); // Validate phone number
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    });

    // Validate when any update button is clicked
    updateButtons.forEach(button => {
      button.addEventListener('click', function () {
        validatePhone(phoneInput); // Validate phone number
        form.classList.add('was-validated'); // Add Bootstrap validation styling

        // Optional: Prevent the update action if validation fails
        if (!form.checkValidity()) {
          event.preventDefault();
          console.log('Form is invalid and cannot be updated!');
        } else {
          console.log('Form is valid, proceeding with update...');
        }
      });
    });

    // Validate phone input on load if prefilled
    if (phoneInput.value.trim() !== '') {
      validatePhone(phoneInput);
    }
  });

  // Function to validate the phone number
  function validatePhone(phoneInput) {
    const phoneValue = phoneInput.value.trim(); // Clean up spaces
    const phoneRegex = /^\d{10}$/; // Matches exactly 10 digits

    if (!phoneRegex.test(phoneValue)) {
      phoneInput.setCustomValidity('Invalid'); // Mark as invalid
      phoneInput.classList.add('is-invalid');
      phoneInput.classList.remove('is-valid');
      phoneInput.nextElementSibling.textContent =
        `Please enter exactly ${maxLength} digits (e.g., "XXXXXXXXXX").`;
    } else {
      phoneInput.setCustomValidity(''); // Mark as valid
      phoneInput.classList.remove('is-invalid');
      phoneInput.classList.add('is-valid');
    }
  }
})();





  $(document).ready(function() {
    // Load table data using AJAX
    function loadTableData() {
      $.ajax({
        url: "../../model/select-contacts.php", // Path to your PHP script
        method: "GET",
        dataType: "json",
        success: function(data) {
          let rows = "";
          data.forEach(item => {
            rows += `<tr>
                            <td class="id">${item.id}</td>
                            <td class="image-path" data-src="../../model/${item.photo}"><img src="../../model/${item.photo}" width="50px"></td>
                            <td><span class="first-name">${item.first_name}</span> <span class="last-name">${item.last_name}</span></td>
                            <td class="email">${item.email}</td>
                            <td>+880<span class="phone">${item.phone}</span></td>
                            <td><span class="address">${item.address}</span>, <span class="city">${item.city}</span>, <span class="state">${item.state}</span>, <span class="zip">${item.zip}</span>, <span class="country">${item.country}</span></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-primary edit-btn"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-danger delete-btn" data-id="${item.id}"><i class="bi bi-trash3-fill"></i></button>
                                </div>
                            </td>
                         </tr>`;
          });
          $("#table-body").html(rows);
          $("#total").html($(data).length);


        },
        error: function(xhr, status, error) {
          console.error("An error occurred:", error);
        }
      });
    }
    // Show form for "Add New"
    $(document).on("click", "#addNewBtn", function() {
      $("#exampleModalLabel").text("Add New Record"); // Update modal title
      $("#submit-button").text("Add").data("action", "add"); // Set action to "add"
      $(".needs-validation")[0].reset(); // Clear form fields
      $(".needs-validation").removeClass("was-validated"); // Reset validation
      $("#exampleModal").modal("show"); // Show the modal
    });

    // Show form for "Edit"
    $(document).on("click", ".edit-btn", function() {
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
        imagePath: row.find(".image-path").data("src"), // Assuming the image path is stored in a data attribute
      };


      $("#exampleModalLabel").text("Edit Record"); // Update modal title
      $("#submit-button").text("Update").data("action", "edit"); // Set action to "edit"
      $("#formId").val(rowData.id); // Set the ID value
      $("#firstName").val(rowData.firstName); // Populate form fields
      $("#lastName").val(rowData.lastName);
      $("#email").val(rowData.email);
      $("#phone").val(rowData.phone);
      $("#address").val(rowData.address);
      $("#city").val(rowData.city);
      $("#state").val(rowData.state);
      $("#zip").val(rowData.zip);
      $("#country").val(rowData.country);

      // Handle the image preview
      if (rowData.imagePath) {
        $("#previewImage").attr("src", rowData.imagePath).show(); // Show existing image
        $("#removeButton").show(); // Show the remove button
      } else {
        $("#previewImage").hide();
        $("#removeButton").hide();
      }

      $("#exampleModal").modal("show"); // Show the modal
    });
    // Remove image button functionality
    $(document).on("click", "#removeButton", function() {
      $("#previewImage").hide().attr("src", ""); // Clear the preview image
      $("#imageInput").val(""); // Clear the input field
    });


    // Handle form submission (Add or Edit)
    $(document).on("click", "#submit-button", function(event) {
      event.preventDefault(); // Prevent form's default behavior

      const form = $(".needs-validation")[0]; // Select the form
      if (!form.checkValidity()) {
        // Trigger validation feedback if form is invalid
        form.classList.add("was-validated");
      } else {
        // Determine action (add or edit)
        const action = $(this).data("action");
        const url =
          action === "add" ?
          "../../model/insert-contact.php" :
          "../../model/update-contact.php"; // Dynamic URL
        // Set or clear hidden input field value
        if (action === "edit") {
          $("#formId").val($("#formId").val()); // Ensure it's set
        } else {
          $("#formId").val("");
        }
        const formData = new FormData();

        // Add standard fields to the FormData object
        formData.append('id', $("#formId").val()); // Include ID only for edit
        formData.append('firstName', $("#firstName").val());
        formData.append('lastName', $("#lastName").val());
        formData.append('email', $("#email").val());
        formData.append('phone', $("#phone").val());
        formData.append('address', $("#address").val());
        formData.append('city', $("#city").val());
        formData.append('state', $("#state").val());
        formData.append('zip', $("#zip").val());
        formData.append('country', $("#country").val());

        // Add the file to FormData object
        const file = $("#imageInput")[0].files[0]; // Get the first file from the input
        if (file) {
          formData.append('fileToUpload', file); // Append the file to the FormData
        }

        // AJAX request for Add or Edit
        $.ajax({
          url: url,
          type: "POST",
          data: formData,
          processData: false, // Prevent jQuery from automatically processing data
          contentType: false, // Let the browser set the correct content type
          success: function(response) {
            alert(response); // Show the server's response
            $("#exampleModal").modal("hide"); // Hide the modal
            $(".needs-validation")[0].reset(); // Clear form fields
            loadTableData(); // Refresh the table (assuming this function exists)
          },
          error: function(xhr, status, error) {
            alert("An error occurred: " + error);
            console.error("Error details:", status, error);
          },
        });
      }
    });
  });
</script>
<script>
  const uploadArea = document.getElementById('uploadArea');
  const imageInput = document.getElementById('imageInput');
  const imagePreview = document.getElementById('imagePreview');
  const previewImage = document.getElementById('previewImage');
  const removeButton = document.getElementById('removeButton');
  const fullscreenDrop = document.getElementById('fullscreenDrop');

  // Handle click on upload area
  uploadArea.addEventListener('click', () => imageInput.click());

  // Handle fullscreen drag and drop
  window.addEventListener('dragover', (event) => {
    event.preventDefault();
    fullscreenDrop.classList.add('active');
  });

  window.addEventListener('dragleave', (event) => {
    if (!event.relatedTarget || event.relatedTarget === document.body) {
      fullscreenDrop.classList.remove('active');
    }
  });

  window.addEventListener('drop', (event) => {
    event.preventDefault();
    fullscreenDrop.classList.remove('active');
    const file = event.dataTransfer.files[0];
    if (file) {
      handleFile(file);
      updateFileInput(file);
    }
  });

  // Handle file input change
  imageInput.addEventListener('change', () => {
    const file = imageInput.files[0];
    handleFile(file);
  });

  // Function to display preview
  function handleFile(file) {
    if (file && file.type.startsWith('image/')) {
      const reader = new FileReader();
      reader.onload = () => {
        previewImage.src = reader.result;
        imagePreview.style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  }

  // Function to update the file input field programmatically
  function updateFileInput(file) {
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(file);
    imageInput.files = dataTransfer.files;
  }

  // Handle remove button click
  removeButton.addEventListener('click', () => {
    previewImage.src = '';
    imagePreview.style.display = 'none';
    imageInput.value = ''; // Clear the file input
  });
</script>