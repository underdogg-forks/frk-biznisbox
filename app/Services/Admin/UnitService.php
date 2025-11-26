<?php

namespace App\Services\Admin;

use App\Models\Unit;

class UnitService
{
    public function getUnits()
    {
        $units = Unit::all()->where('active', true);
        createActivityLog('retrieve', null, 'App\Models\Unit', 'getUnits');

        return $units;
    }

    public function getUnitByName($name)
    {
        $unit = Unit::where('name', $name)->first();
        if ( ! $unit) {
            return;
        }
        createActivityLog('retrieve', $unit->id, 'App\Models\Unit', 'getUnitByName');

        return Unit::where('name', $name)->first();
    }

    public function getUnit($id)
    {
        $unit = Unit::find($id);
        if ( ! $unit) {
            return;
        }
        createActivityLog('retrieve', $unit->id, 'App\Models\Unit', 'getUnit');

        return $unit;
    }

    public function createUnit($data)
    {
        $unit = Unit::where('name', $data['name'])->first();
        if ($unit) {
            return;
        }

        return Unit::create($data);
    }

    public function updateUnit($id, $data)
    {
        $unit = Unit::find($id);
        if ( ! $unit) {
            return;
        }

        return $unit->update($data);
    }

    public function deleteUnit($id)
    {
        $unit = Unit::find($id);
        if ( ! $unit) {
            return;
        }

        return $unit->delete();
    }
}
