<?php
session_start(); // Start the session

$isLoggedIn = isset($_SESSION['username']);

$username = $isLoggedIn ? $_SESSION['username'] : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <title>Appointment Booking System</title>
    <style>
        .error {
            border: 2px solid red;
        }
    </style>
</head>
<body>

<h1>APPOINTMENT BOOKING SYSTEM</h1>

<div class="fixed-buttons">
    <?php if ($isLoggedIn) : ?>
        <span>Welcome, <?php echo $username; ?>!</span>
        <button type="button">Already Logged In</button>
    <?php else : ?>
        <button type="button" onclick="location.href='<?php echo $isLoggedIn ? '#' : 'signup.php'; ?>';"><?php echo $isLoggedIn ? 'Already Logged In' : 'Sign Up'; ?></button>
        <button type="button" onclick="location.href='<?php echo $isLoggedIn ? '#' : 'login.php'; ?>';"><?php echo $isLoggedIn ? 'Already Logged In' : 'Log In'; ?></button>
    <?php endif; ?>
    <button type="button" onclick="showForm()">Create New Appointment</button>
</div>

<table>
    <thead>
    <tr>
        <th>ID Number</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Birthdate</th>
        <th>Full Address</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Civil Status</th>
        <th>Gender</th>
        <th>Date of Appointment</th>
        <th>Appointment</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php include 'connection.php'; ?>
    </tbody>
</table>

<form action="process_form.php" method="post" id="recordForm" onsubmit="return confirm('Are you sure you want to save this record?');">

    <button type="button" class="close-button" onclick="closeForm()">X</button>

    <input type="hidden" name="id" id="id">
    <label for="idnumber">ID Number:</label>
    <input type="text" name="idnumber" id="idnumber" required>

    <label for="firstname">First Name:</label>
    <input type="text" name="firstname" id="firstname" required>

    <label for="middlename">Middle Name:</label>
    <input type="text" name="middlename" id="middlename">

    <label for="lastname">Last Name:</label>
    <input type="text" name="lastname" id="lastname" required>

    <label for="birthdate">Birthdate:</label>
    <input type="date" name="birthdate" id="birthdate" required>

    <label for="fulladdress">Full Address:</label>
    <textarea name="fulladdress" id="fulladdress" rows="3" required></textarea>

    <label for="phonenumber">Phone Number:</label>
    <input type="tel" name="phonenumber" id="phonenumber" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="civilstatus">Civil Status:</label>
    <select name="civilstatus" id="civilstatus" required>
        <option value="Single">Single</option>
        <option value="Married">Married</option>
        <option value="Divorced">Divorced</option>
        <option value="Widowed">Widowed</option>
    </select>

    <label for="gender">Gender:</label>
    <select name="gender" id="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Others">Others</option>
    </select>

    <label for="appointment_date">Date of Appointment:</label>
    <input type="date" name="appointment_date" id="appointment_date" required>

    <label for="appointment">Appointment:</label>
    <textarea name="appointment" id="appointment" rows="3" required></textarea>

    <div>
        <button type="submit" name="save" onclick="validateForm()">Save</button>
        <button type="button" onclick="clearForm()">Clear</button>
    </div>
</form>

<script>
    function showForm() {

        document.getElementById('recordForm').style.display = 'block';
    }

    function closeForm() {

        document.getElementById('recordForm').style.display = 'none';
    }

    function validateForm() {
        if (!validateBirthdate() || !validateNames()) {
            return false;
        }

        const idNumberInput = document.getElementById('idnumber');
        const existingIdNumbers = Array.from(document.querySelectorAll('tbody td:nth-child(1)')).map(td => td.innerText);

        if (existingIdNumbers.includes(idNumberInput.value)) {
            alert('ID Number already exists. Please choose another ID Number or Change it After Saving.');
            return false;
        }

        return true;
    }

    function validateNames() {
        const firstNameInput = document.getElementById('firstname');
        const middleNameInput = document.getElementById('middlename');
        const lastNameInput = document.getElementById('lastname');

        const hasNumberOrSpecialChar = /[^a-zA-Z]/.test(firstNameInput.value) || /[^a-zA-Z]/.test(middleNameInput.value) || /[^a-zA-Z]/.test(lastNameInput.value);

        if (hasNumberOrSpecialChar) {
            alert('Names cannot contain numbers or special characters. Please enter or change it to a valid name.');
            firstNameInput.classList.add('error');
            middleNameInput.classList.add('error');
            lastNameInput.classList.add('error');
            return false;
        }

        return true;
    }

    function validateBirthdate() {
        const birthdateInput = document.getElementById('birthdate');
        const birthdateValue = new Date(birthdateInput.value);
        const maxDate = new Date();
        maxDate.setFullYear(maxDate.getFullYear() - 150);

return true;
}

function editRecord(id) {
fetch(`update_record.php?id=${id}`)
    .then(response => response.json())
    .then(data => {
        if (!data.error) {

            document.getElementById('id').value = id;
            document.getElementById('idnumber').value = data.idnumber;
            document.getElementById('firstname').value = data.firstname;
            document.getElementById('middlename').value = data.middlename;
            document.getElementById('lastname').value = data.lastname;
            document.getElementById('birthdate').value = data.birthdate;
            document.getElementById('fulladdress').value = data.fulladdress;
            document.getElementById('phonenumber').value = data.phonenumber;
            document.getElementById('email').value = data.email;
            document.getElementById('civilstatus').value = data.civilstatus;
            document.getElementById('gender').value = data.gender;


            showForm();
        } else {
            alert(data.error);
        }
    })
    .catch(error => console.error('Error fetching record:', error));
}

function deleteRecord(id) {
if (confirm("Are you sure you want to delete this record?")) {
    fetch(`delete_record.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (!data.error) {
                alert(data.success);

                fetchAndDisplayRecords(); 
            } else {
                alert(data.error);
            }
        })
        .catch(error => console.error('Error deleting record:', error));
}
}

function fetchAndDisplayRecords() {
$.ajax({
url: 'display_records.php',
type: 'GET',
dataType: 'json',
success: function (data) {
    const tbody = $('tbody');
    tbody.empty();

    if (Array.isArray(data) && data.length > 0) {
        data.forEach(row => {
            const tr = $('<tr>');
            tr.html(`
                <td>${row.idnumber}</td>
                <td>${row.firstname}</td>
                <td>${row.middlename}</td>
                <td>${row.lastname}</td>
                <td>${row.birthdate}</td>
                <td>${row.fulladdress}</td>
                <td>${row.phonenumber}</td>
                <td>${row.email}</td>
                <td>${row.civilstatus}</td>
                <td>${row.gender}</td>
                <td>${row.appointment_date}</td>
                <td>${row.appointment}</td>
                <td>
                    <button onclick='editRecord(${row.id})'>Update</button>
                    <button onclick='deleteRecord(${row.id})'>Delete</button>
                </td>
            `);
            tbody.append(tr);
        });
    } else {
        const tr = $('<tr>');
        tr.html(`<td colspan="13">No records found</td>`);
        tbody.append(tr);
    }
},
error: function (error) {
    console.error('Error fetching records:', error);
}
});
}

document.addEventListener("DOMContentLoaded", function () {
fetchAndDisplayRecords(); 

});

</script>
</body>
</html>
