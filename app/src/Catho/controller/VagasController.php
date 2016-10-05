<?php

namespace Catho\Controller;

use Catho\Repository\VagasRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class VagasController
{
    private $repository;

    public function __construct(VagasRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * All Vacancies
     * @return JsonResponse
     */
    public function indexAction()
    {
        return new JsonResponse(
            $this->repository
                ->findAll()
        );
    }

    /**
     * Get by term Action
     * @return JsonResponse
     */
    public function getAction($term)
    {
        return new JsonResponse(
            $this->repository
                ->findByTerm($term)
        );
    }

    /**
     * Get by city Action
     * @return JsonResponse
     */
    public function getByCityAction($city)
    {
        return new JsonResponse(
            $this->repository
                ->findByCity($city)
        );
    }

    /**
     * Get by salary Action
     * @return JsonResponse
     */
    public function getBySalaryAction($order)
    {
        return new JsonResponse(
            $this->repository
                ->findBySalary($order)
        );
    }
}
