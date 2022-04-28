<?php

namespace Curso\AplicacaoMvcExemplo;

abstract class Controller
{
    /**
     * @param string $view
     * @param array $dados
     *
     * @return void
     */
    public function view(string $view, array $dados)
    {
        $caminho = __DIR__.'/../views/'.$view.'.php';
        extract($dados);

        include $caminho;
    }
}
