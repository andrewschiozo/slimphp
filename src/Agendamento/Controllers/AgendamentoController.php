<?php

namespace src\Agendamento\Controllers;

use src\Agendamento\Models\Agendamento;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AgendamentoController {

    public function listar(Request $request, Response $response) : Response {        
        $agendamentos = Agendamento::all()->sortByDesc("data_hora");

        $json = json_encode($agendamentos);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function listarProximos(Request $request, Response $response) : Response {
        $agendamentos = Agendamento::where('data_hora', '>=', date('Y-m-d H:i'))->get();
        
        $json = json_encode($agendamentos);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
    }

    public function ver(Request $request, Response $response) : Response {
        $id = $request->getAttribute('id');
        $agendamento = Agendamento::where('id', $id)->first();

        $json = json_encode($agendamento);
        $response->getBody()->write($json);
        return $response->withHeader('Content-Type', 'application/json');
    }

    /**
     * Salvar agendamento
     * 
     * @param Request $request {data, horario, sala, outra-sala, organizador, observacoes}
     * @param Response $response
     * 
     * @return Response
     */
    public function salvar(Request $request, Response $response) : Response {
        $data = (array) $request->getParsedBody();

        $data['data_hora'] = $data['data'] . ' ' . $data['horario'];
        $data['sala'] .= $data['sala'] === 'Outro' ? ' (' . $data['outra-sala'] . ')' : '';
        
        $agenda = new Agendamento($data);

        $result = Agendamento::where([
            'data_hora' => $data['data_hora'],
            'sala' => $data['sala']
        ])->first();

        if($result) {
            $message = "Já existe agendamento para a sala {$result->sala} na data " . date('d/m/Y H:i', strtotime($result->data_hora));
            
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