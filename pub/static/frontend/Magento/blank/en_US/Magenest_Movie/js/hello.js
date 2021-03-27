define(["uiComponent", "jquery", "Magento_Ui/js/modal/alert", "ko"],
    function (Component, $, alert, ko) {
        //use strict: quy định sự nghiêm ngặt trong khi khai báo
        "use strict";


        return function (config, element) {
            if (config.type === "#login_modal") {
                $(config.type).on('click', function (e) {
                    alert({
                        title: $.mage.__(config.message),
                        content: $.mage.__('<div class="container">\n' +
                            '    <label for="uname"><b>Username</b></label>\n' +
                            '    <input type="text" placeholder="Enter Username" name="uname" required>\n' +
                            '\n' +
                            '    <label for="psw"><b>Password</b></label>\n' +
                            '    <input type="password" placeholder="Enter Password" name="psw" required>\n' +
                            '\n' +
                            '    <button type="submit">Login</button>\n' +
                            '    <label>\n' +
                            '      <input type="checkbox" checked="checked" name="remember"> Remember me\n' +
                            '    </label>\n' +
                            '  </div>'),
                        actions: {
                            always: function () {
                            }
                        }
                    });

                });

            } /*else if (config.type = "knockoutjs") {
                this.cars = ko.observable();
                //function CarViewModel() {
                this.cars = [
                    {name: "Audi", price: "200$"},
                    {name: "Mec", price: "180$"},
                    {name: "Honda", price: "150$"},
                    {name: "Vinfast", price: "50$"}
                ];
                this.chosenCar = ko.observable();
                this.resetCar = () => {
                    this.chosenCar = null
                };
                //}

                //ko.applyBindings(new CarViewModel(), document.getElementById('sltCars'));
                //console.log(new CarViewModel());
                //ko.cleanNode(document.getElementById('sltCars'));

            } */ else {
                $(config.type).on('click', function (e) {
                    console.log(config.message);
                })
            }
        }
    }
)

