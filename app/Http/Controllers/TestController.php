<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class TestController extends Controller
{
    public function testForm(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            User::create(['name' => $request->name]);
            DB::commit();
            return redirect()->back()->with('success', 'success');
        } catch (\Throwable $th) {
            report($th);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
