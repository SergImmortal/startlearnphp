<?php

class Ajax extends  Controller{
    
    public function testAjaxAction(){
        $data = ['value' => '564'];
        $this->ajaxResponse($data);
        
    }
        
    
    
}

?>