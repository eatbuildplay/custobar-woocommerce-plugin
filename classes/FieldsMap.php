<?php

namespace WooCommerceCustobar;

use WooCommerceCustobar\DataType\CustobarCustomer as CBCustomer;
use WooCommerceCustobar\DataType\CustobarProduct as CBProduct;
use WooCommerceCustobar\DataType\CustobarSale as CBSale;
use WooCommerceCustobar\DataSource\WooCommerceProduct as WCProduct;

defined('ABSPATH') or exit;

class FieldsMap
{
    
    /**
     * Get custobar to woocommer fields map
     *
     * @param string $fieldGroup
     * @return array
     */
    public static function getDefaults($fieldGroup = 'product')
    {
        $groups = array(
            /**
             * Customer fields map
             * 
             * custobar => woocommerce
             */
            'customer' => array(
                CBCustomer::EXTERNAL_ID    => 'user_id',
                CBCustomer::FIRST_NAME     => 'billing_first_name',
                CBCustomer::LAST_NAME      => 'billing_last_name',
                CBCustomer::PHONE_NUMBER   => 'billing_phone',
                CBCustomer::COMPANY        => 'company',
                CBCustomer::STREET_ADDRESS => 'street_address',
                CBCustomer::CITY           => 'city',
                CBCustomer::ZIP_CODE       => 'zip_code',
                CBCustomer::STATE          => 'state',
                CBCustomer::COUNTRY        => 'country',
                CBCustomer::DATE_JOINED    => 'date_joined',
                CBCustomer::CAN_SMS        => 'can_sms',
                CBCustomer::CAN_EMAIL      => 'can_email',
                CBCustomer::NIN            => null,
                CBCustomer::CAN_POST       => null,
                CBCustomer::LANGUAGE       => null,
                CBCustomer::LAST_LOGIN     => null,
                CBCustomer::VAT_NUMBER     => null,
                CBCustomer::CAN_PROFILE    => null,
                CBCustomer::CANONICAL_ID   => null,
                CBCustomer::MAILING_LISTS  => null,
            ),

            /**
             * Prduct fields map
             * 
             * custobar => woocommerce
             */
            'product' => array(
                CBProduct::EXTERNAL_ID                  => WCProduct::PRODUCT_ID,
                CBProduct::TITLE                        => WCProduct::TITLE,
                CBProduct::DESCRIPTION                  => WCProduct::DESCRIPTION,
                CBProduct::IMAGE                        => WCProduct::IMAGE,
                CBProduct::TYPE                         => WCProduct::TYPE,
                CBProduct::WEIGHT                       => WCProduct::WEIGHT,
                CBProduct::UNIT                         => WCProduct::UNIT,
                CBProduct::PRICE                        => WCProduct::PRICE,
                CBProduct::SALE_PRICE                   => WCProduct::SALE_PRICE,
                CBProduct::CATEGORY                     => WCProduct::CATEGORY,
                CBProduct::CATEGORY_ID                  => WCProduct::CATEGORY_IDS,
                CBProduct::DATE                         => WCProduct::DATE,
                CBProduct::URL                          => WCProduct::URL,
                CBProduct::VISIBLE                      => WCProduct::VISIBLE,
                CBProduct::BRAND                        => null,
                CBProduct::VENDOR                       => null,
                CBProduct::LANGUAGE                     => null,
                CBProduct::EXCLUDE_FROM_RECOMMENDATIONS => null,
            ),

            /**
             * Sale/order fields map
             * 
             * custobar => woocommerce
             */
            'sale' => array(
                CBSale::EXTERNAL_ID         => 'order_id',
                CBSale::SALE_EXTERNAL_ID    => 'order_number',
                CBSale::SALE_DATE           => 'order_date',
                CBSale::TOTAL               => 'total',
                CBSale::SALE_TOTAL          => 'total',
                CBSale::SALE_CUSTOMER_ID    => 'customer_id',
                CBSale::SALE_PHONE_NUMBER   => 'customer_phone',
                CBSale::SALE_EMAIL          => 'customer_email',
                CBSale::PRODUCT_ID          => 'product_id',
                CBSale::QUANTITY            => 'quantity',
                CBSale::UNIT_PRICE          => 'price',
                CBSale::SALE_DISCOUNT       => 'total_discount',
                CBSale::SALE_SHIPPING       => 'sale_shipping',
                CBSale::SALE_PAYMENT_METHOD => 'payment_method_title',
                CBSale::DISCOUNT            => null,
                CBSale::SALE_STATE          => null,
                CBSale::SALE_SHOP_ID        => null,
            ),
        );

        return isset($groups[$fieldGroup]) ? $groups[$fieldGroup] : $groups;
    }

    /**
     * Prepare fields output for restore defualt butotn
     *
     * @return array
     */
    public static function getFieldsMapFroFront()
    {
        $groups = self::getDefaults( 'all' );
        $out = array();

        foreach ($groups as $key => $group)
        {
            foreach ($group as $ckey => $wkey)
            {
                if (is_null($wkey))
                {
                    $wkey = 'null';
                }

                if (isset($out[$key]))
                {
                    $out[$key] .= "{$ckey}: {$wkey}\n";
                } else {
                    $out[$key] = "{$ckey}: {$wkey}\n";
                }
            }
        }

        return $out;
    }
}