<?php
/*
 * Home.php
 * @copyright Copyright 2008 - http://www.innov-concept.com
 * @Brand : ClicShopping(Tm) at Inpi all right Reserved
 * @license GPL 2 License & MIT Licencse

*/

  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Sites\ClicShoppingAdmin\Pages\Home;

  use ClicShopping\OM\Registry;

  use ClicShopping\Apps\Report\StatsProductsNoViewed\StatsProductsNoViewed;

  class Home extends \ClicShopping\OM\PagesAbstract {
    public $app;

    protected function init() {
      $CLICSHOPPING_StatsProductsNoViewed = new StatsProductsNoViewed();
      Registry::set('StatsProductsNoViewed', $CLICSHOPPING_StatsProductsNoViewed);

      $this->app = Registry::get('StatsProductsNoViewed');

      $this->app->loadDefinitions('Sites/ClicShoppingAdmin/main');
    }
  }
