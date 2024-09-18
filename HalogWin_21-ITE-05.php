
<?php

// Base Vehicle Class
class Vehicle {
    protected $make;
    protected $model;
    protected $year;

    public function __construct($make, $model, $year) {
        $this->make = $make;
        $this->model = $model;
        $this->year = $year;
    }

    // Final method to get vehicle details
    public final function getDetails() {
        return "Make: {$this->make}, Model: {$this->model}, Year: {$this->year}";
    }

    // Abstract method for description
    public function describe() {
        return "This is a vehicle.";
    }
}

// Car Class extending Vehicle
class Car extends Vehicle {
    private $doors;

    public function __construct($make, $model, $year, $doors) {
        parent::__construct($make, $model, $year);
        $this->doors = $doors;
    }

    // Override describe method
    public function describe() {
        return "This is a car with {$this->doors} doors.";
    }
}

// Final Motorcycle Class extending Vehicle
final class Motorcycle extends Vehicle {
    private $type;

    public function __construct($make, $model, $year, $type) {
        parent::__construct($make, $model, $year);
        $this->type = $type;
    }

    // Override describe method
    public function describe() {
        return "This is a motorcycle of type {$this->type}.";
    }
}

// ElectricVehicle Interface
interface ElectricVehicle {
    public function chargeBattery();
}

// ElectricCar Class extending Car and implementing ElectricVehicle
class ElectricCar extends Car implements ElectricVehicle {
    private $batteryLevel;

    public function __construct($make, $model, $year, $doors, $batteryLevel) {
        parent::__construct($make, $model, $year, $doors);
        $this->batteryLevel = $batteryLevel;
    }

    // Implement chargeBattery method
    public function chargeBattery() {
        $this->batteryLevel = 100; // Charge battery to 100%
        return "The electric car is now fully charged.";
    }

    // Override describe method
    public function describe() {
        return "This is an electric car with  doors and battery level at {$this->batteryLevel}%.";
    }
}

// Testing the implementation
$car = new Car("Toyota", "Camry", 2020, 4);
$motorcycle = new Motorcycle("Yamaha", "MT-09", 2021, "Naked");
$electricCar = new ElectricCar("Tesla", "Model 3", 2021, 4, 75);

echo $car->getDetails() . "<br>";
echo $car->describe() . "<br>";

echo $motorcycle->getDetails() . "<br>";
echo $motorcycle->describe() . "<br>";

echo $electricCar->getDetails() . "<br>";
echo $electricCar->describe() . "<br>";
echo $electricCar->chargeBattery() . "<br>";
echo $electricCar->describe() . "<br>";
?>