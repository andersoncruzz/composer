<?php
/**
 * Created by PhpStorm.
 * User: eribeiro
 * Date: 26/09/16
 * Time: 08:06
 */

namespace frontend\models;


class ObjetoDeAprendizagem
{
    public $tipo;
    public $descricao;
    public $ordem;
    public $id;

    /**
     * ObjetoDeAprendizagem constructor.
     * @param $tipo
     * @param $descricao
     * @param $ordem
     */
    public function __construct($tipo, $descricao, $ordem, $id)
    {
        $this->tipo = $tipo;
        $this->descricao = $descricao;
        $this->ordem = $ordem;
        $this->id = $id;
    }

}
