<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\book;
use App\Models\User;
use App\Models\Train;
use App\Models\Admin;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class RailwayController extends Controller
{
    public function generatePDF($id)
    {
        $traindata=DB::select("SELECT books.price ,books.ticket_id,trains.name as train_name,s1.name as from_s,s2.name as to_s ,trains.depart_time from (books NATURAL JOIN users) ,trains,station as s1,station as s2 WHERE trains.train_id=books.train_id and users.user_id=? and books.ticket_id=? and s1.station_id=trains.depart_stationid and s2.station_id=trains.arrive_stationid and books.cancelled=0",[session('user_id'),$id]);
        $userdata=DB::select("SELECT * from users WHERE users.user_id=?",[session('user_id')]);
        $data = [
          'title' => 'Train Details',
          'username' => $userdata[0]->name,
          'email' => $userdata[0]->email,
          'trainname' =>$traindata[0]->train_name,
          'from'=> $traindata[0]->from_s,
          'to'=> $traindata[0]->to_s,
          'departtime' => $traindata[0]->depart_time,
          'price'=>$traindata[0]->price
            ];
        
        $pdf = FacadePdf::loadView('generate_pdf', $data);
  
        return $pdf->download('Ticket.pdf');
    }

    public function generatecomplaintPDF($id)
    {
        $complaintdata=DB::select("select * from complaint where complaint_id=?",[$id]);
        
        $data = [
          'title' => 'Complaint Details',
          'username' => session('name'),
          'email' => session('email'),
          'complaint_id' =>$complaintdata[0]->complaint_id,
          'description'=> $complaintdata[0]->description,
          'tel'=> $complaintdata[0]->tel,
            ];
        
        $pdf = FacadePdf::loadView('generate_complaintpdf', $data);
  
        return $pdf->download('Complaint.pdf');
    }

    public function cancelticket($id)
    {
        DB::update('update books set cancelled=1 where ticket_id=?',[$id]);
        return redirect('/userdashboard');
    }
    
    public function bookticket($id)
    {
        $book=new book;
        $book->train_id=$id;
        $train_data=DB::select("select price from trains where train_id=?",[$id]);
        $book->user_id=session('user_id');
        if(session('way')=="two")
            $book->price=($train_data[0]->price)*2;
        else 
            $book->price=$train_data[0]->price;
        $book->cancelled=0;
        $book->save();
        Session::put('way',"");
        return redirect('/userdashboard');
    }


    public function deleteacc($id)
    {
        DB::delete("delete from users where user_id=?",[$id]);
        session::forget('user_id');
        return redirect('/signup');
    }
    public function complaint()
    {
        $username=request('data');
        if(strlen($username)>0)
        {
            $data = DB::select("select complaint.complaint_id,complaint.description,complaint.tel from complaint natural join users where users.name=?",[$username]);
            return response($data);
        } 
    }
    public function cancelled()
    {
        $username=request('data');
        if(strlen($username)>0)
        {
            $data = DB::select("SELECT trains.name as train_name,s1.name as from_s,s2.name as to_s ,trains.depart_time from (books NATURAL JOIN users) ,trains,station as s1,station as s2 WHERE trains.train_id=books.train_id and users.name=? and books.cancelled=1 and s1.station_id=trains.depart_stationid and s2.station_id=trains.arrive_stationid",[$username]);
            return response($data);
        }
    }
    public function booking()
    {
        $username=request('data');
        if(strlen($username)>0)
        {
            $data = DB::select("SELECT books.ticket_id,trains.name as train_name,s1.name as from_s,s2.name as to_s ,trains.depart_time from (books NATURAL JOIN users) ,trains,station as s1,station as s2 WHERE trains.train_id=books.train_id and users.name=? and s1.station_id=trains.depart_stationid and s2.station_id=trains.arrive_stationid and books.cancelled=0",[$username]);
            return response($data);
        }
    }

    public function createuser(Request $request)
    {
        $fname= $request->input('firstName');
        $lname=$request->input('lastName');

        $name=$fname." ".$lname;
        $email=$request->input('email');
        $pass=$request->input('password');
        DB::insert("insert into users (name,email,pass) values(?,?,?)",[$name,$email,$pass]);
        $data = DB::select('select * from users where email=? and pass=?',[$email,$pass]);
        Session::put('user_id',$data[0]->user_id);
        Session::put('name',$data[0]->name);
        Session::put('email',$email);
        return redirect('/userdashboard');
    }

    public function update(Request $request)
    {
        $name= $request->input('f_name');
        $email=$request->input('email');
        $curr_email=$request->input('curr_email');
        $pass=$request->input('password');
        $oldpass=$request->input('oldpassword');
        if($pass!="")
        {
            $find_data=DB::select("select * from users where user_id=? and pass=?",[session("user_id"),$oldpass]);
            if(count($find_data)>0)
            {
                DB::update("update users set name=?, email=?,pass=? where email=?",[$name,$email,$pass,$curr_email]);
                return view('userdashboard');
            }
            else
            {
                return back('userdashboard')->withErrors(['Wrong password', 'Wrong  password']);
            }
        }
        else
        {
            DB::update("update users set name=?, email=? where user_id=?",[$name,$email,session('user_id')]);
            Session::put('name',$name);
            Session::put('email',$email);
            return view('userdashboard');
        }
        
        return redirect('/userdashboard');
    }
    public function find_train(Request $request)
    {
        $from=$request->input('from');
        $to=$request->input('to');
        $way=$request->input('trip_type');
        $way=$request->input('no of tickets');
        Session::put('way',$way);
        $data = DB::select("select * from ( select trains.price,no of tickets,trains.train_id,trains.name as train_name,s1.name as depart_station ,s2.name as arrive_station ,trains.depart_time,trains.arrive_time from trains,station as s1,station as s2 where (s1.station_id=trains.depart_stationid and trains.arrive_stationid=s2.station_id )) as A where depart_station=? and arrive_station=? ",[$from,$to]);
        if($way=="two")
            foreach($data as $d)
            {
                $d->price=$d->price*2;
            }
        return view('booking',['data'=>$data]);
    }
    public function login(Request $request)
    {
        $email=$request->input('email');
        $pass=$request->input('password');
        $data = DB::select('select * from users where email=? and pass=?',[$email,$pass]);
        if(count($data)>0){
            Session::put('user_id',$data[0]->user_id);
            Session::put('name',$data[0]->name);
            Session::put('email',$email);
            return redirect('/userdashboard');
        }

        else
            return back('Home')->withErrors(['Wrong Username or password', 'Wrong Username or password']);
        
    }
    public function feedback(Request $request)
    {
        $fname=$request->input('f_name');
        $lname=$request->input('l_name');
        $name=$fname." ".$lname;
        $tel=$request->input('tel');
        $description=$request->input('description');
        $data = DB::select("select user_id from users where name=?",[$name]);
        if(count($data)>0)        
        {   
            DB::insert("insert into complaint (description,tel,user_id) values(?,?,?)",[$description,$tel,$data[0]->user_id]);
            return view('contact_us')->with('success', 'Complaint Successfully filed');
        }
        else
        {
            
            return view('contact_us')->with('fail', 'Please Signup before filing complaint : Name doesnot Exist!');
        }

    }

    //// USER'S SECTION//////////////////
    function addNewUser(Request $req) {
        $user = new User();
        $user->name = $req->first_name;
        $user->email = $req->email;
        $user->pass = $req->password;
        $user->save();
        return redirect("/users");
    }

    function getUserDetails() {
        $userData = User::where('user_id', '>=', 1)->get();
        return view('admin/users', ['userInfo' => $userData]);
    }


    function deleteUserDetails($id) {
        // User::destroy($id);
        DB::delete("delete from users where user_id=?", [$id]);
        return redirect("/users");
    }

    function editUserDetails(Request $req, $id) {
        $name = $req->f_name;
        $email = $req->email;
        $password = $req->password;
        
        DB::update('UPDATE users SET name = ?, email = ?, pass = ? WHERE user_id = ?',
         [$name, $email, $password, $id]);
        
        return redirect("/users");
    }

    function registerAdmin(Request $req) {
        $first_name = $req->f_name;
        $last_name = $req->l_name;
        $email = $req->email;
        $password = $req->password;
        $data = array('name' => $first_name . ' ' . $last_name, 'email' => $email, 'password' => $password);
        DB::table('admin')->insert($data);
        $req->session()->put('admin_id', $data);
        return redirect('/admin/index');
    }

    function adminLogin(Request $req) {
        $adminData = DB::table('admin')->where('email', '=', $req->email)->first();
        if($adminData == NULL) {
            return redirect("/admin/login");
        }
        if($adminData->email == $req->email && $adminData->password == $req->pwd) {
            $req->session()->put('admin_id', $adminData->admin_id);
            return redirect("/admin/index");
        } 
    }


    //// TRAIN'S SECTION//////////////////
    function addNewTrain(Request $req) {
        $train = new Train();
        $train->name = $req->train_name;
        $train->train_number = $req->number;
        $train->num_of_seats = $req->seats;
        $train->description = $req->description;
        $train->type = $req->type;
        $train->depart_stationid = $req->depart_stationid;
        $train->arrive_stationid = $req->arrive_stationid;
        $train->depart_time = $req->depart_time;
        $train->arrive_time = $req->arrive_time;
        $train->price = $req->price;
        $train->save();
        return redirect("/trains");
    }

    function getTrainsDetails() {
        $trainsData = Train::where('train_id', '>=', 1)->get();
        return view('admin/trains', ['trainInfo' => $trainsData]);
    }

    function deleteTrainDetails($id) {
        DB::delete("delete from trains where train_id=?", [$id]);
        return redirect("/trains");
    }

    function editTrainDetails(Request $req, $id) {
        $name = $req->name;
        $train_num = $req->train_num;
        $num_of_seats = $req->seats;
        
        DB::update('UPDATE trains SET name = ?, train_number = ?, num_of_seats = ? WHERE train_id = ?',
         [$name, $train_num, $num_of_seats, $id]);
        
        return redirect("/trains");
    }

    //// STATION'S SECTION//////////////////

    function addNewStation(Request $req) {
        $name = $req->name;
        $description = $req->description;
        $type = $req->type;
        DB::insert("insert into station (name,description,type) values(?,?,?)", [$name, $description, $type]);
        return redirect("/stations");
    }

    function getStationsDetails() {
        $stationsData = DB::table('station')
        ->where('station_id', '>=', 1)
        ->select('station.*')
        ->get();
        return view('admin/stations', ['stationInfo' => $stationsData]);
    }

    function deleteStationDetails($id) {
        DB::delete("delete from station where station_id=?", [$id]);
        return redirect("/stations");
    }

    function editStationDetails(Request $req, $id) {
        $name = $req->name;
        $type = $req->type;
        
        DB::update('UPDATE station SET name = ?, type = ? WHERE station_id = ?',
         [$name, $type, $id]);
        
        return redirect("/stations");
    }
}


