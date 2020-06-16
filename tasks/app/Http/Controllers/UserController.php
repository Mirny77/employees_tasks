<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'desc')->get();
        return response(
            ['timestamp' => time(),
                'data' => $user
            ]
        );

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     {
    //         return view('users.create', ['user'=>[],
    //             'tasks'=>Task::get()]);
    //     }

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
         $user = new User();
//         $user = $objuser->create($request->all());
         $user->name = $request->name;
         if ($request->file('img')){
             $path = Storage::putFile('public', $request->file('img'));
             $url = Storage::url($path);
             $user->img = $url;
         }
         $user->save();

//

         $tasks = explode(",",$request->input('tasks'));
         if($user){
             $Objtask = new Task();
             foreach ($tasks as $task){

                 $Objtask->create([
                     'user_id' => $user->id,
                     'title'=>$task
                 ]);

             }


             return response()->json('ok');
             //УДАЛИТЬ Forenkey

         }

//
//         $user->tasks()->detach();
//
//         if ($request->input('tasks')):
//             $user->tasks()->attach($request->input('tasks'));
//         endif;
//
//
//         return redirect()->route('user.index', $user);

     }


    /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
     public function edit(User $user)
     {
         $tasks = $user->tasks()->get()->toArray();


         $s="";

         foreach ($tasks as $key=>$task){
             if(is_array($task) && isset($task['title'])){
                 $s .=$task['title'].",";

             }
     }
         $user->tasks_list=$s;
         return response()->json($user);


//         $user=User::find($id);
//         if(!$user){
//             return redirect()->route('user.index')->withErrors("Данный пост не существует");
//         }
//         return view('users.edit', compact('user'),['tasks'=>Task::get() ]);
     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
     public function update(Request $request, User $user)
     {
         $tasks = explode(",",$request->input('tasks_list'));
         $user->name = $request->name;


         if($user->update()) {
             $Objtask = new Task();
             $user->tasks()->delete();
             foreach ($tasks as $task) {

                 $Objtask->create([
                     'user_id' => $user->id,
                     'title' => $task
                 ]);

             }
         }


             return response()->json('ok');




//         $user = User::find($id);
//         if(!$user){
//             return redirect()->route('user.index')->withErrors("Данный пост не существует");
//         }
//         $user->name = $request->name;
//         if ($request->file('img')){
//             $path = Storage::putFile('public', $request->file('img'));
//             $url = Storage::url($path);
//             $user->img = $url;
//         }
//         $user->update();
// //        $id = $user->id;
//         $user->tasks()->detach();
//         if($request->input('tasks')):
//             $user->tasks()->attach($request->input('tasks'));
//         endif;
//         return redirect()->route('user.index',$id);
     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
     public function destroy(User $user)
     {

        $user->tasks()->delete();
        $user->delete();
//        return redirect()->route('task.index',$id);
     }
}
