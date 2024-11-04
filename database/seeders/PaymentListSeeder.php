<?php

namespace Database\Seeders;

/**
 * import component
 */

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

/**
 * import models
 */

use App\Models\Payment\PaymentList\PaymentList;

class PaymentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "is_sub_payment" => "no",
                "list"           => "cash",
                "sub_list"       => null,
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "no",
                "list"           => "invoice",
                "sub_list"       => null,
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "GoBiz PLUS EDC",
                "sub_list"       => "card",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Gopay",
                "icon_list"      => "Gopay.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Ovo",
                "icon_list"      => "Ovo.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Dana",
                "icon_list"      => "Dana.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "LinkAja",
                "icon_list"      => "LinkAja.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "ShopeePay",
                "icon_list"      => "ShopeePay.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Akulaku",
                "icon_list"      => "Akulaku.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Kredivo",
                "icon_list"      => "Kredivo.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Wechatpay",
                "icon_list"      => "Wechatpay.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EWallet",
                "sub_list"       => "Alipay",
                "icon_list"      => "Alipay.png",
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "GoFood",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "GrabFood",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "ShopeeFood",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "Traveloka Eats",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "AirAsia Food",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Online Delivery",
                "sub_list"       => "Other Online Delivery",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "BCA",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "Mandiri",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "BNI",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "BRI",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "CIMB NIAGA",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "EDC",
                "sub_list"       => "Other EDC",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Tokopedia",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Shopee",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Lazada",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Bukalapak",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Blibli",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "E-Commerce",
                "sub_list"       => "Other E-Commerce",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Gopay",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Ovo",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "BCA QR",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Dana",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "LinkAja",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Shopeepay",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Atome",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "YUKK",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Online Order",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Gift Card",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Bank Transfer",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "WhatsApp",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "BCA Debit Off Us",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "BCA Card",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Flazz BCA",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Reward BCA",
                "icon_list"      => null,
            ],
            [
                "is_sub_payment" => "yes",
                "list"           => "Other",
                "sub_list"       => "Other",
                "icon_list"      => null,
            ],
        ];

        foreach ($data as $key => $value) :
            PaymentList::create([
                'uuid_payment_list' => Uuid::uuid4()->getHex(),
                'is_sub_payment'    => $value['is_sub_payment'],
                'list'              => $value['list'],
                'sub_list'          => $value['sub_list'],
                'icon_list'         => $value['icon_list']
            ]);
        endforeach;
    }
}
