<?php

namespace App\Http\Controllers\dts\auth;

use App\Http\Controllers\Controller;
use App\Models\CustomModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use PDF;

class AuthController extends Controller
{
    public function index()
    {
        return view('dts.auth.login');
    }

    public function register()
    {

        $data['barangay'] = config('app.barangay');
        $data['offices'] = CustomModel::q_get('offices')->get();
        return view('dts.auth.register')->with($data);
    }

    public function register_user(Request $request)
    {

        // print_r($request->all());
        $now = new \DateTime();
        $now->setTimezone(new \DateTimezone('Asia/Manila'));
        $items = array(
            'first_name'        => $request->input('first_name'),
            'last_name'         => $request->input('last_name'),
            'middle_name'       => $request->input('middle_name'),
            'extension'         => $request->input('extension'),
            'address'           => $request->input('address'),
            'contact_number'    => $request->input('contact_number'),
            'email_address'     => $request->input('email'),
            'username'          => $request->input('user_name'),
            'password'          => password_hash($request->input('password'), PASSWORD_DEFAULT), 
            'off_id'            => $request->input('office'),
            'user_created'      =>  Carbon::now()->format('Y-m-d H:i:s') ,
            'user_status'       => 'inactive',
            'work_status'       => NULL,
            'user_type'         => 'user',
            'is_receiver'       => 'no'

            
        );


        if ($request->input('password') == $request->input('confirm_password')) {

            $check = CustomModel::q_get_where('users', array('username' => $items['username']))->count();
            if ($check) {
                $data = array('message' => 'Username is Taken', 'response' => false);
            } else {
                if (strlen($items['password']) >= 5) {
                    $add = CustomModel::insert_item('users', $items);
                    if ($add) {
                        $data = array('message' => 'Registered Successfully', 'response' => true);
                    } else {
                        $data = array('message' => 'Something Wrong', 'response' => false);
                    }
                } else {
                    $data = array('message' => 'Password is too short', 'response' => false);
                }
            }
        } else {
            $data = array('message' => "Password don't match", 'response' => false);
        }
        return response()->json($data);
    }

    public function verify_user(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');

        $user = CustomModel::q_get_where('users', array('username' => $username));

        if ($user->count() > 0) {

            $check = password_verify($password, $user->get()[0]->password);

            if ($check) {



                $request->session()->put(
                    array(
                        'name' => $user->get()[0]->first_name,
                        '_id' => $user->get()[0]->user_id,
                        'isLoggedIn' => true,
                        'user_type' => $user->get()[0]->user_type,
                        'is_receiver' => $user->get()[0]->is_receiver
                    )
                );

                return response()->json(['message' => 'Success.', 'response' => true]);


            } else {
                return response()->json(['message' => 'invalid Password.', 'response' => false]);

            }


        } else {

            return response()->json(['message' => 'invalid Username.', 'response' => false]);
        }

    }
    public function dts_logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/dts');
    }



    public function print(){
        
       
// PDF::AddPage('P',array(215.9,200));


PDF::AddPage('P','A4');



PDF::SetMargins(10, 20, 10, true);

// ---------------------------------------------------------

// set font
PDF::SetFont('helvetica', 'B', 20);


// PDF::Write(20, 'OCM-CPESD DTS', '', 0, 'C', true, 0, false, false, 0);


PDF::SetFont('helvetica', '', 9);


// -----------------------------------------------------------------------------



$hey = 'sad';

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")



$tbl = '

<style>


</style>
<div align="right" style="margin: 10px; ">
<img  src="../assets/img/oroquieta_logo-300x300.png" width="50" height="50" >&nbsp;
<img  src="../assets/img/peso_logo.png" width="50" height="50">
<img  src="../assets/img/Bagong_Pilipinas_logo.png" width="60" height="50">
</div>
<br>


<table border="1" >
<tr >
  <th colspan="4" style="text-align:center;font-size: 18px;font-family: "Times New Roman", Times, serif; font-weight: bold;">OCM-CPESD DTS</th>
 </tr>
 <tr nobr="true">
  <th colspan="4" style="text-align:center;font-size: 15px;font-family: "Times New Roman", Times, serif; font-weight: bold;">Routing Slip</th>
 </tr>
 <tr>
				<th colspan="4" style="text-align:center; font-family: "Times New Roman", Times, serif; font-style: italic;font-size:8px;">Impt:All Simple transactions must be acted within 48 hours only</th>

			</tr>
 <tr  >
  <td colspan="3" height="40">
    
    <label style="font-size:10px;">Document Name : </label><span style="text-decoration: underline;">Letter</span><br>
    <label style="font-size:10px;">Document No : </label><span style="text-decoration: underline;">'.$hey.'</span><br>
    <label style="font-size:10px;">Document Type : </label>________________________<label style="font-size:10px;">Date Received : </label>________________________<br>
  </td>
  
  <td colspan="1" height="40">
  <br>
  <label style="font-size:10px;">Encoded By : </label><br>&nbsp; ________________________

 
</td>

 </tr>

 
 <tr nobr="true"  >
 
  <td colspan="4" height="20"  >
    <label>Brief Description</label> : ________________________________________________________
    
  </td>

 </tr>

 <tr nobr="true"  >
 
  <td colspan="4" height="230">
    <h2 align="center">Action Taken</h2>
    
  </td>

 </tr>

</table>
<br>
<hr>


';




// $style = array('width' => 0.5, 'dash' => '2,2,2,2', 'phase' => 0, 'color' => array(255, 0, 0));

// PDF::Line(5, 20, 200, 20, $style);
PDF::writeHTML($tbl, true, false, true, false, '');



PDF::Output('example_048.pdf', 'I');
// -----------------------------------------------------------------------------

//Close and output PDF documentPDF::Output('example_048.pdf', 'I');
    }
}
