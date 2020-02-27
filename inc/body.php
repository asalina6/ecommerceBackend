<?php session_start();
       include '../config/db.php?';?>
<body>
    <div class="modal modal-error">
        <div class="modal-content modal-content-error">
            Please work on a Desktop.
        </div>
    </div>
    <div class="modal modal-order">
        <div class="modal-content modal-content-order">
            <span class="modal-content__cancel">&times;</span>
            <div class="modal-content__modal-error"></div>
            <div class="modal-content__modal-success"></div>
            <form action="/" method="POST">
                <div class="form-validation">
                    <p>Required fields are followed by <strong><abbr title="required"><strong><abbr title="required">*</abbr></strong></abbr>
                        </strong>.</p>
                    <h2>Adding an Order</h2>
                    <section>
                        <div><label id="customer" for="customerInput">Customer <span class="required"><strong><abbr title="required">*</abbr></strong></span></label>
                            <input id="customerInput" type="text" required>
                            <div class="input-invalid customerInput-invalid"></div>
                        </div>
                        <div><label id="fulfillment" for="fulfillmentInput">Fulfillment<span class="required"><strong><abbr title="required">*</abbr></strong></span></label>
                            <select id="fulfillmentInput" name="fulfillment">
                        <option value = "unfulfilled">Unfulfilled</option>
                        <option value = "pending Receipt">Pending Receipt</option>
                        <option value = "fulfilled">Fulfilled</option> 
                    </select>
                        </div>
                        <div>
                            <label id="total" for="totalInput">Total<span class="required"><strong><abbr title="required">*</abbr></strong></span></label>
                            <input id="totalInput" type="number" required>
                            <div class="input-invalid totalInput-invalid"></div>
                        </div>
                        <div>
                            <label id="profit" for="profitInput">Profit<span class="required"><strong><abbr title="required">*</abbr></strong></span></label>
                            <input id="profitInput" type="number" required>
                            <div class="input-invalid  profitInput-invalid"></div>
                        </div>
                        <div>
                            <label id="status" for="statusInput">Status<span class="required"><strong><abbr title="required">*</abbr></strong></span></label>
                            <select id="statusInput" name="status">
                        <option value = "authorized">Authorized</option>
                        <option value = "paid">Paid</option>
                    </select>
                        </div>
                </div>
                <section>
                    <button type="submit" class="submit-btn">Submit</button>
                </section>
                </section>
            </form>
        </div>
    </div>

    <div class="dashboard-container">
        <header>
            <div class="header-div" id="logo-container">
                <a href="#"> <img src="img/ecommerce-logo.png" alt="ecommerce-logo"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="#">dashboards</a></li>
                    <li><a href="#" class="active-link">orders</a></li>
                    <li><a href="#">customers</a></li>
                    <li><a href="#">inventory</a></li>
                    <li><a href="#">settings</a></li>
                </ul>

            </nav>

            <div class="header-div" id="profile-container">
                <div class="bell-container" data-tool-tip="Notifications">
                    <i class="fas fa-bell"></i>
                </div>
                <div class="profile">
                    <?php 
                        $username = $_SESSION['username'];
                        $image_query = "SELECT * FROM profile_images WHERE username = '{$username}'";
                        $result = mysqli_query($conn,$image_query);
                        if(mysqli_num_rows($result)>0){
                            $row = mysqli_fetch_assoc($result);
                            $status = $row['status'];
                            var_dump();
                            clearstatcache();
                            if($status == 0){
                                echo "<img src='./uploads/profiledefault.png' alt='user-logo'>";
                            }else{
                                if(file_exists("./uploads/profile${username}.png")){
                                    echo "<img src='/uploads/profile${username}.png?'" . mt_rand() . "' alt='user-logo'>";
                                }else if(file_exists("./uploads/profile${username}.jpg")){
                                    echo "<img src='/uploads/profile${username}.jpg?'" . mt_rand() . "' alt='user-logo'>";
                                }else if(file_exists("./uploads/profile${username}.jpeg")){
                                    echo "<img src='/uploads/profile${username}.jpeg?'" . mt_rand() . "' alt='user-logo'>";
                                }else{
                                    echo "<P> IMAGE UPLOAD ERROR </p>";
                                }
                            }
                        }else{
                            echo "<p> SQL ERROR </p>";
                        }
                    ?>
                    <!--<img src="https://tinyfac.es/data/avatars/B0298C36-9751-48EF-BE15-80FB9CD11143-500w.jpeg" alt="user-logo">-->
                    <!--Source of the above image: https://uifaces.co/-->
                    <i class="fas fa-angle-down profile-angle-down">
                    <ul class="drop-down-profile">
                        <li class="drop-down-option"><a href="../uploadPicture.php">Change Photo</a></li>
                        <li class="drop-down-option"><a href="../logout.php">Logout</a></li>
                    </ul>
                    </i>

                    <!--idea:use css so that way we can use ::after to put the little symbol there-->
                   
                </div>
                <?php
                    $name_query = "SELECT firstname, lastname FROM employees WHERE username = '" . $_SESSION['username'] . "'";
                    $name_result = mysqli_query($conn,$name_query);
                    if(mysqli_num_rows($name_result)>0){
                        $row = mysqli_fetch_assoc($name_result);
                        $firstname =  $row['firstname'];
                        $lastname = $row['lastname']; 
                        echo "<p>${firstname} ${lastname}";
                    }else{
                        echo "<p> SQL ERROR </p>";
                    }
                 
                
                 ?>
            </div>

        </header>
        <section class="order">
            <div class="order-list">
                <h2>orders list</h2>
                <div class="order-creator">
                    <button class="order-btn order-btn--delete">Delete Order</button>
                    <!-- <i class="fas fa-ellipsis-h"></i>-->
                    <button class="order-btn order-btn--create">create order</button>
                </div>

                <!--<div class="order-delete">
                    <button class="order-btn delete-btn">delete order</button>
                </div>-->
            </div>
        </section>
        <section class="graphs">
            <div class="graph-container clear-fix">
                <div class="left-side">
                    <p class="graph-type">Active Orders</p>
                    <p class="graph-num">1 046</p>
                </div>
                <div class="right-side">
                    <img src="./img/active-graph.png" alt="graph">
                </div>
            </div>
            <div class="graph-container clear-fix">
                <div class="left-side">
                    <p class="graph-type">Unfulfilled</p>
                    <p class="graph-num">159</p>
                </div>
                <div class="right-side">
                    <img src="./img/unfulfilled-graph.png" alt="graph">
                </div>
            </div>
            <div class="graph-container clear-fix">
                <div class="left-side">
                    <p class="graph-type">Pending Rece...</p>
                    <p class="graph-num">624</p>
                </div>
                <div class="right-side">
                    <img src="./img/pending-graph.png" alt="graph">
                </div>
            </div>
            <div class="graph-container clear-fix">
                <div class="left-side">
                    <p class="graph-type">Fulfilled</p>
                    <p class="graph-num">1 263</p>
                </div>
                <div class="right-side">
                    <img src="./img/fulfilled-graph.png" alt="graph">
                </div>
            </div>
        </section>
        <section class="orders">
            <div class="orders-nav">
                <div class="orders-status">
                    <ul>
                        <li><a href="#">all orders</a></li>
                        <li><a href="#" class="active-link">active</a></li>
                        <li><a href="#">unpaid</a></li>
                        <li><a href="#">unfulfilled</a></li>
                    </ul>
                </div>
                <div class="search-bar">
                    <select class="search-type">
                        <option value="customername">Customer Name</option>
                        <option value="id">ID</option>
                    </select>
                    <input id="search-text" type="text" placeholder="Search..">
                    <i class="fas fa-search"></i>
                </div>
            </div>


            <div class="orders-header">
                <table>
                    <tr class="header-row">
                        <th><input type="checkbox" id="maincheck" name="maincheckbox" value="checked"></th>
                        <th>Order ID</th>
                        <th>Created</th>
                        <th>Customer</th>
                        <th>Fulfillment</th>
                        <th>Total</th>
                        <th>Profit</th>
                        <th>Status</th>
                        <th>Updated</th>
                    </tr>
                    <?php //The following function imports orders into the table.
                    require './functions/uploadOrders.php';

                    $import_query = 'SELECT * FROM table_orders';
                    $import_result = mysqli_query($conn,$import_query);
                    while($import_row = mysqli_fetch_assoc($import_result)){
                        $order_id = $import_row["order_id"];
                        $date_created = $import_row["date_created"];
                        $customer_firstname = $import_row["customer_firstname"];
                        $customer_lastname = $import_row["customer_lastname"];
                        $fulfillment = $import_row["fulfillment"];
                        $total = $import_row["total"];
                        $profit = $import_row["profit"];
                        $order_status = $import_row["order_status"];
                        $date_updated =$import_row["date_updated"];
                        createOrderRow($order_id,$date_created,$customer_firstname,$customer_lastname,$fulfillment,$total,$profit,$order_status,$date_updated);
                        createGrayRows();
                    }
                    ?>
                </table>
            </div>
        </section>
    </div>
    <script src="https://kit.fontawesome.com/e6db18745a.js"></script>
    <script src="js/ecommerce.js"></script>
</body>