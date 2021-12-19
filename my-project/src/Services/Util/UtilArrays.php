<?php
namespace App\Services\Util;

/**
 * Class UtilArrays
 */
class UtilArrays
{
    /**
     * @param array $array
     * @param array $arrayCriterion
     * @return array
     */
    public function sortArrayByCriterion(array $array, array $arrayCriterion) {
        $keysCriterion = array_keys($arrayCriterion);

        usort($array, function($a, $b) use($arrayCriterion, $keysCriterion) {
            if(!empty($a[$keysCriterion[0]]) && !empty($b[$keysCriterion[0]])) {
                if ($a[$keysCriterion[0]] == $b[$keysCriterion[0]]) {
                    if(!empty($a[$keysCriterion[1]]) && !empty($b[$keysCriterion[1]])) {
                        if($arrayCriterion[$keysCriterion[1]] == 'DESC') {
                            if ($a[$keysCriterion[1]] < $b[$keysCriterion[1]]) {
                                return 1;
                            }
                        } else {
                            if ($a[$keysCriterion[1]] > $b[$keysCriterion[1]]) {
                                return 1;
                            }
                        }
                    } else {
                        $this->getOrderByCriterionWithoutkey($arrayCriterion[$keysCriterion[1]]);
                    }
                }

                if($arrayCriterion[$keysCriterion[0]] == 'DESC') {
                    return $a[$keysCriterion[0]] < $b[$keysCriterion[0]] ? 1 : -1;
                } else {
                    return $a[$keysCriterion[0]] > $b[$keysCriterion[0]] ? 1 : -1;
                }
            } else {
                $this->getOrderByCriterionWithoutkey($arrayCriterion[$keysCriterion[0]]);
            }
        });

        return $array;
    }

    private function getOrderByCriterionWithoutkey(string $criterion) {
        if($criterion == 'DESC') {
            return -1;
        } else {
            return 1;
        }
    }


}