<?php
class ProductsController {
        public $error;
        private $code;
        private $products = array();
        private $phone = 79963814070; //Не забыть убрать, dev-значение

        function getProductList($phone = 0, $filter = 'all') {
                //$this->phone = $phone;
                require 'models/product.model.php';
                require_once $_SERVER['DOCUMENT_ROOT'] . '/core/_dataSource.class.php';
                $dataSource = new DataSource('select id, name, owner from data_products');
                $html = '';
                if (!$data = $dataSource->getData()) {
                        $this->error = $dataSource->error;
                        return $this->error;
                }
                foreach ($data as $key => $value) {
                      $this->products[] = new Product($value['id'], $value['name'], $value['owner']);
                }
                return $this->products;
        }

        function editProduct($name, $id = 'new') {
                if ($id != 'new') {
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/application.class.php';
                        $app = new Application();
                        $id = $app->createUuid();

                }
                require_once $_SERVER['DOCUMENT_ROOT'] . '/core/_dataRowUpdater.class.php';
                $updater = new DataRowUpdater('data_products');
                $updater->setKey('id', $id);
                $updater->setDataFields(array('name' => $name, 'owner' => ));
                $result = $updater->update();
                if (!$result) {
                        $this->error = $updater->error;
                        return $this->error;
                }
                return $result;
        }
}
?>