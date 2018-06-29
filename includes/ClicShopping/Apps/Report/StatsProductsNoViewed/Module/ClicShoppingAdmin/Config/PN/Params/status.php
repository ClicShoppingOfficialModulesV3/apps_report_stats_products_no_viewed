<?php
  /*
   * status.php
   * @copyright Copyright 2008 - http://www.innov-concept.com
   * @Brand : ClicShopping(Tm) at Inpi all right Reserved
   * @license GPL 2 License & MIT Licencse

  */


  namespace ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\PN\Params;

  use ClicShopping\OM\HTML;

  class status extends \ClicShopping\Apps\Report\StatsProductsNoViewed\Module\ClicShoppingAdmin\Config\ConfigParamAbstract {
    public $default = 'True';
    public $sort_order = 10;

    protected function init() {
        $this->title = $this->app->getDef('cfg_stats_products_no_viewed_status_title');
        $this->description = $this->app->getDef('cfg_stats_products_no_viewed_status_description');
    }

    public function getInputField()  {
      $value = $this->getInputValue();

      $input =  HTML::radioField($this->key, 'True', $value, 'id="' . $this->key . '1" autocomplete="off"') . $this->app->getDef('cfg_stats_products_no_viewed_status_true') . ' ';
      $input .=  HTML::radioField($this->key, 'False', $value, 'id="' . $this->key . '2" autocomplete="off"') . $this->app->getDef('cfg_stats_products_no_viewed_status_false');

      return $input;
    }
  }