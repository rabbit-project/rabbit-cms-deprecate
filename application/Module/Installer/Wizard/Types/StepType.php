<?php
namespace Installer\Wizard\Types;


use Rabbit\Lang\Enum;

/**
 * Class StepType
 * @package Installer\Wizard\Types
 * @method static StepType get($name)
 */
final class StepType extends Enum {

    CONST SCRIPT = 'SCRIPT';
    CONST HUMAN = 'HUMAN';

} 