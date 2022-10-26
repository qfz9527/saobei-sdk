<?php
namespace Saobei\sdk\Model\Merchant;

use Saobei\sdk\Exception\SaobeiException;

class MerchantAuthstatusRequest extends MerchantRequest
{
    protected $requiredFields = array(
        'inst_no','trace_no','key_sign','merchant_no','api_ver','type'
    );

    /** @var string 商户号 */
    protected $merchant_no;

    /**
     * 商户实名认证状态查询接口
     * @param array $fields
     *
     * @fieldParam String $inst_no
     * @fieldParam String $trace_no
     * @fieldParam String $key_sign
     * @fieldParam String $merchant_no
     *
     * @return array
     * @throws SaobeiException
     * */
    public function query($fields)
    {
        return $this->main($fields);
    }

}