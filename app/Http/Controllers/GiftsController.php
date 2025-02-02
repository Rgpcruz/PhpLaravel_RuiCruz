<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class GiftsController extends Controller
{


    public function showAllGifts()
    {
        $allGifts = $this->getGiftsFromDB();

       //dd($allGifts); //usado para debug (dump and die)
         return view('gifts.gifts', compact('allGifts'));


    }

   /* public function getTasksUser(){
        $usersTasks = DB::table('tasks')
        ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        ->get();
    }*/


    protected function getGiftsFromDB() {
        $gifts = DB::table('gifts')
            ->join('users', 'users.id', '=', 'gifts.user_id')
            ->select('gifts.id', 'gifts.gift_name', 'gifts.predicted_value', 'gifts.money_spent', 'users.name as user_name')
            ->get();


        return $gifts;
    }
    /*public function viewGifts($id) {
        $gifts = DB::table('gifts')
            ->join('users', 'users.id', '=', 'gifts.user_id')
            ->select('gifts.*', 'users.name as user_name')
            ->where('gifts.id', $id)
            ->first();

        if (!$gifts) {
            abort(404, 'Gift not found.');
        }

        return view('gifts.view', compact('gifts'));
    }*/
    public function viewGifts($id) {

        $gifts = DB::table('gifts')
            ->join('users', 'users.id', '=', 'gifts.user_id')
            ->select('gifts.*', 'users.name as user_name')
            ->where('gifts.id', $id)
            ->first();

        if (!$gifts) {
            abort(404, 'Gift not found.');
        }

        // Soma dos valores previstos e gastos de todas as prendas de um usuário
        $userGifts = DB::table('gifts')
            ->join('users', 'users.id', '=', 'gifts.user_id')
            ->select(
                DB::raw('SUM(gifts.money_spent) as total_money_spent'),
                DB::raw('SUM(gifts.predicted_value) as total_predicted_value'),
                DB::raw('SUM(gifts.money_spent) - SUM(gifts.predicted_value) as saldo_atual')
            )
            ->where('gifts.user_id', $gifts->user_id)
            ->first();

        return view('gifts.view', compact('gifts', 'userGifts'));
    }


    public function showAddGiftForm(){
        $users = DB::table('users')->select('id', 'name')->get();
        return view('gifts.create_gift', ['userIds' => $users]);
    }

    /*public function showAddGiftForm(){
        return view('gifts.create_gift');
    }*/

    public function createGift(Request $request){

        $request->validate([
            'gift_name'=> 'required|string|max:50',
            'predicted_value'=>'required|numeric',
            'money_spent' => 'required|numeric',
            'user_id' => 'required'
        ]);

        DB::table('gifts')->insert([
            'gift_name' => $request->gift_name,
            'predicted_value' => $request->predicted_value,
            'money_spent' => $request->money_spent,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('gifts.show')->with('message','Gift has been added with success!');;
    }

    public function deleteGiftFromDB($id) {
        DB::table('gifts')->where('id', $id)->delete();
        return back();
    }

    public function showEditGiftForm($id)
{
    $gift = DB::table('gifts')->where('id', $id)->first();
    if (!$gift) {
        abort(404, 'Gift not found.');
    }
    $users = DB::table('users')->select('id', 'name')->get();
    return view('gifts.edit_gift', compact('gift', 'users'));
}

public function updateGift(Request $request, $id)
{
    $request->validate([
        'gift_name' => 'required|string|max:50',
        'predicted_value' => 'required|numeric',
        'money_spent' => 'required|numeric',
        'user_id' => 'required'
    ]);

    DB::table('gifts')->where('id', $id)->update([
        'gift_name' => $request->gift_name,
        'predicted_value' => $request->predicted_value,
        'money_spent' => $request->money_spent,
        'user_id' => $request->user_id
    ]);

    return redirect()->route('gifts.show')->with('message', 'Gift has been updated with success!');
}


}

