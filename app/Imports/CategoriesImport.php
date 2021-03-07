<?php

namespace App\Imports;

use App\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;


class CategoriesImport implements  ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        $newArray = [];
        foreach ($rows as $row) {
            foreach ($row as $key => $val) {
                if ($val != "") {
                    $newArray[$key][] = trim($val);
                }
            }
        }
        $count = 0;
        $responseArray = [];
        foreach ($newArray as $valArray)
        {
            $catId = 0;
            foreach ($valArray as $key => $value)
            {
                if ($key == 0) {
                    $record1 = ["name" => $value, "type" => Session::get('type')];
                    $recordHave1 = Category::where($record1)->first();
                    if(!$recordHave1){
                        $catId = Category::create($record1);
                        $responseArray[] = [
                            "status" => "add",
                            "name" => $value,
                            "id" => $catId->id,
                        ];
                    } else {
                        $catId = $recordHave1;
                        $responseArray[] = [
                            "status" => "already added",
                            "name" => $value,
                            "id" => $catId->id,
                        ];
                    }
                } else {
                    $record2 = ["name" => $value, "parent_id" => $catId->id,"type" => Session::get('type')];
                    $recordHave2 = Category::where($record2)->first();
                    if(!$recordHave2){
                        $new = Category::create($record2);
                        $responseArray[] = [
                            "status" => "add",
                            "name" => $value,
                            "id" => $new->id,
                        ];
                    } else {
                        $responseArray[] = [
                            "status" => "already added",
                            "name" => $value,
                            "id" => $recordHave2->id,
                        ];
                    }
                }
            }
            $count++;
        }
        session(['variableRecord'=>$responseArray]);

    }

}

