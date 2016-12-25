<?php

require_once 'Framework/Controller.php';
require_once 'Framework/Model.php';
require_once 'Framework/Request.php';
require_once 'Model/EmployeeRepository.php';
require_once 'Model/FormationRepository.php';
require_once 'Model/SecurityRepository.php';

class FormationController extends Controller
{
    public function index() {
        if (isset($_SESSION['employee'])) {
            $this->redirect('Formation', 'home');
        } else {
            $view = new View('Login',"login");
            $data = ['ok'];

            $view->generateLogin($data);
        }
    }

    public function home($parameters = null) {
        if (isset($_SESSION["employee"])) {
            $employeeRepository = new EmployeeRepository();
            $formationRepository = new FormationRepository();

            $startYear = date('Y');
            $endYear = date("Y", strtotime(date("Y", strtotime($startYear)) . " + 1 year"));
            $limit = 10;
            $offset = 0;
            $employee = $employeeRepository->getEmployeeById($_SESSION['employee']['id']);
            $employeeFormations = $employeeRepository->getFormationsByEmployeeOrderByDateAndPaginate($employee->getId(), $limit, $offset, $startYear, $endYear);
            $formations = $formationRepository->getAllFormationsOrderByDateAndPaginate($limit, $offset);

            $view = new View('Formation',"formations");
            $view->generate(array(
                'employee' => $employee,
                'employeeFormations' => $employeeFormations,
                'formations' => $formations
            ));
        }else {
            $this->redirect('Security', 'logout');
        }
    }

    public function show($parameters) {
        if (isset($_SESSION["employee"])) {
            $idFormation = $parameters['id'];
            $employeeRepository = new EmployeeRepository();
            $formationRepository = new FormationRepository();

            $employee = $employeeRepository->getEmployeeById($_SESSION['employee']['id']);
            $formation = $formationRepository->getOneFormationById($idFormation);
            $hasFormation = $employeeRepository->hasFormation($_SESSION['employee']['id'], $idFormation);

            $view = new View('Formation', "editFormation");
            $view->generate(array(
                'employee' => $employee,
                'formation' => $formation,
                'hasFormation' => $hasFormation
            ));
        }else {
            $this->redirect('Security', 'logout');
        }
    }

    //Methode a modifier

    public function paginate($parameters) {
        if (isset($_SESSION["employee"])) {
            $employeeRepository = new EmployeeRepository();
            $formationRepository = new FormationRepository();

            $employee = $employeeRepository->getEmployeeById($_SESSION['employee']['id']);
            $formations = [];
            $totalCount = 0;
            $limit = 10;
            $offset = 0;

            if (isset($parameters['tableau'], $parameters['page'])) {
                $currentPage = $parameters['page'];
                $offset = ($currentPage - 1) * $limit;
                $startYear = date('Y');
                $endYear = date("Y", strtotime(date("Y", strtotime($startYear)) . " + 1 year"));

                $block = $parameters['tableau'];
                if ($block == 'all') {
                    $formations = $formationRepository->getAjaxFormationsOrderByDateAndPaginate($limit, $offset);
                    $totalCount = $formationRepository->CountFormations();
                } elseif($block == 'myFormation') {
                    $formations = $employeeRepository->getAjaxFormationsByEmployeeOrderByDateAndPaginate($employee->getId(), $limit, $offset, $startYear, $endYear);
                    $totalCount = $employeeRepository->countFormationsByEmployee($employee->getId(), $startYear, $endYear);
                }
            }

            header('Content-Type: application/json');
            echo json_encode(array(
                'maxRow' => $limit,
                'totalCount' => $totalCount,
                'formations' => $formations
            ));
        }else {
            $this->redirect('Security', 'logout');
        }
    }

    public function search() {
        if (isset($_SESSION["employee"])) {
            $employeeRepository = new EmployeeRepository();
            $employee = $employeeRepository->getEmployeeById($_SESSION['employee']['id']);

            $view = new View('Formation', "searchFormation");
            $view->generate(array(
                'employee' => $employee,
            ));
        }else {
            $this->redirect('Security', 'logout');
        }
    }

}