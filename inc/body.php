<?php session_start();?>
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
                    <img src="https://tinyfac.es/data/avatars/B0298C36-9751-48EF-BE15-80FB9CD11143-500w.jpeg" alt="user-logo">
                    <!--Source of the above image: https://uifaces.co/-->
                    <i class="fas fa-angle-down profile-angle-down">
                    <ul class="drop-down-profile">
                        <li class="drop-down-option">Change Photo</li>
                        <li class="drop-down-option">Logout</li>
                    </ul>
                </i>

                    <!--idea:use css so that way we can use ::after to put the little symbol there-->
                </div>
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
                    <tr class="order-row">
                        <td class="check-box"><input type="checkbox" id="maincheck" name="maincheckbox" value="checked"></td>
                        <td class="order-num">
                            121
                            <!-- try puting padding here-->091
                        </td>
                        <td class="date-created">
                            <time datetime="2019-08-01">
                            Aug 1, 2019
                        </time>
                        </td>
                        <td class="customer-cell">
                            <div class="profile">
                                <img src="https://images.unsplash.com/photo-1488426862026-3ee34a7d66df?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=d5849d81af587a09dbcf3f11f6fa122f" alt="user-logo">
                            </div>
                            <span class="profile-name">Harriet Santiago</span>
                        </td>
                        <td class="fulfillment-box">
                            <div class="unfulfilled box">unfulfilled <i class="fas fa-angle-down"></i></div>
                        </td>
                        <td class="total">604.50</td>
                        <td class="profit">182.50</td>
                        <td class="status-box">
                            <div class="authorized box">Authorized <i class="fas fa-angle-down"><ul class="drop-down-order-status">
                            <li class="drop-down-option-status paid-dropdown">Paid</li>
                            <li class="drop-down-option-status authorized-dropdown">Authorized</li>
                        </ul></i></div>
                        </td>
                        <td class="updated-box"><time datetime="2019-09-04">Today</time></td>
                    </tr>


                    <tr class="grayed-row">
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                    </tr>

                    <tr class="order-row">
                        <td class="check-box"><input type="checkbox" id="maincheck" name="maincheckbox" value="checked"></td>
                        <td class="order-num">
                            121 090
                        </td>
                        <td class="date-created">
                            <time datetime="2019-07-21">
                                July 21, 2019
                            </time>
                        </td>
                        <td class="customer-cell">
                            <div class="profile">
                                <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="user-logo">
                            </div>
                            <span class="profile-name">Sara Graham</span>
                        </td>
                        <td class="fulfillment-box">
                            <div class="pending box">Pending Receipt <i class="fas fa-angle-down"></i></div>
                        </td>
                        <td class="total">1,175.50</td>
                        <td class="profit">524.25</td>
                        <td class="status-box">
                            <div class="paid box">Paid
                                <i class="fas fa-angle-down"><ul class="drop-down-order-status">
                                <li class="drop-down-option-status paid-dropdown">Paid</li>
                                <li class="drop-down-option-status authorized-dropdown">Authorized</li>
                            </ul></i></div>
                        </td>
                        <td class="updated-box"> <time datetime="2019-09-04">Today</time></td>
                    </tr>

                    <tr class="grayed-row">
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                    </tr>

                    <tr class="order-row">
                        <td class="check-box"><input type="checkbox" id="maincheck" name="maincheckbox" value="checked"></td>
                        <td class="order-num">
                            121 058
                        </td>
                        <td class="date-created">
                            <time datetime="2019-07-16">
                                    July 16, 2019
                                </time>
                        </td>
                        <td class="customer-cell">
                            <div class="profile">
                                <img src="https://randomuser.me/api/portraits/men/55.jpg" alt="user-logo">
                            </div>
                            <span class="profile-name">Elmer McGee</span>
                        </td>
                        <td class="fulfillment-box">
                            <div class="fulfilled box">Fulfilled <i class="fas fa-angle-down"></i></div>
                        </td>
                        <td class="total">175.50</td>
                        <td class="profit">78</td>
                        <td class="status-box">
                            <div class="authorized box">Authorized <i class="fas fa-angle-down">  <ul class="drop-down-order-status">
                            <li class="drop-down-option-status paid-dropdown">Paid</li>
                            <li class="drop-down-option-status authorized-dropdown">Authorized</li>
                        </ul></i></div>
                        </td>
                        <td class="updated-box"> <time datetime="2019-09-03">Yesterday</time></td>
                    </tr>

                    <tr class="grayed-row">
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                        <td class="grayed-cell"></td>
                    </tr>




                </table>
            </div>
        </section>
    </div>

</body>