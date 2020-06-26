<?php
include '../config/db.php';
function createOrderRow($order_id,$date_created,$customer_firstname,$customer_lastname,$fulfillment,$total,$profit,$order_status,$date_updated){
echo <<<ORDER
   <tr class = "order-row">
   <td class="check-box"><input type="checkbox" id="maincheck" name="maincheckbox" value="checked"></td>
   <td class="order-num">
   ${order_id}
   </td>
   <td class="date-created">
       <time datetime="2019-08-01">
       ${date_created}
   </time>
   </td>
   <td class="customer-cell">
       <div class="profile">
           <img src="./uploads/profiledefault.png" alt="user-logo">
       </div>
       <span class="profile-name">${customer_firstname} ${$customer_lastname}</span>
   </td>
   <td class="fulfillment-box">
       <div class="${fulfillment} box">${fulfillment} <i class="fas fa-angle-down"></i></div>
   </td>
   <td class="total">${total}</td>
   <td class="profit">${profit}</td>
   <td class="status-box">
       <div class="${order_status} box">${order_status} <i class="fas fa-angle-down"><ul class="drop-down-order-status">
       <li class="drop-down-option-status paid-dropdown">Paid</li>
       <li class="drop-down-option-status authorized-dropdown">Authorized</li>
   </ul></i></div>
   </td>
   <td class="updated-box"><time datetime="2019-09-04">$date_updated</time></td>
</tr>
</tr>
ORDER;
}
function createGrayRows(){
echo <<<'GRAY'
<tr class = "grayed-row">
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
    <td class = "grayed-cell"></td>
<td class = "grayed-cell"></td>
GRAY;
}
function paginationHandler(){
    $results_per_page = 10;
    //find number of total results
    $results_query = 'SELECT * FROM tbl_orders';
    $results_result = mysqli_query($conn,$results_query);
    $number_of_results = mysqli_num_rows($results_result);

    $number_of_pages = ceil($number_of_results/$results_per_page);

    if(!isset($_GET['page'])){
        $page = 1;
    }else{
        $page = $_GET['page'];
    }

    //determine sql limit starting number for the results on teh displaying page
    $this_page_first_result = ($page-1)*$results_per_page;


    //retrive results from database and display

    $pull_query = "SELECT * FROM table_orders ORDER BY 2 DESC LIMIT ${this_page_first_result},${results_per_page}";
    $pull_result = mysqli_query($conn,$pull_query);
    while($import_row = mysqli_fetch_assoc($pull_result)){
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
}
?>