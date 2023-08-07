<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["product_name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];

    //API credentials
    $clientId = "YOUR_WALMART_CLIENT_ID";
    $clientSecret = "YOUR_WALMART_CLIENT_SECRET";

    //  API integration
    $apiEndpoint = "https://marketplace.walmartapis.com/v3/items";
    $postData = [
        "name" => $productName,
        "price" => $price,
        "quantity" => $quantity,
        "description" => $description,
    ];

    //cURL request
    $ch = curl_init($apiEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "Authorization: Basic " . base64_encode("$clientId:$clientSecret"),
    ]);

    // Execute cURL request && get response
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close cURL session
    curl_close($ch);

    // check response ach fih
    if ($httpCode == 201) {
        $result = "Product listing for '$productName' successfully submitted to Walmart.";
    } else {
        $result = "Failed to submit product listing. Error code: $httpCode";
    }
} else {
    $result = "Invalid request.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Submission Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto my-4">
        <h1 class="text-2xl font-bold mb-4">Product Submission Result</h1>
        <p><?php echo $result; ?></p>
        <a href="index.php" class="btn btn-primary">Back to Form</a>
    </div>
</body>
</html>
