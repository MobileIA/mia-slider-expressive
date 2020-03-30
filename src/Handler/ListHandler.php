<?php namespace Mobileia\Slider\Handler;

/**
 * Description of SubscribeHandler
 *
 * @author matiascamiletti
 */
class ListHandler extends \Mobileia\Expressive\Auth\Request\MiaAuthRequestHandler
{
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface
    {
        // Obtener todos los sliders activos
        $rows = \Mobileia\Slider\Model\Slider::
                where('status', \Mobileia\Slider\Model\Slider::STATUS_ACTIVE)
                ->where('deleted', 0)
                ->get();
        // Devolvemos datos del usuario
        return new \Mobileia\Expressive\Diactoros\MiaJsonResponse($rows->toArray());
    }
}
