<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
   
  public function index() {
        return User::orderBy('created_at', 'asc')->get();
  }


  // Store a newly created resource in storage.   
  // @param  \Illuminate\Http\Request  $request

  // @return \Illuminate\Http\Response

  public function store(Request $request) {
      //storing new values in the database

      $user = new User;
      $user->name = $request->input('name'); //retrieving user inputs
      $user->profilePicture = $request->input('profilePicture');  //retrieving user inputs
      $user->address1 = $request->input('address1');  //retrieving user inputs
      $user->address2 = $request->input('address2');  //retrieving user inputs
      $user->city = $request->input('city');  //retrieving user inputs
      $user->state = $request->input('state');  //retrieving user inputs
      $user->zip = $request->input('zip');  //retrieving user inputs
      $user->dob = $request->input('dob');  //retrieving user inputs
      $user->email = $request->input('email');  //retrieving user inputs
      $user->password = $request->input('password');  //retrieving user inputs
      $user->save(); //storing values as an object
      return $user; //returns the stored value if the operation was successful.
 
  }

  // // Display the specified resource.
  // @param  int  $id

  // @return \Illuminate\Http\Response

  public function show($id) {
  //viewing a particular User from a database
     return User::findorFail($id); //searches for the object in the database using its id and returns it.

  }

  

  // // Update the specified resource in storage.

  //  @param  \Illuminate\Http\Request  $request

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function update(Request $request, $id) {
     

      $user = User::findorFail($id); // uses the id to search values that need to be updated.
      $user->name = $request->input('name'); //retrieving user inputs
      $user->profilePicture = $request->input('profilePicture');  //retrieving user inputs
      $user->address1 = $request->input('address1');  //retrieving user inputs
      $user->address2 = $request->input('address2');  //retrieving user inputs
      $user->city = $request->input('city');  //retrieving user inputs
      $user->state = $request->input('state');  //retrieving user inputs
      $user->zip = $request->input('zip');  //retrieving user inputs
      $user->dob = $request->input('dob');  //retrieving user inputs
      $user->email = $request->input('email');  //retrieving user inputs
      $user->password = $request->input('password');  //retrieving user inputs
      $user->save();//saves the values in the database. The existing data is overwritten.
      return $user; // retrieves the updated object from the database
  }

  // // Remove the specified resource from storage.

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function destroy($id) {
      //deleting data
     $user = User::findorFail($id); //searching for object in database using ID
      if($user->delete()){ //deletes the object
          return 'deleted successfully'; //shows a message when the delete operation was successful.
      }
  }
}
