<?php


class MessagesController extends Controller{

    public function index()
    {
        $dados = array();

        $this->carregarViews('mensagem', $dados);
    }

}