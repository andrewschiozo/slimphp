<?php

namespace src\Controllers;

use src\Models\Agenda ;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use function Laravel\Prompts\error;

class AgendaController {

    private $renderer;

    public function __construct($renderer) {
        $this->renderer = $renderer;
    }

    public function listar(Request $request, Response $response) : Response {
        error_log(date_default_timezone_get());
        
        $agendamentos = Agenda::all()->sortByDesc("data_hora");
        
        $form = $this->renderer->fetch('agendamento/AgendamentoForm.php');
        $tabela = $this->renderer->fetch('agendamento/AgendamentoTabela.php', ['agendamentos' => $agendamentos]);

        $view = $this->renderer->fetch('agendamento/AgendamentoHome.php', ['form' => $form, 'tabela' => $tabela]);

        return $this->renderer->render($response, 'template.php', [
            'content' => $view,
            'title' => 'Agendamentos'
        ]);
    }

    public function listarProximas(Request $request, Response $response) : Response {
        $agendamentos = Agenda::where('data_hora', '>=', date('Y-m-d H:i'))->get();
        
        $form = $this->renderer->fetch('agendamento/AgendamentoForm.php');
        $tabela = $this->renderer->fetch('agendamento/AgendamentoTabela.php', ['agendamentos' => $agendamentos]);

        $view = $this->renderer->fetch('agendamento/AgendamentoHome.php', ['form' => $form, 'tabela' => $tabela]);

        return $this->renderer->render($response, 'template.php', [
            'content' => $view,
            'title' => 'Agendamentos'
        ]);
    }

    public function ver(Request $request, Response $response, $id) : Response {
        $agendamento = Agenda::where('id', $id)->first();
        
        if(!$agendamento) {
            return $response->withHeader('Location', '/agenda_reuniao/agendamentos')->withStatus(302);
        }

        $view = $this->renderer->fetch('agendamento/AgendamentoView.php', ['agendamento' => $agendamento]);
        return $this->renderer->render($response, 'template.php', [
            'content' => $view,
            'title' => 'Agendamentos'
        ]);
    }

    public function salvar(Request $request, Response $response) : Response {
        $data = $request->getParsedBody();

        $data['data_hora'] = $data['data'] . ' ' . $data['horario'];
        $data['sala'] .= $data['sala'] === 'Outro' ? ' (' . $data['outra-sala'] . ')' : '';
        
        $agenda = new Agenda($data);

        
        $result = Agenda::where([
            'data_hora' => $data['data_hora'],
            'sala' => $data['sala']
        ])->first();

        if($result) {
            $message = "Já existe agendamento para a sala {$result->sala} na data " . date('d/m/Y H:i', strtotime($result->data_hora));
            $view = $this->renderer->fetch('error.php', ['message' => $message]);

            return $this->renderer->render($response, 'template.php', [
                'content' => $view,
                'title' => 'Erro'
            ]);
            // $json = json_encode(['message' => $message]);
            // $response->getBody()->write($json);
            // return $response->withHeader('Content-Type', 'application/json')->withStatus(403);
        }

        $agenda->save();

        // $json = json_encode([]);
        // $response->getBody()->write($json);
        // return $response->withHeader('Content-Type', 'application/json')->withStatus(201);

        return $response->withHeader('Location', '/agenda_reuniao/agendamentos')->withStatus(302);
    }
}