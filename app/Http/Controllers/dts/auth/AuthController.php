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
        
       




// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    PDF::setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
PDF::SetFont('helvetica', 'B', 20);

// add a page
PDF::AddPage();

PDF::Write(20, 'OCM-CPESD DTS', '', 0, 'C', true, 0, false, false, 0);

PDF::SetFont('helvetica', '', 8);


// -----------------------------------------------------------------------------





// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")

$tbl = <<<EOF
<table border="1" >
 <tr nobr="true">
  <th colspan="4" style="text-align:center;font-size: 18px;font-family: 'Times New Roman', Times, serif; font-weight: bold;">Document Routing Slip</th>
 </tr>
 <tr>
				<th colspan="4" style="text-align:center; font-family: 'Times New Roman', Times, serif; font-style: italic;">Impt:All Simple transactions must be acted within 48 hours only</th>

			</tr>
 <tr nobr="true"  >
  <td colspan="2" height="40"   >
  
    <label style="font-size:10px;">Document Name : </label>____________________________________<br>
    <label style="font-size:10px;">Document No : </label>_____________<label style="font-size:10px;">Origin : </label>______________<br>
    <label style="font-size:10px;">Document Type : </label>_____________<label style="font-size:10px;">Date Received : </label>__________<br>
  </td>
  <td colspan="2">
  <label style="font-size:10px;">Encoded By : </label>____________________________________<br>
  <label style="font-size:10px;">Office : </label>_________________________________
 
</td>

 </tr>

 <tr nobr="true"  >
 
  <td colspan="4" height="70">
    <h3 align="center">Description</h3>
    <span align="center"> &nbsp;  sadsad asdsadsa sadsad asdsa sadsadsadsadsadsadsadsa asdsadsadsad asdsad asdsad</p>
  </td>

 </tr>

</table>
EOF;
PDF::writeHTML($tbl, true, false, true, false, '');



PDF::Output('example_048.pdf', 'I');
// -----------------------------------------------------------------------------

//Close and output PDF documentPDF::Output('example_048.pdf', 'I');
    }
}
