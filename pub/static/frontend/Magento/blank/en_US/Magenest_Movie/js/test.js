define(['ko', 'jquery'], function (ko, $) {
    'use strict';
    this.cars = ko.observable();
    function CarViewModel() {
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
    }

    ko.applyBindings(new CarViewModel(), document.getElementById('sltCars'));
    console.log(new CarViewModel());
    ko.cleanNode(document.getElementById('sltCars'));



});
