<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class eventController extends Controller
{
    
  public function index() {
        return Event::orderBy('created_at', 'asc')->get();
  }


  // Store a newly created resource in storage.   
  // @param  \Illuminate\Http\Request  $request

  // @return \Illuminate\Http\Response

  public function store(Request $request) {
      //storing new values in the database

      $event = new Event;
      $event->name = $request->input('name'); //retrieving user inputs
      $event->description = $request->input('description');  //retrieving user inputs
      $event->eventDate = $request->input('eventDate');  //retrieving user inputs
      $event->address1 = $request->input('address1');  //retrieving user inputs
      $event->address2 = $request->input('address2');  //retrieving user inputs
      $event->city = $request->input('city');  //retrieving user inputs
      $event->state = $request->input('state');  //retrieving user inputs
      $event->zip = $request->input('zip');  //retrieving user inputs
      $event->user_id = $request->input('user_id');  //retrieving user inputs
      $event->save(); //storing values as an object
      return $event; //returns the stored value if the operation was successful.
 
  }

  // // Display the specified resource.
  // @param  int  $id

  // @return \Illuminate\Http\Response

  public function show($id) {
  //viewing a particular User from a database
     return Event::findorFail($id); //searches for the object in the database using its id and returns it.

  }

  

  // // Update the specified resource in storage.

  //  @param  \Illuminate\Http\Request  $request

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function update(Request $request, $id) {
     

      $event = Event::findorFail($id); // uses the id to search values that need to be updated.
       $event->name = $request->input('name'); //retrieving user inputs
      $event->description = $request->input('description');  //retrieving user inputs
      $event->eventDate = $request->input('eventDate');  //retrieving user inputs
      $event->address1 = $request->input('address1');  //retrieving user inputs
      $event->address2 = $request->input('address2');  //retrieving user inputs
      $event->city = $request->input('city');  //retrieving user inputs
      $event->state = $request->input('state');  //retrieving user inputs
      $event->zip = $request->input('zip');  //retrieving user inputs
      $event->user_id = $request->input('user_id');  //retrieving user inputs
      $event->save();//saves the values in the database. The existing data is overwritten.
      return $event; // retrieves the updated object from the database
  }

  // // Remove the specified resource from storage.

  //  @param  int  $id

  //  @return \Illuminate\Http\Response

  public function destroy($id) {
      //deleting data
     $event = Event::findorFail($id); //searching for object in database using ID
      if($event->delete()){ //deletes the object
          return 'deleted successfully'; //shows a message when the delete operation was successful.
      }
  }
}
