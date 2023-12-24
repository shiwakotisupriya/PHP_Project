
<ul class='user'>
    
<h2>Profile Information</h2>
    <li class='user_info'><strong>Name:</strong> <?php echo $pass['name']; ?></li>
    <li class='user_info'><strong>Email:</strong> <?php echo $pass['email']; ?></li>
    <li class='user_info'><strong>Date of Birth:</strong> <?php echo $pass['birth_date']; ?></li>
    <li class='user_info'><strong>Phone:</strong> <?php echo $pass['phone_num']; ?></li>
</ul>
<div id="actions">
        <button name="edit" class="btn">Edit Account</button>
    </div>

<form method="post" action="">
<input type="submit" name="delete" class="btn" value="Delete">
</form>

<div id="editModal" class="modal">
    <div class="modal-content">
        <h2>Edit Account</h2>
        <form id="editForm" method="post" action="info.php">
            <label for="editName">Name:</label>
            <input type="text" id="editName" name="editName" value="<?php echo $pass['name']; ?>" required>

            <label for="editEmail">Email:</label>
            <input type="email" id="editEmail" name="editEmail" value="<?php echo $pass['email']; ?>" required>

            <label for="editDob">Date of Birth:</label>
            <input type="date" id="editDob" name="editDob" value="<?php echo $pass['birth_date']; ?>" required>

            <label for="editPhone">Phone:</label>
            <input type="text" id="editPhone" name="editPhone" value="<?php echo $pass['phone_num']; ?>" required>

            <input type="submit" name="button" value="Save">
        </form>
    </div>
</div>


<div id="deleteModal" class="modal">
    <div class="modal-content">
        <label for="password">Enter Password to Delete Account:</label>
        <input type="password" id="password" name="password">
        <button type="button" onclick="confirmDelete()">Confirm Delete</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        $("#actions button:eq(0)").on("click", function () {
            $("#editModal").css("display", "block");
        });
    });

</script>

