<?php
session_start();
if (isset($_SESSION["email"]) && $_SESSION["password"]) {
    header("Location: " . $route['page']['dashboard']);
    exit;
}
?>

<div class="container">
    <div class="p-3 vh-100 d-flex flex-column justify-content-center align-items-center">
        <h1 class="mb-5">Contact Management System</h1>
        <div class="card shadow-sm" style="width: 30rem;">
            <div class="card-body">
                <h2 class="card-title text-center">Login</h2>
                <form id="myForm" class="row g-3 needs-validation" novalidate>
                    <?php
                    if (isset($_GET['status']) && $_GET['status'] == 'must') {
                        echo '<div class="col-12"><p class="text-warning">You must login first</p></div>';
                    }      
                    ?>
                    <div class="col-12"><p id="errorMessage" class="text-danger"></p></div>
                    <div class="col-12">
                        <label for="validationCustom01" class="form-label">Email</label>
                        <input type="email" class="form-control" id="validationCustom01" name="email" required>
                    </div>
                    <div class="col-12">
                        <label for="validationCustom02" class="form-label">Password</label>
                        <input type="password" class="form-control" id="validationCustom02" name="password" required>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12 text-center">
                        <span class="text-secondary">Or,</span> <a href="">Create New Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    // Assuming you have jQuery loaded in your project
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            // Gather form data
            var formData = $(this).serialize(); // Serializes the form's elements

            $.ajax({
                url: '<?= $route['page']['auth'] ?>', // Replace with your server endpoint
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Login successful - Redirect to another page
                        window.location.href = '<?= $route['page']['dashboard'] ?>'; // Replace with your target page
                    } else if (response.status === 'error') {
                        // Display error message
                        $('#errorMessage').text(response.message).show();
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    alert('An error occurred: ' + error);
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>