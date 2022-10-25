<?php
namespace Saobei\sdk\Model\Merchant;

use Saobei\sdk\Exception\SaobeiException;

class MerchantGoldpanRequest extends MerchantRequest
{
    protected $requiredFields = array(
        'inst_no','trace_no','key_sign','merchant_no'
    );
    protected $optionalFields = array(
        'customer_pages_status','goldplan_status','pay_front_url'
    );

    /** @var string 商户号 */
    protected $merchant_no;

    /**
     * 点金和商家小票配置
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
    public function open($fields)
    {
        return $this->main($fields);
    }

}