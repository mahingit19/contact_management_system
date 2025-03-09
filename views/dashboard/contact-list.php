<div class="container py-5 bg-secondary-subtle vh-100 text-center">
    <h1>Contact List</h1>
    <div class="d-flex justify-content-between py-2">
        <span class="fw-bold">Total <span id="total"></span></span>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="addNewBtn">
            <i class="bi bi-person-plus-fill"></i> Add New Contact
        </button>

    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="table-body"> </tbody>
    </table>
</div>

<script>
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
                            <td><span class="first-name">${item.first_name}</span> <span class="last-name">${item.last_name}</span></td>
                            <td class="email">${item.email}</td>
                            <td class="phone">${item.phone}</td>
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

        loadTableData(); // Load table data on page load

        // Use event delegation for delete buttons
        $(document).on("click", ".delete-btn", function() {
            const button = $(this); // Reference to the clicked button
            const id = button.data("id");
            if (confirm("Are you sure you want to delete this row?")) {
                $.ajax({
                    url: "../../model/delete-contact.php", // PHP script to handle the data
                    type: "POST",
                    data: {
                        id: id
                    },
                    success: function(response) {
                        alert("Data deleted successfully: " + response);
                        button.closest("tr").remove(); // Remove the row from the table
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            }
        });
    });
</script>

<?php
include("components/form-modal.php");
?>