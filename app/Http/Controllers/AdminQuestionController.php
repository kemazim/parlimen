<?php

namespace App\Http\Controllers;
use App\Models\Parlimen;
use App\Models\Question;
use App\Models\YangBerhormat;
use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class AdminQuestionController extends Controller
{ 
    protected $elasticsearch;
    protected $elastica;


//show all question
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
    return view('dashboard.admin.questionList', compact('questions'));
    } 

    public function viewJawapan($id)
    {
        $question = Question::find($id);
        return view('dashboard.admin.viewJawapan', compact('question'));
    }
    
    public function ybList(Request $request)
    {
        
        $search = $request['search'] ?? ""; 
        $ybs = YangBerhormat::all();
        if ($search != "") {
            //where
            $ybs = YangBerhormat::where('nama', 'LIKE', "%$search%")
                ->orWhere('nama_parlimen', 'LIKE', "%$search%")
                ->paginate(5);
        } else {
            $ybs = YangBerhormat::paginate(5);
        }
    return view('dashboard.admin.ybList', compact('ybs'));
    }

    function ybAdd()
    {
        return view('dashboard.admin.ybAdd');
    }
    function ybSave(Request $req)
    {
        $yb = new YangBerhormat;
        $yb->nama = $req->nama;
        $yb->nama_parlimen = $req->nama_parlimen;
        $yb->save();

        return redirect('/admin/ybAdd')->with('status', "Kemaskini Berjaya");
    }


    function ybEdit($id)
    { 
        $yb = YangBerhormat::find($id);
        return view('dashboard.admin.ybEdit', compact('yb'));
    }
 
    function ybUpdateSave(Request $req, $id)
    {
                $yb = YangBerhormat::find($id);
                $yb->nama = $req->nama;
                $yb->nama_parlimen = $req->nama_parlimen;
                $yb->update();
                return redirect('/admin/ybList')->with('status', "Kemaskini berjaya");
        
        }

        public function parlimenList()
        {
            
                $parlimens = Parlimen::paginate(5);
        return view('dashboard.admin.parlimenList', compact('parlimens'));
        }
    
        function parlimenAdd()
        {
            return view('dashboard.admin.parlimenAdd');
        }
        function parlimenSave(Request $req)
        {
            $parlimen = new Parlimen;
            $parlimen->nama = $req->nama;
            $parlimen->save();
    
            return redirect('/admin/parlimenAdd')->with('status', "Kemaskini Berjaya");
        }

    //create question
    function questionCreate(Request $req)
    {

        $parlimen = $this->getParlimen();
        $penggal = $this->getPenggal(); 
        $mesyuarat = $this->getMesyuarat(); 
        $sidang = $this->getSidang(); 
        $yangBerhormat = $this->getYangBerhormat();
        $jenisDewan = $this->getJenisDewan();
        $jenisPertanyaan = $this->getJenisPertanyaan();


        return view('dashboard.admin.questionCreate', [
            'parlimen' => $parlimen,
            'penggal' => $penggal,
            'mesyuarat' => $mesyuarat,
            'sidang' => $sidang,
            'yangBerhormat' =>$yangBerhormat,
            'jenisDewan' =>$jenisDewan,
            'jenisPertanyaan' =>$jenisPertanyaan
        ]);
    }
    function questionSave(Request $req)
    {
        $question = new Question;
        $question->rujukan = $req->rujukan;
        $question->jenis_pertanyaan_id = $req->jenisPertanyaan;
        $question->jenis_dewan_id = $req->jenisDewan;
        $question->soalan = $req->soalan;
        $question->yang_berhormat_id = $req->yangBerhormat;
        $question->parlimen_id = $req->parlimen;
        $question->sidang_id = $req->sidang;
        $question->penggal_id = $req->penggal;
        $question->mesyuarat_id = $req->mesyuarat;
        $question->tarikh = $req->tarikh;
        $question->status = 1;
        $question->save();

        return redirect('/admin/questionEdit')->with('status', "Soalan telah berjaya ditambah");
    }

    //question and answer edit
    function questionEdit()
    {
        $questions = Question::where('status',1)
        ->orWhere('status', 2)->paginate(4);
        return view('dashboard.admin.questionEdit',compact('questions'));
    }

    public function questionShare($id)
    {
        $question = Question::findOrFail($id);
        $question->status = 2; //Share

        $question->save();
        return redirect('admin/questionList')->with('status', "Soalan diagihkan kepada penyelaras");
        ;
    }

    function questionAddAnswer($id)
    {
        $question = Question::find($id);
        return view('dashboard.admin.questionAddAnswer', compact('question'));
    }

    function questionUpdate($id)
    {
        $question = Question::find($id);
        return view('dashboard.admin.questionUpdate', compact('question'));
    }

    function questionUpdateSave(Request $req, $id)
    {
                $question = Question::find($id);
                $question->rujukan = $req->rujukan;
                $question->soalan = $req->soalan;
                $question->tarikh = $req->tarikh;
                $question->status = 1;
                $question->update();
                return redirect('/admin/questionEdit')->with('status', "Kemaskini soalan berjaya");
        
        }
    
    function questionSaveAnswer(Request $req, $id)
    {
        switch ($req->input('action')) {
            case 'accept':
                $question = Question::find($id);

                if ($req->hasFile('jawapan'))
                {
                    $file = $req->jawapan;
                    $filename = time() . '.' . $file->getClientOriginalExtension();
                    $req->jawapan->move('assets', $filename);
                    $question->jawapan = $filename;
                    $question->status = 0;
                    $question->update();
                }  
                if($req->filled('jawapanTeks'))
                {
                    $question->jawapanTeks = $req->jawapanTeks;
                    $question->status = 0;
                    $question->update();
                }
                
                return redirect('/admin/questionEdit')->with('status', "Jawapan telah berjaya ditambah");
                break;

            case 'share':
                $question = Question::find($id);
                $question->status = 2;
                $question->update();
                return redirect('/admin/questionEdit')->with('status', "Soalan berjaya diagihkan kepada Penyelaras");
                break;
        }
    }


//question answer approval
 
function questionAnswerApproval()
{
    $questions = Question::where('status',0 )->paginate(4);
    return view('dashboard.admin.questionAnswerApproval', compact('questions'));
}
 
  function questionAnswerApprovalID($id)
{
    $question = Question::find($id);
    return view('dashboard.admin.questionAnswerApprovalID', compact('question'));
}
function approveQuestionAnswer(Request $request,$id)
{
    switch ($request->input('action')) {
        case 'accept':

            $question = Question::find($id);
            $question->rujukan = $request->rujukan;
            $question->soalan = $request->soalan;
            $question->jawapanTeks = $request->jawapanTeks;

            $file = $question->jawapan;
                if (!empty($jawapan)) {
                    $path = public_path('assets/');
                    $filename = $path . '/' . $file;
                    $parser = new Parser();
                    $pdf = $parser->parseFile($filename);
                    $text = $pdf->getText();
                    $question->jawapanTeksPDF = $text;
                    $question->status = 3; //Approved
                    $question->save();
                }
                else
                    $question->status = 3; //Approved
                    $question->save();

            return redirect('admin/questionAnswerApproval')->with('status', "Soalan dan jawapan telah diluluskan");
            break;
    
}
}


    //all get method
    
    public function getParlimen()
    {
        $parlimen = \DB::table('parlimen')
            ->get();

        return $parlimen;
    }
    public function getPenggal()
    {
        $penggal = \DB::table('penggal')
            ->get();

        return $penggal;
    }
    public function getMesyuarat()
    {
        $mesyuarat = \DB::table('mesyuarat')
            ->get();

        return $mesyuarat;
    }

    public function getSidang()
    {
        $sidang = \DB::table('sidang')
            ->get();

        return $sidang;
    }

    public function getYangBerhormat()
    {
        $yangBerhormat = \DB::table('yang_berhormat')
            ->get();

        return $yangBerhormat;
    }
    public function getJenisDewan()
    {
        $jenisDewan = \DB::table('jenis_dewan')
            ->get();

        return $jenisDewan;
    }
    public function getJenisPertanyaan()
    {
        $jenisPertanyaan = \DB::table('jenis_pertanyaan')
            ->get();

        return $jenisPertanyaan
        ;
    }


}