<?php
/**
 * TencentIMServiceProvider.php
 *
 * @copyright  2021 opencart.cn - All Rights Reserved
 * @link       http://www.guangdawangluo.com
 * @author     Sam Chen <sam.chen@opencart.cn>
 * @created    2021-12-31 10:58:26
 * @modified   2021-12-31 10:58:26
 */

namespace Guangda\Tencent\IM;

use Illuminate\Support\ServiceProvider;

class TencentIMServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tim.php', 'tim');

        $this->publishes([
            __DIR__.'/../config/tim.php' => config_path('tim.php'),
        ]);
    }
}
