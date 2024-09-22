<?php

// Base Vehicle Class
class Vehicle {
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to prevent overriding
    final public function getDetails() {
        return "Brand: {$this->brand}, Model: {$this->model}, Year: {$this->year}";
    }
}

// Car Class inheriting from Vehicle
class Car extends Vehicle {
    private $numberOfDoors;

    public function __construct($brand, $model, $year, $numberOfDoors) {
        parent::__construct($brand, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    // Method specific to Car
    public function getCarDetails() {
        return parent::getDetails() . ", Number of Doors: {$this->numberOfDoors}";
    }
}

// Motorcycle Class inheriting from Vehicle
final class Motorcycle extends Vehicle {
    private $engineCapacity;

    public function __construct($brand, $model, $year, $engineCapacity) {
        parent::__construct($brand, $model, $year);
        $this->engineCapacity = $engineCapacity;
    }

    public function getMotorcycleDetails() {
        return parent::getDetails() . ", Engine Capacity: {$this->engineCapacity}cc";
    }
}

// ElectricVehicle Interface
interface ElectricVehicle {
    public function chargeBattery();
    public function getBatteryLevel();
}

// ElectricCar Class inheriting from Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($brand, $model, $year, $numberOfDoors, $batteryLevel) {
        parent::__construct($brand, $model, $year, $numberOfDoors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implementing ElectricVehicle methods
    public function chargeBattery() {
        $this->batteryLevel = 100;
        echo "Battery fully charged!<br>";
    }

    public function getBatteryLevel() {
        return $this->batteryLevel;
    }

    // Method specific to ElectricCar
    public function getElectricCarDetails() {
        return parent::getCarDetails() . ", Battery Level: {$this->batteryLevel}%";
    }
}

// Testing Car class
$car = new Car("Toyota", "Camry", 2020, 4);
echo $car->getCarDetails();  // Output: Brand: Toyota, Model: Camry, Year: 2020, Number of Doors: 4
echo "<br><br>";

// Testing Motorcycle class
$motorcycle = new Motorcycle("Yamaha", "MT-07", 2021, 689);
echo $motorcycle->getMotorcycleDetails();  // Output: Brand: Yamaha, Model: MT-07, Year: 2021, Engine Capacity: 689cc
echo "<br><br>";

// Testing ElectricCar class
$electricCar = new ElectricCar("Tesla", "Model S", 2023, 4, 80);
echo $electricCar->getElectricCarDetails();  // Output: Brand: Tesla, Model: Model S, Year: 2023, Number of Doors: 4, Battery Level: 80%
$electricCar->chargeBattery();  // Output: Battery fully charged!
echo "Battery Level after charge: " . $electricCar->getBatteryLevel() . "%";  // Output: Battery Level after charge: 100%

?>