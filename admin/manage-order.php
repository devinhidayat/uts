<?php include('partials/menu.php') ?>

        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Order</h1>

            <br /><br /> <br />

            <?php
                if(isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>
            <br><br>

            <table class="tbl-full">
                <tr>
                    <th>No.</th>
                    <th>Food</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Customer Name</th>
                    <th>Actions</th>
                </tr>

                <?php
                
                    $sql = "SELECT * FROM tbl_order ORDER BY id DESC";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    $no = 1;

                    if($count>0) {
                        while($row=mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $food = $row['food'];
                            $price = $row['price'];
                            $qty = $row['qty'];
                            $total = $row['total'];
                            $order_date = $row['order_date'];
                            $status = $row['status'];
                            $customer_name = $row['customer_name'];

                            ?>

                                <tr>
                                    <th><?php echo $no++; ?></th>
                                    <th><?php echo $food; ?></th>
                                    <th><?php echo $price; ?></th>
                                    <th><?php echo $qty; ?></th>
                                    <th><?php echo $total; ?></th>
                                    <th><?php echo $order_date; ?></th>

                                    <th>
                                        <?php
                                            if($status=="Ordered") {
                                                echo "<label>$status</label>";
                                            }
                                            else if($status=="On Delivery") {
                                                echo "<label style='color: orange;'>$status</label>";
                                            }
                                            else if($status=="Delivered") {
                                                echo "<label style='color: green;'>$status</label>";
                                            }
                                            else if($status=="Cancelled") {
                                                echo "<label style='color: red;'>$status</label>";
                                            }
                                        ?>
                                    </th>

                                    <th><?php echo $customer_name; ?></th>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order</a>
                                    </td>
                                </tr>

                            <?php
                        }
                    }
                    else {
                        echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                    }

                ?>

            </table>
                
            </div>
        </div>

<?php include('partials/footer.php') ?>
