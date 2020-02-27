//immediately invoke the function to prevent global namespace clutter;
window.onload = (function init() {
    var ui = (function() {
        'use strict';
          //create the local session storage
        function Store() {

        }
        //the local storage will save search preferences for employees

        /*  Store.getSearchPreference() = function() {
              let preference;
              if (localStorage.getItem('preference') === null) {
                  preference = 'customername';
              } else {
                  preference = JSON.parse(localStorage.getItem('preference');
                  }
              };
              Store.setSearchPreference();*/

        /*********************** Variables****************************/

        /***cache DOM***/
        //Main elements on page
        function UI() {
            this._html = document.querySelector('html');
            this._profileClicker = document.querySelector('.profile-angle-down');
            this._menu = document.querySelector('.drop-down-profile');
            this._modalCancel = document.querySelector('.modal-content__cancel');
            this._modal = document.querySelector('.modal-order');
            this._createOrderButton = document.querySelector('.order-btn--create');
            this._submitButton = document.querySelector('.submit-btn');
            this._searchBar = document.querySelector('#search-text');
            this._modalForm = document.querySelector('.modal-content>form');
            this._modalError = document.querySelector('.modal-content__modal-error');
            this._modalSuccess = document.querySelector('.modal-content__modal-success');
            this._mainCheckbox = document.querySelector('#maincheck');
            this._tbody = document.querySelector('tbody');
            this._formValidation = document.querySelector('.form-validation')
            this._deleteOrderButton = document.querySelector('.order-btn--delete');
            //modal inputs (inside modal form)
            this._statusInput = document.querySelector("#statusInput");
            this._profitInput = document.querySelector("#profitInput");
            this._customerInput = document.querySelector("#customerInput");
            this._fulfillmentInput = document.querySelector("#fulfillmentInput");
            this._totalInput = document.querySelector("#totalInput");
            //modal labels (inside modal form)
            this._customerLabel = document.querySelector('#customer');
            this._fulfillmentLabel = document.querySelector('#fulfillment');
            this._totalLabel = document.querySelector('#total');
            this._profitLabel = document.querySelector('#profit');
            this._statusLabel = document.querySelector('#status');
            //Make modal inputs and labels into Arrays
            this.labelArray = [this._customerLabel, this._fulfillmentLabel, this._totalLabel, this._profitLabel, this._statusLabel];
            this.inputArray = [this._customerInput, this._fulfillmentInput, this._totalInput, this._profitInput, this._statusInput];
        }
        //****************methods**********************//


        //recaches the DOM elements that might've been deleted (through loading)
        UI.prototype.refresh = function() {
                this._html = document.querySelector('html');
                this._profileClicker = document.querySelector('.profile-angle-down');
                this._menu = document.querySelector('.drop-down-profile');
                this._modalCancel = document.querySelector('.modal-content__cancel');
                this._modal = document.querySelector('.modal-order');
                this._createOrderButton = document.querySelector('.order-btn--create');
                this._submitButton = document.querySelector('.submit-btn');
                this._searchBar = document.querySelector('#search-text');
                this._modalForm = document.querySelector('.modal-content>form');
                this._modalError = document.querySelector('.modal-content__modal-error');
                this._modalSuccess = document.querySelector('.modal-content__modal-success');
                this._mainCheckbox = document.querySelector('#maincheck');
                this._tbody = document.querySelector('tbody');
                this._formValidation = document.querySelector('.form-validation')
                this._deleteOrderButton = document.querySelector('.order-btn--delete');
                //modal inputs (inside modal form)
                this._statusInput = document.querySelector("#statusInput");
                this._profitInput = document.querySelector("#profitInput");
                this._customerInput = document.querySelector("#customerInput");
                this._fulfillmentInput = document.querySelector("#fulfillmentInput");
                this._totalInput = document.querySelector("#totalInput");
                //modal labels (inside modal form)
                this._customerLabel = document.querySelector('#customer');
                this._fulfillmentLabel = document.querySelector('#fulfillment');
                this._totalLabel = document.querySelector('#total');
                this._profitLabel = document.querySelector('#profit');
                this._statusLabel = document.querySelector('#status');
                //Make modal inputs and labels into Arrays
                this.labelArray = [this._customerLabel, this._fulfillmentLabel, this._totalLabel, this._profitLabel, this._statusLabel];
                this.inputArray = [this._customerInput, this._fulfillmentInput, this._totalInput, this._profitInput, this._statusInput];
            }



            //Filters orders depending on ID# or Name
        UI.prototype.filterOrder = function(event) {
                //This function will filter the orders in the table by either name or id upon typing in the search bar(EVENT)
                var search = event.target.value.toLowerCase();
                //_searchBar.value.toLowerCase() works as well;
                let tbody = this._tbody;
                let rows = Array.from(tbody.children);
                let searchType = document.querySelector('.search-type');

                //calling the function to filter the rows

                rows.forEach(_filterRowsBy);


                /* This is me trying to use the filter function, i think it worked?
                
                let filteredRows = rows.filter(function(row) {
                    if ((row.classList.contains('header-row')) || row.classList.contains('grayed-row')) {
                        return false;
                    } else {
                        //we are searching for orders we don't want, so we can put all of filteredRows 
                        console.log(row);
                        return true;
                    }
                })*/


                function _filterRowsBy(row) {
                    //This function does the actual work and does the filtering based on id or name.
                    //This is my own filtering function. perhaps use javascripts filter function.
                    if (!row.classList.contains("header-row")) {
                        if (row.classList.contains("order-row")) {
                            let rowItems = Array.from(row.children);


                            //For the name
                            if (searchType.value === 'customername') {
                                let customerBox = rowItems[3];
                                let customerNameFromRow = Array.from(customerBox.children)[1];
                                let actualCustomerName = customerNameFromRow.innerText;
                                _searchFunction(row, actualCustomerName);
                            }
                            //For the id
                            else if (searchType.value === "id") {
                                let numberBox = rowItems[1];
                                let insideNumberBox = numberBox.innerHTML;
                                let newNumber = insideNumberBox.replace(/ +/g, "");
                                _searchFunction(row, newNumber);
                            } else {
                                console.log("No Search Type Selected.");
                            }
                        }
                    }
                } //end of filterrowsby


                function _searchFunction(row, itemBeingSearched) {
                    if (itemBeingSearched.toLowerCase().indexOf(search) != -1) {
                        row.style.display = "table-row";
                    } else {
                        row.style.display = "none";
                    }
                }
            }
            //check all orders with one click
        UI.prototype.checkboxAll = function(event) {
                let tbody = this._tbody;
                let rows = Array.from(tbody.children);
                rows.forEach(checkboxLoop);

                function checkboxLoop(row) {
                    if (!row.classList.contains("header-row")) {
                        if (row.classList.contains("order-row")) {
                            let rowItems = Array.from(row.children);
                            let checkBox = rowItems[0].firstElementChild;
                            if (checkBox.checked === false) {
                                checkBox.checked = true;
                            } else {
                                checkBox.checked = false;
                            }
                        }
                    }
                }
            }
            //delete checked orders
        UI.prototype.deleteOrder = function(event) {
            let tbody = this._tbody;
            let rows = Array.from(tbody.children);

            if (_printSelectedRows(rows) === "") {
                window.alert("No orders chosen");
            } else {
                //Make sure user wants to delete the order(s)
                if (window.confirm("The following orders will be deleted: " + _printSelectedRows(rows) + ". Are you sure you want to delete these orders?")) {
                    rows.forEach(_deleteRow);
                } else {
                    //do nothing
                }
            }


            function _deleteRow(row) {
                if (!row.classList.contains("header-row")) {
                    if (row.classList.contains("order-row")) {
                        let rowItems = Array.from(row.children);
                        let checkBox = rowItems[0].firstElementChild;
                        if (checkBox.checked === false) {
                            //do nothing
                        } else {
                            let nextGrayRow = row.nextElementSibling;
                            row.parentNode.removeChild(nextGrayRow);
                            row.parentNode.removeChild(row);

                        }
                    }
                }
            }

            //print all checked orders
            function _printSelectedRows(rows) {
                var rowsToBePrinted = [];
                rows.forEach(_getSelectedRow);
                return rowsToBePrinted.toString();

                function _getSelectedRow(row) {
                    if (!row.classList.contains("header-row")) {
                        if (row.classList.contains("order-row")) {
                            let rowItems = Array.from(row.children);
                            let checkBox = rowItems[0].firstElementChild;
                            if (checkBox.checked === false) {
                                //do nothing
                            } else {
                                rowsToBePrinted.push(rowItems[1].innerText);
                            }
                        }
                    }
                }
            }
        }

        //This function adds orders
        UI.prototype.addOrder = function(event) {

            //Going to start the orders at 121091
            let orderCount = parseInt("121091".trim()),
                _status = this._statusInput.value,
                _profit = this._profitInput.value,
                _customer = this._customerInput.value.trim(),
                _fulfillment = this._fulfillmentInput.value,
                _total = this._totalInput.value,
                messages = [], 
                output = '',
                tbody = this._tbody;


            //We first validate all inputs

            //If they did not input profit
            if (_profit === '' || _profit === null) {
                messages.push('Profit amount is required\n');
            }
            //if they did not input total
            if (_total === '' || _total === null) {
                messages.push('Total amount is required\n');
            }
            //if they did not input a customer name
            if (_customer === '' || _customer === null) {
                messages.push('Customer name is required\n');
            }


            //now that fields are non empty, test to see if they meet expectations
            //invalid input is where it does not meet expectations.

            console.log(this.invalidInput(1));
            //if there are invalid inputs, push it to the message array
            if (!this.invalidInput(1)) {
                messages.push("Invalid input.")
            }

            //if there are any error message, do not submit (prevent default) and spit out error messages
            if (messages.length > 0) {
                event.preventDefault(); 
                this._modalError.innerText = messages.join('');
            } else {
                //no errors
                event.preventDefault();
                //instantiate new order
                let newOrder = Order(new Date(), _customer, _fulfillment, _total, _profit, _status, new Date());
                output = _createOrder();
                tbody.append(output);
                tbody.append(grayoutput);
                this._modalError.innerText = '';

                //caching success so we can access it from the timeout function
                var success = this._modalSuccess;
                success.innerText = 'Successfully Added Order!';

                //use a timeout function to remove the success message after 1 second
                setTimeout(function() {
                    success.innerText = '';
                }, 1000);

                this._modalForm.reset();
            }
            //Modifies the date to look pretty
            function _modifyDate(_date) {
                const monthNames = ["Jan", "Feb", "Mar", "April", "May", "June",
                    "July", "Aug", "Sept", "Oct", "Nov", "Dec"
                ];
                let output = '';
                let month = monthNames[_date.getMonth()];
                let day = _date.getDate();
                let year = _date.getFullYear();
                return `${month} ${day}, ${year}`;
            }

            //All the work to create an order
            function _createOrder() {
                let orderRow = document.createElement("tr");
                let orderCheckBox = document.createElement('td');
                let orderNum = document.createElement('td');
                let orderDateCreated = document.createElement('td');
                let orderCustomerCell = document.createElement('td');
                let orderFullfillmentBox = document.createElement('td');
                let orderTotal = document.createElement('td');
                let orderProfit = document.createElement('td');
                let orderStatusBox = document.createElement('td');
                let orderUpdatedBox = document.createElement('td');

                //put all html elements in an array
                const appendArray = [orderCheckBox, orderNum, orderDateCreated, orderCustomerCell, orderFullfillmentBox, orderTotal, orderProfit, orderStatusBox, orderUpdatedBox];

                var newDate = new Date();

                //Just adding classes to each element
                orderRow.className = "order-row";
                orderCheckBox.className = "check-box";
                orderNum.className = "order-num";
                orderDateCreated.className = "date-created";
                orderCustomerCell.className = "customer-cell";
                orderFullfillmentBox.className = "fulfillment-box";
                orderTotal.className = "total";
                orderProfit.className = "profit";
                orderStatusBox.className = "status-box";
                orderUpdatedBox.className = "updated-box";

                orderCheckBox.innerHTML = '<input type="checkbox" id="maincheck" name="maincheckbox" value="checked">';
                //make sure the order number is formatted properly
                orderNum.innerHTML = ++orderCount;
                //make sure the date is formatted properly
                orderDateCreated.innerHTML = _modifyDate(newDate);
                orderCustomerCell.innerHTML = `<div class="profile"><img src="http://wpuploads.appadvice.com/wp-content/uploads/2014/10/facebookanon.jpg" alt="${_customer}_profile" ></div><span class="profile-name">${_customer}</span>`;
                orderFullfillmentBox.innerHTML = `<div class = "${_fulfillment} box" > ${_fulfillment}</div >`;
                orderTotal.innerHTML = _total;
                orderProfit.innerHTML = _profit;
                //creating order status box
                orderStatusBox.innerHTML = `<div class = " ${_status} box" > ${_status} <i class = "fas fa-angle-down"><ul class = "drop-down-order-status" ><li class = "drop-down-option-status paid-dropdown" > paid </li> <li class = "drop-down-option-status authorized-dropdown"> authorized </li></ul></i> </div>`;

                let dropdown = `${_status} `;
                // orderStatusBox.append()

                orderUpdatedBox.innerHTML = _modifyDate(newDate);

                //This just keeps appending the elements to the order row (in order???)
                appendArray.forEach((trait) => orderRow.append(trait));
                return orderRow;

            }
        }

        //shows order modal when you click on the add order button
        UI.prototype.showModal = function(event) {
                //click on order button to show modal
                if (event.target === this._createOrderButton) {
                    this._modal.style.display = "flex";
                }
            }
            //closes the order modal when you click outside the content area or click the X
        UI.prototype.closeModalFunction = function(event) {
            //if you click on x or if you click outside of modal... (event delegation)
            if (event.target === this._modalCancel || event.target === this._modal) {
                this._modal.style.display = "none";
            }
        }

        //helps user format the data correctly
        UI.prototype.invalidInput = function(event) {
            let _status = this._statusInput.value;
            let _profit = this._profitInput.value;
            let _customer = this._customerInput.value.trim();
            let _fulfillment = this._fulfillmentInput.value;
            let _total = this._totalInput.value;
            let messages = [];
            let output = '';
            let isValidName = true;
            let isValidProfit = true;
            let isValidTotal = true;
            let isValid = true;

            //caching the error divs for formatting the input
            let _badNameInput = document.querySelector('.customerInput-invalid');
            let _badProfitInput = document.querySelector('.profitInput-invalid');
            let _badTotalInput = document.querySelector('.totalInput-invalid');

            // PLEASE USE CLASSES TO TOGGLE BETWEEN GOOD AND BAD INPUTS....

            let customer_re = /^([a-zA-Z]+)(\s)([a-zA-Z]+)$/;
            let money_re = /^(\d+)(\.(\d{1,2}))?$/

            //Make sure customer is formatted correctly
            if (customer_re.test(_customer)) {
                //valid input pattern: no text in the error div, puts on the valid input style, returns a true value to show that the property is valid
                _badNameInput.innerHTML = "";
                _validInputStyle(this._customerInput, this._customerLabel);
                isValidName = true;
            } else {
                 //invalid input pattern: puts text in the error div, puts on the invalid input style, returns a false value to show that the property is invalid
                _badNameInput.innerHTML = "<p>Please make sure the first AND last name have letters only.</p>";
                _invalidInputStyle(this._customerInput, this._customerLabel);
                isValidName = false;
            }
            //Make sure profit is formatted correctly
            if (money_re.test(_profit)) {
                //see valid input pattern above
                _badProfitInput.innerHTML = "";
                _validInputStyle(this._profitInput, this._profitLabel);
                isValidProfit = true;
            } else {
                //see invalid input pattern above
                _badProfitInput.innerHTML = "<p>Please make sure you have inputted numeric values only with up to two decimal places</p>";
                _invalidInputStyle(this._profitInput, this._profitLabel);
                isValidProfit = false;
            }
            //Make sure total is formatted correctly
            if (money_re.test(_total)) {
                //see valid input pattern above
                _badTotalInput.innerHTML = "";
                _validInputStyle(this._totalInput, this._totalLabel);
                isValidTotal = true;
            } else {
                 //see invalid input pattern above
                _badTotalInput.innerHTML = "<p>Please make sure you have inputted numeric values only with up to two decimal places</p>";
                _invalidInputStyle(this._totalInput, this._totalLabel);
                isValidTotal = false;
            }

            //if everything is good, then it is valid and true. if not, false.
            if (isValidName && isValidProfit && isValidTotal) {
                isValid = true;
            } else {
                isValid = false;
            }
            return isValid;

            //private functions for invalid input function 

            //makes border black if input is valid
            function _validInputStyle(input, label) {
                input.style.border = "1px solid black";
                input.style.background = "white";
                label.style.color = "black";
            }
            //makes border red if input is invalid
            function _invalidInputStyle(input, label) {
                input.style.border = "1px solid red";
                input.style.background = "pink";
                label.style.color = "red";
            }
        }


        /* BEGIN LOADIG UI*/


        var ui = new UI();
        //load the orders
        //refresh the DOM caches since they may have been deleted when loading the table.
        ui.refresh();

        /***Event Listeners***/
        ui._profileClicker.addEventListener('click', _displayMenu, false);
        ui._html.addEventListener('click', _closeMenu, false);
        ui._modal.addEventListener('click', UI.prototype.closeModalFunction.bind(ui), true);
        ui._createOrderButton.addEventListener('click', UI.prototype.showModal.bind(ui), false);
        ui._searchBar.addEventListener('keyup', UI.prototype.filterOrder.bind(ui), false);
        ui._submitButton.addEventListener('click', UI.prototype.addOrder.bind(ui), false);
        ui._mainCheckbox.addEventListener('click', UI.prototype.checkboxAll.bind(ui), false);
        ui._deleteOrderButton.addEventListener('click', UI.prototype.deleteOrder.bind(ui), false);

        //event listener that sets up modal focus states
        ui.inputArray.forEach(function applyEventListeners(input) {
            input.addEventListener('focus', _setFocusState, false);
        });
        //event listeners that will make sure the input data is formatted correctly
        ui._formValidation.addEventListener('blur', UI.prototype.invalidInput.bind(ui), true);
        
        //console.log(ui._profileClicker);
        //this will just work on any v looking i element


        /*

                  
                   

                    function _importOrders() {


                        function _importOrder(param1, param2, param3) {

                        }
                    }
*/

        //This changes the color of the modal text to the active input
        function _setFocusState(event) {
            if (ui._customerInput === document.activeElement) {
                ui.labelArray.forEach(_checkStateStatus);
                ui._customerLabel.classList.add('focus-state');
            } else if (ui._fulfillmentInput === document.activeElement) {
                ui.labelArray.forEach(_checkStateStatus);
                ui._fulfillmentLabel.classList.add('focus-state');
            } else if (ui._totalInput === document.activeElement) {
                ui.labelArray.forEach(_checkStateStatus);
                ui._totalLabel.classList.add('focus-state');
            } else if (ui._profitInput === document.activeElement) {
                ui.labelArray.forEach(_checkStateStatus);
                ui._profitLabel.classList.add('focus-state');
            } else if (ui._statusInput === document.activeElement) {
                ui.labelArray.forEach(_checkStateStatus);
                ui._statusLabel.classList.add('focus-state');
            } else {
                //do nothing
            }
        }

        function _checkStateStatus(label) {
            if (label.classList.contains('focus-state')) {
                label.classList.remove('focus-state');
            }

        }
        //displays main menu if you click on the arrow
        function _displayMenu(event) {
            console.log(event.target);
            //This will work on the profile drop down
            if (event.target === ui._profileClicker) {
                //select the invisible menu
                ui._menu = document.querySelector('.drop-down-profile');
                //If there is an invisible drop down menu...

                if (ui._menu !== null) {
                    ui._menu.classList.remove('drop-down-profile');
                    ui._menu.classList.add('drop-down-profile-visible');
                } else {
                    //select the visible menu
                    ui._menu = document.querySelector('.drop-down-profile-visible')
                    ui._menu.classList.add('drop-down-profile');
                    ui._menu.classList.remove('drop-down-profile-visible');
                }

            }
            //else if()   <-- insert code here to work on other types of orders.
        }
        //The below function just exits out of the main menu if you click anywhere else
        function _closeMenu(event) {
            if (event.target !== ui._profileClicker) {
                if (ui._menu.classList.contains('drop-down-profile-visible')) {
                    ui._menu.classList.add('drop-down-profile');
                    ui._menu.classList.remove('drop-down-profile-visible');
                }
            }


        }



        /* end of testing here

                                /*Revealing Module Pattern*/

        var publicAPI = {}
        return publicAPI;
    })();
    return ui;

})();

//Add event listeners to rotate arrows