<?php
/*
 * sort_order.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
 
*/

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\PN\Params;

  class sort_order extends \ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {

    public $default = '300';
    public $app_configured = false;

    protected function init() {
        $this->title = $this->app->getDef('cfg_stats_products_no_viewed_sort_order_title');
        $this->description = $this->app->getDef('cfg_stats_products_no_viewed_sort_order_description');
    }
  }
