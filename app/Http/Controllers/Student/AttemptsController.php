<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Attempt;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class AttemptsController extends Controller
{
    //
    public function attempt(Exam $exam)
    {
        $student = Student::find(auth('student')->id());

        if (Carbon::now()->between($exam->from, $exam->to, true)) {


            $attempt = Attempt::where(['exam_id' => $exam->id,
                'student_id' => $student->id])->orderByDesc('id')->first();
            if (!$attempt) {
                $final_mark = $exam->final_mark;
                $times = 0;
                while ($times < 50) {
                    $order = collect();
                    $marks = 0;
                    foreach ($exam->questions()->inRandomOrder()->get(['id', 'mark']) as $question) {
                        $order->add($question);
                        $marks = $marks + $question->mark;
                        if ($marks == $final_mark) {
                            break;
                        }
                    }
                    if ($marks == $final_mark) {
                        break;
                    }
                    $times++;
                }

                $attempt = Attempt::create([
                    'exam_id' => $exam->id,
                    'student_id' => $student->id,
                    'start' => now(),
                    'finish' => null,
                    'grade' => null,
                    'order_of_questions' => $order->pluck('id')->toJson(),
                ]);

            } elseif ($attempt->finish) {
                return redirect()->route('student.courses.show', $exam->course);
            }


            $questions = collect();
            foreach (json_decode($attempt->order_of_questions) as $index => $question) {
                $questions->add(Question::find($question));
            }

            $questions_side = $questions;
            $questions = $this->paginate($questions, $exam->per_page);


            return view('front.student.courses.exams.attempt', compact('exam', 'questions_side', 'questions', 'student'));
        } elseif (Carbon::now()->greaterThan($exam->to)) {
            $this->finish($exam);
        } elseif (Carbon::now()->lessThan($exam->from)) {
            return redirect()->route('student.courses.show', $exam->course)->with('failed', 'لم يبدا بعد');
        }
        abort('404', 'انتهى الاختبار');
    }

    public static function paginate(Collection $results, $showPerPage)
    {
        $pageNumber = Paginator::resolveCurrentPage('page');

        $totalPageNumber = $results->count();

        return self::paginator($results->forPage($pageNumber, $showPerPage), $totalPageNumber, $showPerPage, $pageNumber, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

    }

    protected static function paginator($items, $total, $perPage, $currentPage, $options)
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }

    public function answer(Request $request, Student $student, Question $question)
    {
        if (Carbon::now()->greaterThan($question->exam->to)) {
            return redirect()->route('student.courses.show', $question->exam->course)->with('failed', 'الوقت انتهى');

        } elseif (Carbon::now()->lessThan($question->exam->from)) {
            return redirect()->route('student.courses.show', $question->exam->course)->with('failed', 'لم يبدا بعد');
        } else {
            $answer = Answer::where('student_id', $student->id)->where('question_id', $question->id)->first();
            if ($answer) {
                $answer->update(['answers' => $request->answers]);
            } else {
                Answer::create([
                    'student_id' => $student->id,
                    'question_id' => $question->id,
                    'answers' => $request->answers,
                ]);
            }
        }
    }

    public function review(Exam $exam)
    {
        if ($exam->review == false || \Carbon\Carbon::now()->lessThan($exam->to)) {
            abort(404);
        }
        $exam = Exam::with(['course', 'questions', 'questions.all_answers' => function ($query) {
            $query->whereStudentId(auth('student')->id());
        }])->whereHas('questions.all_answers', function ($query) {
            $query->whereStudentId(auth('student')->id());
        })->findOrFail($exam->id);
        return view('front.student.courses.exams.review', compact('exam'));
    }

    public function finish(Exam $exam)
    {
        $student = auth('student')->user();
        $attempt = Attempt::where(['exam_id' => $exam->id,
            'student_id' => $student->id])->orderByDesc('id')->first();

        if (now()->lessThanOrEqualTo($attempt->exam->to)) {
            $attempt->update([
                'finish' => now(),
                'grade' => $attempt->grade(),
            ]);
            return redirect()->route('student.courses.show', $exam->course)->with('success', 'تم التسليم بنجاح.');

        } else {
            $attempt->update([
                'finish' => $attempt->exam->to,
                'grade' => $attempt->grade(),
            ]);
            return redirect()->route('student.courses.show', $exam->course)->with('failed', 'تم التسليم بنجاح, انتهى الاختبار.');

        }
    }

}
