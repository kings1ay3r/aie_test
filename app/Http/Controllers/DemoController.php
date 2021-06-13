<?php

namespace App\Http\Controllers;
use DB;
use Request;


class DemoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {

    }
    /**
     * Demo for AIE
     *
     * @return html
     * */

    public function demo(){
    }

    /**
     * Renders View that Lists Employees
     * Not Currently Implementing Pagination
     * Planning to implement edits over ajax
     * Should Render View
     */

    public function list_employees(){

        $l = DB::table("emplyees")->get(); //! Need to ush this into a model in case of implementation of pagination and filtering. Currently using eloquent qb in controller for time constraints.


        return view(
            'list_employees',
             [
                 "title" => "Employees List",
                 "list" => $l,
                ]
            );
    }
    /**
     * Collects Data via post and updates db.
     * Returns true on success
     * Calls not found excetion.
     */

    public function edit_employee($e_id){
        $form_data = Request::all();
        $e = DB::table('emplyees')->find($e_id);
        if(!$e) abort(404);
        if($form_data['employee_name'] == "") $form_data['employee_name'] = $e->employee_name;
        if($form_data['employee_age'] == "") $form_data['employee_name'] = $e->employee_age;
        if($form_data['employee_doj'] == "") $form_data['employee_doj'] = $e->employee_doj;
        // array_filter($form_data);  //* Need to Process Form Data, Currently removes Null Values
        return DB::table('emplyees')
                    ->where('id',$e_id)
                    ->update($form_data);
    }


}
