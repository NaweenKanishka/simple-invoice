<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Invoice</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="mainContainer">
        <h1>Invoice</h1>
        <form action="index.php" method="post">
            <label for="customername">Customer Name</label><br>
            <input type="text" id="customername" name="customername"><br><br>

            <label for="product">Product</label><br>
            <input type="text" id="product" name="product"><br><br>

            <label for="quantity">Quantity</label><br>
            <input type="number" id="quantity" name="quantity"><br><br>

            <label for="unitprice">Unit Price</label><br>
            <input type="number" id="unitprice" name="unitprice" step="0.01"><br><br>

            <button type="submit" name="total">Calculate Total</button><br><br>

            <label for="cash">Cash</label><br>
            <input type="number" id="cash" name="cash" step="0.01"><br><br>
            <button type="submit" name="balance">Balance</button><br><br>
        </form>
        <!--php code start-->
        <?php
        echo "This is a test" . "<br>";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            //collect basic inputs
            $customername = htmlspecialchars($_POST['customername']);
            $productname = htmlspecialchars($_POST['product']);
            $quantity = htmlspecialchars($_POST['quantity']);
            $unitprice = htmlspecialchars($_POST['unitprice']);

            //total price calculation
            $newquantity = (int)$quantity;
            $newunitprice = (float)$unitprice;
            $totalprice = $newquantity * $newunitprice;
            
            if(isset($_POST['total'])){
                echo "This is a customer name " . $customername . "<br>";
                echo "This is a product name " . $productname . "<br>";
                echo "The order quantity is " . $quantity . "<br>";
                echo "The order unit price is " . $unitprice . "<br>";
                echo "Your total price is " . $totalprice . "<br>";
            }

            if(isset($_POST['balance'])){
                $cash = htmlspecialchars($_POST['cash']);

                //balance calculate
                $newbalance = (float)$cash;
                $newtotalprice = (float)$totalprice;
                $balance = $newbalance - $newtotalprice;

                echo "Your balance is " . $balance . "<br>";
            }
        }
        ?>
        <!--php code end-->

    </section>
</body>
</html>