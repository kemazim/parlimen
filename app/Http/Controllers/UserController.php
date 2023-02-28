<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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
    


    return view('dashboard.user.dashboard',['chart'=>$data,'chart2'=>$data2] );
    }

    

    function profile() {

        return view('dashboard.user.profile');
    } 

    function editProfile(Request $request,$id) {
        $user = User::find($id);
        return view('dashboard.user.editProfile', compact('user'));
    }
    function updateProfile(Request $request,$id) {
        $user = User::find($id); 
        $user->nama= $request->input('nama');
        $user->nomborTelefonBimbit= $request->input('nomborTelefonBimbit');
        $user->update();
        return redirect('/user/profile')->with('status',"Kemaskini berjaya");
    }

        function questionList(Request $request)
        {
            $search = $request['search'] ?? "";
            $questions = Question::where('status', 3);
            if ($search != "") {
                //where
                $questions = Question::where('jawapanTeksPDF', 'LIKE', "%$search%")
                    ->orWhere('jawapanTeks', 'LIKE', "%$search%")
                    ->orWhere('soalan', 'LIKE', "%$search%")
                    ->where('status', 3)
                    ->paginate(5);
            } else {
                $questions = Question::where('status', 3)->paginate(5);
            }
            return view('dashboard.user.questionList', compact('questions'));
        }
    
 
    public function viewJawapan($id)
    {
        $question = Question::find($id);

        return view('dashboard.user.viewJawapan', compact('question'));


    }


}
