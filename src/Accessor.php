<?php declare(strict_types=1);

namespace PiotrPress;

use ReflectionClass;

class Accessor {
    protected $object = null;
    protected $class = null;

    public function __construct( $object ) {
        $this->object = $object;
        $this->class = new ReflectionClass( $object );
    }

    public function __call( string $name, array $args = [] ) {
        $method = $this->method( $name );
        return $method->isStatic() ? $method->invokeArgs( null, $args ) : $method->invokeArgs( $this->object, $args );
    }

    public function __get( string $name ) {
        $property = $this->property( $name );
        return $property->isStatic() ? $property->getValue( null ) : $property->getValue( $this->object );
    }

    public function __set( string $name, $value ) {
        $property = $this->property( $name );
        $property->isStatic() ? $property->setValue( $value ) : $property->setValue( $this->object, $value );
    }

    protected function method( string $name ) {
        $method = $this->class->getMethod( $name );
        $method->setAccessible( true );
        return $method;
    }

    protected function property( string $name ) {
        $property = $this->class->getProperty( $name );
        $property->setAccessible( true );
        return $property;
    }
}