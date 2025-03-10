<div class="container py-5 bg-secondary-subtle vh-100">
    <h1 class="text-center">Welcome to dashboard <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExM2dmZm4yYnl5ZG5nangxaHR2Z3l0b25tNDQzNGs3Mm15M3Iwa3c3biZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/3oKIPEqDGUULpEU0aQ/giphy.gif" alt="" width="80"></h1>
    <div class="d-flex justify-content-center">
        <a href="?page=list" class="text-decoration-none">
            <div class="card d-inline-block mt-5 bg-gradient text-bg-primary">
                <div class="card-body">
                    <div class="d-flex gap-2">
                        <div class="align-self-center">
                            <h1><i class="bi bi-person-lines-fill"></i></h1>
                        </div>
                        <div class="align-self-center">
                            <h2>Total Contacts</h2>
                            <h2 class="text-center"><span id="total"></span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<script>
    function loadTableData() {
        $.ajax({
            url: "../../model/select-contacts.php", // Path to your PHP script
            method: "GET",
            dataType: "json",
            success: function(data) {
                $("#total").html($(data).length);
            },
            error: function(xhr, status, error) {
                console.error("An error occurred:", error);
            }
        });
    }
    loadTableData();
</script>