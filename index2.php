<?php 
// base class 
class Car {
    public $name;
    public $maxSpeed;
    public $distanceCovered;

    public function __construct($name, $maxSpeed) {
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->distanceCovered = 0;
    }
    public function move() {
        // Simulates the car moving by a random distance up to its max speed
        $this->distanceCovered += rand(1, $this->maxSpeed);
    }

    public function getName() {
        return $this->name;
    }

    public function getDistanceCovered() {
        return $this->distanceCovered;
    }

    public function __toString() {
        return "$this->name (Max Speed: $this->maxSpeed km/h)";
    }
}

// Derived Classes for Different Types of Cars
class SportsCar extends Car {
    public function __construct($name) {
        parent::__construct($name, 200);
    }
}

class SUV extends Car {
    public function __construct($name) {
        parent::__construct($name, 150);
    }
}

class Truck extends Car {
    public function __construct($name) {
        parent::__construct($name, 100);
    }
}

// Race Class
class Race {
    public $raceName;s
    public $trackLength;
    public $cars;

    public function __construct($raceName, $trackLength) {
        $this->raceName = $raceName;
        $this->trackLength = $trackLength;
        $this->cars = [];
    }

    public function addCar($car) {
        // Adds a car to the race
        $this->cars[] = $car;
    }

    public function startRace() {
        // Starts the race and simulates each car's progress until the finish line
        echo "Starting the race: $this->raceName\n";
        echo "Track Length: $this->trackLength km\n\n";

        while (true) {
            foreach ($this->cars as $car) {
                $car->move();
                // Display the progress of the car
                echo $car->getName() . " has covered " . $car->getDistanceCovered() . " km\n";

                // Check if any car has finished the race
                if ($car->getDistanceCovered() >= $this->trackLength) {
                    echo "\n" . $car->getName() . " wins the race!\n";
                    return;
                }
            }
            sleep(1); // Pause for a moment to simulate real-time race
            echo str_repeat("-", 40) . "\n";
        }
    }

    public function displayCars() {
        // Displays all cars participating in the race
        echo "Cars participating in the race:\n";
        foreach ($this->cars as $car) {
            echo $car . "\n";
        }
    }
}

// Main Function
function main() {
    // Create a race
    $race = new Race("Grand Prix", 100);

    // Add cars to the race
    $race->addCar(new SportsCar("Ferrari"));
    $race->addCar(new SUV("Range Rover"));
    $race->addCar(new Truck("Mack Truck"));

    // Display the cars
    $race->displayCars();

    echo "\nLet the race begin!\n\n";

    // Start the race
    $race->startRace();
}

main();

?>