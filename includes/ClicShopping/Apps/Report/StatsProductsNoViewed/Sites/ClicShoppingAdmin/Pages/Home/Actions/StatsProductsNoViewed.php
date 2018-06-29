<?php
/*
 * Configure.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse
*/

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Sites\ClicShoppingAdmin\Pages\Home\Actions;

  use ClicShopping\OM\Registry;

  class StatsProductsNoViewed extends \ClicShopping\OM\PagesActionsAbstract {
    public function execute() {
      $CLICSHOPPING_StatsProductsNoViewed = Registry::get('StatsProductsNoViewed');

      $this->page->setFile('stats_products_no_viewed.php');

      $CLICSHOPPING_StatsProductsNoViewed->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }