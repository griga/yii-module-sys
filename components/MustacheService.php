<?php
/** Created by griga at 28.06.2014 | 14:53.
 * 
 */

class MustacheService extends CApplicationComponent {

    /**
     * @var Phly\Mustache\Mustache
     */
    private $renderer;

    public function init(){
        $this->renderer = new Phly\Mustache\Mustache();
        parent::init();
    }

    public function compile($template, $data){

        return $this->renderer->render(
            $template,
            $data
        );
    }

} 