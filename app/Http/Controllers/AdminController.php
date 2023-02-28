<?php

namespace App\Http\Controllers;
use App\Models\Gred;
use App\Models\Pejabat;
use App\Notifications\PermohonanDiterima;
use App\Models\User;
use App\Notifications\PermohonanDitolak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    protected $elasticsearch;
    protected $elastica; 
    function index()  
    {
        $question = DB::table('question')
        ->join('mesyuarat', 'question.mesyuarat_id', '=', 'mesyuarat.id')
        ->join('jenis_pertanyaan', 'question.jenis_pertanyaan_id', '=', 'jenis_pertanyaan.id')
        ->join('jenis_dewan', 'question.jenis_dewan_id', '=', 'jenis_dewan.id')
        ->select(DB::raw('count(question.jenis_pertanyaan_id) as total'), 'jenis_pertanyaan.nama_jenis_pertanyaan as jenisPertanyaan', 'question.mesyuarat_id as mesyuarat_id', 'mesyuarat.nama as mesyuarat_nama')
        ->whereYear('question.created_at',2023)
        ->where('question.status', 3)
        ->where('question.parlimen_id', 1)
        ->where('question.penggal_id',1)
        ->where('jenis_dewan.nama_jenis_dewan', 'Dewan Rakyat')
        ->groupBy('question.jenis_pertanyaan_id', 'mesyuarat_id')
        ->orderBy('question.mesyuarat_id', 'asc')
        ->get()
        ->toArray();

            $datasets = array();
            $labels = array();
            $questionTypes = array();
    
            // Ambil semua jenis pertanyaan
            foreach ($question as $q) {
                if(!in_array($q->jenisPertanyaan, $questionTypes)) {
                    array_push($questionTypes, $q->jenisPertanyaan);
    
                    array_push($datasets, array(
                        "label" => $q->jenisPertanyaan,
                        "data" => [],
                        "backgroundColor" => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6),
                        "stack" => $q->jenisPertanyaan,
                    ));
                }
            }

            foreach ($question as $q) {

                $label = "Parlimen-14, Penggal Pertama, ".$q->mesyuarat_nama;
    
                if(!in_array($label, $labels)) {
                    for ($j = 0; $j < count($datasets); $j++) {
                        if(count($datasets[$j]['data']) < count($labels)) {
                            array_push($datasets[$j]['data'], 0);   
                        }
                    }
                    
                array_push($labels, $label);

                }
            $index = array_search($q->jenisPertanyaan, array_column($datasets, 'label'));
                array_push($datasets[$index]['data'], $q->total);      
            }
     
            $data = array(
                "labels" => $labels,
                "datasets" => $datasets,
                "colour" => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6),
            );

        // Chart 2

        $question2 = DB::table('question')
        ->join('mesyuarat', 'question.mesyuarat_id', '=', 'mesyuarat.id')
        ->join('jenis_pertanyaan', 'question.jenis_pertanyaan_id', '=', 'jenis_pertanyaan.id')
        ->join('jenis_dewan', 'question.jenis_dewan_id', '=', 'jenis_dewan.id')
        ->select(DB::raw('count(question.jenis_pertanyaan_id) as total'), 'jenis_pertanyaan.nama_jenis_pertanyaan as jenisPertanyaan', 'question.mesyuarat_id as mesyuarat_id', 'mesyuarat.nama as mesyuarat_nama')
        ->whereYear('question.created_at',2023)
        ->where('question.status', 3)
        ->where('question.parlimen_id', 1)
        ->where('question.penggal_id',1)
        ->where('jenis_dewan.nama_jenis_dewan', 'Dewan Negara')
        ->groupBy('question.jenis_pertanyaan_id', 'mesyuarat_id')
        ->orderBy('question.mesyuarat_id', 'asc')
        ->get()
        ->toArray();

        $datasets2 = array();
        $labels2 = array();
        $questionTypes2 = array();

        // Ambil semua jenis pertanyaan
        foreach ($question2 as $q) {
            if(!in_array($q->jenisPertanyaan, $questionTypes2)) {
                array_push($questionTypes2, $q->jenisPertanyaan);

                array_push($datasets2, array(
                    "label" => $q->jenisPertanyaan,
                    "data" => [],
                    "backgroundColor" => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6),
                    "stack" => $q->jenisPertanyaan,
                ));
            }
        }

        foreach ($question2 as $q) {
            $label = "Parlimen-14, Penggal Pertama, ".$q->mesyuarat_nama;

            if(!in_array($label, $labels2)) {
                for ($j = 0; $j < count($datasets2); $j++) {
                    if(count($datasets2[$j]['data']) < count($labels2)) {
                        array_push($datasets2[$j]['data'], 0);   
                    }
                }
                
            array_push($labels2, $label);

            }

            $index = array_search($q->jenisPertanyaan, array_column($datasets2, 'label'));
            array_push($datasets2[$index]['data'], $q->total);      
        }
        
 
        $data2 = array(
            "labels" => $labels2,
            "datasets" => $datasets2,
            "colour" => '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6),
        );
    
    

        return view('dashboard.admin.dashboard',['chart'=>$data,'chart2'=>$data2] );
    }
    

    function userList(Request $request)
    {

        $search = $request['search'] ?? "";
        $users = Auth::user()->id;
        if ($search != "") {
            //where
            $users = User::where('nama', 'LIKE', "%$search%")
                ->where('status', 1)->paginate(5);
        } else {
            $users = User::where('status', 1)
                ->whereNotIn('id', [$users])
                ->paginate(5);
        }

        return view('dashboard.admin.userList', compact('users'));
    }

    function userApproval(Request $request)
    {

        $search = $request['search'] ?? "";
        if ($search != "") {
            //where
            $users = User::where('nama', 'LIKE', "%$search%")
                ->where('status', 0)
                ->paginate(5);
        } else { 
            $users = User::where('status', 0)
            ->paginate(5);
        }
        return view('dashboard.admin.userApproval', compact('users'));

    }


    function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userApprovalEdit', compact('user'));
    }

    function updateApprovalUser(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'accept':
                $user = User::findOrFail($id);
                $user->status = 1; //Approved
                $user->peranan = $request->input('peranan');
                $user->update();
                Notification::send($user, new PermohonanDiterima);
                return redirect('admin/userApproval')->with('status', "Pengguna telah diterima");
                break;

            case 'reject':
                $user = User::findOrFail($id);
                $user->status = 2; //Declined
                $user->update();
                Notification::send($user, new PermohonanDitolak);
                return redirect('admin/userApproval')->with('status', "Pengguna telah ditolak");
                break;
        }
    }

    function editUser($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userListEdit', compact('user'));
    }
 
    function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->nomborKadPengenalan = $request->input('nomborKadPengenalan');
        $user->nama = $request->input('nama');
        $user->email = $request->input('email');
        $user->nomborTelefonBimbit = $request->input('nomborTelefonBimbit');
        $user->peranan = $request->input('peranan');
        $user->update();
        return redirect('/admin/userList')->with('status', "Kemaskini berjaya");
    }
    function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/userList')->with('status', "Pengguna telah dihapuskan");
    }

}