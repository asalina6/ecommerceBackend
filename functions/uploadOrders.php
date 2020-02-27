<?php
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
?>