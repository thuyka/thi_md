<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $search = $request->search;
        $query = Staff::select('*');
        // dd($query);
        if ($search) {
            $query = $query->where('name', 'like', '%' . $search . '%')->orwhere('id', $search);
        }

        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'DESC');
        //phân trang
        $staffs = $query->paginate(3);

        $staffs = Staff::all();
        $params = [
            'staffs' => $staffs,
        ];
        return view('staffs.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staffs = Staff::all();
        $params = [
            'staffs' => $staffs,
        ];
        return view('staffs.add', $params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        $staff = new Staff();
        $staff->group   = $request->group;
        $staff->name    = $request->name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender  = $request->gender;
        $staff->card    = $request->card;
        $staff->phone   = $request->phone;
        $staff->email   = $request->email;
        $staff->address = $request->address;

        try {
            $staff->save();
            return redirect()->route('staffs.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('staffs.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = Staff::find($id);
        $params = [
            'staff' => $staff,
        ];
        return view('staffs.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, $id)
    {
        $staff = Staff::find($id);
        $staff->group   = $request->group;
        $staff->name    = $request->name;
        $staff->date_of_birth = $request->date_of_birth;
        $staff->gender  = $request->gender;
        $staff->card    = $request->card;
        $staff->phone   = $request->phone;
        $staff->email   = $request->email;
        $staff->address = $request->address;

        try {
            $staff->save();
            return redirect()->route('staffs.index')->with('success', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('staffs.index')->with('error', 'Chỉnh sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff = Staff::find($id);
        try {
            $staff->delete();
            return redirect()->route('staffs.index')->with('success', 'Xóa' . ' ' . $staff->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('staffs.index')->with('error', 'Xóa' . ' ' . $staff->name . ' ' .  'không thành công');
        }
    }
}
