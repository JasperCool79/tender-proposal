<?php

namespace App\Http\Controllers;

use Throwable;
use App\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProposalStoreRequest;

class ProposalController extends Controller
{
    public function index() {
        $proposals = Proposal::own()->get();
        return view('proposal.index',compact('proposals'));
    }
    public function adminIndex() {
        $proposals = Proposal::all();
        return view('admin.index',compact('proposals'));
    }
    public function create() {
        return view('proposal.create');
    }
    public function store(ProposalStoreRequest $request) {
        try {
            Proposal::create($request->only(['tender_name', 'date','location','dead_line','budget','user_id']));
            $proposals = Proposal::own()->get();
            return view('proposal.index',compact('proposals'));
        } catch (Throwable $e) {
            report($e);
            return redirect()->back()->withErrors([
                'error-message'=> $e->getMessage()
            ]);
        }
    }
    public function update(Request $request,$id) {
        try {
            $proposal = Proposal::find($id);
            $proposal->status = $request->status;
            $proposal->save();
            return true;
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}