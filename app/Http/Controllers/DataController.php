<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    function readData()
    {
        $dataToRead = [];

        if (($open = fopen(storage_path() . "/input.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $dataToRead[] = $data;
            }
            fclose($open);

            $collection = collect();

            for ($i = 1; $i < count($dataToRead); $i++) {
                $collection->push($dataToRead[$i]);
            }

            $sumGV = collect();
            $GV = 0;

            for ($i = 1; $i < count($dataToRead); $i++) {

                $net = $dataToRead[$i][3];
                $vat = $dataToRead[$i][5];
                $quantity = $dataToRead[$i][4];

                $sum = $quantity * ($net + (($vat / 100) * $net));
                $sumGV->push($sum);

                $GV += $sum;

                $net = 0;
                $vat = 0;
                $sum = 0;
                $quantity = 0;
            }
        }
        return view('table', compact('collection', 'sumGV', 'GV'));
    }



    function filterByLevel($level)
    {
        $dataToRead = [];

        if (($open = fopen(storage_path() . "/input.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($open, 1000, ",")) !== FALSE) {
                $dataToRead[] = $data;
            }
            fclose($open);
        }

        $collection = collect();
        $sumGV = collect();
        $GV = 0;

        for ($i = 1; $i < count($dataToRead); $i++) {
            if ($dataToRead[$i][2] >= $level) {
                $collection->push($dataToRead[$i]);

                $net = $dataToRead[$i][3];
                $vat = $dataToRead[$i][5];
                $quantity = $dataToRead[$i][4];

                $sum = $quantity * ($net + (($vat / 100) * $net));
                $sumGV->push($sum);

                $GV += $sum;

                $net = 0;
                $vat = 0;
                $sum = 0;
                $quantity = 0;
            }
        }
        return view('table', compact('collection', 'sumGV', 'GV'));
    }


    function home()
    {
        return redirect('/list');
    }
}
