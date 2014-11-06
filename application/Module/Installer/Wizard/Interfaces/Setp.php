<?php
namespace Installer\Wizard\Interfaces;

use Installer\Wizard\Exceptions\WizardException;
use Installer\Wizard\Types\StepType;

abstract class Setp implements Executable {

    /**
     * @var StepType
     */
    protected $type;
    protected $completed = false;
    protected $stepNumber;
    protected $completedTax = 0;

    public function __construct(StepType $type, $stepNumber){
        $this->type = $type;
        $this->stepNumber = $stepNumber;
    }

    /**
     * @return integer
     */
    public function getStepNumber(){
        return $this->stepNumber;
    }

    /**
     * @return integer
     */
    public function getCompletedTax(){
        return $this->completedTax;
    }

    /**
     * @param $tax
     * @return $this
     * @throws WizardException
     */
    public function setCompletedTax($tax) {
        if(!is_integer($tax) || $tax < 0 || $tax > 100)
            throw new WizardException(sprintf('A taxa deve ser entre 0 ~ 100 e somente número (informado: %s)', $tax));

        $this->completedTax = $tax;

        if($tax == 100)
            $this->completed = true;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isCompleted(){
        return $this->completed;
    }

} 