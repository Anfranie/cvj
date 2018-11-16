<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\User;

class LessonController extends Controller
{
    public function _construct(){
        $this->middleware('auth');
    }

    public function newLesson(){

        $lesson = new Lesson;
        $lesson->user_id = 2;
        $lesson->title = 'Laravel Notification';
        $lesson->body = 'This is lesson we learn about notification';
        $lesson->save();
        $user = User::where('id', '!=', 2)->get();

        if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
            return back();
        }
    
    }

    public function notification(){
        return auth()->user()->unreadNotifications;
    }

    public function markAsRead(Request $r){
        auth()->user()->unreadNotifications->find($r->not_id)->markAsRead();
    }

    public function readLesson($Lesson_id){
        $lesson = Lesson::find([$lesson_id]);
        return view('lesson', compact('lesson'));
    }

    public function allMarkAsRead(){
        auth()->user()->unreadNotifications->markAsRead();
    }
    
    public function readAllLesson(){
        $lessons = auth()->user()->readNotifications;
        return view('allLesson',compact('lessons'));
    }
    /** 
    *public function markAsRead(){
    *    auth()->user()->unreadNotifications->markAsRead();
    *    $lessons = auth()->user()->unreadNotifications->take(5)->sortBy('created_at');
    *    return view('lesson',compact('lessons'));
    *}
    *
    *public function readNotificationById($not_id,$Lesson_id){
    *    auth()->user()->unreadNotifications->find($not_id)->markAsRead();
    *    $lesson = Lesson::find($lesson_id);
    *    dump($lesson);
    *}
    *
    *public function showLesson(){
    *    auth()->user()->unreadNotifications->markAsRead();
    *    return auth()->user()->readNotifications;
    *}
    */
}
