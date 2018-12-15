<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Topic;


class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         $topics= Topic::all();
        //return response()->json($data);
        return view('topic.index',['topics'=>$topics]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('topic.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'first_lang_major_name'=>'required',
            'second_lang_major_name'=>'required',
            'first_lang_desc'=>'required',
            'second_lang_desc'=> 'required',

        ]);
        Topic::create($request->all());

        return redirect()->route('topics.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $topic_id
     * @return \Illuminate\Http\Response
     */
    public function edit($topic_id)
    {
        $topic=Topic::find($topic_id);
        return view('topic.edit',['topic'=>$topic]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $topic_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $topic_id)
    {
        $this->validate($request,[
            'first_lang_major_name'=>'required',
            'second_lang_major_name'=>'required',
            'first_lang_desc'=>'required',
            'second_lang_desc'=> 'required',

        ]);
        $topic=Topic::find($topic_id);

        $topic->update($request->all());

        return redirect()->route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $topic_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($topic_id)
    {

        Topic::find($topic_id)->delete();
        return redirect()->route('topics.index')->with('success', 'topic has been deleted!!');

    }
}
