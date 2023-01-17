<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Gudang;
use App\Models\Users;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["users"] = Users::count();
        $data["barangsatuan"] = Gudang::where('jenis_barang', '=', 'UNIT')->get();
        return view('dashboard.index', $data);

    }
    // QrCode::email($to, $subject, $body){

    // };

    // //Fills in the to address
    // QrCode::email('foo@bar.com');

    // //Fills in the to address, subject, and body of an e-mail.
    // QrCode::email('foo@bar.com', 'This is the subject.', 'This is the message body.');

    // //Fills in just the subject and body of an e-mail.
    // QrCode::email(null, 'This is the subject.', 'This is the message body.');


}
