<?php

namespace App;

class Quest
{
    public $services;
    public $totalQty = 0;

    public function __construct($oldList)
    {
        if ($oldList) {
            $this->services = $oldList->services;
            $this->totalQty = $oldList->totalQty;
        }
    }

    public function addService($service, $id)
    {
        $storedServices = ['service' => $service];
        if ($this->services) {
            if (array_key_exists($id, $this->services)) {
                $storedServices = $this->services[$id];
            }
        }
        $this->services[$id] = $storedServices;
        $this->totalQty++;
    }



}
