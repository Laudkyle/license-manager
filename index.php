
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Product Licenses</title>
    <script src="script.js"></script>
    
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="licenses.php">License</a></li>
        </ul>
    </nav>
    <h1>License Details</h1>
    
    <form action="#" method="post" onsubmit="return validateForm();">
        <label for="compnay_name">Name Of Company</label>
        <input type="text" id="company_name" name="company_name" placeholder="Company name" required><br>

        <label for="client_name">Name Of Client</label>
        <input type="text" id="client_name" name="client_name" placeholder="Name of client" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="example@gmail.com" required><br>

        <label for="phone">Phone Number</label>
        <input type="text" id="phone" name="phone" placeholder="0234567891" required><br>

        <label for="effective_date">Date Effective:</label>
        <input type="date" id="effective_date" name="effective_date" required><br>

        <label for="expiry_date">Expiry Date:</label>
        <input type="date" id="expiry_date" name="expiry_date" required><br>

        <label for="insurance">Type Of Insurance</label>
        <input type="text" id="insurance" name="insurance" placeholder="Type of Insurance" required><br>

        <label for="tenor">Tenor Of Loan Facility</label>
        <input type="text" id="tenor" name="tenor" placeholder="Tenor of loan facility" required><br>

        <label for="amount">Loan Amount</label>
        <input type="text" id="amount" name="amount" placeholder="0.000" required><br>

        <label for="security">Type Of Security</label>
        <input type="text" id="security" name="security" placeholder="Type of security" required><br>

        <input type="submit" value="Submit">
        <?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $companyName = $_POST['company_name'];
    $clientName = $_POST['client_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $effectiveDate = $_POST['effective_date'];
    $expiryDate = $_POST['expiry_date'];
    $insurance = $_POST['insurance'];
    $tenor = $_POST['tenor'];
    $amount =$_POST['amount'];
    $security = $_POST['security'];

    // SQL query to insert data into the "license_entries" table
    $sql = "INSERT INTO license_entries (company_name, client_name, email, phone, effective_date, expiry_date, insurance, tenor,amount,security)
            VALUES ('$companyName', '$clientName', '$email', '$phone','$effectiveDate', '$expiryDate', '$insurance', '$tenor','$amount','$security')";

    if ($con->query($sql)) {
        echo "<p style='text-align: center; color: green;'>Form Submitted Successfully!</p>";
        echo "<meta http-equiv='refresh' content='5;url=index.php'>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
?>

    </form>
<script>
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("expiry_date").setAttribute("min", today);
</script>
    
</body>
</html>

