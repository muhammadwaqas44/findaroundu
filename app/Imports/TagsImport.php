<?php

namespace App\Imports;

use App\FauTag;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class TagsImport implements ToCollection
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
            foreach ($valArray as $key => $value)
            {
                $name = ucfirst(trans($value));
                $title = strtolower($value);
                    $record1 = ["name" => $name, "title" => str_replace(' ','_',$title)];
                    $recordHave1 = FauTag::where($record1)->first();
                    if(!$recordHave1){
                        $tagId = FauTag::create($record1);
                        $responseArray[] = [
                            "status" => "add",
                            "name" => $name,
                            "id" => $tagId->id,
                        ];
                    } else {
                        $tagId = $recordHave1;
                        $responseArray[] = [
                            "status" => "already added",
                            "name" => $name,
                            "id" => $tagId->id,
                        ];
                    }
            }
            $count++;
        }
        session(['variableRecord'=>$responseArray]);
    }
}
