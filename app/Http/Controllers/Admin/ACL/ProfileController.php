<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProfile;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{

    protected $reppsitory;

    public function __construct(Profile $profile)
    {
        $this->repository = $profile;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = $this->repository->orderBy('name')->paginate();

        return view('admin.pages.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        // dd($request->all());

        $profile = $this->repository->create($request->all());

        if(!$profile){
            return redirect()->back()->with('error', 'Houve um erro ao cadastar o perfil, tente mais tarde');
        }

        return redirect()->route('profiles.index')->with('accept', "Perfil " . $profile->name . " cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$profile = $this->repository->where('id', $id)->first()){
            return redirect()->back()->with('error', 'Houve um erro ao mostrar o perfil, tente mais tarde');
           }
        // dd($id);    
        return view('admin.pages.profiles.show', compact('profile')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if(!$profile = $this->repository->where('id', $id)->first()){
        return redirect()->back()->with('error', 'Houve um erro ao editar o perfil, tente mais tarde');
       }

       return view('admin.pages.profiles.edit', compact('profile'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        if(!$profile = $this->repository->find($id)->first()){

            return redirect()->back()->with('error', 'Houve um erro ao registrar o perfil, tente mais tarde');

        }

        $profile->update($request->all());

        return redirect()->route('profiles.index')->with('accept', "Perfil " . $profile->name . " atualizado com sucesso!");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$profile = $this->repository->find($id)->first()){

            return redirect()->back()->with('error', 'Houve um erro ao deletar o perfil, tente mais tarde');

        }

        $profile->delete();

        return redirect()->route('profiles.index')->with('accept', "Perfil deletar com sucesso");
    }

    /**
     * Rota para busca de resultados
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request){
    
        $filters = $request->only('filter');

        $profiles = $this->repository->search($request->filter);


        if($profiles->count() <= 0){
            return redirect()->back()->with('error', 'Não foram encontradas ocorrencias');
        }

        return view('admin.pages.profiles.index',[
            'filters' => $filters,
            'profiles' => $profiles
        ]);
        
    }



}
