<?php

namespace Mobileia\Slider\Handler;

/**
 * Description of SaveHandler
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    /**
     * Servicio para guardar un slider
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->title = $this->getParam($request, 'title', '');
        $item->alt_image = $this->getParam($request, 'alt_image', '');
        $item->url_image = $this->getParam($request, 'url_image', '');
        $item->url_link = $this->getParam($request, 'url_link', '');
        $item->status = $this->getParam($request, 'status', 0);
        $item->save();
        // Devolvemos respuesta
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse(true);
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\Event
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mobileia\Slider\Model\Slider::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mobileia\Slider\Model\Slider();
        }
        // Devolvemos item para editar
        return $item;
    }
}