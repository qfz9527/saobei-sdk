<?php

namespace Saobei\sdk\Config;

use Saobei\sdk\Exception\SaobeiException;

class Path
{
    static private $instance;

    /**
     * 商户地址
     * */
    private $mchPath;

    /**
     * 支付地址
     * */
    private $payPath;

    /**
     *
     * @param string $mchPath
     * @param string $payPath
     * @throws SaobeiException
     * */
    private function __construct($mchPath, $payPath)
    {
        if (empty($mchPath)) throw new SaobeiException('缺失商户地址');
        if (empty($payPath)) throw new SaobeiException('缺失支付地址');
        $this->mchPath = $mchPath;
        $this->payPath = $payPath;
    }

    private function __clone()
    {
    }

    /**
     *
     * @param string $mchPath
     * @param string $payPath
     *
     * @return self
     * @throws SaobeiException
     * */
    static public function getInstance($mchPath = '', $payPath = '')
    {
        //判断$instance是否是Singleton的对象，不是则创建
        if (!self::$instance instanceof self) {
            self::$instance = new self($mchPath, $payPath);
        }
        return self::$instance;
    }

    public function clearInstance()
    {
        self::$instance = null;
    }

    public function getMchPath()
    {
        return $this->mchPath;
    }

    public function getPayPath()
    {
        return $this->payPath;
    }

    /**
     * 获取地址
     * @param $type
     * @return string
     * @throws SaobeiException
     */
    public static function getPath($type = 'pay')
    {
        switch ($type) {
            case 'pay':
                return self::getInstance()->getPayPath();
            default:
                return self::getInstance()->getMchPath();
        }
    }
}
