<?php

namespace Mobileia\Slider\Handler;

/**
 * Description of ClickHandler
 *
 * @author matiascamiletti
 */
class ClickHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtener ID
        $id = $this->getParam($request, 'id', 0);
        // Buscar Slider
        $slider = \Mobileia\Slider\Model\Slider::find($id);
        // Verificar si existe
        if($slider === null){
            return new \Mobileia\Expressive\Diactoros\MiaJsonErrorResponse(-1, 'El slider no existe');
        }
        // Sumar click
        $slider->clicks = $slider->clicks + 1;
        $slider->save();
        // Devolvemos datos del usuario
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($slider->toArray());
    }
}
