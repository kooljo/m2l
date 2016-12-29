<?php

require_once 'Request.php';
require_once 'View.php';


class Router
{
    public function routeRequest() {
        try {
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);
            $parameters = [];
            if ($request->parametersExist('id')) {
                $parameters['id'] = $request->getParameters('id');
            }
            if ($request->parametersExist('page')) {
                $parameters['page'] = $request->getParameters('page');
            }
            if ($request->parametersExist('tableau')) {
                $parameters['tableau'] = $request->getParameters('tableau');
            }
            if ($request->parametersExist('formation')) {
                $parameters['formation'] = $request->getParameters('formation');
            }
            if ($request->parametersExist('days')) {
                $parameters['days'] = $request->getParameters('days');
            }
            if ($request->parametersExist('credits')) {
                $parameters['credits'] = $request->getParameters('credits');
            }
            if ($request->parametersExist('label')) {
                $parameters['label'] = $request->getParameters('label');
            }
            $controller->executeAction($action, $parameters);
        }
        catch (Exception $e) {
            $this->generateError($e);
        }
    }

    private function createController(Request $request) {
        $controller = "Login";
        if ($request->parametersExist('controller')) {
            $controller = $request->getParameters('controller');
            $controller = ucfirst(strtolower($controller));
        }
        $classController = $controller."Controller" ;
        $fileController = "Controller/" . $classController . ".php";
        if (file_exists($fileController)) {
            require($fileController);
            $controller = new $classController();
            $controller->setRequest($request);
            return $controller;
        }
        else
            throw new Exception("Fichier '$fileController' introuvable");
    }

    private function createAction(Request $request) {
        $action = "index";
        if ($request->parametersExist('action')) {
            $action = $request->getParameters('action');
        }
        return $action;
    }

    private function generateError(Exception $exception) {
        $vue = new View('Error', 'error');
        $vue->generate(array('msgErreur' => $exception->getMessage()));
    }
}