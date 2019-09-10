<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $dataArray = $this->readFileJson();
        return view('customers.index')->with('dataArray', $dataArray);
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $number = $request->number;
        $email = $request->email;
        $id = $request->id;
        $customerInfo = $this->putCustomerToArray($name, $number, $email, $id);
        $this->saveFileJson($customerInfo);

        return redirect()->route('customers.index');
    }

    public function show($id)
    {
        $dataArray = $this->readFileJson(base_path('resources/lang/data.json'));
        return view('customers.info')->with(['id' => $id, 'dataArray' => $dataArray]);
    }

    public function edit($id)
    {
        $dataArray = $this->readFileJson(base_path('resources/lang/data.json'));
        return view('customers.edit')->with(['id' => $id, 'dataArray' => $dataArray]);
    }

    public function update(Request $request, $id)
    {
        $name = $request->name;
        $number = $request->number;
        $email = $request->email;

        $dataArray = $this->readFileJson(base_path('resources/lang/data.json'));
        foreach ($dataArray as $key => $value) {
            if ($value['Id'] == $id) {
                $value['Name'] = $name;
                $value['Number'] = $number;
                $value['Email'] = $email;
                $dataArray[$key] = $value;
            }
        }
        $dataEnCode = json_encode($dataArray);
        file_put_contents(base_path('resources/lang/data.json'), $dataEnCode);
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $dataArray = $this->readFileJson(base_path('resources/lang/data.json'));
        foreach ($dataArray as $key => $value) {
            if ($value['Id'] == $id) {
                $value = null;
                $dataArray[$key] = $value;
            }
        }
        $dataEnCode = json_encode($dataArray);
        file_put_contents(base_path('resources/lang/data.json'), $dataEnCode);
        return redirect()->route('customers.index');
    }

    public function readFileJson()
    {
        $getContent = file_get_contents(base_path('resources/lang/data.json'));
        $data = json_decode($getContent, true);
        return $data;
    }

    public function saveFileJson($newData)
    {
        $dataArray = $this->readFileJson(base_path('resources/lang/data.json'));
        array_push($dataArray, $newData);
        $dataEnCode = json_encode($dataArray);
        return file_put_contents(base_path('resources/lang/data.json'), $dataEnCode);
    }

    public function putCustomerToArray($name, $number, $email, $id)
    {
        $array = [
            'Name' => $name,
            'Number' => $number,
            'Email' => $email,
            'Id' => $id
        ];
        return $array;
    }
}
