<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //

    public function store(Request $request, Exam $exam)
    {

//        if ($exam->questions->sum('mark') + $request->mark <= $exam->final_mark) {
            if ($request->q_type == "true_or_false") {
                $options = array('0' => 'خطأ', '1' => 'صح');
                $question = Question::create([
                    'exam_id' => $exam->id,
                    'q_type' => 1,
                    'question' => $request->question,
                    'answers' => $request->answer,
                    'mark' => (int)$request->mark ?? 1,
                    'options' => json_encode($options),
                ]);
                return back()->with('success', 'تم اضافة السؤال بنجاح');
            } elseif ($request->q_type == "mcq") {
                $question = Question::create([
                    'exam_id' => $exam->id,
                    'q_type' => 0,
                    'question' => $request->question,
                    'answers' => $request->options[(int)$request->answer],
                    'mark' => (int)$request->mark ?? 1,
                    'options' => json_encode($request->options),
                ]);
                return back()->with('success', 'تم اضافة السؤال بنجاح');
            }
//        } else {
//            return back()->with('failed', 'يوجد خطأ في حساب العلاملات');
//        }
        abort(404);
    }

    public function update(Request $request, Question $question)
    {
        if ($question->exam->questions->sum('mark') + $request->mark - $question->mark <= $question->exam->final_mark) {

            if ($question->q_type == 1) {
                $options = array('0' => 'خطأ', '1' => 'صح');
                $question->update([
                    'question' => $request->question,
                    'answers' => $request->answer,
                    'mark' => (int)$request->mark ?? 1,
                    'options' => json_encode($options),
                ]);
                return back()->with('success', 'تم تحديث السؤال بنجاح');
            } elseif ($question->q_type == 0) {

                $question->update([
                    'question' => $request->question,
                    'answers' => $request->options[(int)$request->answer],
                    'mark' => (int)$request->mark ?? 1,
                    'options' => json_encode($request->options),
                ]);
                return back()->with('success', 'تم تحديث السؤال بنجاح');
            }
        } else {
            return back()->with('failed', 'يوجد خطأ في حساب العلاملات');

        }
        abort(404);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return back()->with('failed', 'تم حذف السؤال بنجاح');
    }
}
