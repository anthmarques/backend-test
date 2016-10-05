<?php

namespace Catho\Repository;

class VagasRepository
{
    private $db;

    /**
     * VagasRepository constructor.
     *
     * Construct repository and load vagas.json
     *
     */
    public function __construct()
    {
        $this->db = json_decode(
            file_get_contents(__DIR__ . "/vagas.json"),
            true
        );
    }

    /**
     * Get all vacancies
     * @return mixed
     */
    public function findAll()
    {
        return array_values($this->db['docs']);
    }

    /**
     * Find By Title or Description
     * @param $term
     * @return array
     */
    public function findByTerm($term)
    {
        $response = array_filter(
            $this->db['docs'],
            function($key) use ($term) {
                $inTitle       = stristr($key['title'], $term);
                $inDescription = stristr($key['description'], $term);
                return $inTitle || $inDescription;
            }
        );

        return array_values($response);
    }

    /**
     * Find by city
     * @param $city
     * @return array
     */
    public function findByCity($city)
    {
        $response = array_filter(
            $this->db['docs'],
            function($key) use ($city) {
                return in_array($city, $key['cidade']);
            }
        );

        return array_values($response);
    }

    /**
     * Find By Salary Sorting Asc or Desc
     * @param $order
     * @return mixed
     */
    public function findBySalary($order)
    {
        usort(
            $this->db['docs'],
            function($a, $b) use ($order) {
                if (strtolower($order) == 'asc') {
                    return $a['salario'] - $b['salario'];
                }

                if (strtolower($order) == 'desc') {
                    return $b['salario'] - $a['salario'];
                }
            }
        );

        return array_values($this->db['docs']);
    }
}
