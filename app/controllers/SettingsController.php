<?php



class SettingsController extends Controller{

    public function index(){
        $dados = array();

        $this->carregarViews('settings', $dados);
    }

}