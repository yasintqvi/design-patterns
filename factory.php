<?php

/*
 * Factory pattern allows us to implement a centralized and managed object creation process, avoid duplication in code,
 improve extensibility and changeability, and reduce dependencies.
 *
 */

interface Shape {
    public function area();

    public function environment();
}

class Circle implements Shape
{
    private int $radius;

    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function area(): int
    {
        return ($this->radius * $this->radius) * pi();
    }

    public function environment(): int
    {
        return (int) ($this->radius * pi()) * 2;
    }
}

class Triangle implements Shape
{
    private int $height;
    private int $rule;

    private array $sides = [];

    public function __construct(int $height=0, int $rule=0, array $sides=[])
    {
        [$this->height, $this->rule, $this->sides] = [$height, $rule, $sides];
    }


    public function area(): int
    {
        return (int) ($this->rule * $this->height) / 2;
    }

    public function environment(): int
    {
        return (int) array_sum($this->sides);
    }
}

class Rectangle implements Shape
{
    private int $length;
    private int $width;

    public function __construct($length, $width)
    {
        [$this->length, $this->width] = [$length, $width];
    }

    public function area(): int
    {
        return (int) ($this->width * $this->length);
    }

    public function environment(): int
    {
        return (int) ($this->width + $this->length) * 2;
    }
}


class Computing
{
    public static function computeEnv(string $shape, ...$params): bool|int
    {
        if ($shape === 'circle') {
            $circle = new Circle(...$params);
            return $circle->environment();
        }
        elseif ($shape === 'triangle') {
            $circle = new Triangle(...$params);
            return $circle->environment();
        }

        elseif ($shape === 'rectangle') {
            $circle = new Rectangle(...$params);
            return $circle->environment();
        }

        return false;
    }

    public static function computeArea(string $shape, ...$params): bool|int
    {
        if ($shape === 'circle') {
            $circle = new Circle(...$params);
            return $circle->area();
        }
        elseif ($shape === 'triangle') {
            $circle = new Triangle(...$params);
            return $circle->area();
        }

        elseif ($shape === 'rectangle') {
            $circle = new Rectangle(...$params);
            return $circle->area();
        }

        return false;
    }
}

try {
    $circleArea = Computing::computeArea('circle', radius: 10);
    echo "Circle Area: " . $circleArea . "<br>";

    $circleEnv = Computing::computeEnv('circle', radius: 10);
    echo "Circle Environment: " . $circleEnv . "<br>";

    $triangleEnv = Computing::computeEnv('triangle', sides: [10, 14, 22]);
    echo "Triangle Environment: " . $triangleEnv . "<br>";

    $triangleArea = Computing::computeArea('triangle', height: 23, rule: 11);
    echo "Triangle Area: " . $triangleArea . "<br>";

    $rectangleEnv = Computing::computeEnv('rectangle', width: 6, length: 8);
    echo "Rectangle Area: " . $rectangleEnv . "<br>";

    $rectangleArea = Computing::computeArea('rectangle', width: 6, length: 8);
    echo "Rectangle Area: " . $rectangleArea . "<br>";

} catch(TypeError $err) {
    echo "<b style='color: darkred'>values must be numeric. </b><br>" . $err->getMessage();
    exit();
}



