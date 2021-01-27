<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            
            // 'QN_YEAR' => ['label'=>'ปีปฏิทินที่สถาบันจัดส่งข้อมูล'],
            // 'CITIZEN_ID' => ['label'=>'รหัสประจำตัวประชาชน','excelFormat' => '0'],
            // 'UNIV_ID' => ['label'=>'รหัสสถานศึกษา','excelFormat' => '0'],
            // 'STD_ID' => ['label'=>'รหัสประจำตัวนักศึกษา','excelFormat' => '0'],
            // 'QN_WORK_STATUS' => ['label'=>'รหัสสถานภาพของการทำ'],
            // 'QN_MILITARY_STATUS' => ['label'=>'รหัสสถานะการเกณฑ์ทหาร'],
            // 'QN_ORDINATE_STATUS' => ['label'=>'รหัสสถานะการเป็นนักบวช'],
            // 'QN_OCCUP_TYPE' => ['label'=>'รหัสประเภทงานที่ทำ'],
            // 'QN_OCCUP_TYPE_TEXT' => ['label'=>'ระบุประเภทงานเพิ่มเติม'],
            // 'QN_TALENT' => ['label'=>'รหัสความสามารถพิเศษ'],
            // 'QN_TALENT_TXT' => ['label'=>'ความสามารถพิเศษ'],
            // 'QN_POS_ID' => ['label'=>'ตำแหน่งงาน'],
            // 'QN_WORK_NAME' => ['label'=>'ชื่อหน่วยงาน'],
            // 'QN_WORKTYPE_ID' => ['label'=>'รหัสประเภทกิจการ'],
            // 'QN_WORK_ADD' => ['label'=>'เลขที่ตั้งของหน่วยงาน'],
            // 'QN_WORK_MOO' => ['label'=>'หมู่ที่ตั้งของหน่วยงานที่บัณฑิตทำงานอยู่'],
            // 'QN_WORK_BUILDING' => ['label'=>'ชื่ออาคาร ชั้น'],
            // 'QN_WORK_SOI' => ['label'=>'ซอย'],
            // 'QN_WORK_STREET' => ['label'=>'ถนน'],
            // 'QN_WORK_TAMBON' => ['label'=>'รหัสตำบล/แขวง'],
            // 'QN_WORK_NATION' => ['label'=>'รหัสประเทศที่ทำงาน'],
            // 'QN_WORK_ZIPCODE' => ['label'=>'รหัสไปรษณีย'],
            // 'QN_WORK_TEL' => ['label'=>'หมายเลขโทรศัพท์ของหน่วยงานที่บัณฑิตทำงานอยู่'],
            // 'QN_WORK_FAX' => ['label'=>'หมายเลขโทรสาร'],
            // 'QN_WORK_EMAIL' => ['label'=>'อีเมล'],
            // 'QN_SALARY' => ['label'=>'รายได้เฉลี่ยต่อเดือน'],
            // 'QN_WORK_SATISFY' => ['label'=>'รหัสความพอใจต่องานที่ทำ'],
            // 'QN_WORK_SATISFY_TXT' => ['label'=>'ความพอใจต่องานที่ทำ'],
            // 'QN_TIME_FINDWORK' => ['label'=>'รหัสระยะเวลาการหางานทำของบัณฑิต'],
            // 'QN_MATCH_EDU' => ['label'=>'รหัสงานที่ทำตรงกับที่สำเร็จ'],
            // 'QN_APPLY_EDU' => ['label'=>'รหัสการนำความรู้ที่เรียนมาประยุกต์ใช้กับการทำงาน'],
            // 'QN_CAUSE_NOWORK' => ['label'=>'รหัสเหตุผลที่ยังไม่ทำงาน'],
            // 'QN_CAUSE_NOWORK_TXT' => ['label'=>'เหตุผลที่ยังไม่ทำงาน'],
            // 'QN_PROB_FINDWORK' => ['label'=>'รหัสปัญหาในการหางานทำ'],
            // 'QN_PROB_FINDWORK_TXT' => ['label'=>'ปัญหาในการหางานทำ'],
            // 'QN_WORKNEED_ID' => ['label'=>'รหัสความต้องการทำงาน'],
            // 'QN_WORKNEED_NATION' => ['label'=>'รหัสประเทศที่ต้องการทำงาน'],
            // 'QN_WORKNEED_POSITION' => ['label'=>'ตำแหน่งที่ต้องการทำงาน'],
            // 'QN_SKILL_DEVELOPMENT' => ['label'=>'ความต้องการพัฒนาทักษะ'],
            // 'QN_DISCLOSURE_AGREEMENT_ID' => ['label'=>'รหัสแสดงความประสงค์ในการเปิดเผยข้อมูลแก่นายจ้าง'],
            // 'QN_REQUIRE_EDU' => ['label'=>'รหัสความต้องการศึกษาต่อของบัณฑิต'],
            // 'QN_LEVEL_EDU' => ['label'=>'รหัสระดับการศึกษาที่ต้องการศึกษาต่อ'],
            // 'QN_PROGRAM_EDU' => ['label'=>'รหัสสาขาที่ต้องการศึกษาต่อ'],
            // 'QN_PROGRAM_EDU_ID' => ['label'=>'รหัสสาขาที่ต้องการศึกษาต่อ'],
            // 'QN_TYPE_UNIV' => ['label'=>'รหัสประเภทสถาบันกำลังศึกษาต่อ'],
            // 'QN_CAUSE_EDU' => ['label'=>'รหัสเหตุผลที่กำลังศึกษาต่อ'],
            // 'QN_CAUSE_EDU_TXT' => ['label'=>'เหตุผลที่กำลังศึกษาต่อ'],
            // 'QN_PROB_EDU' => ['label'=>'รหัสปัญหาในการศึกษาต่อ'],
            // 'QN_PROB_EDU_TXT' => ['label'=>'ปัญหาในการศึกษาต่อ'],
            // 'QN_ADDPROGRAM 1' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาอังกฤษ'],
            // 'QN_ADDPROGRAM 2' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านคอมพิวเตอร'],
            // 'QN_ADDPROGRAM 3' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านบัญช'],
            // 'QN_ADDPROGRAM 4' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านการใช้อินเทอร์เน็ต'],
            // 'QN_ADDPROGRAM 5' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านการฝึกปฏิบัติงานจริง'],
            // 'QN_ADDPROGRAM 6' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านเทคนิคการวิจัย'],
            // 'QN_ADDPROGRAM 7' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านอื่นๆ'],
            // 'QN_ADDPROGRAM 8' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาจีน'],
            // 'QN_ADDPROGRAM 9' => ['label'=>'รหัสแสดงความเห็นเรื่องควรเพิ่มเติมความรู้ด้านภาษาในอาเซียน'],
            // 'QN_ADDPROGRAM7_TXT' => ['label'=>'ความเห็นเรื่องควรเพิ่มเติมความรู้ด้านอื่นๆที่ระบุข้อความเพิ่มเติม'],
            // 'QN_COMMENT_PROGRAM' => ['label'=>'ข้อเสนอแนะเกี่ยวกับหลักสูตร'],
            // 'QN_COMMENT_LEARN' => ['label'=>'ข้อเสนอแนะเกี่ยวกับการเรียนการสอน'],
            // 'QN_COMMENT_ACTIVITY' => ['label'=>'ข้อเสนอแนะเกี่ยวกับกิจกรรมพัฒนาการศึกษา'],
            // 'QN_DATE_UPDATE' => ['label'=>'วันที่ตอบแบบสอบถาม'],
            
            'QN_YEAR' => ['label'=>'QN_YEAR'],
            'CITIZEN_ID' => ['label'=>'CITIZEN_ID','excelFormat' => '0'],
            'UNIV_ID' => ['label'=>'UNIV_ID','excelFormat' => '0'],
            'STD_ID' => ['label'=>'STD_ID','excelFormat' => '0'],
            'QN_WORK_STATUS' => ['label'=>'QN_WORK_STATUS'],
            'QN_MILITARY_STATUS' => ['label'=>'QN_MILITARY_STATUS'],
            'QN_ORDINATE_STATUS' => ['label'=>'QN_ORDINATE_STATUS'],
            'QN_OCCUP_TYPE' => ['label'=>'QN_OCCUP_TYPE'],
            'QN_OCCUP_TYPE_TEXT' => ['label'=>'QN_OCCUP_TYPE_TEXT'],
            'QN_TALENT' => ['label'=>'QN_TALENT'],
            'QN_TALENT_TXT' => ['label'=>'QN_TALENT_TXT'],
            'QN_POS_ID' => ['label'=>'QN_POS_ID'],
            'QN_WORK_NAME' => ['label'=>'QN_WORK_NAME'],
            'QN_WORKTYPE_ID' => ['label'=>'QN_WORKTYPE_ID'],
            'QN_WORK_ADD' => ['label'=>'QN_WORK_ADD'],
            'QN_WORK_MOO' => ['label'=>'QN_WORK_MOO'],
            'QN_WORK_BUILDING' => ['label'=>'QN_WORK_BUILDING'],
            'QN_WORK_SOI' => ['label'=>'QN_WORK_SOI'],
            'QN_WORK_STREET' => ['label'=>'QN_WORK_STREET'],
            'QN_WORK_TAMBON' => ['label'=>'QN_WORK_TAMBON'],
            'QN_WORK_NATION' => ['label'=>'QN_WORK_NATION'],
            'QN_WORK_ZIPCODE' => ['label'=>'QN_WORK_ZIPCODE'],
            'QN_WORK_TEL' => ['label'=>'QN_WORK_TEL'],
            'QN_WORK_FAX' => ['label'=>'QN_WORK_FAX'],
            'QN_WORK_EMAIL' => ['label'=>'QN_WORK_EMAIL'],
            'QN_SALARY' => ['label'=>'QN_SALARY'],
            'QN_WORK_SATISFY' => ['label'=>'QN_WORK_SATISFY'],
            'QN_WORK_SATISFY_TXT' => ['label'=>'QN_WORK_SATISFY_TXT'],
            'QN_TIME_FINDWORK' => ['label'=>'QN_TIME_FINDWORK'],
            'QN_MATCH_EDU' => ['label'=>'QN_MATCH_EDU'],
            'QN_APPLY_EDU' => ['label'=>'QN_APPLY_EDU'],
            'QN_CAUSE_NOWORK' => ['label'=>'QN_CAUSE_NOWORK'],
            'QN_CAUSE_NOWORK_TXT' => ['label'=>'QN_CAUSE_NOWORK_TXT'],
            'QN_PROB_FINDWORK' => ['label'=>'QN_PROB_FINDWORK'],
            'QN_PROB_FINDWORK_TXT' => ['label'=>'QN_PROB_FINDWORK_TXT'],
            'QN_WORKNEED_ID' => ['label'=>'QN_WORKNEED_ID'],
            'QN_WORKNEED_NATION' => ['label'=>'QN_WORKNEED_NATION'],
            'QN_WORKNEED_POSITION' => ['label'=>'QN_WORKNEED_POSITION'],
            'QN_SKILL_DEVELOPMENT' => ['label'=>'QN_SKILL_DEVELOPMENT'],
            'QN_DISCLOSURE_AGREEMENT_ID' => ['label'=>'QN_DISCLOSURE_AGREEMENT_ID'],
            'QN_REQUIRE_EDU' => ['label'=>'QN_REQUIRE_EDU'],
            'QN_LEVEL_EDU' => ['label'=>'QN_LEVEL_EDU'],
            'QN_PROGRAM_EDU' => ['label'=>'QN_PROGRAM_EDU'],
            'QN_PROGRAM_EDU_ID' => ['label'=>'QN_PROGRAM_EDU_ID'],
            'QN_TYPE_UNIV' => ['label'=>'QN_TYPE_UNIV'],
            'QN_CAUSE_EDU' => ['label'=>'QN_CAUSE_EDU'],
            'QN_CAUSE_EDU_TXT' => ['label'=>'QN_CAUSE_EDU_TXT'],
            'QN_PROB_EDU' => ['label'=>'QN_PROB_EDU'],
            'QN_PROB_EDU_TXT' => ['label'=>'QN_PROB_EDU_TXT'],
            'QN_ADDPROGRAM 1' => ['label'=>'QN_ADDPROGRAM 1'],
            'QN_ADDPROGRAM 2' => ['label'=>'QN_ADDPROGRAM 2'],
            'QN_ADDPROGRAM 3' => ['label'=>'QN_ADDPROGRAM 3'],
            'QN_ADDPROGRAM 4' => ['label'=>'QN_ADDPROGRAM 4'],
            'QN_ADDPROGRAM 5' => ['label'=>'QN_ADDPROGRAM 5'],
            'QN_ADDPROGRAM 6' => ['label'=>'QN_ADDPROGRAM 6'],
            'QN_ADDPROGRAM 7' => ['label'=>'QN_ADDPROGRAM 7'],
            'QN_ADDPROGRAM 8' => ['label'=>'QN_ADDPROGRAM 8'],
            'QN_ADDPROGRAM 9' => ['label'=>'QN_ADDPROGRAM 9'],
            'QN_ADDPROGRAM7_TXT' => ['label'=>'QN_ADDPROGRAM7_TXT'],
            'QN_COMMENT_PROGRAM' => ['label'=>'QN_COMMENT_PROGRAM'],
            'QN_COMMENT_LEARN' => ['label'=>'QN_COMMENT_LEARN'],
            'QN_COMMENT_ACTIVITY' => ['label'=>'QN_COMMENT_ACTIVITY'],
            'QN_DATE_UPDATE' => ['label'=>'QN_DATE_UPDATE'],
        ];
        echo "<pre>";
        echo print_r($columns);

        // $tasks = Task::all();
        // return view('tasks.index', compact('tasks',$tasks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate 
        $request->validate([ 'title' => 'required|min:5', 
                             'description' => 'required'
                            ]);
        $task = Task::create([  'title' => $request->title, 
                                'description' => $request->description
                                ]); 
                                // return redirect('/tasks/'.$task->id); 
                                return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task',$task));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task',$task));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // Validate 
        $request->validate([ 
            'title' => 'required|min:3',
            'description' => 'required' ]);
            
        $task->title = $request->title;
        $task->description = $request->description;
        $task->save();
        $request->session()->flash('message', 'อัพเดทงานสำเร็จ!');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,Task $task)
    {
        $task->delete(); 
        $request->session()->flash('message', 'ลบงานสำเร็จ!'); 
        return redirect('tasks'); 

    }
}
