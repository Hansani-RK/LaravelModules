<?php

namespace Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\UserManagement\Entities\User;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        dd('here');
        return view('usermanagement::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('usermanagement::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'first_name' => 'required|max:255',
                'email' => 'required|email|max:70|unique:users',
                'password' => 'required|string',
            ]);

            $errorMessage = null;
            foreach ($validator->errors()->toArray() as $key => $value) {
                foreach ($value as $k => $v) {
                    $errorMessage .= $v;
                }
                break;
            }

            if (!$validator->fails()) {
                $user = new User;
                $user->first_name = $request->first_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone_number = $request->phone_number;
                $user->date_of_birth = $request->date_of_birth;
                $user->street_address = $request->street_address;
                $user->city = $request->city;
                $user->state = $request->state;
                $user->country = $request->country;
                $user->user_type = 'user';
                $user->password = bcrypt($request->password);

                if ($user->save()) {
                //    Mail::to($user->email)->send(New SendMail('welcomeUser', $user, 'Welcome to new system'));

                    return \Response::json([
                        'error' => false,
                        'response' => $user,
                        'status_code' => 200
                    ], 200);
                }

                return \Response::json([
                    'error' => false,
                    'response' => $user->fresh(),
                    'status_code' => 200
                ], 200);

            } else {
                return \Response::json([
                    'error' => true,
                    'message' => $errorMessage,
                    'status_code' => 400
                ], 400);
            }
        } catch (Exception $e) {
            return \Response::json([
                'error' => true,
                'message' => 'Something went wrong !',
                'status_code' => 400,
                'dev_message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('usermanagement::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('usermanagement::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
