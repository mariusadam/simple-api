<?php

namespace Api\Controller;

use Api\Entity\Employee;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends BaseController
{
    public function createAction(Request $request)
    {
        $employee = $this->getSerializer()->deserialize($request->getContent(), Employee::class, 'json');

        dump($employee);

        return $this->json($this->getSerializer()->serialize($employee, 'json'), Response::HTTP_CREATED, true);
    }
}