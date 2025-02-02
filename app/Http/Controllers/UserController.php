<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showAllUsers()
    {
        //$allUsers = $this->getAllUsers();
        $contacts = $this->getContacts();
        //$this->insertUserIntoDB();
        //$this->updateUserAtDB();
        $allUsers = $this->getUsersFromDB();
        //$deleteUser = $this->deleteUserFromDB(1); //passar a função o id do user a eliminar

        //$userType = User::USER_ADMIN;
        //dd($userType);
        //$users = User::where('type', $userType)->get();


        //dd($tasks); //usado para debug (dump and die)
        return view('users.all_users', compact('allUsers', 'contacts', 'allUsers'));
    }



    public function showAddUserForm()
    {
        return view('users.create_user');
    }

    /*private function getAllUsers()
    {
        $cesaeInfo = [
            'name' => 'Cesae',
            'adress' => 'Rua de Ciriaco Cardoso ',
            'email' => 'cesae@cesae.com'
        ];
        return $cesaeInfo;
    }*/

    private function getContacts()
    {
        $contacts = [
            ['id' => 1, 'name' => 'Rui', 'phone' => '91234567 ', 'email' => 'rui@email.com'],
            ['id' => 2, 'name' => 'Ruben', 'phone' => '91234561 ', 'email' => 'ruben@email.com'],
            ['id' => 3, 'name' => 'Tiago', 'phone' => '91234564 ', 'email' => 'tiago@email.com'],
        ];
        return $contacts;
    }

    //As tarefas mostradas deverão ser definidas num array numa função acessória com o
    //tipo $tasks= ['Rita' => 'estudar laravel', 'João' => 'Estudar Mysql']

    public function insertUserIntoDB()
    {
        DB::table('users')->insert([
            'name' => 'Joana',
            'email' => 'Joana@email.pt',
            'password' => 'nemtantoaterra'
        ]);
        return response()->json('User created');
    }
    public function updateUserAtDB()
    {
        DB::table('users')
            ->where('id', 1)
            ->update(['address' => 'Rua Nova da Pessoa']);
    }
    protected function getUsersFromDB()
    {
        $users = DB::table('users')
            // ->where('user', 'nemtantoaterra')
            // traz o primeiro que encontrar -> first();
            ->get();

        return $users;
    }

    public function deleteUserFromDB($id)
    {
        DB::table('gifts')->where('user_id', $id)->delete();
        DB::table('tasks')->where('user_id', $id)->delete();
        DB::table('users')->where('id', $id)->delete();
        return back();
    }

    public function viewUser($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        return view('users.view_user', compact('user'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'address' => 'nullable|string|max:255',
            'nif' => 'nullable|string|max:15'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'nif' => $request->nif
        ]);

        return redirect()->route('users.show')->with('message', 'User added with success!');
    }

    public function showEditUserForm($id)
    {

        $user = DB::table('users')->where('id', $id)->first();
        if (!$user) {
            return redirect()->route('users.show')->with('error', 'User not found!');
        }
        return view('users.edit_user', compact('user'));
    }

    public function updateUser(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8',
        'address' => 'nullable|string|max:255',
        'nif' => 'nullable|string|max:15'
    ]);

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->nif = $request->nif;

    if ($request->password) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('users.show')->with('message', 'User updated successfully!');
}
}
