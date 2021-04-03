<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Applicant; use App\Models\User; use App\Models\Property;
use Illuminate\Support\Facades\DB;
class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Loan = Loan::all();
        return view('LoanGrid')->with(['Loan'=>$Loan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/AddLoan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'LoanScheme' => 'required' ,'Institution' => 'required',
            'ROI' => 'required','Duration' => 'required']);
        $Loan = new Loan;
        $Loan->UserId = Session::get('User');
        $Loan->LoanScheme = $request->input('LoanScheme');      
        $Loan->Institution = $request->input('Institution'); 
        $Loan->ROI = $request->input('ROI'); $Loan->Duration = $request->input('Duration');
            $Loan->save(); return redirect()->route('Financer.index');
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Applicant = DB::table('users')->join('applicants','users.id','=','applicants.id')->where('LoanID',$id)->select('users.*','applicants.LoanId')->get();
       $Loan = Loan::find($id);
       return view('ApplicantGrid')->with(['Applicant'=>$Applicant,'Loan'=>$Loan->LoanScheme]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Loan=Loan::find($id);
        return view('EditLoan')->with('Loan',$Loan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $Loan=Loan::find($id);
      $request->validate([ 'LoanScheme' => 'required' ,'Institution' => 'required',
        'ROI' => 'required','Duration' => 'required']);
      $Loan->UserId = Session::get('User');
        $Loan->LoanScheme = $request->input('LoanScheme');      
        $Loan->Institution = $request->input('Institution'); 
        $Loan->ROI = $request->input('ROI'); $Loan->Duration = $request->input('Duration');
        $Loan->save(); return redirect()->route('Loans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Loan=Loan::find($id)->delete();
        return redirect()->route('Loans.index');
    }
   
}
