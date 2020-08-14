<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetailPlan;
use App\Models\DetailPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlanController extends Controller
{

    protected $repository, $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }


    public function index($urlPlan)
    {
       if(!$plan = $this->plan->where('url', $urlPlan)->first()){

        return redirect()->back();
       }

    //    $details = $plan->details();
        $details = $plan->details()->paginate();

       return view('admin.pages.plans.details.index', [
           'plan' => $plan,
           'details' => $details
       ]);
    }

    public function create($urlPlan)
    {

        if(!$plan = $this->plan->where('url', $urlPlan)->first()){

            return redirect()->back();
           }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function store(StoreUpdateDetailPlan $request, $urlPlan)
    {
       
        if(!$plan = $this->plan->where('url', $urlPlan)->first()){

            return redirect()->back();
        }

        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);

    }

    public function edit($urlPlan, $id)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $idDetail = $this->repository->find($id);
        
       if(!$plan && $idDetail)
            return redirect()->back();

      

        // dd($idDetail->name);

        return view('admin.pages.plans.details.edit', [
            'plan' => $plan,
            'idDetail' => $idDetail
        ]);
    }

    public function update(StoreUpdateDetailPlan $request, $urlPlan, $id)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);
        
        if(!$plan && $detail){

            return redirect()->back();
           }
        
        $detail->update($request->all());

        return redirect()->route('details.plan.index', $plan->url);
     
    }

    public function show($urlPlan, $id)
    {

        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);
        
       if(!$plan && $detail)
            return redirect()->back();

      

        // dd($detail->name);

        return view('admin.pages.plans.details.show', [
            'plan' => $plan,
            'detail' => $detail
        ]);
    }

    public function destroy($urlPlan, $id)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();
        $detail = $this->repository->find($id);
        
        if(!$plan && $detail){

            return redirect()->back();
           }
        
        $detail->delete();

        return redirect()
                    ->route('details.plan.index', $plan->url)
                    ->with('message', 'Registro deletado com sucesso');
     
    }






}
