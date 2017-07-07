<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Validator\Digits;

class GalleryController extends AbstractActionController
{
    public function indexAction()
    {
      $this->layout()->setVariable('view', 'gallery');

      $data = [];
      $data['thumbnails'] = preg_grep ("/^\d+\.jpg$/",scandir(__DIR__ . "/../../../../public/img/thumbnails/"));

      return new ViewModel($data);
    }

    public function detailsAction()
    {
      $this->layout()->setVariable('view', 'gallery');

      $data = [];
      $digitsValidator = new Digits();
      $request = $this->getRequest();

      $id = $request->getQuery('id');

      if($request->isGet() && $digitsValidator->isValid($id) && file_exists("public/img/full/$id.jpg")) {
        $data['id'] = $id;
        return new ViewModel($data);
      } else {
        $this->getResponse()->setStatusCode(404);
        return;
      }
    }
}
