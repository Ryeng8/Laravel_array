<?php

namespace App\Http\Controllers;

use App\Models\Tanswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TanswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $answers = DB::table('Answer')->get();
        foreach($answers as $answer){
            $id = $answer->AnswerID;
            $data[$id]['QN_YEAR'] =  $answer->AcadYear;
            $data[$id]['CITIZEN_ID'] =  $answer->CitizenID;
            $data[$id]['UNIV_ID'] =  "02700";
            $data[$id]['STD_ID'] =  $answer->StudentCode;

            // $data[$id]['QN_WORK_STATUS'] = "--รหัสสถานภาพของการทำ--";
            // $data[$id]['QN_MILITARY_STATUS'] = "--รหัสสถานะการเกณฑ์ทหาร--";
            // $data[$id]['QN_ORDINATE_STATUS'] = "--รหัสสถานะการเป็นนักบวช--";
            // $data[$id]['QN_OCCUP_TYPE'] = "--รหัสประเภทงานที่ทำ--";
            // $data[$id]['QN_OCCUP_TYPE_TEXT'] = "--ระบุประเภทงานเพิ่มเติม--";
            // $data[$id]['QN_TALENT'] = "--รหัสความสามารถพิเศษ--";
            // $data[$id]['QN_TALENT_TXT'] = "--ความสามารถพิเศษ--";

            $data[$id]['QN_POS_ID'] =  $answer->PosID;
            $data[$id]['QN_WORK_NAME'] =  $answer->WorkplaceDivisionName;

            // $data[$id]['QN_WORKTYPE_ID'] = "--รหัสประเภทกิจการ--";
            
            $data[$id]['QN_WORK_ADD'] =  $answer->WorkplaceAddress;
            $data[$id]['QN_WORK_MOO'] =  $answer->WorkplaceMoo;
            $data[$id]['QN_WORK_BUILDING'] =  $answer->WorkplaceBuilding;
            $data[$id]['QN_WORK_SOI'] =  $answer->WorkplaceFloor;
            $data[$id]['QN_WORK_STREET'] =  $answer->WorkplaceRoad;
            $data[$id]['QN_WORK_TAMBON'] =  $answer->WorkplaceAlley;
            $data[$id]['QN_WORK_NATION'] =  $answer->WorkplaceSubDistrictID;
            $data[$id]['QN_WORK_ZIPCODE'] =  $answer->WorkplaceZipCode;
            $data[$id]['QN_WORK_TEL'] =  $answer->WorkplaceTelephone;
            $data[$id]['QN_WORK_FAX'] =  $answer->WorkplaceFax;
            $data[$id]['QN_WORK_EMAIL'] =  $answer->WorkplaceEmail;
            $data[$id]['QN_SALARY'] =  $answer->Salary;

            // $data[$id]['QN_WORK_SATISFY'] = "--รหัสความพอใจต่องานที่ทำ--";
            // $data[$id]['QN_WORK_SATISFY_TXT'] = "--ความพอใจต่องานที่ทำ--";
            // $data[$id]['QN_TIME_FINDWORK'] = "--รหัสระยะเวลาการหางานทำของบัณฑิต--";
            // $data[$id]['QN_MATCH_EDU'] = "--รหัสงานที่ทำตรงกับที่สำเร็จ--";
            // $data[$id]['QN_APPLY_EDU'] = "--รหัสการนำความรู้ที่เรียนมาประยุกต์ใช้กับการทำงาน--";
            // $data[$id]['QN_CAUSE_NOWORK'] = "--รหัสเหตุผลที่ยังไม่ทำงาน--";
            // $data[$id]['QN_CAUSE_NOWORK_TXT'] = "--เหตุผลที่ยังไม่ทำงาน--";
            // $data[$id]['QN_PROB_FINDWORK'] = "--รหัสปัญหาในการหางานทำ--";
            // $data[$id]['QN_PROB_FINDWORK_TXT'] = "--ปัญหาในการหางานทำ--";
            // $data[$id]['QN_WORKNEED_ID'] = "--รหัสความต้องการทำงาน--";
            // $data[$id]['QN_WORKNEED_NATION'] = "--รหัสประเทศที่ต้องการทำงาน--";
            // $data[$id]['QN_WORKNEED_POSITION'] = "--ตำแหน่งที่ต้องการทำงาน--";
            // $data[$id]['QN_SKILL_DEVELOPMENT'] = "--ความต้องการพัฒนาทักษะ--";
            // $data[$id]['QN_DISCLOSURE_AGREEMENT_ID'] = "--รหัสแสดงความประสงค์ในการเปิดเผยข้อมูลแก่นายจ้าง--";
            // $data[$id]['QN_REQUIRE_EDU'] = "--รหัสความต้องการศึกษาต่อของบัณฑิต--";
            // $data[$id]['QN_LEVEL_EDU'] = "--รหัสระดับการศึกษาที่ต้องการศึกษาต่อ--";
            // $data[$id]['QN_PROGRAM_EDU'] = "--รหัสสาขาที่ต้องการศึกษาต่อ--";

            $data[$id]['QN_PROGRAM_EDU_ID'] =  $answer->ProgramEduID;
            
            // $data[$id]['QN_TYPE_UNIV'] = "--รหัสประเภทสถาบันกำลังศึกษาต่อ--";
            // $data[$id]['QN_CAUSE_EDU'] = "--รหัสเหตุผลที่กำลังศึกษาต่อ--";
            // $data[$id]['QN_CAUSE_EDU_TXT'] = "--เหตุผลที่กำลังศึกษาต่อ--";
            // $data[$id]['QN_PROB_EDU'] = "--รหัสปัญหาในการศึกษาต่อ--";
            // $data[$id]['QN_PROB_EDU_TXT'] = "--ปัญหาในการศึกษาต่อ--";
            // $data[$id]['QN_ADDPROGRAM 1'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาอังกฤษ--";
            // $data[$id]['QN_ADDPROGRAM 2'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านคอมพิวเตอร--";
            // $data[$id]['QN_ADDPROGRAM 3'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านบัญช--";
            // $data[$id]['QN_ADDPROGRAM 4'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านการใช้อินเทอร์เน็ต--";
            // $data[$id]['QN_ADDPROGRAM 5'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านการฝึกปฏิบัติงานจริง--";
            // $data[$id]['QN_ADDPROGRAM 6'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านเทคนิคการวิจัย--";
            // $data[$id]['QN_ADDPROGRAM 7'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านอื่นๆ--";
            // $data[$id]['QN_ADDPROGRAM 8'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาจีน--";
            // $data[$id]['QN_ADDPROGRAM 9'] = "--รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาในอาเซียน--";
            // $data[$id]['QN_ADDPROGRAM7_TXT'] = "--ความเห็นเรื่องควรเพิ่มเติมความรู้ด้านอื่นๆที่ระบุข้อความเพิ่มเติม--";
            // $data[$id]['QN_COMMENT_PROGRAM'] = "--ข้อเสนอแนะเกี่ยวกับหลักสูตร--";
            // $data[$id]['QN_COMMENT_LEARN'] = "--ข้อเสนอแนะเกี่ยวกับการเรียนการสอน--";
            // $data[$id]['QN_COMMENT_ACTIVITY'] = "--ข้อเสนอแนะเกี่ยวกับกิจกรรมพัฒนาการศึกษา--";

            $data[$id]['QN_DATE_UPDATE'] =  $answer->LastDate;
        }

        $answerItems = DB::table('AnswerItem')->get();
        foreach($answerItems as $key => $answerItem){

            $id = $answerItem->AnswerID;
            $questionnaireTitleColumn = $answerItem->QuestionnaireTitleColumn;
            $questionnaireItemKey = $answerItem->QuestionnaireItemKey;
            $answerText = $answerItem->AnswerText;
            // $arr[] = $answerItem->QuestionnaireItemKey;

            // var_dump($questionnaireTitleColumn[$key]);
            // exit();
            

            // if (!empty($value2)) {
            //     $data[$id][$value1] =  $value2;
            //   }

            // if (null!==($value1&&$value2)) {
            //     $data[$id][$value1] =  $value2;
            //   }

            //   else{
            //     echo "Object is empty.";
            //   }


           if($questionnaireTitleColumn == 'QN_OCCUP_TYPE'){
                $data[$id]['QN_OCCUP_TYPE'] = $questionnaireItemKey;
                $data[$id]['QN_OCCUP_TYPE_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_TALENT'){
                $data[$id]['QN_TALENT'] = $questionnaireItemKey;
                $data[$id]['QN_TALENT_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_WORK_SATISFY'){
                $data[$id]['QN_WORK_SATISFY'] = $questionnaireItemKey;
                $data[$id]['QN_WORK_SATISFY_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_PROB_FINDWORK'){
                $data[$id]['QN_PROB_FINDWORK'] = $questionnaireItemKey;
                $data[$id]['QN_PROB_FINDWORK_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_PROB_EDU'){
                $data[$id]['QN_PROB_EDU'] = $questionnaireItemKey;
                $data[$id]['QN_PROB_EDU_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_ADDPROGRAM'){
                $data[$id]['QN_ADDPROGRAM '.$questionnaireItemKey] = 7;
                $data[$id]['QN_ADDPROGRAM_TXT'] = $answerText;
           }
           elseif($questionnaireTitleColumn == 'QN_SALARY'){
                $data[$id]['QN_SALARY'] = $answerText;
           } else {
            $data[$id][$questionnaireTitleColumn] =  $questionnaireItemKey;
           }
            //  $data[$id][$questionnaireTitleColumn] =  $questionnaireItemKey;
           
           

        }
        // foreach ($data[4018]['QN_SALARY'] as  $value) {
        //    echo $value;
        // }
        echo "<pre>";
        echo print_r($data[4018]);


        // return view('Answer.index', ['Answer' => $Answer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tanswer  $tanswer
     * @return \Illuminate\Http\Response
     */
    public function show(Tanswer $tanswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tanswer  $tanswer
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanswer $tanswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tanswer  $tanswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tanswer $tanswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tanswer  $tanswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tanswer $tanswer)
    {
        //
    }
}
