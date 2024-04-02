<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index()
    {
      /* The line ` ='Employee List';` is initializing a variable named `` with the
      value `'Employee List'`. This variable is used to store the title of the page that will be
      displayed when the `index` method of the `EmployeeController` is called. It helps in setting
      the title of the page to 'Employee List' before rendering the view. */
        $pageTitle ='Employee List';
        //ELOQUENT
        $employees =Employee::all();
    //     $employees = DB::select('
    //     select *, employees.id as employee_id, positions.name as position_name
    //     from employees
    //     left join positions on employees.positions_id = positions.id
    // ');
        return view('employee.index',[
        'pageTitle'=>$pageTitle,
        'employees'=>$employees,
    ]);
    }
    public function create()
    {

        $pageTitle='create Employee';
        //ELOQUENT
        $positions= Position::all();
        return view('employee.create',compact('pageTitle','positions'));
    }

    /* The `public function store(Request )` method in the `EmployeeController` is responsible
    for handling the logic to store a new employee record in the database based on the data
    submitted through a form. Here is a breakdown of what the method is doing: */
    public function store(Request $request)
    {
       /* The `` array in the `EmployeeController` is defining custom error messages for
       specific validation rules. */
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

    /* The line ` = Validator::make(->all(), [...], );` in the `store`
    method of the `EmployeeController` is creating a new instance of a validator. */
    $validator = Validator::make($request->all(), [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'age' => 'required|numeric',
    ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
//
        // DB::table('employees')->insert([
        //     'firstname'=>$request->firstName,
        //     'lastname'=>$request->lastName,
        //     'email'=>$request->email,
        //     'age'=>$request->age,
        //     'positions_id'=>$request->position,
        // ]);


        // ELOQUENT
        $employee = New Employee;
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();
        return redirect()->route('employees.index');

    }

    /**
     * Display the specified resource.
     */

// check
    public function show(string $id)
    {

    $pageTitle = 'Employee Detail';
    //ELOQUENT
    $employee =Employee::find($id);

    // RAW SQL QUERY
    /* The line ` = collect(DB::select(` in the `show` method of the `EmployeeController` is
    executing a raw SQL query to fetch a specific employee's details from the database based on the
    provided employee ID. Here is a breakdown of what this line is doing: */
    // $employee = collect(DB::select('
    //     select *, employees.id as employee_id, positions.name as position_name
    //     from employees
    //     left join positions on employees.position_id = positions.id
    //     where employees.id = ?
    // ', [$id]))->first();

    return view('employee.show', compact('pageTitle', 'employee'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit Employee';
        // RAW SQL Query
        $positions = Position::all();
        $employee= Employee::find($id);

        return view('employee.edit',compact('pageTitle','positions','employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message=[
            'require'=>':Attribute harus diisi',
            'email'=>' Isi : attribute dengan format yang benar',
            'numeric'=> "Isi : attribute dengan angka"
        ];
        $validator =Validator::make($request->all(),[
            'firstName'=> 'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'age'=>'required|numeric',
        ],$message);
        
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // ELOQUENT
        $employee = Employee::find($id);
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       /* The code snippet `DB::table('employees')->where('id',)->delete(); return
       redirect()->route('employees.index');` is performing the deletion of a specific employee
       record from the database. Here is a breakdown of what each part of the code is doing: */
        DB::table('employees')
        ->where('id',$id)
        ->delete();
        return redirect()->route('employees.index');
    }
}
