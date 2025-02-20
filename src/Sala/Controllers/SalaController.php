<?php

namespace src\Sala\Controllers;

use src\Sala\Models\Sala;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class SalaController {

    public function listar(Request $request, Response $response) : Response {        
        $salas = Sala::all()->sortByDesc("nome");

        $json = json_encode($salas);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function ver(Request $request, Response $response) : Response {
        $id = $request->getAttribute('id');
        $sala = Sala::where('id', $id)->first();

        $json = json_encode($sala);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Salvar sala
     * 
     * @param Request $request {nome, descricao}
     * @param Response $response
     * 
     * @return Response
     */
    public function salvar(Request $request, Response $response) : Response {
        $data = (array) $request->getParsedBody();
        
        $agenda = new Sala($data);

        $result = Sala::where(['nome' => $data['nome']])->first();

        if($result) {
            $message = "Já existe uma sala com o nome {$result->sala}";
            
            $json = json_encode(['message' => $message]);
            $response->getBody()->write($json);
            return $response->withHeader('Content-Type', 'application/json')->withStatus(403);
        }

        $agenda->save();

        $json = json_encode([]);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json')->withStatus(201);
    }
}