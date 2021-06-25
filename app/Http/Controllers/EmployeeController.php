<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller
{
    public function index() {

        // Get list of employees and join with company id
        $list = DB::table('employees')
            ->join('companies', 'companies.id', '=', 'employees.company_id')
            ->select('employees.*', 'companies.name as company_name')
            ->get();
        
        return view('employee.index',['employees_data'=> $list]);
    }

    public function create() {
        //$companies = Company::all();
        $list = DB::table('companies')
            ->select('companies.*')
            ->get();
        return view('employee.create',['companies'=> $list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(CreateEmployeeRequest $request)
    {
        Employee::create([
            'name' => htmlspecialchars($request->name),
            'email' => strtolower($request->email),
            'company_id' => $request->company_name,
            'phone' => $request->phone_number,
        ]);

		$request->session()->flash('success','New Employee Successfully submitted.');

        return redirect()->route('employee.index');
    }

    public function show(Employee $employee)
    {
        $cid = $employee['company_id'];
        $list = DB::table('companies')
                ->where('id', '=', $cid)
                ->get();

        return view('employee.show', ["employee"=>$employee, 'company'=>$list[0]]);
    }

    public function edit(Employee $employee)
    {
       $list = DB::table('companies')
        ->select('companies.*')
        ->get();
       return view('employee.edit', ["employee"=>$employee, "companies"=>$list]);
    }

    public function update(EditEmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'name' => htmlspecialchars($request->name),
            'email' => strtolower($request->email),
            'phone' => $request->phone,
            'company_id' => $request->company_name
        ]);

		$request->session()->flash('success','Employee Successfully updated.');

        return redirect()->route('employee.index');
    }

    public function destroy(Employee $data, $id)
    {
        Employee::destroy(array('id',$id));
        //$data->delete();
        return redirect()->back();
    }
}