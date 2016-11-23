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

        return $this->json($request->getContent(), Response::HTTP_CREATED, true);
    }
}