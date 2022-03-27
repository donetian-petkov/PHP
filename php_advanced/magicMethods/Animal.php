<?php

// magic methods - override PHP default behavior when a certain action is performed on an object



class Animal {

    // __get, __set - getter and setter for a non-defined or inaccessible (private, protected) property
    // if there is already a public property with the same name, the __get, __set are ignored

    // we can modify the __get and __set so that we can handle any non-defined properties in the below way
    // however, this will enable us to get and set private and protected properties
    // and if somebody tries to assign a value of different type to a property this will throw an error when using strict type

    /**
    public function __get(string $name) {

       if (property_exists($name)) {
           return $this->$name;
       }

       return null;

    }

    public function __set(string $name, $value): void {

       if(property_exists($name)){
           $this->$name=$value;
       }

    }
     */

    // another use is if we do not want to have a lot of properties' definitions
    // we can make an array and store each property inside it
    // with the __set and __get we can then fetch them
    // again however we can break encapsulation

    /**
    protected array $data = [];

    public function __get(string $name) {

        if(array_key_exists($name, $this->data)){
            return $this->data[$name];
        }

        return null;

    }

    public function __set(string $name, $value): void {

        if(array_key_exists($name, $this->data)){
            $this->data[$name] = $value;
        }

    }
     */

    // __isset, __unset - for non-defined or private and protected properties

    // we use the above array data:

    /**
    public function __set(string $name): bool {

        return array_key_exists($name, $this->data);

    }

    public function __unset(string $name): void {

        unset($this->data[$name]);

    }
     */

    // __get, __set, __isset, __unset do not affect static properties -
    // trying to access a non-defined static property will throw out a fatal error
    // since the magic methods require an object

    // __cal() - handle non-defined and inaccessible methods inside a class

    /**
    public function __call(string $name, array $arguments) {

        // similar to the above magic methods we check if the method exists and if it does we call it
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments); //call_user_func_array is used to prevent type mismatch
        }
    }

    // __callStatic - handle non-defined static methods inside a class

    public function __callStatic(string $name, array $arguments) {


        // handle the static method

    }
     */

    // __toString() - it is recommended to implement the Stringable interface if we want to use toString


    /**
        public function __toString(): string {

        return 'this is the toString representation of this object - it can be used to give details regarding the object';

     }*/

    // __invoke() - when we try to call an object directly
    // such as
    // $cat = new Animal();
    // $cat(); // without an implementation of the __invoke function this will throw an error
    // with the invoke function we can set what will happen when the object is called
    // useful for single action classes

    // __debugInfo() - customise what will be printed when you var_dump an object
    // for example, we can hide private and protected properties and return only the public ones
    // we can even edit some of the properties' output

    public function __debugInfo(): ?array {

        return [
          'name' => $this->name,
          'type' => $this->type
        ];
    }
 }

