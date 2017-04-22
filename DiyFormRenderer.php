<?php


namespace FormRenderer;


class DiyFormRenderer extends FormRenderer
{

    public static function create()
    {
        return new static();
    }


    public function render()
    {
        echo $this->controls;
    }

    public function getCentralizedFormErrors()
    {
        return $this->centralizedFormErrors;
    }
}
